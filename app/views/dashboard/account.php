<!-- Set title -->
<title><?=
    !empty($page_title)?$page_title:"No name"
?></title>

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
                                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn bg-primary text-light mx-1">Search</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-bs-toggle="modal" data-bs-target="#addModal">
                                            Thêm tài khoản
                                        </button>
                                    </div>
                                </form>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->


            
            <nav id="accounts-table-tab" class="accounts-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="accounts-all-tab" data-bs-toggle="tab" href="#accounts-all" role="tab" aria-controls="orders-all" aria-selected="true">Tất cả</a>
                <a class="flex-sm-fill text-sm-center nav-link"  id="accounts-admin-tab" data-bs-toggle="tab" href="#accounts-admin" role="tab" aria-controls="orders-paid" aria-selected="false">Quản lí</a>
                <a class="flex-sm-fill text-sm-center nav-link" id="accounts-censor-tab" data-bs-toggle="tab" href="#accounts-censor" role="tab" aria-controls="orders-pending" aria-selected="false">Giám sát</a>
            </nav>
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell col-3">Tên</th>
                                            <th class="cell col-2">Tên tài khoản</th>
                                            <th class="cell col-2">Mật khẩu</th>
                                            <th class="cell col-2">Số điện thoại</th>
                                            <th class="cell col-1">Vai trò</th>
                                            <th class="cell"></th>
                                            <th class="cell"></th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell">Nguyễn Văn A</td>
                                            <td class="cell"><span class="truncate">abc123</span></td>
                                            <td class="cell fw-bold">
                                                ********
                                            </td>
                                            <td class="cell"><span class="truncate">0123456789</span></td>
                                            <td class="cell">Quản lí</td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <svg class="fa-solid fa-eye"></svg>
                                            </td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                <svg class="fa-solid fa-edit"></svg>
                                            </td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <svg class="fa-solid fa-trash-can"></svg>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cell">Trần Thị B</td>
                                            <td class="cell"><span class="truncate">ttb123</span></td>
                                            <td class="cell fw-bold">
                                                ********
                                            </td>
                                            <td class="cell"><span class="truncate">0987654321</span></td>
                                            <td class="cell">Giám sát</td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <svg class="fa-solid fa-eye"></svg>
                                            </td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                <svg class="fa-solid fa-edit"></svg>
                                            </td>
                                            <td class="cell" role="button"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <svg class="fa-solid fa-trash-can"></svg>
                                            </td>
                                        </tr>
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

                    <!--                                viewModal-->
                    <div class="modal fade" id="viewModal" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <a class="text-center row">
                                        <span class="note text-dark">Tài khoản: <b class="note">abc123</b></span>
                                    </a>
                                    <a class="text-center row">
                                        <span class="note text-dark">Mật khẩu: <b class="note">abc12345</b></span>
                                    </a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                                editModal-->
                    <div class="modal fade" id="editModal" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Edit
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    Xoá-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body text-center">
                                    Xoá tài khoản này?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ bỏ</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmPopup">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                          ConfirmModal-->
                    <div class="modal fade" id="confirmPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <svg height="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
                                    <div class="text-center">
                                        Thay đổi đã được lưu!
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content app-card app-card-settings shadow-sm p-4">
                                <div class="app-card-header">
                                    <h3 class="section-title">Xác nhận người dùng</h3>
                                </div>
                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <div class="mb-3">
                                            <label for="setting-input-1" class="form-label">Mật khẩu</label>
                                            <input type="text" class="form-control" id="setting-input-1">
                                        </div>
                                        <button type="submit" class="btn app-btn-primary">Xác nhận</button>
                                    </form>
                                </div><!--//app-card-body-->
                            </div><!--//app-card-->
                        </div>
                    </div>
                </div><!--//tab-pane-->
            </div><!--//tab-content--> 
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>