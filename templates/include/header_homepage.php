<?php session_start();  ?>
<!DOCTYPE html>

<html xmlns:fb="http://ogp.me/ns/fb#" lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <meta property="fb:app_id" content="1434661150080596" />

    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
            <meta property="og:image" content="img/50by50.jpg"/>
        
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <noscript>
    <?php
    if($_GET["action"]!="errorpage")
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?action=errorpage\" />";
    ?>
    </noscript>
    <![endif]-->

        <meta name="keywords" content="volunteer educate poor hobbies weekend bangalore help child theater events organise star live" /><meta name="description" content="Volunteer Ninja! 
| volunteer in NGo | Organise an Event" />
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
	<link rel="stylesheet" type="text/css" href="../../css/isotope.css" />
	<link rel="stylesheet" type="text/css" href="../../css/coder.css" />
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../../css/inner-custom_v3.css" />
	<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="../../css/headerStyle.css" />
        <link rel="stylesheet" type="text/css" href="../../css/jcustom.css" />
        <link rel="shortcut icon" href="http://faviconist.com/icons/6e149e3ac3e2d0f3d22a4918f1668c11/favicon.ico" />
        <script type="text/javascript" src="../../js/jquery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../../js/jquery/bootstrap.js"></script>
        <script type="text/javascript" src="../../js/jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/jquery/jquery.validate_v2.js"></script>
        <script type="text/javascript" src="../../js/jquery/jquery.validation.functions.js"></script>
        <script type="text/javascript" src="../../js/jquery/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="../../js/jquery/radio-button.js"></script>
        <script type="text/javascript" src="../../js/jplayer/jquery.jplayer.min.js"></script>
        <script type="text/javascript" src="../../js/jplayer/jplayer.playlist.min.js"></script>
        <script type="text/javascript" src="../../js/jplayer/jquery.fancybox-1.3.4.js"></script>
        <script type="text/javascript" src="../../js/jquery/easySlider1.7.js"></script>
        <script type="text/javascript" src="../../js/jquery/custom.js"></script>    
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="/css/ie.css"/>
    <![endif]-->
</head>
<body>
<script>
    $(document).ready(function () {
        // used for login pop up
//        $("#myModal").modal('hide');
        $("a.login_button").click(function (event) {
            event.preventDefault();
            $('div#sign_in_page').removeClass('hide');
            $("#myModal").modal('show');
        });
    });
</script>

<script type="text/javascript"> 
//<![CDATA[

		function showResult(str)
		{
		if (str.length==0)
		{ 
		document.getElementById("results").innerHTML="";
		document.getElementById("results").style.border="0px";
		return;
		}
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("results").innerHTML=xmlhttp.responseText;
		document.getElementById("results").style.border="1px solid #A5ACB2";
		}
		}
		xmlhttp.open("GET","get.php?q="+str,true);
		xmlhttp.send();
		}
//]]>
	</script>

<div id="fb-root"></div>
    <script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1434661150080596";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
    </script>
<div id='sign_in_page' class='hide'>
    <script type="text/javascript">
    jQuery(function () {
        jQuery("#input03").validate({
            expression:"if (VAL) return true; else return false;",
            message:"Please enter user name"
        });
        jQuery("#input03").validate({
            expression:"if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
            message:"Please enter valid email address"
        });
        jQuery("#input04").validate({
            expression:"if (VAL) return true; else return false;",
            message:"Please enter your password"
        });
        jQuery("#input04").validate({
            expression:"if (VAL.match(/[a-zA-Z0-9]$/)) return true; else return false;",
            message:"Password should be alphanumeric"
        });
    });
</script>

<!--Section-->

<div class="modal fade popup hide" id="myModal">
        <div class="modal-body">
        <button class="close closeIcon closeMsg close-signin" data-dismiss="modal"></button>
        <div class="facebook-signin">
            <div class="row-gray">
               <span class="fb-heading">Sign in With Facebook</span>
            </div>

            <a href="fblogin.php" class="signin-fb"></a>
            <span>Don't have an account on VolunteerNinja?<a href="./?action=register" class='sign_in_text'> Create One!</a></span>

        </div>


        <div class="signin-box">
            <form name="form" action="./?action=login" id="UserDashboardForm" method="post" accept-charset="utf-8"><div style="display:none;">
               <input type="hidden" name="_method" value="POST"/></div>            
               <label for="input03">Email Address </label>
            <div class="input text">
               <input name="email" class="input-xlarge input-box" id="input03" maxlength="255" type="text" pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*)" required/></div>            
               <label for="input04">Password </label>
            <div class="input password"><input name="password" class="input-xlarge input-box" id="input04" type="password" maxlength="20" pattern="^.{5,20}$"  required/></div>            <div class="clearfix"></div>
            <div class="submit">
              <input  name="signin" class="btn pull-right sub-btn" onclick="" type="submit" value="SIGN IN"/></div>
           </form>            
        <div class="forgot-pass">
            <a href="./?action=forgot" id="forgot_password_id">Forgot password</a>                </div>
        </div>
            </div>
<!--    <center>--><!--</center>-->
    <!-- form left end here -->
</div>
<!-- row end here -->


</div>
<header class="navbar-fixed-top extra" style="z-index:2147483647">
    <div class="container">
        <div class="row">
            <div class="pull-left">
                <div class="span3 width158" style="width:180px">
                    <div class="logo" style="width:inherit; padding-top:3px">
                        <h1 class="transitionEffect">
                        <a href="/" title="VOLUNTEER NOW!">VOLUNTEER NOW!</a></h1>
                    </div>
                </div>

                    <div class="span3 width178">
                         


                       <form action="" class="form-search" name="searchForm"><input class="search-query" placeholder="Search" title="Search" type="text" onKeyUp="showResult(this.value)"/> </form>
                      <div id="results" style="background: #fff; color: #333;text-transform: capitalize;"></div>
               
                       </div>
                        </div>

                            <div class="pull-right">
                     
 <?php if(isset($_SESSION["loggedin"])){ ?>
                    <div class="span3 borderLeft">
                        <div class="title"><a href="./?action=addevent">ADD EVENT</a>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="title">
                            <a href="./?action=inbox">INBOX</a>  
                            <?php $result=mysql_query("SELECT id,sender_email,subject,time  FROM messages where recipient_email='$_SESSION[email]' and  `read`=false");
                            ?>
                                                      <span class="grayBtn orange">
<?php echo mysql_num_rows($result)?></span></div>
                    </div>
                    <div class="span3 user">
                        <div class="title">
                            <div class="btn-group"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="pull-left"><?php echo $_SESSION["name"] ?> </span>
                                    <span class="dropdownIcon"></span> </a>
                                <ul class="dropdown-menu custom-menu">
                                    
                                    
                                    <li><a href="./?action=profile">My Profile</a></li>
                                    <li><a href="./?action=myevents">My Events</a></li>
                                    <li><a href="./?action=changepassword">Change Password</a></li>
                                    
                                    <li class="lastLink"><a href="./?action=logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
<?php } else{ ?>



                    <div class="span3 borderLeft">
				     <div class="span3">
                        <div class="title">
                            <a href="./?action=addevent">ADD EVENT</a>                         
						</div>
                      </div>
					  <div class="span3 user">
                        <div class="title">
                      <div class="btn-group">                   
                                        <a href="/" class="login_button dropdown-toggle">LOGIN</a>                                    
                                    <?php
                                    }
			      ?>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                  

                    </div>
    </div>

</header>
</body>
</html>