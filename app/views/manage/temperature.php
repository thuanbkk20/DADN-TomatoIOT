<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->
<div style="width:70%;float:right;">
<h2>Dữ liệu để mọi người dễ xem, chỉnh giao diện xong có thể xóa đoạn này</h2>
<?php
    echo '<pre>'; print_r($areaArr); echo '</pre>';
    echo '<pre>'; print_r($temperature); echo '</pre>';
?> 
</div>
<div style="width:70%;float:right;">
    <H1>Quản lý nhiệt độ</H1>
</div>
<table style="width:70%;float:right;">
  <tr>
    <th>Khu vực</th>
    <th>Nhiệt độ</th>
    <th>Quạt máy</th>
    <th>Mức</th>
  </tr>
  <?php
    foreach($areaArr as $key => $value){
        foreach($value['fan'] as $fan){
            echo '<tr>';
            echo '<td>Khu vực '.$key.'</td>';
            echo '<td>'.$value['envIndex']['value'].'</td>';
            echo '<td>'.$fan['name'].'</td>';
            if($fanAutoMode == 0){
                echo "<td><form method='post' action='"._WEB_ROOT."/temperature'>";
                echo "<select name='fanLevel'>";
                if($fanLevel==0) echo "<option selected='selected' value='0'>Tắt</option>"; 
                else echo "<option value='0'>Tắt</option>";  
                if($fanLevel==1) echo "<option selected='selected' value='1'>Hoạt động 50%</option>";   
                else echo "<option value='1'>Hoạt động 50%</option>";           
                if($fanLevel==2) echo "<option selected='selected' value='2'>Hoạt động 100%</option>";
                else echo "<option value='2'>Hoạt động 100%</option>";        
                echo "</select>";    
                echo "<button name='updatefan' type='submit'>Xác nhận</button></form></td>";
            }else{
                echo '<td>'.$fan['level'].'</td>';
            }
            echo '<td>';
            echo '</td></tr>';
        }
    }
  ?>
</table>
<div style="width:70%;float:right;">
    <form method="post" action="<?php echo _WEB_ROOT.'/temperature';?>">
        <label for="mode">
            Chọn chế độ quạt
        </label>
        <select id='fanMode' name="fanMode">
            <option value='1' <?php if($fanAutoMode==1) echo "selected"?> >Tự động</option>
            <option value='0' <?php if($fanAutoMode==0) echo "selected"?> >Bằng tay</option>
        </select>
        <input type="hidden" id="webRoot" value=<?php echo  _WEB_ROOT; ?>/>
        <button name="updateMode" type="submit">Xác nhận</button>
    </form>
</div>