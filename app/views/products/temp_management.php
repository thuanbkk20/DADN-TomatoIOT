<?php
	echo 'Đây là danh sách quản lí nhiệt độ';
	$title = 'Quan li nhiet do';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="header">
        <div class="text-success fw-bold">
            <h1>Quản lí nhiệt độ</h1>
        </div>
    </div>
    <div class="body row">
        <div class="col col-8">
            <table class="table table-bordered text-left">
                <thead>
                <tr class="text-center fw-bold text-success text-left">
                    <th scope="col" class="col col-7">Khu vực</th>
                    <th scope="col" class="col col-2">Nhiệt độ</th>
                    <th scope="col" class="col col-3">Trạng thái quạt</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="fw-normal text-danger">Khu vực 1</th>
                    <td>27</td>
                    <td class="d-grid gap-2">
                        <button class="btn btn-outline-light text-dark text-left" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tắt
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tắt</a></li>
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <!--        card lựa chọn-->
        <div class="card col col-4" style="width: ">
            <div class="card-body">
                <h5 class="card-title">Bật hệ thống quạt</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="all" id="applyForAll">
                    <label class="form-check-label" for="applyForAll">
                        Bật toàn bộ
                    </label>
                </div>
                <div class="grid-col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="FanLevel" id="level0" value="0" checked>
                        <label class="form-check-label" for="level0">
                            Tắt
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="FanLevel" id="level1" value="1">
                        <label class="form-check-label" for="level1">
                            1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="FanLevel" id="level2" value="2">
                        <label class="form-check-label" for="level2">
                            2
                        </label>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Xác nhận
                    </button>
                </div>
<!--                                 Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    Xác nhận thay đổi?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ bỏ</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmPopup">Đồng ý</button>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


