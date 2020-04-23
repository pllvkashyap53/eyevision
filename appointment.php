<!DOCTYPE html>
<html lang="en">

<head>
    <script language="javascript">
        function check() {

            if (document.form1.firstname.value == "") {
                alert("Please Enter Your First Name");
                document.form1.name.focus();
                return false;
            }

            if (document.form1.lastname.value == "") {
                alert("Please Enter Your Last Name");
                document.form1.name.focus();
                return false;
            }

            if (document.form1.phone.value == "") {
                alert("Please Enter Contact Number");
                document.form1.phone.focus();
                return false;
            }

            if (document.form1.email.value == "") {
                alert("Please Enter your Email Address");
                document.form1.email.focus();
                return false;
            }
            e = document.form1.email.value;
            f1 = e.indexOf('@');
            f2 = e.indexOf('@', f1 + 1);
            e1 = e.indexOf('.');
            e2 = e.indexOf('.', e1 + 1);
            n = e.length;

            if (!(f1 > 0 && f2 == -1 && e1 > 0 && e2 == -1 && f1 != e1 + 1 && e1 != f1 + 1 && f1 != n - 1 && e1 != n - 1)) {
                alert("Please Enter Valid Email");
                document.form1.email.focus();
                return false;
            }
            return true;
        }

    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Eye Vision | Book Appointment</title>

    <meta name="description" content="EyeCare is a premium Eyecare template, which will ideally be suitable for any sites related to Optometrist, Eye Doctor, Medical,  LAsik Eye Surgery Center, Eye Hospital, Opticals, medicine, clinics, doctors, eye clinics and any other sites related to medical  topics or health care OR Eye Care" />
    <meta name="keywords" content="Eye Care, Eye clinics, Ophthalmologist, Laser Vision, doctors, health, Vision Care, Eye hospital, medical, Optical, LAsik,  Optometrist, Optician, Eyecare Associates, dental" />
    <meta name="author" content="Eye Vision" />
    <?php
include 'connect.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (isset($_POST['submit'])) {
        $doctor_name = $_POST['doctor'];
        $first_name  = $_POST['firstname'];
        $last_name   = $_POST['lastname'];
        $email       = $_POST['email'];
        $phone       = $_POST['phone'];
        $date        = date('d-m-Y', strtotime($_POST['date']));
        $time        = $_POST['time'];
        $purpose     = $_POST['purpose'];
        $message     = $_POST['message'];
        
        
        if (empty($doctor_name) || empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($date) || empty($time) || empty($purpose)) {           
            $error = "Failed to book Appointment <br/> Some Fields are Blank!";
        } else {
            $new = date('d-m-Y',strtotime("now"));
            if($date > $new){
                $check     = mysqli_query($dbc, "SELECT * from appointment WHERE doctor_name='$doctor_name' and date='$date' and time='$time'");
            $checkrows = mysqli_num_rows($check);
            if ($checkrows > 0) {
                echo "Doctor is already Booked for this time slot. Please select any other.";
            } else {
                $query1 = mysqli_query($dbc, "SELECT * FROM doctor WHERE doctor_name ='$doctor_name'"); {
                    while ($row = mysqli_fetch_assoc($query1)) {
                        $id    = $row['doctor_id'];
                        //Insert Query of SQL
                        $query = mysqli_query($dbc, "INSERT INTO appointment VALUES (default,'$doctor_name','$first_name','$last_name', '$email', '$phone', '$date', '$time','$purpose','$message','$id')");
                        if ($query) {
                            $error1 = "Appointment Booked Successfully!!";
                        }else{
                            $error = "Appointment Booking Failed";
                        }
                        
                    }
                }
            }
        }
            else{
                $error = "Please select Date after tomorrow. Doctor is not available on this Date.";
            }
    }
    }
}
?>

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
    <!--<link rel="stylesheet" type="text/css" href="assets/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.cslic,300,300italic,400italic,500,500italic,700italic,700,900,900italic' rel='stylesheet' type='text/css'>
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
                        <span class="fw-normal">Schedule </span>Appointment </div>
                    <ol class="breadcrumb text-left fadeInRight animated">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#"> Contact </a></li>
                        <li><a href="#">Schedule Appointment</a></li>
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

        <!-- Services Section
================================================== -->

        <section class="top-bottom-spacing grey-bg">
            <div class="container">
                <div class="row">
                    <div class="clearfix">
                        <!-- Section 1 -->
                        <div class="col-md-4">
                            <div class="heading marbot40">
                                <h2>Fix appointment with our doctors</h2>
                                <p class="fontresize marbot0">Please bring to your appointment any available medical records, including images such as x-rays and MRI. Please fill out the appointment request form here. </p>

                            </div>

                            <div class="appointment-sidebar panel panel-body panel-grey bottom-right marbot40">
                                <ul class="cont-det">
                                    <li class="border-seperator">
                                        <h4>For Emergency</h4>
                                        <a href="#" class="reverse fw-500">
                                            <i class="fa fa-fw flaticon-clock location-icon color-light"></i> +1-234-567-8900
                                        </a>
                                    </li>
                                    <li class="border-seperator">
                                        <h4>House Visit</h4>
                                        <a href="#" class="reverse fw-500">
                                            <i class="fa fa-fw flaticon-medical-21 location-icon color-light"></i> +1-234-567-8900
                                        </a>
                                    </li>
                                    <li>
                                        <h4>Appointment by mail</h4>
                                        <a href="#" class="reverse fw-500">
                                            <i class="fa fa-fw flaticon-symbol location-icon color-light"></i> book@eyevision.com
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- // Section 1 -->

                        <!-- Section 2 -->
                        <div class="col-md-8">
                            <form class="appointment panel panel-body marbot40 panel-grey" method="post" onSubmit="return check();" name="form1" action="appointment.php">
                                <h3>Fix an appointment</h3>
                                <!-- Dropdown List -->
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <?php
$get = mysqli_query($dbc, "SELECT * FROM doctor");
?>
                                        <div class="form-group">
                                            <div class="dropdown marbot30">
                                                <select name="doctor" class="select reason-option">
                                                    <option value="0"> --- --- Choose Doctor --- --- </option>
                                                    <?php
while ($row = mysqli_fetch_assoc($get)) {
    $id = $row['doctor_id'];
?>
                                                    <option value="<?php
    echo ($row['doctor_name']);
?>">
                                                        <?php
    echo ($row['doctor_name']);
?>
                                                    </option>
                                                    <?php
}
?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <!-- Dropdown List -->

                                <!-- Form Section -->
                                <div class="row clearfix">
                                    <div class="clearfix">
                                        <div class="col-md-6">
                                            <div class="clearfix form-group">
                                                <label>First Name</label>
                                                <input name="firstname" type="text" id="firstname" pattern='[A-Za-z\\s]*' class="validate['required'] textbox1" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="clearfix form-group">
                                                <label for="lastname">Last Name</label>
                                                <input name="lastname" type="text" class="form-control" id="lastname" pattern='[A-Za-z\\s]*' placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailid">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone-number">Phone number</label>
                                                <input name="phone" type="text" class="form-control" id="phone" minlength="1" maxlength="10" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="clearfix marbot20">
                                                    <label for="date-time">Select Date</label>
                                                    <div id="datetimepicker" data-date-start-date="+0d" class="input-group date form_datetime" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                                                        <input name="date" type="text" data-date-start-date="+0d" value="" readonly>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                    </div>
                                                    <input type="hidden" id="dtp_input1" value="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="time">Select Time</label>
                                                <select name="time" class="select reason-option">
                                                    <option value=""> --- --- Select Below --- --- </option>
                                                    <option value="10AM">10 AM</option>
                                                    <option value="11AM">11 AM</option>
                                                    <option value="12NOON">12 NOON</option>
                                                    <option value="1PM">1 PM</option>
                                                    <option value="2PM">2 PM</option>
                                                    <option value="3PM">3 PM</option>
                                                    <option value="4PM">4 PM</option>
                                                    <option value="5PM">5 PM</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row clearfix">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="message">Please Select Below</label>
                                            <select name="purpose" class="select reason-option">
                                                <option value=""> --- --- Select Below --- --- </option>
                                                <option value="I Would Like to Book a Consultation">I Would Like to Book a Consultation</option>
                                                <option value="I Would Like a Call Back">I Would Like a Call Back</option>
                                                <option value="I'm Interested in LASIK or LASEK">I'm Interested in LASIK or LASEK</option>
                                                <option value="Implantable Contact Lenses">Implantable Contact Lenses</option>
                                                <option value="Clear Lens Exchange">Clear Lens Exchange</option>
                                                <option value="Cataract Treatment Information">Cataract Treatment Information</option>
                                                <option value="Keratoconus Treatment Information">Keratoconus Treatment Information</option>
                                                <option value="Intraocular Lens Exchange">Intraocular Lens Exchange</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-3">

                                    </div>
                                </div>

                                <div class="row clearfix marbot30">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="message" class="form-control" rows="4" id="message"> </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3">

                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-type1-reverse">Book Appointment</button>
                                    </div>
                                </div><br>
                                <?php
                                    if(!empty($error)){ echo "<div class='alert alert-danger'>" . $error . "</div>"; }
                                    if(!empty($error1)){ echo "<div class='alert alert-success'>" . $error1 . "</div>"; }
                                ?>
                                <!-- // Form Section -->
                            </form>
                            <div id="post_message">
                                <p class="fontresize"> </p>
                            </div>

                        </div>
                        <!-- // Section 2 -->

                    </div>
                </div>
            </div>
        </section>

        <!-- // appointment form Section
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
    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="assets/js/custom-google-map.js"></script>-->
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

<!-- Theme Reference by AccuraThemes -->

</html>
