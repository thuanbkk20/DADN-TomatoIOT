<?php 
    //Thêm html của dashboard tại file này
?>
<!-- Set title -->
<title><?=
    !empty($page_title)?$page_title:"No name"
?></title>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <h1 class="app-page-title">Tổng quan</h1>		
            
            <!-- <h1 style="text-align: center">Dashboard</h1>
            <h1 style="text-align: center">Temp data:<?php echo $tempLastData; ?></h1>
            <h1 style="text-align: center">Temp Last update:<?php echo $tempLastUpdate; ?></h1>
            <h1 style="text-align: center">Air humid data:<?php echo $air_humidLastData; ?></h1>
            <h1 style="text-align: center">Air humid Last update:<?php echo $air_humidLastUpdate; ?></h1>
            <h1 style="text-align: center">Soil humid data:<?php echo $soil_humidLastData; ?></h1>
            <h1 style="text-align: center">Soil humid Last update:<?php echo $soil_humidLastUpdate; ?></h1>
            <h1 style="text-align: center">Light data:<?php echo $lightLastData; ?></h1>
            <h1 style="text-align: center">Light Last update:<?php echo $lightLastUpdate; ?></h1> -->

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Độ ẩm đất</h4>
                            <div class="stats-figure">
                                <!-- CHƯA CHỈNH SỬA THEO CHẾ ĐỘ RA HOA KẾT QUẢ HAY CÒN XANH - BẢN DEMO TẠM THEO NGÀY ĐÊM -->
                                <?php if($soil_humidLastData > $soil_humid["max_value"]) { ?>
                                    <span style="font-weight:bold;color:red"><?php echo $soil_humidLastData; ?>%</span>
                                <?php } else if($soil_humidLastData < $soil_humid["min_value"]) { ?>
                                    <span style="font-weight:bold;color:blue"><?php echo $soil_humidLastData; ?>%</span>
                                <?php } else { ?>
                                    <span><?php echo $soil_humidLastData; ?>%</span>
                                <?php } ?>
                            </div>
                            <div class="stats-meta text-success">
                                <?php echo $soil_humidLastUpdate; ?>
                            </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Nhiệt độ</h4>
                            <div class="stats-figure">
                                <?php if($tempLastData > $temperature["max_value"]) { ?>
                                    <span style="font-weight:bold;color:red"><?php echo $tempLastData; ?>&deg;C</span>
                                <?php } else if($tempLastData < $temperature["min_value"]) { ?>
                                    <span style="font-weight:bold;color:blue"><?php echo $tempLastData; ?>&deg;C</span>
                                <?php } else { ?>
                                    <span style="font-weight:bold"><?php echo $tempLastData; ?>&deg;C</span>
                                <?php } ?>
                            </div>

                            <div class="stats-meta text-success">
                                <?php echo $tempLastUpdate; ?>
                            </div>
                            </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Độ sáng</h4>
                            <div class="stats-figure">
                                <?php if($lightLastData > $light["max_value"]) { ?>
                                    <span style="font-weight:bold;color:red"><?php echo $lightLastData; ?> Lux</span>
                                <?php } else if($lightLastData < $light["min_value"]) { ?>
                                    <span style="font-weight:bold;color:blue"><?php echo $lightLastData; ?> Lux</span>
                                <?php } else { ?>
                                    <span style="font-weight:bold"><?php echo $lightLastData; ?> Lux</span>
                                <?php } ?>
                            </div>
                            <div class="stats-meta text-success">
                                <?php echo $lightLastUpdate; ?>
                            </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Độ ẩm không khí</h4>
                            <div class="stats-figure">
                                <?php if($air_humidLastData > $air_humid["max_value"]) { ?>
                                    <span style="font-weight:bold;color:red"><?php echo $air_humidLastData; ?>%</span>
                                <?php } else if($air_humidLastData < $air_humid["min_value"]) { ?>
                                    <span style="font-weight:bold;color:blue"><?php echo $air_humidLastData; ?>%</span>
                                <?php } else { ?>
                                    <span><?php echo $air_humidLastData; ?>%</span>
                                <?php } ?>
                            </div>
                            <div class="stats-meta text-success">
                                <?php echo $air_humidLastUpdate; ?>
                            </div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
            <!-- CHART 1,2 -->
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Nhiệt độ</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="mb-3 d-flex">   
                                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                            <option value="1" selected>Khu vực 1</option>
                                            <option value="2">Khu vực 2</option>
                                            <option value="3">Khu vực 3</option>
                                            <option value="4">Khu vực 4</option>
                                            <option value="5">Khu vực 5</option>
                                            <option value="6">Khu vực 6</option>
                                            <option value="7">Khu vực 7</option>
                                        </select>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-linechart"></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Độ ẩm đất</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="mb-3 d-flex">   
                                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                            <option value="1" selected>Khu vực 1</option>
                                            <option value="2">Khu vực 2</option>
                                            <option value="3">Khu vực 3</option>
                                            <option value="4">Khu vực 4</option>
                                            <option value="5">Khu vực 5</option>
                                            <option value="6">Khu vực 6</option>
                                            <option value="7">Khu vực 7</option>
                                        </select>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-barchart"></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->  
            </div><!--//row-->

            <!-- CHART 3,4 -->
            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Độ sáng</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="mb-3 d-flex">   
                                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                            <option value="1" selected>Khu vực 1</option>
                                            <option value="2">Khu vực 2</option>
                                            <option value="3">Khu vực 3</option>
                                            <option value="4">Khu vực 4</option>
                                            <option value="5">Khu vực 5</option>
                                            <option value="6">Khu vực 6</option>
                                            <option value="7">Khu vực 7</option>
                                        </select>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-linechart-2"></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Độ ẩm không khí</h4>
                                </div><!--//col-->
                                <div class="col-auto">
                                    <div class="mb-3 d-flex">   
                                        <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                            <option value="1" selected>Khu vực 1</option>
                                            <option value="2">Khu vực 2</option>
                                            <option value="3">Khu vực 3</option>
                                            <option value="4">Khu vực 4</option>
                                            <option value="5">Khu vực 5</option>
                                            <option value="6">Khu vực 6</option>
                                            <option value="7">Khu vực 7</option>
                                        </select>
                                    </div>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="chart-container">
                                <canvas id="canvas-barchart-2"></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->  
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->

<!-- Charts JS -->
<script src="public/assets/plugins/chart.js/chart.min.js"></script> 
<script src="public/assets/js/index-charts.js"></script> 

<script type="text/javascript"  src="public/assets/js/script.js"></script>

</div>