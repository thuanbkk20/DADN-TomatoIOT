<?php
$routes['default_controller'] = 'home';

/*
* Đường dẫn ảo => Đường dẫn thật
*/

$routes['san-pham'] = 'home';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/.+-(\d+)'] = 'news/category/$1';
?>