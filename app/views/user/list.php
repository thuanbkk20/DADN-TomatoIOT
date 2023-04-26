<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tài khoản</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <a role="button" class="btn btn-outline-danger"
                                            href=<?php echo _WEB_ROOT."/admin/UserModify/create"; ?>>
                                            Thêm tài khoản
                                        </a>
                                    </div>
                                </form>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                    <tr>
                                        <th class="cell col col-1">Tên</th>
                                        <th class="cell col col-3">Họ và tên lót</th>
                                        <th class="cell col col-2">Tên tài khoản</th>
                                        <th class="cell col col-2">Số điện thoại</th>
                                        <th class="cell col col-2">Vai trò</th>
<!--                                        <th class="cell col col-2">Chức năng</th>-->
                                        <th class="cell col col-2">Chức năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
    foreach($userArr as $user):
        ?>
                                    <tr>
                                        <td class="cell"><?php echo $user['first_name']; ?></td>
                                        <td class="cell"><?php echo $user['last_name']; ?></td>
                                        <td class="cell fw-bold"><?php echo $user['username']; ?></td>
                                        <td class="cell"><?php echo $user['phone_number']; ?></td>
                                        <td class="cell"><?php echo $user['role']; ?></td>
                                        <td class="cell row justify-content-start">
                                            <a class="col-3" role="button" href=<?php echo _WEB_ROOT."/admin/UserModify/update?id=".$user['id']; ?>><svg class="fa-solid fa-edit"></svg></a>
                                            <a class="col-3" role="button"
                                               data-bs-toggle="modal" data-bs-target="#confirm_modal"><svg class="fa-solid fa-trash-can"></svg></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                        <div class="modal fade" id="confirm_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center align-text-bottom" style="min-height: 150px;">
                                                        Xoá tài khoản này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-success" href=<?php echo _WEB_ROOT."/admin/UserModify/delete?id=".$user['id']; ?>>Xác nhận</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->
                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>