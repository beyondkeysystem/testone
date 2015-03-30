<?php
define("BASE_URL", "http://myviko.pd.cisinlive.com/")
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MyVikoHome</title>

        <script src="<?php echo BASE_URL; ?>js/jquery-1.8.3.min.js"></script>




        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/jquery.nouislider.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/font-awesome.min.css">
        <link href="<?php echo BASE_URL; ?>assets/front/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>assets/front/css/owl.theme.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/loader.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/loader_txt.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/bootstrap-multiselect.css">




        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/front/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/front/js/jquery.reveal.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/front/js/jquery.nouislider.all.min.js"></script>


        <!-- by Mayank
        ** Date: 20.11.14 
        -->
       <!-- <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/front/js/bootstrap-multiselect.js"></script> -->

        <!-- End -->
        <script>
            $(function() {
                $("#admin_tabs").tabs();
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".admin_head_right").click(function() {
                    $(".admin_head_right ul").toggle();
                    $(this).toggleClass('adminactive');
                });
            });
        </script>

        <script type="text/javascript">

            $(document).ready(function() {
                $('.main-image #2').hide();
                $('.main-image #3').hide();
                $('.main-image #4').hide();
                $('.main-image #5').hide();

                $('.thumbnails .thumb').click(function() {
                    var id = $(this).attr("id");
                    $('.main-image .main').hide();
                    $('.main-image #' + id).show();
                });

            });
        </script>

        <script src="<?php echo BASE_URL; ?>assets/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
        <!--[if lte IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/front/css/ie.css">
        <![endif]-->
        <script type="text/javascript">
            $(document).ready(function() {
                $(".custom-select").each(function() {
                    $(this).wrap("<span class='select-wrapper'></span>");
                    $(this).after("<span class='holder'></span>");
                });
                $(".custom-select").change(function() {
                    var selectedOption = $(this).find(":selected").text();
                    $(this).next(".holder").text(selectedOption);
                }).trigger('change');
                $("select")
                        .change(function() {
                            var str = "";
                            var str2 = "";
                            $("select option:selected").each(function() {
                                str += $(this).text();
                                str2 += $(this).val();
                            });
                            $("#item").val(str);
                            $("#amount").val(str2);
                        })
                        .change();

            });
        </script>
        <script type="text/javascript">

            $(document).ready(function() {
                $('#tabs .clsdiv').hide();
                $('#tabs .clsdiv:first').show();
                $('#tabs ul li:first').addClass('active');
                $('#tabs ul li a').click(function() {
                    $('#tabs ul li').removeClass('active');
                    $(this).parent().addClass('active');
                    var currentTab = $(this).attr('href');
                    $('#tabs .clsdiv').hide();
                    $(currentTab).show();
                    return false;
                });
            });
        </script>
    </head>

    <body>
        <!--Header Top-->
        <div class="wrapper">
            <div class="top">
                <ul class="header_top Left">
                    <li class="fb"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twt"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="in"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li class="pin"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <ul class="header_top Right">
                    <li><a href="#"><i class="fa fa-user gaps"></i>Call: +011 9876 554 021</a></li>
                    <li><a href="javascript:void(0);" class="big-link" data-reveal-id="myModal" data-animation="fade"><i class="fa fa-user gaps"></i>Login</a></li>
                    <li><a href="<?php echo BASE_URL; ?>register"><i class="fa fa-pencil gaps"></i>Register</a></li>
                    <li><a href="#">Eng <i class="fa fa-caret-down gaps"></i></a>
                        <ul class="top-menu">
                            <li><a href="<?php echo BASE_URL; ?>home/langswitch/en">English</a></li>
                            <li><a href="<?php echo BASE_URL; ?>home/langswitch/ml">Malay</a></li>
                            <li><a href="<?php echo BASE_URL; ?>home/langswitch/ch">Chinese</a></li>
                        </ul>
                    </li>
           <!-- <li class="search_box"><a href="#"><i class="fa fa-search"></i></a><input type="text"></li>-->

                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <!--/.Header Top-->
        <!--Popup-->
        <div class="reveal-modal popup" id="myModal">
            <h3>Signin with your account</h3>
            <div class="close"><a href="#" class="close-reveal-modal">close <i class="fa fa-close"></i></a></div>
            <div class="clear"></div>
            <form action="<?php echo BASE_URL; ?>user/validate_credentials_user" method="post" accept-charset="utf-8" onsubmit="return valid(this);">   <span id="logerr" style="display: none;color: red;"> Login credentials incorrect</span>
                <div class="reg-form-row">
                    <div class="row-col1">
                        <label>Username</label>
                        <input type="text" name="user_name">
                    </div>
                    <div class="row-col1">
                        <label>Password</label>
                        <input type="password" name="password" size="31">
                    </div>
                </div>
                <div class="remem">
                    <!--<div class="check"><input type="checkbox"> Remember me on this computer</div>-->
                    <a href="<?php echo BASE_URL; ?>forget">Forgot Password</a>
                </div>
                <div class="search_btn"><input type="submit" value="Signin"></div>
                <div class="signup">Not A Member ?   <a href="<?php echo BASE_URL; ?>register"> Sign Up Now!</a></div>
            </form>  </div>
        <!--/.Popup-->

        <!--TermsPopup-->
        <div class="reveal-modal popup" id="termsModal">
            <h3>Terms & Conditions</h3>
            <div class="close"><a href="#" class="close-reveal-modal">close <i class="fa fa-close"></i></a></div>
            <div class="clear"></div>
            <br>
            <div class="row-col1">
                <p>Lorem Ipsum Sergy Lorem Ipsum SergyLorem Ipsum SergyLorem Ipsum SergyLorem Ipsum SergyLorem Ipsum SergyLorem Ipsum Sergy</p>
            </div>
        </div>
        <!--/.Terms Popup-->

        <!--Privacy Popup-->
        <div class="reveal-modal popup" id="privacyModal">
            <h3>Privacy Policy</h3>
            <div class="close"><a href="#" class="close-reveal-modal">close <i class="fa fa-close"></i></a></div>
            <div class="clear"></div>
            <br>
            <div class="row-col1">
                <p>Lorem Ipsum Sergy Lorem Ipsum Sergy Lorem Ipsum Sergy Lorem Ipsum Sergy Lorem Ipsum Sergy Lorem Ipsum Sergy</p>
            </div>
        </div>
        <!--/ Privacy Popup-->



        <!--Logo + Navigation-->
        <div class="header_middle">
            <div class="wrapper">
                <div class="Left"> <a href="<?php echo BASE_URL; ?>home"><img src="<?php echo BASE_URL; ?>assets/front/images/logo.png"></a> </div>
                <div class="Right my-menu"> <a class="toggleMenu" href="#"><span></span><span></span><span></span></a>
                    <ul class="nav">
                        <li  class="test"><a href="<?php echo BASE_URL; ?>home">Home</a></li>
                        <li><a href="<?php echo BASE_URL; ?>about">About MyVikoHome</a></li>
                        <li><a href="<?php echo BASE_URL; ?>property_listing">Property Listing</a></li>
                        <li><a href="<?php echo BASE_URL; ?>property_investment">Investment Tips</a></li>
                        <li><a href="<?php echo BASE_URL; ?>property_payment">Payment Method</a></li>
                        <li><a href="<?php echo BASE_URL; ?>contact">Contact Us</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <!--/.Logo + Navigation--> 
        <!--Banner-->
        <div class="banner">
            <div id="owl" class="owl-carousel">


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide118.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>Cafe Coffee Day</h1>
                        <p>Hotel/Resorts</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,500.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/18" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide117.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>shopper stop</h1>
                        <p>Duplex</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,700.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/5" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide118.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>celebrity house</h1>
                        <p>Hotel/Resorts</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,500.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/1" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide116.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>Amar residency</h1>
                        <p>Commercial Land</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,500.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/8" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide118.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>Perl Villa </h1>
                        <p>Duplex</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,500.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/19" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide117.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>Chong Palace</h1>
                        <p>Hotel/Resorts</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,500,000.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/17" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>assets/front/images/noproperty.png" width="1600" height="551">
                    <div class="ban_content">
                        <h1></h1>
                        <p></p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 0.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide118.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>ds</h1>
                        <p>Commercial Land</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 436.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/21" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>assets/front/images/noproperty.png" width="1600" height="551">
                    <div class="ban_content">
                        <h1></h1>
                        <p></p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 0.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>assets/front/images/noproperty.png" width="1600" height="551">
                    <div class="ban_content">
                        <h1></h1>
                        <p></p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 0.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>uploads/slide124.jpg" width="1600" height="551">
                    <div class="ban_content">
                        <h1>yujy</h1>
                        <p>Commercial Land</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 789.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/22" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>assets/front/images/noproperty.png" width="1600" height="551">
                    <div class="ban_content">
                        <h1></h1>
                        <p></p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 0.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>


                <div class="item"><img src="<?php echo BASE_URL; ?>assets/front/images/noproperty.png" width="1600" height="551">
                    <div class="ban_content">
                        <h1>Amanja</h1>
                        <p>Duplex</p>
                        <div class="tag_plus_btn">
                            <a href="#" class="tag"><span><i class="fa fa-tag"></i></span> MYR 1,250,000.00</a>
                            <a href="<?php echo BASE_URL; ?>property_details/20" class="plus"><span><i class="fa fa-plus-circle"></i></span>More details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

        <div class="search_property">
            <div class="wrapper">
                <div class="dropdowns">

                </div>
            </div>
        </div>

        <!--/.Search Property--> 

        <!--Text + Image-->
        <div class="wrapper">
            <div class="text_pic">
                <div class="heading">
                    <h2>404 ERROR,PAGE COULD NOT BE FOUND!</h2>
                    <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                    <br />
                </div>
                
                <div class="clear"></div>
            </div>
        </div>
        <div class="footer">
            <div class="wrapper">
                <div class="footer_row1"> <a href="#"><img src="<?php echo BASE_URL; ?>assets/front/images/logo.png"></a>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                </div>
                <ul class="footer_row2">
                    <li><strong>About Us</strong></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Feed</a></li>
                    <li><a href="#">Forums</a></li>
                    <li><a href="#">Radio</a></li>
                    <li><a href="#">Journal</a></li>
                    <li><a href="#">Reader</a></li>
                    <li><a href="#">Store</a></li>
                </ul>
                <ul class="footer_row2">
                    <li><strong>Categories</strong></a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Freebies</a></li>
                    <li><a href="#">Tutorials</a></li>
                    <li><a href="#">Coding</a></li>
                    <li><a href="#">Inspiration</a></li>
                    <li><a href="#">WordPress</a></li>
                    <li><a href="#">Resources</a></li>
                </ul>
                <ul class="footer_row2">
                    <li><strong>Networks</strong></li>
                    <li><a href="#">Insight</a></li>
                    <li><a href="#">Promotion</a></li>
                    <li><a href="#">Production</a></li>
                    <li><a href="#">Planning</a></li>
                </ul>
                <ul class="footer_row2">
                    <li><strong>Mainframe</strong></li>
                    <li><a href="#">Register / Login</a></li>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                </ul>
                <ul class="footer_row2 last">
                    <li><strong>Follow Us</strong></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Youtube</a></li>
                    <li><a href="#">Vimeo</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Vine <span class="new">New </span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>