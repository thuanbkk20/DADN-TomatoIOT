<!--<div style="width:70%;float:right;">-->
<!--    --><?php //
//        echo 'Tất cả sensor đều thuộc khu vực 1, tình trạng kết nối đã có, mn tự thêm mô tả nếu muốn';
//        echo '<pre>'; print_r($sensor); echo '</pre>';
//    ?>
<!--</div>-->

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Thiết bị</h1>
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
                                <th class="cell col col-3">Khu vực</th>
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
                                <?php
                                if($each['connect'] == 'Lỗi') echo "style='background-color:#EEBF41; font-weight:bold'";
                                ?>
                            >
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src=<?php echo _WEB_ROOT."/public/assets/js/equipment.js";?>></script>