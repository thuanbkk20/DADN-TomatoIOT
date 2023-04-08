<?php 
    //Thêm html của dashboard tại file này
?>
<!-- Set title -->
<title><?=
    !empty($page_title)?$page_title:"No name"
?></title>

<h1 style="text-align: center">Dashboard</h1>
<h1 style="text-align: center">Temp data:<?php echo $tempLastData; ?></h1>
<h1 style="text-align: center">Temp Last update:<?php echo $tempLastUpdate; ?></h1>
<h1 style="text-align: center">Air humid data:<?php echo $air_humidLastData; ?></h1>
<h1 style="text-align: center">Air humid Last update:<?php echo $air_humidLastUpdate; ?></h1>
<h1 style="text-align: center">Soil humid data:<?php echo $soil_humidLastData; ?></h1>
<h1 style="text-align: center">Soil humid Last update:<?php echo $soil_humidLastUpdate; ?></h1>
<h1 style="text-align: center">Light data:<?php echo $lightLastData; ?></h1>
<h1 style="text-align: center">Light Last update:<?php echo $lightLastUpdate; ?></h1>