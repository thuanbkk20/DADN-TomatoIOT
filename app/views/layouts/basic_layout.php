<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>TPPT - IoT Tomato</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" type="image/x-icon" href="public/assets/images/tomato.png">   -->
    <?php echo "<link type='image/x-icon' rel='icon' href='"._ROOT."/public/assets/images/tomato.png'>";?>
    <!-- FontAwesome JS-->
    <?php echo "<script defer src='"._ROOT."/public/assets/plugins/fontawesome/js/all.min.js'></script>";?>
    <!-- <script defer src="public/assets/plugins/fontawesome/js/all.min.js"></script> -->
    <!-- App CSS -->  
    <?php echo "<link id='theme-style' rel='stylesheet' href='"._ROOT."/public/assets/css/portal.css'>";?>
    <!-- <link id="theme-style" rel="stylesheet" href="public/assets/css/portal.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> <!-- Jquery để sử dụng ajax -->

</head> 
<body>
<!--    --><?php
//        $this->render('blocks/header',$header_content);
//        $this->render($content, $sub_content);
//        $this->render('blocks/footer');
//    ?>

    <div class="app row">
        <div class="app-sidepanel" style="z-index: 1045">
	        <?php $this->render('blocks/sidebar');?>
        </div>
        <div>
            <header class="app-header fixed-top">
		        <?php
		        $this->render('blocks/header',$header_content);
		        ?>
            </header>
            <div>
		        <?php
		        $this->render($content, $sub_content);
		        ?>
            </div>
            <footer class="app-footer row fixed-bottom mx-3 ms-5">
		        <?php
		        $this->render('blocks/footer');
		        ?>
            </footer>
        </div>
    </div>
    <!-- Javascript -->          
    <?php echo "<script src='"._ROOT."/public/assets/plugins/popper.min.js'></script>";?>
    <?php echo "<script src='"._ROOT."/public/assets/plugins/bootstrap/js/bootstrap.min.js'></script>";?>
    <!-- <script src="/public/assets/plugins/popper.min.js"></script> -->
    <!-- <script src="/public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>   -->
    
    <!-- Page Specific JS -->
    <?php echo "<script src='"._ROOT."/public/assets/js/app.js'></script>";?>
    <!-- <script src="/public/assets/js/app.js"></script>  -->
</body>
</html>
