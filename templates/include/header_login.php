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

<header class="navbar-fixed-top extra">
    <div class="container">
        <div class="row" style="padding-left:139px">
            <div class="pull-left">
                <div class="span3 width158" style="width:180px">
                    <div class="logo" style="width:inherit">
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
                            <a href="./message.php?action=inbox">INBOX</a>  
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