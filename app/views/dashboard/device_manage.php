<!-- Set title -->
<title><?=
	!empty($page_title)?$page_title:"No name"
	?></title>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Nhiệt độ</h1>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-start">
                            <thead>
                            <tr>
                                <th class="cell col col-1"></th>
                                <th class="cell col col-6">Khu vực</th>
                                <th class="cell col col-2">Tình trạng chung</th>
                                <th class="cell col col-3">Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cell"><a role="button" class="btn-sm app-btn-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#viewModal">Xem</a></td>
                                <td class="cell">Khu vực 1</td>
                                <td class="cell">Ổn định</td>
                                <td class="cell">Kết nối tốt</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
<!--                    view-->
                    <div class="modal fade" id="viewModal" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="fw-bold">Ổn định</h5>
                                </div>
                                <div class="modal-body">
                                    Kết nối của thiết bị ổn định
                                    Lần cuối kết nối <a class="note">14 Oct</a> <a class="note">08:12 AM</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>