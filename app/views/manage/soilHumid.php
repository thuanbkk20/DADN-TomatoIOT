<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->
<div style="width:70%;float:right;">
<h2>Dữ liệu để mọi người dễ xem, chỉnh giao diện xong có thể xóa đoạn này</h2>
<?php
    echo '<pre>'; print_r($areaArr); echo '</pre>';
    echo '<pre>'; print_r($soilHumid); echo '</pre>';
?> 
</div>
<div style="width:70%;float:right;">
    <H1>Quản lý độ ẩm đất</H1>
</div>
<table style="width:70%;float:right;">
  <tr>
    <th>Khu vực</th>
    <th>Độ ẩm</th>
    <th>Máy bơm</th>
    <th>Mức</th>
  </tr>
  <?php
    foreach($areaArr as $key => $value){
        foreach($value['pump'] as $pump){
            echo '<tr>';
            echo '<td>Khu vực '.$key.'</td>';
            echo '<td id="soilHumid">'.$value['envIndex']['value'].'</td>';
            echo '<td>'.$pump['name'].'</td>';
            if($pumpAutoMode == 0){
                echo "<td><form method='post' action='"._WEB_ROOT."/soilHumid'>";
                echo "<select name='pumpLevel'>";
                if($pumpLevel==0) echo "<option selected='selected' value='0'>Tắt</option>"; 
                else echo "<option value='0'>Tắt</option>";  
                if($pumpLevel==1) echo "<option selected='selected' value='1'>Hoạt động 50%</option>";   
                else echo "<option value='1'>Hoạt động 50%</option>";           
                if($pumpLevel==2) echo "<option selected='selected' value='2'>Hoạt động 100%</option>";
                else echo "<option value='2'>Hoạt động 100%</option>";        
                echo "</select>";    
                echo "<button name='updatePump' type='submit'>Xác nhận</button></form></td>";
            }else{
                echo '<td id="pumpLevel">'.$pump['level'].'</td>';
            }
            echo '<td>';
            echo '</td></tr>';
        }
    }
  ?>
</table>
<div style="width:70%;float:right;">
    <form method="post" action="<?php echo _WEB_ROOT.'/soilHumid';?>">
        <label for="mode">
            Chọn chế độ
        </label>
        <select name="valueMode">
            <option value='1' <?php if($greenMode==1) echo "selected"; ?>>Thường xanh</option>
            <option value='0' <?php if($greenMode==0) echo "selected"; ?>>Ra hoa kết quả</option>
        </select>

        <label for="mode">
            Chọn chế độ bơm
        </label>
        <select id="pumpMode" name="pumpMode">
            <option value='1' <?php if($pumpAutoMode==1) echo "selected"; ?> >Tự động</option>
            <option value='0' <?php if($pumpAutoMode==0) echo "selected"; ?>>Bằng tay</option>
        </select>
        <button name="updateMode" type="submit">Xác nhận</button>
    </form>
</div>
<input type="hidden" id="webRoot" value=<?php echo _WEB_ROOT; ?>>
<script src=<?php echo _WEB_ROOT."/public/assets/js/soilHumid.js";?>></script>