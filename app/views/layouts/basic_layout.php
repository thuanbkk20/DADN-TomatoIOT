<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>TPPT - IoT Tomato</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/assets/images/tomato.png">  
    <!-- FontAwesome JS-->
    <script defer src="public/assets/plugins/fontawesome/js/all.min.js"></script>
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="public/assets/css/portal.css">
</head> 
<body>
    <?php
        $this->render('blocks/sidebar');
        $this->render('blocks/header');
        $this->render($content, $sub_content);
        $this->render('blocks/footer');
    ?>

    <script type="text/javascript"  src="public/assets/js/script.js"></script>

    <!-- Javascript -->          
    <script src="public/assets/plugins/popper.min.js"></script>
    <script src="public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="public/assets/js/app.js"></script> 
</body>
</html>