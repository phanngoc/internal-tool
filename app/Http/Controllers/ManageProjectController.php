<?php

namespace App\Http\Controllers;

use App\FeatureProject;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\DetailFeature;
use Form;
use App\Project;
use App\CategoryFeature;
use App\StatusProject;
use App\Priority;
use DB;
use App\Models\CommentDetailFeature;
use Auth;
use View;
use Illuminate\Database\Eloquent\Collection;
use Input;
use Route;
use Paginator;
use Log;
use Validator;
use App\Models\Notify as Notify;
use Carbon\Carbon;

class ManageProjectController extends AdminController {

    protected $employee;

    function __construct(Employee $employee) {
        parent::__construct();
        $this->employee = $employee;
    }

    /**
     * List project.
     * @return [type] [description]
     */
    public function listProject() {
        $projects = Project::all();
        $projectBelongUser = Auth::user()->employee()->first()->projects()->get();
        $groupUserBelong = Auth::user()->group()->get();
        $isDirectorOrManager = false;
        foreach ($groupUserBelong as $key => $value) {
            if ($value->id == 8 || $value->id == 12) {
                $isDirectorOrManager = true;
            }
        }

        return view('manageproject.list_project', compact('projects', 'projectBelongUser', 'isDirectorOrManager'));
    }

    /**
     * Show project id.
     * @param  [type] $projectId [description]
     * @return [type]            [description]
     */
    public function showProject($projectId) {
        $project = Project::find($projectId);
        return view('manageproject.show-project', compact('project'));
    }

    /**
     * Show info project.
     * @param  [type] $projectId [description]
     * @return [type]            [description]
     */
    public function showInfoProject($projectId) {

        $project = Project::with('employees','employees.user.group')->find($projectId);

        /* Caculate task and bug */
        $taskNoClosed = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->where('category_feature_id', CategoryFeature::TASK)
                            ->where('projects.id', $projectId)
                            ->where('detailfeature.status_id','<>', StatusProject::CLOSED)->get();

        $taskAll = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->where('category_feature_id', CategoryFeature::TASK)
                            ->where('projects.id', $projectId)
                            ->get();

        $bugNoClosed = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->where('category_feature_id', CategoryFeature::BUG)
                            ->where('detailfeature.status_id','<>', StatusProject::CLOSED)
                            ->where('projects.id', $projectId)
                            ->get();

        $bugAll = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->where('category_feature_id', CategoryFeature::BUG)
                            ->where('projects.id', $projectId)
                            ->get();

        $numTaskNoClosed = count($taskNoClosed);
        $numTaskAll = count($taskAll);    
        $numBugNoClosed = count($bugNoClosed);
        $numBugAll = count($bugAll);

        /* Caculate percent done */
        $dones = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->where('projects.id', $projectId)
                            ->select('done')->get();
                           
        $isDone = 0;
        $allOneHundred = 0;                    
        foreach ($dones as $key => $value) {
            $isDone += $value->done;
            $allOneHundred += 100;
        }                    

        $percentDone = ($allOneHundred == 0) ? 0 : ceil($isDone / $allOneHundred * 100);

        /* Caculate count status project */
        $countStatus = DB::table('projects')->join('featureproject', 'featureproject.project_id', '=', 'projects.id')
                            ->join('detailfeature', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->join('statusprojects', 'statusprojects.id', '=', 'detailfeature.status_id')
                            ->where('projects.id', $projectId)
                            ->select(DB::raw('count(*) as countstatus, detailfeature.status_id, statusprojects.name as label'))
                     ->groupBy('detailfeature.status_id')
                     ->get();

        /* Caculate contruct array issue not closed by month */
        $countIssueNotClosed = DB::table('detailfeature')->where('detailfeature.status_id', '<>', StatusProject::CLOSED)
                            ->join('featureproject', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->join('projects', 'featureproject.project_id', '=', 'projects.id')
                            ->where('projects.id', $projectId)
                            ->select(DB::raw('count(*) as countissue, EXTRACT( YEAR_MONTH FROM detailfeature.startdate ) as timeissue'))
                     ->groupBy('timeissue')
                     ->orderBy('timeissue')
                     ->limit(7)
                     ->get();

        /* Caculate contruct array issue closed by month */
        $countIssueClosed = DB::table('detailfeature')->where('detailfeature.status_id', StatusProject::CLOSED)
                            ->join('featureproject', 'detailfeature.featureproject_id', '=', 'featureproject.id')
                            ->join('projects', 'featureproject.project_id', '=', 'projects.id')
                            ->where('projects.id', $projectId)
                            ->select(DB::raw('count(*) as countissue, EXTRACT( YEAR_MONTH FROM detailfeature.startdate ) as timeissue'))
                     ->groupBy('timeissue')
                     ->orderBy('timeissue')
                     ->limit(7)
                     ->get();

        $arrShortage = array();

        foreach ($countIssueNotClosed as $key => $issue) {
            $isHave = false;
            foreach ($countIssueClosed as $key => $issueClosed) {
                if ($issueClosed->timeissue == $issue->timeissue) {
                    $isHave = true;
                }
            }
            if (!$isHave) {
                $newIssueClosed = new \stdClass();
                $newIssueClosed->countissue = 0;
                $newIssueClosed->timeissue = $issue->timeissue;
                array_push($arrShortage, $newIssueClosed);
            }
        }
        $countIssueClosed += $arrShortage;
        
        return view('manageproject.info-project', compact('project', 'numTaskNoClosed', 'numTaskAll',
                                        'numBugNoClosed', 'numBugAll', 'percentDone', 'countStatus', 'countIssueNotClosed',
                                        'countIssueClosed'));
    }

    /**
     * Update info project.
     * @param  [type] $projectId [description]
     * @return [type]            [description]
     */
    public function updateProject(Request $request, $projectId) {
        $project = Project::find($projectId);
        $validator = Validator::make($request->all(), [
            'projectname' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('manageproject.assignUserToProject', $projectId))
                        ->withErrors($validator)
                        ->withInput();
        }

        $project->update($request->all());
        return redirect(route('manageproject.listproject'));
    }

    /**
     * Create project.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createProject(Request $request) {
        return view('manageproject.create-project');
    }

    /**
     * Post create project.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postCreateProject(Request $request) {

        $validator = Validator::make($request->all(), [
            'projectname' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('manageproject.createproject'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $project = Project::create($request->all());
        return redirect(route('manageproject.listproject'));
    }

    /*
     * Page assign employee to project.
     */
    public function pageAssignEmployeeToProject($projectId) {
        $employees = Employee::all();
        $project = Project::find($projectId);
        $employeeSelected = $project->employees()->select('employee_id')->get()->toArray();
        $func = function($value) {
            return $value['employee_id'];
        };
        $employeeSelected = array_map($func, $employeeSelected);
        return view('manageproject.assign-to-project', compact('employees', 'project', 'employeeSelected'));
    }

    /*
     * Page assign employee to project.
     */
    public function postAssignEmployeeToProject(Request $request, $projectId) {
       $project = Project::find($projectId);
       $project->employees()->sync($request->input('employees'));
       return redirect(route('manageproject.assignUserToProject', $projectId));
    }

    /**
     * Destroy project.
     * @param  [type] $projectId [description]
     * @return [type]            [description]
     */
    public function destroyProject($projectId) {
        Project::destroy($projectId);
        return redirect(route('manageproject.listproject'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, $id = null) {
        
        $projects = $this->employee->listProjectUserBelong();
        if ($id == null) {
            $id = Project::pluck('id');
        }
        $detailfeatures = array();
        $features = Project::find($id)->features()->get();
        $detailfeatures = new Collection();
        foreach ($features as $key_fea => $value_fea) {
            $detaiFeas = $value_fea->detailfeatures()->get();
            foreach ($detaiFeas as $key => $value) {
                $detailfeatures->add($value);
            }
        }
    
        $detailfeatures->sortByDesc('updated_at');

        $statusprojects = StatusProject::all();
        $priorities = Priority::all();
        $employees = Employee::all();

        $selectStatus = ($request->input('status') != null) ? $request->input('status') : array();
        $selectPriority = ($request->input('priority') != null) ? $request->input('priority') : array();
        $selectAssignedTo = ($request->input('assigned_to') != null) ? $request->input('assigned_to') : array();
        $selectEndDate = ($request->input('due_date') != null) ? $request->input('due_date') : '';

        
        $detailfeatures = $detailfeatures->filter(function ($item) use ($selectStatus, $selectPriority, $selectAssignedTo, $selectEndDate) {
            
            $idEmployees = array_map(function($value){
                return $value['id'];
            }, $item->employees()->get()->toArray());

            $isContainEmployee = false;

            foreach ($selectAssignedTo as $key => $assignTo) {
                if (in_array($assignTo, $idEmployees)) {
                    $isContainEmployee = true;
                    break;
                }
            }

            if ($selectEndDate != '') {
                $carbonSelectEnddate = Carbon::createFromFormat('Y-m-d', $selectEndDate);
                $carbonItemEnddate = Carbon::createFromFormat('Y-m-d H:i:s', $item->enddate);
            }

            if ((empty($selectStatus) || in_array($item->status_id, $selectStatus)) 
                && (empty($selectPriority) || in_array($item->priority_id, $selectPriority))
                && (empty($selectAssignedTo) || $isContainEmployee)
                && ($selectEndDate == '' || $carbonSelectEnddate->gte($carbonItemEnddate))
                ) 
            {
               return $item;
            }
        });

        $page = (Input::get('page') == NULL) ? 1 : Input::get('page');
        $path = $request->url;
        $count = $detailfeatures->count();

        $pagiDetailfeatures = new \Illuminate\Pagination\LengthAwarePaginator($detailfeatures, $count, 5, $page);
        $pagiDetailfeatures->setPath($path);
        $detailfeatures = $detailfeatures->slice($pagiDetailfeatures->firstItem() - 1, 5);
        $projectId = $id;
        return view('manageproject.manageproject', compact('projects', 'detailfeatures', 'pagiDetailfeatures', 'projectId'))
            ->with('statusprojects', $statusprojects)
            ->with('priorities', $priorities)
            ->with('employees', $employees)
            ->with('selectStatus', $selectStatus)
            ->with('selectPriority', $selectPriority)
            ->with('selectAssignedTo', $selectAssignedTo)
            ->with('selectEndDate', $selectEndDate)
            ->with('paramQuery', $request->all());
    }

    public function slideCollection($collec, $start, $end) {
        $items = new Collection();
    }

    /**
     * Get employee are assigned to detail feature.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function api_getEmloyeeBelongDetailFeature($id) {
        $employees = Employee::all();
        $results = array();
        foreach ($employees as $key => $value) {
            $results += array($value->id => $value->lastname . " " . $value->firstname);
        }
        $resultchoose = DetailFeature::find($id)->employees()->lists('id');

        echo Form::label('employee', 'Assigned to');
        echo Form::select('employee', $results, $resultchoose, ['class' => 'js-add-employee form-control', 'multiple' => 'true']);
    }

    /**
     * Get all data from project.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function api_getTotalData($id) {
        $datestart = '0000-00-00 00:00:00';
        $dateend = '9999-00-00 00:00:00';
        if (Input::get('datestart') != null) {
            $datestart = Input::get('datestart');
            $dateend = Input::get('dateend');
        }

        $featureproject = FeatureProject::Where('project_id', '=', $id)->get();
        $idq = 1;
        foreach ($featureproject as $feature_key => $feature_value) {
            $detailfeatures = $feature_value->detailfeatures()->where('startdate', '>', $datestart)->where('enddate', '<', $dateend)->get();
            unset($featureproject[$feature_key]->updated_at);
            unset($featureproject[$feature_key]->created_at);
            unset($featureproject[$feature_key]->description);
            $res_combile = array();

            foreach ($detailfeatures as $key => $value) {
                $employees = array();
                $employees = $value->employees()->lists('id');
                $item = array('id' => $value->id,
                    'idparent' => $idq,
                    'name' => $value->name,
                    'employees' => $employees,
                    'start' => $value->startdate,
                    'end' => $value->enddate);
                array_push($res_combile, $item);
            }
            $featureproject[$feature_key]->idfeature = $feature_value->id;
            $featureproject[$feature_key]->id = $idq;
            $featureproject[$feature_key]->series = $res_combile;
            $idq++;
        }

        $res_return = json_encode($featureproject);
        echo $res_return;
    }

    /**
     * Save data edit from grantt chart
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function api_saveAll(Request $request) {
        $data = $request->input('data');
        // print_r($data);
        foreach ($data as $key => $value) {

            $featureproject = FeatureProject::find($value['idfeature']);
            $featureproject->name = $value['name'];
            $featureproject->save();

            foreach ($value['series'] as $k_de => $v_de) {
                $featuredetail = DetailFeature::find($v_de['id']);
                $featuredetail->name = $v_de['name'];
                $featuredetail->startdate = $v_de['startServer'];
                $featuredetail->enddate = $v_de['endServer'];
                $featuredetail->save();
                if (array_key_exists('employees', $v_de)) {
                    $featuredetail->employees()->sync($v_de['employees']);
                }
            }
        }
    }

    /**
     * Edit detail feature.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function editDetailFeature($id) {
        $detailfeature = DetailFeature::find($id);
        $featureprojects = FeatureProject::all();
        $statusprojects = StatusProject::all();
        $categoryfeatures = CategoryFeature::all();
        $priorities = Priority::all();
        $employees = Employee::all();
        return view('manageproject.editdetailfeature', compact('detailfeature', 'featureprojects', 'statusprojects', 'categoryfeatures', 'priorities', 'employees'));
    }

    /**
     * [buildArrayFromCollection description]
     * @param  [Collection] $coll [description]
     * @return [type]       [description]
     */
    private function buildArrayFromCollection($coll) {
        $arrRes = array();
        foreach ($coll as $key => $value) {
            array_push($arrRes, $value->id);
        }
        return $arrRes;
    }

    /**
     * [checkDifferenceEmployee description]
     * @param  [array] $arr       [description]
     * @param  [Collection] $collectEm [description]
     * @return [boolean]            [true if difference]
     */
    private function checkDifferenceEmployee($arr, $collectEm) {
        $arrBuild = $this->buildArrayFromCollection($collectEm);
        sort($arr);
        sort($arrBuild);
        return ($arr != $arrBuild);
    }

    /**
     * [getValueDifFromArray description]
     * @param  [type] $arr       [description]
     * @param  [type] $collectEm [description]
     * @return [type]            [description]
     */
    private function getValueDifFromArray($arr, $collectEm) {
        $arrBuild = $this->buildArrayFromCollection($collectEm);
        $results = array();
        if (count($arrBuild) > count($arr)) {
            $results = array_diff($arrBuild, $arr);
        } else {
            $results = array_diff($arr, $arrBuild);
        }
        return $results;
    }

    /**
     * Update data detail feature
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function updateDetailFeature(Request $request, $id) {
        $employees = DetailFeature::find($id)->employees()->get();
        if ($this->checkDifferenceEmployee($request->input('employees'), $employees)) {
            $userAssigns = $this->getValueDifFromArray($request->input('employees'), $employees);
            foreach ($userAssigns as $key => $userAssign) {
                Notify::create([
                    'content' => 'You have a change to feature',
                    'thread_id' => 1,
                    'is_read' => '0',
                    'link' => route('manageproject.editDetailFeature', $id),
                    'sent_to' => $userAssign
                ]);
            }
        }
        $validator = DetailFeature::validate($request->all(), $id);
        if ($validator->fails()) {
            return redirect(route('manageproject.editDetailFeature', $id))->withErrors($validator)
                            ->withInput();
        } else {
            DetailFeature::find($id)->update($request->all());

            if ($request->input('employees') != null) {
                DetailFeature::find($id)->employees()->sync($request->input('employees'));
            }
            
            return redirect(route('manageproject.editDetailFeature', $id));
        }
    }

    /**
     * View create detail feature
     * @return [type] [description]
     */
    public function createDetailFeature($id) {
        $featureprojects = FeatureProject::where('project_id', $id)->get();
        $statusprojects = StatusProject::all();
        $categoryfeatures = CategoryFeature::all();
        $priorities = Priority::all();
        $employees = Employee::all();
        return view('manageproject.createdetailfeature', compact('featureprojects', 'statusprojects', 'categoryfeatures', 'priorities', 'employees'));
    }

    /**
     * Post to create detail feature
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postCreateDetailFeature(Request $request) {
        $validator = DetailFeature::validate($request->all());
        if ($validator->fails()) {
            return redirect(route('manageproject.createDetailFeature'))->withErrors($validator)
                            ->withInput();
        } else {
            $detailfeature = DetailFeature::create($request->all());

            if ($request->input('employees') != null) {
                $detailfeature->employees()->sync($request->input('employees'));
            }
            
            return redirect(route('manageproject.index'));
        }
    }

    /**
     * Delete detail feature.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteDetailFeature($id) {
        $detailfeature = DetailFeature::find($id);
        $detailfeature->employees()->detach();
        $detailfeature->delete();
        return redirect()->route('manageproject.index')->with('messageOk', 'Delete detail feature successfully!');
    }

    /**
     * Ajax post comment from detail feature.
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postCreateCommentDetailFeature(Request $request) {
        $employee = Auth::user()->employee()->get()[0];
        $commentDetailFeature = CommentDetailFeature::create(
                        [
                            'detail_feature_id' => $request->input('detailFeatureId'),
                            'content' => $request->input('text'),
                            'employee_id' => $employee->id,
                        ]
        );

        $view = view('manageproject.partial.block_comment')
                ->with('employee', $employee)
                ->with('commentDetailFeature', $commentDetailFeature);
        return $view;
    }

    /**
     * [postEditCommentDetailFeature description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postEditCommentDetailFeature(Request $request) {
        $commentDeFea = CommentDetailFeature::find($request->input('detailFeatureId'));
        $commentDeFea->update([
            'content' => $request->input('val'),
        ]);
    }

    /**
     * Upload file in post comment detail feature.
     * @param  Request $request [description]
     * @return [string]           [description]
     */
    public function uploadFileCommentDetailFeature(Request $request) {
        $fileUpload = $request->file('fileup');
        $newName = '';
        if ($fileUpload->isValid()) {
            $extension = $fileUpload->getClientOriginalExtension();
            $newName = md5(strtotime("now")) . '.' . $extension;
            $destinationPath = public_path() . '/files/attach/';
            $request->file('fileup')->move($destinationPath, $newName);
        }
        return '![GitHub Logo](' . route('files.attach', $newName) . ')';
    }

    /**
     * [showFileAttach description]
     * @return [type] [description]
     */
    public function showFileAttach($filename) {
        $destinationPath = public_path() . '/files/attach/' . $filename;
        if (File::exists($destinationPath)) {
            return Response::make(readfile($destinationPath, 200)->header('Content-Type', 'image/png'));
        }
    }

    /**
     * Delete comment detail feature.
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteCommentDetailFeature($id) {
        try {
            CommentDetailFeature::findOrFail($id)->delete();
            return response()->json(['status' => 'ok']);
        } catch (ErrorException $e) {
            return response()->json(['status' => 'not']);
        }
    }

}
