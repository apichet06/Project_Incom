<div class="modal fade bd-example-modal-lg" id="add_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                        <div class="form-group col-md-6">
                            <label>Part NO.</label>
                            <input type="text" class="form-control" name="pa_no" id="pa_no" placeholder="Part NO." required>
                            <input type="hidden" class="form-control" name="pa_id" id="pa_id" placeholder="pa_id" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Part Name.</label>
                            <input type="text" class="form-control" name="pa_name" id="pa_name" placeholder="Part Name." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Line ผลิต(Runcard)</label>
                            <select class="custom-select" name="production_line_id" id="production_line_id" required>
                                <option value="">Line ผลิต(Runcard)</option> 
                                <?php $sql = mysqli_query($conn, "SELECT * FROM production_line");
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['production_line_id']?>"><?=$rs['production_line_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group  col-md-6">
                            <label>Spec ชุบ</label>
                            <input type="text" class="form-control" name="pa_spec" id="pa_spec" placeholder="spec ชุบ" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>สีชุบ</label>
                            <select class="custom-select" name="color_id" id="color_id" required>
                                <option value="">สีชุบ</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM color");
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['color_id']?>"><?=$rs['color_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ความหนา</label>
                            <select class="custom-select" name="thickness_id" id="thickness_id" required>
                                <option value="">ความหนา</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM thickness");
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['thickness_id']?>"><?=$rs['thickness_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>จุดควบคุมพิเศษ</label>
                            <select class="custom-select" name="special_control_id" id="special_control_id" required>
                                <option value="">จุดควบคุมพิเศษ</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM special_control");
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['special_control_id']?>"><?=$rs['special_control_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ชนิด</label>
                            <select class="custom-select" name="type_id" id="type_id" required>
                                <option value="">ชนิด</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM var_type");
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['type_id']?>"><?=$rs['type_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Baking</label>
                            <select class="custom-select" name="baking_id" id="baking_id" required>
                                <option value="">Baking</option>
                                <?php $sql = mysqli_query($conn, "SELECT * FROM baking")or die(mysqli_error($conn));
                                while ($rs = mysqli_fetch_array($sql)) { ?> 
                                <option value="<?=$rs['baking_id']?>"><?=$rs['baking_name']?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>รูป Part</label>
                            <div class="custom-file">
                                <input type="file" name="pa_img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">เลือกรูป</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?= $save ?></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $close ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>





<!-- images -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $close ?></button>
            </div>
        </div>
    </div>
</div>