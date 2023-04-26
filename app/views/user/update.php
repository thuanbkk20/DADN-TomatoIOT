<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <h1 class="app-page-title mb-0">Chỉnh sửa tài khoản</h1>
            </div>
        </div>
        <div class="container-xl">
            <div class="app-card app-card-form shadow-sm mb-5">
                <div class="app-card-body">
                    <form class="row g-3 m-2" method="post" action=<?php echo _WEB_ROOT.'/admin/UserModify/update';?>>
                        <div>
                            <input type="hidden" name="id" value="<?php echo $userToUpdate['id'];?>"/>
                        </div>
                        <span class="text-danger">
                                <?php echo (empty($msg)?false:$msg); ?>
                            </span>
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="name" name="first_name"
                                   value="<?php echo (empty($old['first_name'])?$userToUpdate['first_name']:$old['first_name']);?>" required />
                            <span class="text-danger">
                                <?php echo (empty($errors['first_name'])?false:$errors['first_name']); ?>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Họ và tên đệm</label>
                            <input type="text" class="form-control" id="name" name="last_name"
                                   value="<?php echo (empty($old['last_name'])?$userToUpdate['last_name']:$old['last_name']);?>" required />
                            <span class="text-danger">
                                <?php echo (empty($errors['last_name'])?false:$errors['last_name']); ?>
                            </span>
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo (empty($old['email'])?$userToUpdate['username']:$old['email']);?>" required />
                            <span class="text-danger">
                                <?php echo (empty($errors['email'])?false:$errors['email']); ?>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <label for="phone_number" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                   value="<?php echo (empty($old['phone_number'])?$userToUpdate['phone_number']:$old['phone_number']);?>" required/>
                            <span class="text-danger">
                                <?php echo (empty($errors['phone_number'])?false:$errors['phone_number']); ?>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <label for="role" class="form-label">Vai trò</label>
                            <select id="cars" name="role" class="form-select">
                                <option value="Quản lý" <?php if(isset($old['role'])&&$old['role']=='Quản lý') echo 'selected="selected"'; ?>>Quản lý</option>
                                <option value="Giám sát" <?php if(isset($old['role'])&&$old['role']=='Giám sát') echo 'selected="selected"'; ?>>Giám sát</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" id="password" name="password"
                                   value="<?php echo (empty($old['password'])?false:$old['password']);?>" required/>
                            <span class="text-danger">
                                <?php echo (empty($errors['password'])?false:$errors['password']); ?>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password" class="form-label">Nhập lại mật khẩu</label>
                            <input type="text" class="form-control" id="confirm_password" name="confirm_password"
                                   value="<?php echo (empty($old['confirm_password'])?false:$old['confirm_password']);?>" required/>
                            <span class="text-danger">
                                <?php echo (empty($errors['confirm_password'])?false:$errors['confirm_password']); ?>
                            </span>
                        </div>
                        <div class="col-md-12 justify-content-end my-2">
                            <button type="submit"
                                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                    data-bs-toggle="modal" data-bs-target="#confirm_modal">Cập nhật
                            </button>
                        </div>
                        <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body text-center align-text-bottom" style="min-height: 150px;">
                                        Cập nhật tài khoản?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

