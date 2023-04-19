<div class="app-wrapper">
    <form method="post" action="<?php echo _WEB_ROOT; ?>/profile">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl" action="<?php echo _WEB_ROOT; ?>/profile">
                <h1 class="app-page-title">Hồ sơ của tôi</h1>
                <div class="row gy-4">
                    <div class="col-12 col-lg-8">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                            </svg>
                                        </div><!--//icon-holder-->
                                        
                                    </div><!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title"><?php echo $user['last_name']." ".$user['first_name'];?></h4>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//app-card-header-->
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Họ</strong></div>
                                            <input type="text" name="last_name" placeholder="Ho ten..." 
                                            value="<?php echo empty($old['last_name'])?$user['last_name']:$old['last_name'];?>"></br>
                                            <span style="color: red">
                                            <?php echo (empty($errors['last_name'])?false:$errors['last_name']); ?>
                                            </span>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Tên</strong></div>
                                            <input type="text" name="first_name" placeholder="Tên" 
                                            value="<?php echo empty($old['first_name'])?$user['first_name']:$old['first_name'];?>"></br>
                                            <span style="color: red">
                                            <?php echo empty($errors['first_name'])?false:$errors['first_name']; ?>
                                            </span>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2"><strong>Tên đăng nhập</strong></div>
                                            <!-- THÊM TÊN ĐĂNG NHẬP DÔ ĐÂY -->
                                            <?php echo $user['username'];?>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Vai trò</strong></div>
                                            <?php echo $user['role'];?>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Số điện thoại</strong>
                                                <input type="number" name="phone_number" placeholder="So dien thoai" 
                                                value="<?php echo empty($old['phone_number'])?$user['phone_number']:$old['phone_number'];?>"></br>
                                                <span style="color: red">
                                                    <?php echo (empty($errors['phone_number'])?false:$errors['phone_number']); ?>
                                                </span>
                                            </div>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                            </div><!--//app-card-body-->
                            <div class="app-card-footer p-4 mt-auto">
                                <button type="submit" class="btn app-btn-secondary">Lưu</button>
                            </div><!--//app-card-footer-->  
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <?php echo "<img style='position:absolute;width:100%;height:100%;left:0;top:0;z-index:10;' src='"._ROOT."/public/assets/images/background/background-tomato-1.jpg'>";?>
                        </div><!--//app-card-->
                    </div>
                </div><!--//row-->       
            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </form>
</div>

<!-- <h1>Hồ Sơ Của Tôi</h1>
<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
<div style="width:70%; float:right;">
<form method="post" action="<?php echo _WEB_ROOT; ?>/profile">
    <div>
        <p>Tên đăng nhập: <?php echo $user['username'];?></p>
        <p>Vai trò: <?php echo $user['role'];?></p>
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
</div> -->