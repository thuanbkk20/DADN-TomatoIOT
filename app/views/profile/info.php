<h1>Hồ Sơ Của Tôi</h1>
<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
<form method="post" action="<?php echo _WEB_ROOT; ?>/profile">
    <div>
        Tên đăng nhập: <?php echo $user['username'];?>
    </div>
    <div>
        <label for="first_name">Tên</label>
        <input type="text" name="first_name" placeholder="Tên" 
        value="<?php echo empty($old['first_name'])?$user['first_name']:$old['first_name'];?>"></br>
        <span style="color: red">
        <?php echo empty($errors['first_name'])?false:$errors['first_name']; ?>
        </span>
    </div>
    <div>
        <label for="last_name">Họ và tên đệm</label>
        <input type="text" name="last_name" placeholder="Ho ten..." 
        value="<?php echo empty($old['last_name'])?$user['last_name']:$old['last_name'];?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['last_name'])?false:$errors['last_name']); ?>
        </span>
    </div>
    <div>
        <label for="phone_number">Số điện thoại</label>
        <input type="text" name="phone_number" placeholder="So dien thoai" 
        value="<?php echo empty($old['phone_number'])?$user['phone_number']:$old['phone_number'];?>"></br>
        <span style="color: red">
        <?php echo (empty($errors['phone_number'])?false:$errors['phone_number']); ?>
        </span>
    </div>
    <button type="submit">Lưu</button>
</form>