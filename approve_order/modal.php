<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เหตุผลที่ไม่อนุมัติ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="form_reject" > 
            <textarea rows="5" class="form-control" name="n_reject" required></textarea> 
            <input type="hidden" name="n_id" class="form-control" id="n_id">
            <div class="modal-footer">
                 <button type="submit" class="btn btn-info"><?=$save?></button>         
                 <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$close?></button>     
            </div>
            </form>
      </div> 
    </div>
  </div>
</div>
 