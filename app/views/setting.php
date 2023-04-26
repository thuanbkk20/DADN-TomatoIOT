<?php 
    echo (empty($msg)?false:$msg);
?>

<div class="app-wrapper">    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl row">
            <h1 class="app-page-title">Cài đặt sensor</h1>
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến độ ẩm đất</h3>
                        <h4 class="section-title">Chế độ cây còn xanh</h4>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/soil_humid1">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value1" 
                                value="<?php echo (isset($old['min_value1'])?$old['min_value1']:$min_value1);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value1'])?$errors['min_value1']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value1"
                                value="<?php echo (isset($old['max_value1'])?$old['max_value1']:$max_value1);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value1'])?$errors['max_value1']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến độ ẩm đất</h3>
                        <h4 class="section-title">Chế độ ra hoa kết quả</h4>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/soil_humid2">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value2" 
                                value="<?php echo (isset($old['min_value2'])?$old['min_value2']:$min_value2);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value2'])?$errors['min_value2']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value2" 
                                value="<?php echo (isset($old['max_value2'])?$old['max_value2']:$max_value2);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value2'])?$errors['max_value2']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến nhiệt độ</h3>
                        <h4 class="section-title">Chế độ ban ngày</h4>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/temperature1">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value3" 
                                value="<?php echo (isset($old['min_value3'])?$old['min_value3']:$min_value3);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value3'])?$errors['min_value3']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value3" 
                                value="<?php echo (isset($old['max_value3'])?$old['max_value3']:$max_value3);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value3'])?$errors['max_value3']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến nhiệt độ</h3>
                        <h4 class="section-title">Chế độ ban đêm</h4>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/temperature2">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value4" 
                                value="<?php echo (isset($old['min_value4'])?$old['min_value4']:$min_value4);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value4'])?$errors['min_value4']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value4" 
                                value="<?php echo (isset($old['max_value4'])?$old['max_value4']:$max_value4);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value4'])?$errors['max_value4']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến độ ẩm không khí</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post" action="<?php echo _WEB_ROOT; ?>/admin/setting/air_humid">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value5" 
                                value="<?php echo (isset($old['min_value5'])?$old['min_value5']:$min_value5);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value5'])?$errors['min_value5']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value5" 
                                value="<?php echo (isset($old['max_value5'])?$old['max_value5']:$max_value5);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value5'])?$errors['max_value5']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến ánh sáng</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/light">
                            <div class="mb-3">
                                <label for="setting-input-1" name="min_value1"class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-1" name="min_value6" 
                                value="<?php echo (isset($old['min_value6'])?$old['min_value6']:$min_value6);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['min_value6'])?$errors['min_value6']:false); ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-2" name="max_value6" 
                                value="<?php echo (isset($old['max_value6'])?$old['max_value6']:$max_value6);?>">
                                <span style="color: red">
                                    <?php echo (isset($errors['max_value6'])?$errors['max_value6']:false); ?>
                                </span>
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>