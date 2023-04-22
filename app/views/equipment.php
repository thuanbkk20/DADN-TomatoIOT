<div style="width:70%;float:right;">
    <?php 
        echo 'Tất cả sensor đều thuộc khu vực 1, tình trạng kết nối đã có, mn tự thêm mô tả nếu muốn';
//        echo '<pre>'; print_r($sensor); echo '</pre>';
    ?>
</div>

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
                                <th class="cell col col-2">Khu vực</th>
                                <th class="cell col col-4">Loại</th>
                                <th class="cell col col-2">Tình trạng</th>
                                <th class="cell col col-3">Mô tả</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($sensor as $each):
                            ?>
                            <tr
                                    style="<?php if ($each['type'] == 'Ánh sáng') {}
                                ?>"
                            >
                                <td class="cell"><a role="button" class="btn-sm app-btn-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#viewModal">Xem</a></td>
                                <td class="cell">Khu vực 1</td>
                                <td class="cell">
                                    <?php echo $each['type'] ?>
                                </td>
                                <td class="cell">
	                                <?php echo $each['connect'] ?>
                                </td>
                                <td class="cell">
                                    Thời gian gần nhất:
	                                <?php echo $each['time'] ?>
                                </td>
                            </tr>
                            <?php
                                endforeach
                            ?>
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

<script src=<?php echo _WEB_ROOT."/public/assets/js/equipment.js";?>></script>