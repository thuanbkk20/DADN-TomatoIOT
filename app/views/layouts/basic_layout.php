<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>TPPT - IoT Tomato</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<link type='image/x-icon' rel='icon' href='"._ROOT."/public/assets/images/tomato.png'>";?>
    <!-- FontAwesome JS-->
    <?php echo "<script defer src='"._ROOT."/public/assets/plugins/fontawesome/js/all.min.js'></script>";?>
    <!-- App CSS -->  
    <?php echo "<link id='theme-style' rel='stylesheet' href='"._ROOT."/public/assets/css/portal.css'>";?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->
</head> 
<body>
    <input type="hidden" id="webroot" value=<?php echo _WEB_ROOT;?>>
    <?php 
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'pumpAutoMode'");
        $pumpAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
        $query = $this->db->query("SELECT * FROM mode WHERE modeName = 'fanAutoMode'");
        $fanAutoMode = $query->fetchAll(PDO::FETCH_ASSOC)[0]['value'];
    ?>
    <input type="hidden" id="pumpAutoMode" value=<?php echo $pumpAutoMode;?>>
    <input type="hidden" id="fanAutoMode" value=<?php echo $fanAutoMode;?>>
    <?php
        $this->render('blocks/header',$header_content);
        $this->render($content, $sub_content);
        $this->render('blocks/footer');
    ?>
    <!-- Javascript -->          
    <?php echo "<script src='"._ROOT."/public/assets/plugins/popper.min.js'></script>";?>
    <?php echo "<script src='"._ROOT."/public/assets/plugins/bootstrap/js/bootstrap.min.js'></script>";?>
    
    <!-- Page Specific JS -->
    <?php echo "<script src='"._ROOT."/public/assets/js/app.js'></script>";?>
    <script type="text/javascript"  src=<?php echo _WEB_ROOT."/public/assets/js/checkData.js";?>></script>
</body>
</html>