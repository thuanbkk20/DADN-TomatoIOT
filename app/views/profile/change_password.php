<form method="post" action="<?php echo _WEB_ROOT; ?>/profile/change_password">
    <div>
        <h1>Đổi Mật Khẩu</h1>
        <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
    </div>
    <div>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="Password"
        value="<?php echo empty($old['password'])?false:$old['password'];?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['password'])?false:$errors['password']); ?>
        </span>
    </div>
    <div>
        <label for="password">Xác nhận mật khẩu</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password"
        value="<?php echo (empty($old['confirm_password'])?false:$old['confirm_password']);?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['confirm_password'])?false:$errors['confirm_password']); ?>
        </span>
    </div> 
    <button type="submit">Lưu</button>
</form>