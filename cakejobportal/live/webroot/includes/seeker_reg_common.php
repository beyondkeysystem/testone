<ul>
        <li><a href="#" <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step1.")!=false) { echo"class='selected'"; }?> >1. Create account details</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step2")!=false) { echo"class='selected'"; }?> href="#">2. Personal information</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step3")!=false) { echo"class='selected'"; }?> href="#">3. Education</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step4")!=false) { echo"class='selected'"; }?> href="#">4. Employment history</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step5")!=false) { echo"class='selected'"; }?> href="#">5. Uploads & Links</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step6")!=false) { echo"class='selected'"; }?> href="#">6. Privacy</a></li>
        <li><a <?php if(strstr($_SERVER['REQUEST_URI'],"seeker_registration_step7")!=false) { echo"class='selected'"; }?> href="#">7. Submit registration</a></li>

</ul>