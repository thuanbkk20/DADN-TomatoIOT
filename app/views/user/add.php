<h1>Thêm tài khoản</h1>
<form style="width:70%;float:right;" method="post" action=<?php echo _WEB_ROOT.'/admin/UserModify/create';?>>
    <div>
        <span >
            <?php echo (empty($msg)?false:$msg); ?>
        </span>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="name" name="first_name"  placeholder="Tên" class="form-control form-control-lg" 
        value="<?php echo (empty($old['first_name'])?false:$old['first_name']);?>"/>
    <span >
        <?php echo (empty($errors['first_name'])?false:$errors['first_name']); ?>
    </span>
    </div>

    <div class="form-outline mb-4">
        <input type="text" id="name" name="last_name"  placeholder="Họ và tên đệm" class="form-control form-control-lg" 
        value="<?php echo (empty($old['last_name'])?false:$old['last_name']);?>"/>
    <span >
        <?php echo (empty($errors['last_name'])?false:$errors['last_name']); ?>
    </span>
    </div>

    <div class="form-outline mb-4">
        <input type="text" id="phonenumber" name="phone_number" placeholder="Số điện thoại" class="form-control form-control-lg" 
        value="<?php echo (empty($old['phone_number'])?false:$old['phone_number']);?>"/>
        <span >
        <?php echo (empty($errors['phone_number'])?false:$errors['phone_number']); ?>
    </span>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="email" name="email" placeholder="Email" class="form-control form-control-lg" 
        value="<?php echo (empty($old['email'])?false:$old['email']);?>"/>
        <span >
        <?php echo (empty($errors['email'])?false:$errors['email']); ?>
        </span>
    </div>

    <div class="form-outline mb-4">
        <select id="cars" name="role">
            <option value="Quản lí" <?php if(isset($old['role'])&&$old['role']=='Quản lí') echo 'selected="selected"'; ?>>Quản lý</option>
            <option value="Giám sát" <?php if(isset($old['role'])&&$old['role']=='Giám sát') echo 'selected="selected"'; ?>>Giám sát</option>
        </select>
    </div>

    <div class="form-outline mb-4">
        <input type="password" id="password" name="password" placeholder="Mật khẩu" class="form-control form-control-lg" 
        value="<?php echo (empty($old['password'])?false:$old['password']);?>"/>
        <span >
        <?php echo (empty($errors['password'])?false:$errors['password']); ?>
        </span>
    </div>

    <div class="form-outline mb-4">
        <input type="password" id="repeatpassword" name="confirm_password" placeholder="Nhập lại mật khẩu" class="form-control form-control-lg" 
        value="<?php echo (empty($old['confirm_password'])?false:$old['confirm_password']);?>"/>
        <span >
    <?php echo (empty($errors['confirm_password'])?false:$errors['confirm_password']); ?>
    </span>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit"
        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Thêm tài khoản</button>
    </div>
</form>