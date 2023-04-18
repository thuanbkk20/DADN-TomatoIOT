<!-- Set title -->
<title><?=
	!empty($page_title)?$page_title:"No name"
	?></title>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between">
                <h1 class="app-page-title">Điều chỉnh đầu ra</h1>
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
                                <th class="cell col col-5">Khu vực</th>
                                <th class="cell col col-3">Quạt</th>
                                <th class="cell col col-3">Máy bơm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cell">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td class="cell">Chọn tất cả</td>
                                <td class="cell">
                                    <div class="row">
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                tắt
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                2
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="cell">
                                    <div class="row">
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio1">
                                            <label class="form-check-label" for="flexRadio1">
                                                tắt
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio2" checked>
                                            <label class="form-check-label" for="flexRadio2">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio3">
                                            <label class="form-check-label" for="flexRadio3">
                                                2
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cell">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </div>
                                </td>
                                <td class="cell">Khu vực 1</td>
                                <td class="cell">
                                    <div class="row">
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                tắt
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                2
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="cell">
                                    <div class="row">
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio1">
                                            <label class="form-check-label" for="flexRadio1">
                                                tắt
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio2" checked>
                                            <label class="form-check-label" for="flexRadio2">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check col col-3">
                                            <input class="form-check-input" type="radio" name="flexRadio" id="flexRadio3">
                                            <label class="form-check-label" for="flexRadio3">
                                                2
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn bg-success text-light float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Xác nhận
                        </button>
                    </div>
<!--                    Xác nhận-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body text-center">
                                    Xác nhận thay đổi?
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
                </div>
            </div>
        </div>
    </div>
</div>