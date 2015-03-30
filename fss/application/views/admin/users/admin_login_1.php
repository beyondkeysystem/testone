<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Admin Login</title>
        <script type="text/javascript">
            var siteUrl = "http://localhost/alex/moveforward/";
        </script>
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/backend_main.css" />
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/user_style.css" />
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="/assets/admin/css/gridView.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui.css" />
        <script type="text/javascript" src="/assets/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/assets/js/admin/jquery.collapsible.min.js"></script>
        <script type="text/javascript" src="/assets/js/admin/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/Validanguage.js"></script>
        <script type="text/javascript" src="/assets/js/ckeditor/ckeditor.js"></script>        
        <style>
            .h4cls{border-bottom-color: #D5D5D5;border-bottom-style: solid;border-bottom-width: 1px; padding-bottom: 7px;}
            .marginwithcls{width: 250px;margin-bottom: 22px;}
            .button-column {
                width: 85px !important;
            }
            .button-column img{
                padding: 0 1px; 
            }
            .big_form{ width: 100% !important;}  
            .formRight{ width: 80%!important;}
        </style>
        <script>
            //$('#testclick').click(function(){alert('12');});
            function testclick() {
                $(".smallDropdown").toggle();
            }
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>
    <body>
        <!-- Left side content -->
        <div id="leftSide">
            <div class="logo"><a href="#"><img src="" alt="" /></a></div>
            <div class="sidebarSep"></div>
        </div>
        <!-- Right side -->
        <div id="rightSide">
            <div id="mainmenu">
                <!-- Top fixed navigation -->
                <div class="topNav">
                    <div class="wrapper">
                        <div class="userNav">
                            <ul>
                                <li>
                                </li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>    
            </div>
            <div class="resp">
                <div class="cLine"></div>
                <div class="cLine"></div>
            </div>    <!-- Title area -->
            <div class="titleArea">
                <div class="wrapper">
                    <div class="pageTitle"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="line"></div>
            <div class="wrapper">
                <div class="users form">
                    <form action="" id="" method="post" accept-charset="utf-8">
                        <fieldset>
                            <legend>Admin Login</legend>
                            <div class="input text required">
                                <label for="UserUsername">Username</label>
                                <input name="users[username]" maxlength="255" type="text" id="UserUsername" />
                                <?php echo form_error('username', '<div class="form_error">', '</div>'); ?>
                            </div><div class="input password required">
                                <label for="UserPassword">Password</label>
                                <input name="users[password]" type="password" id="UserPassword" />
                                <?php echo form_error('password', '<div class="form_error">', '</div>'); ?>
                            </div>    
                        </fieldset>
                        <div class="submit"><input  type="submit" value="Submit"/></div>
                    </form>
                </div>


            </div>
        </div>
        <div class="clear"></div>
    </body>
</html>
