
<!-- Modal feature -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="feature">Feature</label>
             <input name="feature" class="form-control" />
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_change_feature">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal detail feature -->
<div class="modal fade" id="modal_detail_feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detail Feature</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="feature-detail">Feature name</label>
             <input name="feature-detail" class="form-control" />
           </div>
           <div class="form-group content-detail-feature">

           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger delete_detailfeature" data-dismiss="modal">Delete</button>
        <button type="button" class="btn btn-primary save_change_detailfeature">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<!-- Modal add feature -->
<div class="modal fade" id="modal-add-feature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-controller="MyController">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add feature</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="form-group">
             <label for="addfeature">Feature name</label>
             <div class="areaselectfeature">

             </div>
           </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save_change_add_feature">Save changes</button>
      </div>
    </div>
  </div>
</div>