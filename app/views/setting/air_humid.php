<?php 
    echo (empty($msg)?false:$msg);
?>

<form style="float:right" method="post"  action="<?php echo _WEB_ROOT; ?>/admin/setting/air_humid">   
    <div>
        <label  for="">Ngưỡng dưới</label>                 
        <input id="min_value1" name="min_value1" type="number" value="<?php echo (isset($old['min_value1'])?$old['min_value1']:$min_value1);?>" required="required">
        <span style="color: red">
            <?php echo (isset($errors['min_value1'])?$errors['min_value1']:false); ?>
        </span>
    </div><!--//form-group-->
    <div>
        <label  for="max_value1">Ngưỡng trên</label>
        <input id="max_value1" name="max_value1" type="number" value="<?php echo (isset($old['max_value1'])?$old['max_value1']:$max_value1);?>" required="required" >
        <span style="color: red">
            <?php echo (isset($errors['max_value1'])?$errors['max_value1']:false); ?>
        </span>
    </div>

    <div class="text-center">
        <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Lưu</button>
    </div>

</form>