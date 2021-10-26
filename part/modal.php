<div class="modal fade bd-example-modal-lg" id="add_edit" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="show_txt"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insert_update" enctype="multipart/form-data">
                    <div class="form-row">
                        <span id="alert" class="form-group  col-md-12"></span>
                        <div class="form-group  col-md-6">
                            <label>Part NO.</label>
                            <input type="text" class="form-control" name="pa_no" id="pa_no" placeholder="Part NO.">
                            <input type="hidden" class="form-control" name="pa_id" id="pa_id" placeholder="pa_id">
                        </div>
                        <div class="form-group  col-md-6">
                            <label>Part Name.</label>
                            <input type="text" class="form-control" name="pa_name" id="pa_name"
                                placeholder="Part Name.">
                        </div>
                        <div class="form-group  col-md-6">
                            <label>spec ชุบ</label>
                            <input type="text" class="form-control" name="pa_spec" id="pa_spec" placeholder="spec ชุบ">
                        </div>
                        <div class="form-group  col-md-6">
                            <label>สีชุบ</label>
                            <input type="text" class="form-control" name="pa_color" id="pa_color" placeholder="สีชุบ">
                        </div>

                        <div class="form-group  col-md-6">
                            <label>ความหนา</label>
                            <input type="text" class="form-control" name="pa_thickness" id="pa_thickness"
                                placeholder="ความหนา">
                        </div>
                        <div class="form-group  col-md-6">
                            <label>รูป Part</label>
                            <div class="custom-file">
                                <input type="file" name="pa_img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">เลือกรูป</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?=$save?></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$close?></button>
                    </div>
                </form>
            </div>
        </div>
  
    </div>
</div>
 


 

<!-- images -->
<div class="modal fade"  id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รูป Part</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="" class="imagepreview" style="width: 100%">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$close?></button> 
      </div>
    </div>
  </div>
</div>