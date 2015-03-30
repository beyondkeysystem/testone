<!-- Bootstrap core CSS -->
<link href="/assets/front/css/font-awesome.min.css" rel="stylesheet">
<link href="/assets/front/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/assets/front/css/mystyle.css" rel="stylesheet">
<link href="/assets/front/css/iecss.css" rel="stylesheet">

<link href="/assets/css/jquery-ui.css" rel="stylesheet">
<link href="/assets/front/css/custome.css" rel="stylesheet">
<link href="/assets/front/css/bootstrap-select.min.css" rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy this line! -->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/front/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.raccordion.js" type="text/javascript"></script>
<script src="/assets/front/js/jquery.animation.easing.js" type="text/javascript"></script>

<!-- Placed at the end of the document so the pages load faster --> 

<script type="text/javascript" src="/assets/front/js/init.js"></script> 
<script src="/assets/front/js/bootstrap.min.js"></script> 
<script src="/assets/js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script> 
<script src="/assets/front/js/bootstrap-select.min.js"></script>
<script>
  // To style only <select>s with the selectpicker class
 $('.selectpicker').selectpicker();
</script>
<script src="/assets/front/js/jquery_003.js"></script> 
<script src="/assets/front/js/jquery_002.js"></script> 
<script src="/assets/front/js/enquire.js"></script> 
<script src="/assets/front/js/examples.js"></script>
<link href="/assets/front/css/responsive.css" rel="stylesheet">
