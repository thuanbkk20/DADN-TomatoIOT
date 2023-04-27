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
</head> 

<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">	
                <div class="app-auth-branding mb-4">
                    <a class="app-logo" href="index.html">
						<?php echo "<img class='logo-icon me-2' src='"._ROOT."/public/assets/images/tomato.png'>";?>
                    </a>
                </div>
                <h2 class="auth-heading text-center mb-5"><strong style="color:forestgreen">TPPT</strong> Tomato IoT</h2>
                <span style="color: red">
                    <?php echo (empty($msg)?false:$msg); ?>
                </span>
                <div class="auth-form-container text-start">
                    <form method="post" class="auth-form login-form" action="<?php echo _WEB_ROOT; ?>/site/login">         
                        <div class="email mb-3">
                            <label class="sr-only" for="signin-email">Email</label>                 
                            <input id="email" name="email" type="email" class="form-control email" value="<?php echo (empty($old['email'])?false:$old['email']);?>" placeholder="Email address" required="required">
                            <span style="color: red">
                                <?php echo (empty($errors['email'])?false:$errors['email']); ?>
                            </span>
                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <label class="sr-only" for="signin-password">Password</label>
                            <input id="password" name="password" type="password" class="form-control password" value="<?php echo (empty($old['password'])?false:$old['password']);?>" placeholder="Password" required="required" >
                            <span style="color: red">
                                <?php echo (empty($errors['password'])?false:$errors['password']); ?>
                            </span>
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                        <label class="form-check-label" for="RememberPassword">
                                        Remember me
                                        </label>
                                    </div>
                                </div><!--//col-6-->
                                <div class="col-6">
                                    <div class="forgot-password text-end">
                                        <a href="">Forgot password?</a>
                                    </div>
                                </div><!--//col-6-->
                            </div><!--//extra-->
                        </div><!--//form-group-->

                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                        </div>

                    </form>
                </div><!--//auth-form-container-->	
            </div><!--//auth-body-->
        </div>
    </div>

    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <?php echo "<img style='position:absolute;width:100%;height:100%;left:0;top:0;z-index:10;' src='"._ROOT."/public/assets/images/background/background-tomato-2.jpg'>";?>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
                <div class="overlay-content p-3 p-lg-4 rounded">
                    <h5 class="mb-3 overlay-title">Contact us for more information</h5>
                    <div>About our social media <a href="">here</a>.</div>
                </div>
            </div>
        </div><!--//auth-background-overlay-->
    </div><!--//auth-background-col-->
</div>