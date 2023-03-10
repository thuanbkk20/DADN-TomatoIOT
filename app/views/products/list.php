<!-- Set title -->
<title><?=
    !empty($page_title)?$page_title:"No name"
?></title>

<h1 style="text-align: center">PRODUCTS LIST</h1>
<?php
    echo '<pre>';
    print_r($product_list);
    echo '</pre>';
?>
