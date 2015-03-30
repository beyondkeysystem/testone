<div class="section">
    <div class="container">
        <div class="heading clearfix">
            <?php echo __('Get in Touch'); ?> 
        </div>

        <div><b>We are at upper 1st floor of Maybank Kenanga City</b></div>
        <div class="map-pic">
<!--            <img src="/css/images/map-big.jpg" alt="">-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3983.8405546589743!2d101.70719700000001!3d3.1367849999999997!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3620ab5c086d%3A0xe4d1f0e4e9e154dd!2sMaybank!5e0!3m2!1sen!2sin!4v1426929392077" width="100%" height="467" frameborder="0" style="border:0"></iframe>
        </div>

        <div class="about-sep contact-main">
                    <div class="row clearfix">
                        <div class="col-md-12"> <div class="top-heading tech-head clearfix"><?php echo __('Technical Support');?></div> </div>
                        <div class="col-md-5">
                            <h2> <i class="fa fa-envelope"></i> <?php echo __('General Enquiries');?></h2>
                            <p><?php echo __('For any product related issues, please contact our team of product specialists'); ?></p>
                            <div class="email-div"> 
                                <a class="email-us" href="javascript:void(0)"  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo __('Email Us'); ?></a>
                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <div class="heading-middle"><?php echo __('Contact Us'); ?></div>
<form action="" method="post"><input type="hidden" id="emailaddress" name="emailbool" class="txt-field">
                                            <div class="news-detail-form clearfix">
                                                <h3><?php echo __('Your email address will not be published. Required fields are marked'); ?> <span class="mendetory">*</span>      </h3>

                                                <div class="news-main-form">
                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label><?php echo __('Name'); ?> <span class="mendetory">*</span>      </label>
                                                            <input type="text" required="required" name="name" class="txt-field">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label><?php echo __('Email'); ?> <span class="mendetory">*</span>      </label>
                                                            <input type="email" required="required" id="email" name="email" class="txt-field">
                                                        </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-6">
                                                            <label><?php echo __('Phone Number'); ?> <span class="mendetory">*</span>      </label>
                                                            <input type="text" name="phone" required="number" class="txt-field">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label><?php echo __('Website');?>  <span class="mendetory">*</span>      </label>
                                                            <input type="text" name="currentmobilebrand" required="required" class="txt-field">
                                                        </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <label><?php echo __('Message'); ?> <span class="mendetory">*</span>      </label>
                                                            <textarea name="message" required="required" class="txt-area"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row clearfix">
                                                        <div class="col-md-12">
                                                            <input type="submit" value="<?php echo __('Submit');?>" class="submit-btn">
                                                        </div>
                                                    </div>
                                                </div>          
                                            </div>
</form>
                                        </div>
                                    </div>
                                </div>






                            </div>
                            <h2> <i class="fa fa-phone-square"></i>   <?php echo __('Phone Support'); ?> </h2>
                            <p><?php echo __('Contact our team of experts for any queries relating to any HaRiMau product any day of the week.'); ?></p>
                            <ul class="contact-contact clearfix">
                                <li>
                                    <h3><?php echo __('Malaysia (10am-6pm)'); ?></h3>
                                    <p><?php echo __('+603 9226 3000'); ?></p>
                                    <!--<p>00 +60 3-7843 980</p>-->
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 pull-right">
                            <h2> <i class="fa fa-users"></i>  <?php echo __('Business Enquiries');?> </h2>
                            <p><?php echo __('For any queries related to Business and Partner enquiries and General Support'); ?></p>
                            <div class="email-div"> <a class="email-us" href="javascript:void(0)"  data-toggle="modal" data-target=".bs-example-modal-lg"><?php echo __('Email Us'); ?></a> </div>
                            <h2> <i class="fa fa-pencil-square"></i><?php echo __('Warranty &amp; Troubleshooting'); ?> </h2>
                            <p><?php echo __('Express your complaints and feedback to Executive Team regarding our products and services. Your message will be promptly handled under the direct supervision of our Executive Management'); ?></p>
                            
                            <div class="email-div">
                            <?php if($this->Session->read("Auth.User")){ ?>
                                    <a class="email-us get" href="/ticket"><?php echo __('Get Started');?></a>
                        <?php }else{ ?>
                                    <a class="email-us get" href="/users/login"><?php echo __('Get Started');?></a>
                        <?php }?>                            
                            </div>

                        </div>

                    </div>
                </div>
            </div>
</div>