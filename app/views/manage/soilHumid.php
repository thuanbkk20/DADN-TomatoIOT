<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between align-items-center">
                <div class="col-8">
                    <h1 class="app-page-title">Quản Lý Độ Ẩm Đất</h1>
                </div>
                <div class="col-4">
                    <form method="post" action="<?php echo _WEB_ROOT.'/soilHumid';?>">
                        <label for="mode">
                            Chọn chế độ
                        </label>
                        <select class="form-select mt-2 mb-3" name="valueMode">
                            <option value='1' <?php if($greenMode==1) echo "selected"; ?>>Thường xanh</option>
                            <option value='0' <?php if($greenMode==0) echo "selected"; ?>>Ra hoa kết quả</option>
                        </select>

                        <label for="mode">
                            Chọn chế độ bơm
                        </label>
                        <select class="form-select mt-2 mb-3" id="pumpMode" name="pumpMode">
                            <option value='1' <?php if($pumpAutoMode==1) echo "selected"; ?> >Tự động</option>
                            <option value='0' <?php if($pumpAutoMode==0) echo "selected"; ?>>Bằng tay</option>
                        </select>
                        <input type="hidden" id="webRoot" value=<?php echo _WEB_ROOT; ?>>
                        <button class="btn btn-success" name="updateMode" type="submit">Xác nhận</button>
                    </form>
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
                                    <th class="cell col col-2">Khu vực</th>
                                    <th class="cell col col-2">Độ ẩm</th>
                                    <th class="cell col col-3">Máy bơm</th>
                                    <th class="cell col col-3">Mức</th>
                                    <th class="cell col col-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($areaArr as $key => $value){
                                        foreach($value['pump'] as $pump){
                                            echo '<tr>';
                                            echo '<td>Khu vực '.$key.'</td>';
                                            echo '<td id="soilHumid">'.$value['envIndex']['value'].'</td>';
                                            echo '<td>'.$pump['name'].'</td>';
                                            if($pumpAutoMode == 0){
                                                echo "<td><form method='post' action='"._WEB_ROOT."/soilHumid'>";
                                                echo "<select class='form-select' name='pumpLevel'>";
                                                if($pumpLevel==0) echo "<option selected='selected' value='0'>Tắt</option>"; 
                                                else echo "<option value='0'>Tắt</option>";  
                                                if($pumpLevel==1) echo "<option selected='selected' value='1'>Hoạt động 50%</option>";   
                                                else echo "<option value='1'>Hoạt động 50%</option>";           
                                                if($pumpLevel==2) echo "<option selected='selected' value='2'>Hoạt động 100%</option>";
                                                else echo "<option value='2'>Hoạt động 100%</option>";        
                                                echo "</select></td>";    
                                                echo "<td><button name='updatePump' type='submit' class='btn btn-success'>Xác nhận</button></form></td>";
                                            }else{
                                                echo '<td id="pumpLevel">'.$pump['level'].'</td>';
                                            }
                                            echo '<td>';
                                            echo '</td></tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src=<?php echo _WEB_ROOT."/public/assets/js/soilHumid.js";?>></script>