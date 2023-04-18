<!-- Set title -->
<title><?=
	!empty($page_title)?$page_title:"No name"
	?></title>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Thông báo thiết bị</h1>
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
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            <div class="col-auto">
                                <select class="form-select w-auto" >
                                    <option selected value="option-1">Tất cả</option>
                                    <option value="option-2">Hôm nay</option>
                                    <option value="option-3">7 ngày</option>
                                    <option value="option-4">30 ngày</option>
                                </select>
                            </div>
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
                                        <th class="cell">Thời gian</th>
                                        <th class="cell">Nội dung</th>
                                        <th class="cell"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span></td>
                                        <td class="cell"><span class="truncate">Cảm biến độ ẩm đất không hoạt động</span></td>
                                        <td class="cell"><a role="button" class="btn-sm app-btn-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#viewNotifyModal">Xem</a></td>
                                    </tr>
                                    <tr>
                                        <td class="cell"><span class="cell-data">14 Oct</span><span class="note">08:01 AM</span></td>
                                        <td class="cell"><span class="truncate">Báo cáo tuần: không có vấn đề</span></td>
                                        <td class="cell"><a role="button" class="btn-sm app-btn-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#viewNotifyModal">Xem</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <!--                                viewNotifyModal-->
                                <div class="modal fade" id="viewNotifyModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="fw-bold">Báo cáo tuần: không có vấn đề</h5>
                                            </div>
                                            <div class="modal-body">
                                                Các cảm biến đều hoạt động bình thường
                                                <a href=<?php echo _WEB_ROOT."/home/device_manage";?>>Thông tin chi tiết</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>