<div style="width:70%;float:right;">
<h2>Dữ liệu để mọi người dễ xem, chỉnh giao diện xong có thể xóa đoạn này</h2>
<?php
    echo '<pre>'; print_r($userArr); echo '</pre>';
?> 
</div>
<div style="width:70%;float:right;">
    <a href=<?php echo _WEB_ROOT."/admin/UserModify/create"; ?>>Thêm tài khoản</a>
</div>
<table style="width:70%;float:right;">
  <tr>
    <th>Tên</th>
    <th>Họ và tên lót</th>
    <th>Tên tài khoản</th>
    <th>Số điện thoại</th>
    <th>Vai trò</th>
    <th>Chứ năng</th>
  </tr>
  <?php
    foreach($userArr as $user){
        echo '<tr>';
        echo '<td>'.$user['first_name'].'</td>';
        echo '<td>'.$user['last_name'].'</td>';
        echo '<td>'.$user['username'].'</td>';
        echo '<td>'.$user['phone_number'].'</td>';
        echo '<td>'.$user['role'].'</td>';
        echo '<td>';
        if($user['role'] =='Giám sát'){
            echo "<a href="._WEB_ROOT."/admin/UserModify/update?id=".$user['id'].">Sửa</a>";
            echo "<a href="._WEB_ROOT."/admin/UserModify/delete?id=".$user['id'].">Xóa</a>";
        }
        echo '</td></tr>';
    }
  ?>
</table>