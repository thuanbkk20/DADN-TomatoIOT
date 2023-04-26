<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->
<style>
    .app-content {
        height: 83.5vh !important;
    }
</style>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between align-items-center">
                <div class="col-auto">
                    <h1 class="app-page-title">Quản Lý Nhiệt Độ</h1>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <form method="post" action="<?php echo _WEB_ROOT.'/temperature';?>" class="d-flex align-items-center">
                        <div class="mb-3 me-3">
                            <label for="fanMode" class="form-label">Chọn chế độ quạt</label>
                            <select class="form-select" id="fanMode" name="fanMode">
                                <option value="1" <?php if($fanAutoMode==1) echo "selected"?> >Tự động</option>
                                <option value="0" <?php if($fanAutoMode==0) echo "selected"?> >Bằng tay</option>
                            </select>
                        </div>
                        <input type="hidden" id="webRoot" value=<?php echo  _WEB_ROOT; ?>/>
                        <button name="updateMode" class="btn btn-success mt-3 text-light" type="submit">Xác nhận</button>
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
                                    <th class="cell col col-2">Nhiệt độ</th>
                                    <th class="cell col col-2">Trạng thái quạt</th>
                                    <th class="cell col col-3">Chế độ quạt</th>
                                    <th class="cell col col-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($areaArr as $key => $value){
                                        foreach($value['fan'] as $fan){
                                            echo '<tr>';
                                            echo '<td class="cell">Khu vực '.$key.'</td>';
                                            echo '<td id="temp" class="cell">'.$value['envIndex']['value'].'</td>';
                                            echo '<td class="cell">'.$fan['name'].'</td>';
                                            if($fanAutoMode == 0){
                                                echo "<td class='cell'><form method='post' action='"._WEB_ROOT."/temperature'>";
                                                echo "<select class='form-select' name='fanLevel'>";
                                                if($fanLevel == 0) echo "<option selected='selected' value='0'>Tắt</option>"; 
                                                else echo "<option value='0'>Tắt</option>";  
                                                if($fanLevel == 1) echo "<option selected='selected' value='1'>Hoạt động 50%</option>";   
                                                else echo "<option value='1'>Hoạt động 50%</option>";           
                                                if($fanLevel == 2) echo "<option selected='selected' value='2'>Hoạt động 100%</option>";
                                                else echo "<option value='2'>Hoạt động 100%</option>";        
                                                echo "</select></td>";    
                                                echo "<td><button name='updatefan' type='submit' class='btn btn-success mb-2 float-end'>Xác nhận</button></form></td>";
                                            }else{
                                                echo '<td id="fanLevel" class="cell">'.$fan['level'].'</td>';
                                            }
                                            echo '<td class="cell">';
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
<script src=<?php echo _WEB_ROOT."/public/assets/js/temperature.js";?>></script>