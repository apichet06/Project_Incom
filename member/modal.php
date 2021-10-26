<div class="modal fade " id="add_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="show_txt"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="insert_update">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">รหัสพนักงาน</label>
                            <div class="col-sm-9">
                            <div id="alert" ></div>
                                <input type="text" class="form-control text-center" name="u_username" id="u_username"
                                    placeholder="ID พนักงาน" autocomplete="off"   required>
                                <span class="text-sm" id="msg1"></span>
                                <input type="hidden" class="form-control text-center" name="u_id" id="u_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">รหัสผ่าน</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control text-center" name="u_password" id="u_password"
                                    autocomplete="off" placeholder="รหัสผ่าน" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <legend class="col-form-label col-sm-3">ชื่อ</legend>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-center" name="u_name" id="u_name" autocomplete="off"
                                    placeholder="กรอกชื่อพนักงาน" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <legend class="col-form-label col-sm-3">นามสกุล</legend>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-center" name="u_sur" id="u_sur" autocomplete="off"
                                    placeholder="กรอกนามสกุลพนักงาน" required>
                            </div>
                        </div>
                        <div class="form-group row">

                            <legend class="col-form-label col-sm-3">แผนก/ฝ่าย</legend>
                            <div class="col-sm-9">

                                <select class="form-control text-center" id="d_id" name="d_id"  required>
                                    <option value="">แผนก/ฝ่าย</option>
                                    <?php $sql = mysqli_query($conn,"SELECT * from division"); 
                                    while($rs = mysqli_fetch_array($sql)){ ?>
                                    <option value="<?=$rs['d_id']?>"><?=$rs['d_name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <legend class="col-form-label col-sm-3 ">ตำแหน่ง</legend>
                            <div class="col-sm-9">
                                <select class="form-control text-center" id="p_id" name="p_id" require>
                                    <option value="">เลือกตำแหน่ง</option>
                                    <?php $sql = mysqli_query($conn,"SELECT * from position"); 
                                    while($rs = mysqli_fetch_array($sql)){ ?>
                                    <option value="<?=$rs['p_id']?>"><?=$rs['p_name']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?=$save?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?=$close?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>