<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\AddGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Module;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Redis;

class TestController extends Controller {

    public function index() {
        $dataSample = array('id_send' => '3453646', 'id_to' => '57657568', 'message' => 'Day la dau', 'time' => '5657578657');
        $dataSample1 = array('id_send' => '4546588', 'id_to' => '985657567', 'message' => 'Day la dau 2', 'time' => '768679879');
        Redis::zAdd('messages', time(), json_encode($dataSample));
        Redis::zAdd('messages', time(), json_encode($dataSample1));
        dd(Redis::zRange('messages', 0, -1));
    }
}
