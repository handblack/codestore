

<header id="header">

    <div id="logo-group">
        <a href="<?php echo base_url(); ?>">
            <span id="logo"> 
                <img src="<?php echo base_url('assets'); ?>/logo.png" alt="SmartAdmin"> 
            </span>
        </a>
    </div>

    <span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Necesitas una cuenta?</span> 
        <a href="<?php echo site_url('homepage/register'); ?>" class="btn btn-primary">Crear Cuenta</a> </span>

</header>

<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">SmartAdmin</h1>
                <div class="hero">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of SmartAdmin, everywhere you go!</h4>
                        <div class="login-app-icons">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
                        </div>
                    </div>

                    <img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                </div>



            </div>






            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    <form action="<?php echo site_url('security'); ?>" id="login-form" class="smart-form client-form" method="post">
                        <header>
                            Iniciar Session
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">E-mail / Username</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="email" name="username">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                            </section>

                            <section>
                                <label class="label">Contraseña</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="userpass">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                                <div class="note">
                                    <a href="<?php echo site_url('homepage/forgotpassword'); ?>">Forgot password?</a>
                                </div>
                            </section>

                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked="">
                                    <i></i>Mantener iniciada la session</label>
                            </section>
                            <section>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Iniciar
                            </button>
                        </footer>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>

<!--================================================== -->	

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="../../../../../../ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-3.2.1.min.js"><\/script>');}</script>

<script src="../../../../../../ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');}</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->		
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!--[if IE 8]>
        
        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
        
<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="js/app.min.js"></script>

<script>
    runAllForms();

    $(function () {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                }
            },

            // Messages for form validation
            messages: {
                email: {
                    required: 'Please enter your email address',
                    email: 'Please enter a VALID email address'
                },
                password: {
                    required: 'Please enter your password'
                }
            },

            // Do not change code below
            errorPlacement: function (error, element) {
                error.insertAfter(element.parent());
            }
        });
    });
</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script>

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-43548732-6']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>

