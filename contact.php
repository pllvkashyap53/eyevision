<?php
include 'connect.php';
$result = '';
$error = '';

if(isset($_POST['submit'])){
        $name = $_POST['name'];          
        $email = $_POST['email'];  
        $phone = $_POST['phone'];  
        $message = $_POST['message'];  
        
         if ($name != '' || $email != '' || $phone != '' || $message != '') {
            $query = mysqli_query($dbc, "INSERT INTO contact VALUES (default,'$name','$email','$phone','$message')");
            if ($query) {
            require 'phpmailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            //$mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
          
            $mail->Username='pllvkashyap53@gmail.com';
            $mail->Password='Ppallavi@91';
            
            $mail->setFrom($email,$name);
            $mail->addAddress('saipallavi010891@gmail.com');
            $mail->addReplyTo($email,$name);
        
            $mail->isHTML(true);
            $mail->Subject='Form Submission: '.$email;
            $mail->Body='<h3>Name: '.$name.
                        '<br>Email: '.$email.
                        '<br>Contact Number: '.$phone.
                        '<br>Message: '.$message.'<h3>';
                       
            if($mail->send()){
                 $result =  "Thanks\t".$name." for contacting us. We received your request. We will get back to you in 24 hours";
               
            }
            else{
               $error = "Something went wrong. Please try again later.";
            }
        }
         }
        else{
            $error = "Unable to send message. Some Fields are blank.";
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Eye Vision | Contact Us </title>

    <meta name="description" content="EyeCare is a premium Eyecare template, which will ideally be suitable for any sites related to Optometrist, Eye Doctor, Medical,  LAsik Eye Surgery Center, Eye Hospital, Opticals, medicine, clinics, doctors, eye clinics and any other sites related to medical  topics or health care OR Eye Care" />
    <meta name="keywords" content="Eye Care, Eye clinics, Ophthalmologist, Laser Vision, doctors, health, Vision Care, Eye hospital, medical, Optical, LAsik,  Optometrist, Optician, Eyecare Associates, dental" />
    <meta name="author" content="Eye Vision" />

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700italic,700,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800italic,800,900italic,900,700italic,700,600italic,600,500italic,500,400italic,300italic,300,200italic,200,100italic,100' rel='stylesheet' type='text/css'>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!-- Menu Css -->
    <link rel="stylesheet" href="assets/css/bootstrap-menu.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <!-- // Menu Css -->

    <!-- Light Box Css -->
    <link rel="stylesheet" href="assets/css/ekko-lightbox.css">
    <link rel="stylesheet" href="assets/css/ekko-lightbox-dark-skin.css">
    <!-- // Light Box Css -->

    <!-- Revolution Slider 4.6.5  Css -->
    <!--<link rel="stylesheet" type="text/css" href="assets/revolution-4.6.5/css/extralayers.css" >
<link rel="stylesheet" type="text/css" href="assets/revolution-4.6.5/css/settings.css" >-->
    <!-- // Revolution Slider 4.6.5  Css -->

    <!-- Revolution Slider -->
    <!--<link rel="stylesheet" type="text/css" href="assets/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
<link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">	
<link rel="stylesheet" type="text/css" href="assets/revolution/css/slider-one-thumb.css" />-->
    <!-- // Revolution Slider -->

    <!-- Owl Slider Css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <!-- // Owl Slider Css -->

    <!-- BX Slider -->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" />-->
    <!-- // BX Slider -->

    <!-- Before After And Gallery Css -->
    <link rel="stylesheet" href="assets/css/portfolio.css">
    <link rel="stylesheet" href="assets/css/twentytwenty.css">
    <!-- // Before After And Gallery Css -->

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/color/color.css">
    <!-- Custom Css -->

    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="apple-touch-icon" href="assets/images/apple_touch_icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple_touch_icon_72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple_touch_icon_114x114.png" />

    <script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>

</head>

<body>

    <!-- Wrapper 
=============================-->
    <div class="wrapper">

        <!-- Header 
================================= -->
        <?php
	include 'header.php';
?>
        <!-- // Header 
================================= -->

        <!-- Banner Section
================================= -->

        <section class="animatedParent animateOnce subbanner subbanner-image subbanner-pattern-02 subbanner-type-2 subbanner-type-2-btn">
            <div class="container">
                <div class="subbanner-content banner-content">
                    <div class="skew-effect fadeInLeft animated">
                        <span class="fw-normal">Contact</span> Us </div>
                    <ol class="breadcrumb text-left fadeInRight animated">
                        <li><a href="index.htm">Home</a></li>
                        <li><a href="#"> Contact </a></li>
                        <li><a href="#"> Contact us</a></li>
                    </ol>
                </div>
            </div>
            <!-- Breadcrumb -->
            <div class="banner-strip">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="pull-right font-resizer resizer-bg">
                                <li class="aside marbot0">Font : </li>
                                <li><a href="#" class="decrease" data-toggle="tooltip" data-placement="top" title="Decrease Font"><i class="fa">A</i></a></li>
                                <li><a href="#" class="resetMe" data-toggle="tooltip" data-placement="top" title="Default Font"><i class="fa">A</i></a></li>
                                <li><a href="#" class="increase" data-toggle="tooltip" data-placement="top" title="Increase Font"><i class="fa">A</i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- // Breadcrumb -->
        </section>

        <!-- // Banner Section
================================= -->

        <!-- Contact Section
================================================== -->

        <section class="top-bottom-spacing grey-bg">
            <div class="container">
                <div class="row">
                    <div class="clearfix">
                        <!-- Section 1 -->
                        <div class="col-md-4 marbot10">
                            <h1>
                                <span class="fw-normal">Eye Vision </span>Eye care Centers
                            </h1>
                        </div>
                        <!-- // Section 1 -->

                        <div class="col-md-8">
                            <div class="row marbot20">
                                <!-- Section 2 -->
                                <div class="col-md-6">
                                    <p class="fontresize">
                                        We offers a complete range of eye care services including LASIK and PRK refractive surgery, eye exams, vision testing for glasses and contacts.
                                    </p>
                                    <p class="fontresize">
                                        All Laser Lasik, Cornea & Glaucoma, Laser Cataract Surgery, Brow lift services.
                                    </p>
                                </div>
                                <!-- // Section 2 -->

                                <!-- Section 3 -->
                                <div class="col-md-6">
                                    <p class="fontresize">
                                        Cornea is the eye’s outermost layer. It is the clear, dome-shaped surface that covers the front of the eye.
                                    </p>
                                    <p class="fontresize">
                                        Glaucoma is slowly damages the eyes and can causes vision loss.
                                    </p>
                                </div>
                                <!-- // Section 3 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- // Contact Section
================================================== -->

        <!--  Contact map Section
================================================== -->

        <section class="top-bottom-spacing-full contact-bg grey-bg">

            <div class="container">
                <div class="heading text-center marbot50">
                    <h2> Contact Form</h2>
                    <p class="fontresize">To get in touch, complete this form and we'll get back to you as quickly as possible.</p>
                </div>

                <div class="row animatedParent animateOnce">
                    <div class="col-md-12 fadeInUp animated">
                        <h3> <?= $result; ?></h3>
                        <h3> <?= $error; ?></h3>
                        <form action="" method="post" style="width:70%">
                            <label for="name">
                                <h4>Name</h4>
                            </label>
                            <input type="text" id="name" name="name" placeholder="Your Name..">
                            <?php
                                    if(!empty($nameErr)){ echo "<div class='alert alert-danger'>" . $nameErr . "</div>"; }
                                ?>

                            <label for="email">
                                <h4>Email</h4>
                            </label>
                            <input type="text" id="email" name="email" placeholder="Your Email..">
                            <?php
                                    if(!empty($emailErr)){ echo "<div class='alert alert-danger'>" . $emailErr . "</div>"; }
                                ?>
                            <label for="phone">
                                <h4>Phone</h4>
                            </label>
                            <input type="text" id="phone" name="phone" placeholder="Your Phone Number..">
                            <?php
                                    if(!empty($phoneErr)){ echo "<div class='alert alert-danger'>" . $phoneErr . "</div>"; }
                                ?>

                            <label for="message">
                                <h4>Message</h4>
                            </label>
                            <textarea id="message" name="message" placeholder="Write message.." style="height:200px"></textarea>
                            <?php
                                    if(!empty($messageErr)){ echo "<div class='alert alert-danger'>" . $messageErr . "</div>"; }
                                ?>

                            <input type="submit" name="submit" class="btn btn-type1-reverse" value="Submit">
                        </form>
                        <div id="post_message">
                            <p class="fontresize marbot0"></p>
                        </div>

                    </div>
                </div>
            </div>

        </section>

        <!-- // Contact map Section
================================================== -->

        <!-- Map Section
================================================== -->
        <div id="boxed">
            <!--  Map Section -->
            <div class="map-section">
                <!-- map -->
                <div class="map_wrapper">
                    <a class="btn btn-type1 map-close">
                        <i class="fa fa-times"></i> </a>
                    <div id="map_canvas"></div>
                </div>
                <!-- // map -->
                <section id="foot_top" class="show-googlemap plus">
                    <div class="foot_top_txt animatedParent">
                        <i class="fa flaticon-technology-6 map-marker foot_icon pulse animated"></i>
                        <a href="https://goo.gl/maps/U79N5ParjRBJCK1e7">View Our Location - Google Map
                            <i class="fa fa-angle-right foot_icon foot_icon1"></i>
                    </div>
                </section>
            </div>
            <!-- // Map Section -->
        </div>
        <!-- // Map Section
================================================== -->

        <!-- Footer Section
================================= -->
        <?php
	include 'footer.php';
 ?>
        <!-- // Footer Section
================================= -->


    </div>
    <!-- // Wrapper 
=============================-->

    <!-- Java Scripts
================================= -->

    <!-- Common Scripts -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing-1.3.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="assets/js/sscr.js"></script>
    <!-- // Smooth Scroll -->

    <!-- Light Box JS -->
    <script type="text/javascript" src="assets/js/ekko-lightbox.min.js"></script>
    <!-- // Light Box JS -->

    <!-- Image Hover Overlay Effect -->
    <script type="text/javascript" src="assets/js/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.hoverdir.js"></script>
    <!-- // Image Hover Overlay Effect -->

    <!-- // Common Scripts -->

    <!-- Date And Time Picker -->
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <!-- // Date And Time Picker -->

    <!-- Google Map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="assets/js/custom-google-map.js"></script>
    <!-- // Google Map -->

    <!-- Twenty Twenty Slider -->
    <script type="text/javascript" src="assets/js/jquery.event.move.js"></script>
    <script type="text/javascript" src="assets/js/jquery.twentytwenty.js"></script>
    <!-- // Twenty Twenty Slider -->

    <!-- Owl Slider JS -->
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/custom-owl.js"></script>
    <!-- // Owl Slider JS -->

    <!-- BX Slider JS -->
    <script type="text/javascript" src="assets/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="assets/js/custom-bxslider.js"></script>
    <script type="text/javascript" src="assets/js/jquery.isotope.min.js"></script>
    <!-- // BX Slider JS -->

    <!-- Animate It -->
    <script type="text/javascript" src="assets/js/css3-animate-it.js"></script>
    <!-- // Animate It -->

    <!-- Custom General JS -->
    <script type="text/javascript" src="assets/js/custom-general.js"></script>
    <!-- //  Custom General JS -->

    <!-- //Java Scripts
================================= -->

</body>

</html>
