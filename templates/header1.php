<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.oklisten.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 22 Feb 2014 07:10:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
                OK Listen! | Discover & Buy music from Independent musicians | Artists keep 70% revenue | Support the musicians you love | Home
    </title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
            <meta property="og:image" content="img/50by50.jpg"/>
        
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <meta name="keywords" content="OK Listen, oklisten, digital music, free music samples, online music, independent, indie, India" /><meta name="description" content="OK Listen! | Discover &amp; Buy music from Independent musicians | Artists keep 70% revenue | Support the musicians you love" />
	<link rel="stylesheet" type="text/css" href="../css/isotope.css" />
	<link rel="stylesheet" type="text/css" href="../css/coder.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="../dsmwuevg6fec3.cloudfront.net/css/jPlayer/skin/pink.flag/jplayer.pink.flag.css" />
	<link rel="stylesheet" type="text/css" href="../css/headerStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jcustom.css" />
        <script type="text/javascript" src="../js/jquery/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery/bootstrap.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery-ui.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.validate_v2.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.validation.functions.js"></script>
        <script type="text/javascript" src="../js/jquery/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="../js/jquery/radio-button.js"></script>
        <script type="text/javascript" src="../js/jplayer/jquery.jplayer.min.js"></script>
        <script type="text/javascript" src="../js/jplayer/jplayer.playlist.min.js"></script>
        <script type="text/javascript" src="../js/jplayer/jquery.fancybox-1.3.4.js"></script>
        <script type="text/javascript" src="../js/jquery/easySlider1.7.js"></script>
        <script type="text/javascript" src="../js/jquery//custom.js"></script>    
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

            <a href="users/facebook_login.html" class="signin-fb"></a>
            <span>Don't have an account on VolunteerNinja?<a href="users/register.html" class='sign_in_text'> Create One!</a></span>

        </div>


        <div class="signin-box">
            <form name="form" action="login.php" id="UserDashboardForm" method="post" accept-charset="utf-8"><div style="display:none;">
               <input type="hidden" name="_method" value="POST"/></div>            
               <label for="input03">Email Address </label>
            <div class="input text">
               <input name="data[User][username]" class="input-xlarge input-box" id="input03" maxlength="255" type="text" pattern="([a-zA-Z0-9._-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*)" required autofocus/></div>            
               <label for="input04">Password </label>
            <div class="input password"><input name="data[User][password]" class="input-xlarge input-box" id="input04" type="password" maxlength="20" pattern="^.{5,20}$"  required/></div>            <div class="clearfix"></div>
            <div class="submit">
              <input  class="btn pull-right sub-btn" onclick="" type="submit" value="SIGN IN"/></div>
           </form>            
        <div class="forgot-pass">
            <a href="users/forgot_password.html" id="forgot_password_id">Forgot password</a>                </div>
        </div>
            </div>
<!--    <center>--><!--</center>-->
    <!-- form left end here -->
</div>
<!-- row end here -->


</div>
<header class="navbar-fixed-top extra">
    <div class="container">
        <div class="row">
            <div class="pull-left">
                <div class="span3 width158">
                    <div class="logo">
                        <h1 class="transitionEffect">
                        <a href="/" title="OK Listen!">OK LISTEN!</a></h1>
                    </div>
                </div>

                    <div class="span3 width178">
                        <form action="https://www.oklisten.com/search" class="form-search" id="SearchDashboardForm" method="get" accept-charset="utf-8"><input name="q" class="search-query" placeholder="Search" title="Search" type="text" id="SearchInput"/></form>                    </div>
              
            </div>
                            <div class="pull-right">
                    <div class="span3 borderLeft">
                        <div class="btn-group">
                            <div class="title">
                                <div class="btn-group">
                                    <a href="index.html" class="login_button dropdown-toggle">LOGIN</a>                                    <!--                            <span class="pull-left"><a href="/users/register" >Sign-up</a></span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
    </div>

</header>
<script type="text/javascript">
    $(document).ready(function ($) {
        $("a#payment_type").fancybox({
// 'titlePosition' : 'inside',
            'width':'600',
            'height':'320',
            'overlayColor':'#030303',
            'autoScale':false,
            'transitionIn':'elastic',
            'transitionOut':'elastic',
            'autoDimensions':false,
            'titleShow':false

        });
    });
</script>
<!--Section-->

<section class="extraMarTop">
    <div id="container" class="clickable clearfix">
        <div class="element sliderHolder">
    <div id="slider">
        <ul>
            <!-- Commenting out the Homepage "Liberating Music" static image from the carousel"
            <li><img src="images/img/homepagebox.png" alt="Home Page"></li> -->
            <li><a href="yourchin.html"><img src="images/img/52ea6345-cdb0-41fa-b34e-72880af4fd84/468by468/468.jpg" alt="" /></a></li><li><a href="thedowntroddence.html"><img src="images/img/52c188c8-ea8c-406d-b3e6-6c6e0af4fd84/468by468/colour.jpg" alt="" /></a></li><li><a href="bestof.html"><img src="images/img/50de625c-d0f8-4a1e-a9bb-55800af429d8/468by468/best_of_logo_vol3468x468.jpg" alt="" /></a></li><li><a href="indianocean.html"><img src="images/img/50336908-a97c-44be-b08a-19440a904136/468by468/468.jpg" alt="" /></a></li><li><a href="RaghuDixit.html"><img src="images/img/4ff09e28-c8c0-40bb-8e14-45c20a904136/468by468/468.jpg" alt="" /></a></li><li><a href="shekhar.html"><img src="images/img/51ca6cd0-fa08-4e7f-b47d-15f40af4fd84/468by468/468_a.jpg" alt="" /></a></li><li><a href="nischayparekh.html"><img src="images/img/524eb154-02ac-4c45-9a5d-55ae0af4fd84/468by468/468.jpg" alt="" /></a></li><li><a href="vasudasharma.html"><img src=images/img/5243fe91-7a3c-430c-9655-2ef60af4fd84/468by468/468.jpg" alt="" /></a></li><li><a href="sanjeevt.html"><img src="images/img/52414042-6a6c-4fa0-8f23-53890af4fd84/468by468/468.jpg" alt="" /></a></li><li><a href="tajdarjunaid.html"><img src="images/img/5209c088-a250-449e-a3cd-4b790af4fd84/468by468/468x468.jpg" alt="" /></a></li><li><a href="kaivalyaa.html"><img src="images/img/51cd68ec-d480-42cd-ab6a-7a430af4fd84/468by468/468.jpg" alt="" /></a></li><li><a href="sonamkalra.html"><img src="images/img/51937d4e-67f8-4050-b824-32dd0af4fd84/468by468/468x468.jpg" alt="" /></a></li>        </ul>
    </div>
    <div class="stillThumb clearfix">
        <div class="thumbFirst">
                        <div class="box">
                                <a href="payment.html" target="_blank">
                    <img src="../d3dzadow5k0y91.cloudfront.net/ads/501bbd93-dbdc-432a-bdbf-32df0a904136/ad3_232.png" alt="" />                </a>
                            </div>
                    </div>
        <div class="thumbLast">
            <div class="box">
                                <a href="credits/show_credit_plans/index.html" target="_blank">
                    <img src="../d3dzadow5k0y91.cloudfront.net/ads/527e5dc5-83ec-47e6-820e-1dcc0af4fd84/orchardad_232.png" alt="" />                </a>
                            </div>

        </div>
    </div>
</div>        <!--        New album -->
                    <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/5300c98f-18bc-46ed-82f8-3f550af4fd84/232by232/232_copy.jpg" class="gray" alt="" /><a href="compilation/high_five_with_music_aloud.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/5300c98f-18bc-46ed-82f8-3f550af4fd84/232by232/mixtape_5_logo_big.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="5300c98f-18bc-46ed-82f8-3f550af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="compilation/high_five_with_music_aloud.html">High Five with Musi...</a><br/>by        
        <a href="musicaloud.html" class="album-link">Music Aloud</a>    </p>
        <div class="captionRupee">
        75    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <a href="top_charts.html"><img src="images/img/topCharts.png" alt="Ok listen" class="gray" /></a>
                </div>
                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/53061423-dc54-447e-a113-68d70af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/eclectica_1_0_series.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/53061423-dc54-447e-a113-68d70af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="53061423-dc54-447e-a113-68d70af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/eclectica_1_0_series.html">Eclectica 1.0 Series</a><br/>by        
        <a href="eclectica.html" class="album-link">Eclectica Project</a>    </p>
        <div class="captionRupee">
        49    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/52fcad83-0738-477e-ac4d-1f900af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/growing_suspicions.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/52fcad83-0738-477e-ac4d-1f900af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="52fcad83-0738-477e-ac4d-1f900af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/growing_suspicions.html">Growing Suspicions</a><br/>by        
        <a href="aswekeepsearching.html" class="album-link">As We Keep Searching</a>    </p>
        <div class="captionRupee">
        100    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/52f4f932-63c0-45d3-aa12-264d0af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/tbc_live_at_teatro_bismantova_italy.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/52f4f932-63c0-45d3-aa12-264d0af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="52f4f932-63c0-45d3-aa12-264d0af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/tbc_live_at_teatro_bismantova_italy.html">TBC Live at Teatro ...</a><br/>by        
        <a href="tarunbalani.html" class="album-link">Tarun Balani Collective</a>    </p>
        <div class="captionRupee">
        100    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box song_of_week_cursor">
                                        <a href="album/saavli.html" target="_blank">
                        <img src="../d3dzadow5k0y91.cloudfront.net/ads/501bbea1-f120-499e-b82f-333a0a904136/232x232_SRK.jpg" alt="" />                    </a>
                                    </div>
                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/52f1cb6e-3830-47ea-ad30-493f0af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/the_day_job.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/52f1cb6e-3830-47ea-ad30-493f0af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="52f1cb6e-3830-47ea-ad30-493f0af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/the_day_job.html">The Day Job</a><br/>by        
        <a href="greenrhapsody.html" class="album-link">Green Rhapsody</a>    </p>
        <div class="captionRupee">
        84    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/52eb23de-a0b4-412b-bb6e-7ae60af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/scatter_nature.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/52eb23de-a0b4-412b-bb6e-7ae60af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="52eb23de-a0b4-412b-bb6e-7ae60af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/scatter_nature.html">Scatter Nature</a><br/>by        
        <a href="yourchin.html" class="album-link">Your Chin</a>    </p>
        <div class="captionRupee">
        40    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/52e23d67-200c-4129-9e18-08540af4fd84/232by232/gray.jpg" class="gray" alt="" /><a href="album/all_indians_arise_single.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/52e23d67-200c-4129-9e18-08540af4fd84/232by232/colour.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="52e23d67-200c-4129-9e18-08540af4fd84" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a><span class="newTag"></span>

<div class='caption'>
    <p class='captionInside'>
        <a href="album/all_indians_arise_single.html">All Indians Arise -...</a><br/>by        
        <a href="kcloy.html" class="album-link">K C Loy</a>    </p>
        <div class="captionRupee">
        15    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/5075d152-1e70-42e0-bf7a-361e0a904136/232by232/Cover_232.jpg" class="gray" alt="" /><a href="album/the_inner_self_awakens.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/5075d152-1e70-42e0-bf7a-361e0a904136/232by232/1349898578_Cover_468.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="5075d152-1e70-42e0-bf7a-361e0a904136" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a>
<div class='caption'>
    <p class='captionInside'>
        <a href="album/the_inner_self_awakens.html">The Inner Self Awakens</a><br/>by        
        <a href="agam.html" class="album-link">Agam</a>    </p>
        <div class="captionRupee">
        72    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/50b51d32-8af8-4cf5-91ef-24b50af429d8/232by232/Cover_232.jpg" class="gray" alt="" /><a href="album/sacred_world.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/50b51d32-8af8-4cf5-91ef-24b50af429d8/232by232/1354046770_Cover_468.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="50b51d32-8af8-4cf5-91ef-24b50af429d8" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a>
<div class='caption'>
    <p class='captionInside'>
        <a href="album/sacred_world.html">Sacred World</a><br/>by        
        <a href="tarunbalani.html" class="album-link">Tarun Balani Collective</a>    </p>
        <div class="captionRupee">
        120    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box song_of_week_cursor">
                                        <a href="philosophy.html" target="_blank">
                        <img src="../d3dzadow5k0y91.cloudfront.net/ads/501bbdd8-a970-46c7-a604-33310a904136/aristShareAd_232.png" alt="" />                    </a>
                                    </div>
                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/4ff536ab-badc-41a7-95cd-7c8c0a904136/232by232/fccdface_232_x_232_bnw.jpg" class="gray" alt="" /><a href="album/full_circle.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/4ff536ab-badc-41a7-95cd-7c8c0a904136/232by232/fccdface_468_x_468.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="4ff536ab-badc-41a7-95cd-7c8c0a904136" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a>
<div class='caption'>
    <p class='captionInside'>
        <a href="album/full_circle.html">Full Circle</a><br/>by        
        <a href="sanjaydivecha.html" class="album-link">Sanjay Divecha</a>    </p>
        <div class="captionRupee">
        150    </div>
    </div>                </div>

                
            </div>

                        <div class="element">
                                <div class="box">
                    <img src="../d3dzadow5k0y91.cloudfront.net/albums/50a5fc27-cc20-48bd-98fd-635c0af429d8/232by232/Cover_232.jpg" class="gray" alt="" /><a href="album/dream_out_loud.html"><img src="../d3dzadow5k0y91.cloudfront.net/albums/50a5fc27-cc20-48bd-98fd-635c0af429d8/232by232/1353055271_Cover_468.jpg" class="color" alt="" /></a>
<a href="javascript:void(0)" class="playIcon songQueue" title="Preview"
   rel="50a5fc27-cc20-48bd-98fd-635c0af429d8" data-url="/albums/get_album_songs/"></a>
<a href="javascript:void(0)" class="login_button downloadIcon" title="Buy"></a>
<div class='caption'>
    <p class='captionInside'>
        <a href="album/dream_out_loud.html">Dream Out Loud</a><br/>by        
        <a href="allegrofudge.html" class="album-link">Allegro Fudge</a>    </p>
        <div class="captionRupee">
        20    </div>
    </div>                </div>

                
            </div>

            
    </div>
        <a href="javascript:void(0)" class="loadMoreBtn" id="LoadMoreButton" onclick="$.ajax({async:true, beforeSend:function (XMLHttpRequest) {$(&quot;#busy-indicator&quot;).fadeIn();}, complete:function (XMLHttpRequest, textStatus) {$(&quot;#busy-indicator&quot;).fadeOut();}, data:{album_ids : [&quot;5300c98f-18bc-46ed-82f8-3f550af4fd84&quot;,&quot;53061423-dc54-447e-a113-68d70af4fd84&quot;,&quot;52fcad83-0738-477e-ac4d-1f900af4fd84&quot;,&quot;52f4f932-63c0-45d3-aa12-264d0af4fd84&quot;,&quot;52f1cb6e-3830-47ea-ad30-493f0af4fd84&quot;,&quot;52eb23de-a0b4-412b-bb6e-7ae60af4fd84&quot;,&quot;52e23d67-200c-4129-9e18-08540af4fd84&quot;,&quot;5075d152-1e70-42e0-bf7a-361e0a904136&quot;,&quot;50b51d32-8af8-4cf5-91ef-24b50af429d8&quot;,&quot;4ff536ab-badc-41a7-95cd-7c8c0a904136&quot;,&quot;50a5fc27-cc20-48bd-98fd-635c0af429d8&quot;,&quot;527e5dc5-83ec-47e6-820e-1dcc0af4fd84&quot;,&quot;501bbea1-f120-499e-b82f-333a0a904136&quot;,&quot;501bbdd8-a970-46c7-a604-33310a904136&quot;,&quot;501bbd93-dbdc-432a-bdbf-32df0a904136&quot;]}, div:false, success:function (data, textStatus) {$(&quot;#container&quot;).isotope( &quot;insert&quot;, $(data) );$(&quot;#LoadMoreButton&quot;).hide()}, type:&quot;GET&quot;, url:&quot;\/albums\/load_more&quot;});">LOAD MORE</a><span id='busy-indicator' class='hide'><img src="images/img/ajax-loader.gif" alt="" /></span>

    </section>
<div class="clearfix"></div>

<!--<a href="#" class="loadMoreBtn">LOAD MORE</a>-->


<div class="clearfix"></div><div class="musicTypeHolder">
    <div class="musicType clearfix">

                    <ul>
                                <li><a href="genre/rock.html">Rock</a>
                </li>
                                <li><a href="genre/folk_rock.html">Folk Rock</a>
                </li>
                                <li><a href="genre/fusion.html">Fusion</a>
                </li>
                                <li><a href="genre/hindi_rock.html">Hindi Rock</a>
                </li>
                                <li><a href="genre/electronic.html">Electronic</a>
                </li>
                            </ul>
                        <ul>
                                <li><a href="genre/alternative_rock.html">Alternative Rock</a>
                </li>
                                <li><a href="genre/folk_1.html">Folk</a>
                </li>
                                <li><a href="genre/jazz.html">Jazz</a>
                </li>
                                <li><a href="genre/blues.html">Blues</a>
                </li>
                                <li><a href="genre/indian_folk.html">Indian Folk</a>
                </li>
                            </ul>
                        <ul>
                                <li><a href="genre/electro_acoustic.html">Electro-Acoustic</a>
                </li>
                                <li><a href="genre/soft_rock.html">Soft Rock</a>
                </li>
                                <li><a href="genre/hard_rock.html">Hard Rock</a>
                </li>
                                <li><a href="genre/progressive.html">Progressive</a>
                </li>
                                <li><a href="genre/electro_folk.html">Electro Folk</a>
                </li>
                            </ul>
            
        <ul class="capitalize">
            <li><a href="top_charts.html">New Releases</a></li>
            <li><a href="top_charts.html">Top Selling Albums</a></li>
            <li><a href="top_charts.html">Top Artists</a></li>
            <li><a href="top_charts.html">Top singles</a></li>
        </ul>
    </div>
</div>
<div class="musicTypeHolder musicTypeWhiteHolder">
    <div class="musicType clearfix">
        <ul>
            <li><strong>About us</strong></li>
            <li><a href="about_us.html">What is OK Listen?</a></li>
            <li><a href="philosophy.html">Our Philosophy</a></li>
            <li><a href="team.html">Team</a></li>
            <li><a href="friends.html">Our Friends</a></li>
            <li><a href="contact_us.html">Contact</a></li>
            <li><a href="http://blog.oklisten.com/" target="_blank">Blog</a> </li>
        </ul>
        <ul>
            <li><strong><a href="users/login.html">My account</a>            </strong></li>
            <li><a href="users/login.html">My Wallet</a> </li>
            <li> <a href="users/login.html">Shopping cart</a> </li>
            <li><a href="users/login.html">My Preferences</a></li>
            <li> <a href="users/login.html">Order History</a></li>
            <li><a href="redeem.html">Reedem Music Card</a></li>
        </ul>
        <ul>
            <li><strong>For Bands</strong></li>
            <li><a href="band_sign_up.html">Sign up with us</a></li>
            <li><a href="credits/show_credit_plans.html">Pricing Plans</a></li>
            <li><a href="faq.html">FAQs</a></li>

        </ul>
        <ul>
            <li><strong>How it works</strong></li>
            <li><a href="payment.html">Payment Options</a></li>
            <li><a href="faq_normal.html">FAQs</a></li>
<!--            <li><a href="javascript:void(0)">FAQs</a></li>-->
        </ul>
    </div>
</div>


<!--Footer-->
<div class="relative">
  <div class="msg bottom bigMsg">
    <div class="msgText clearfix"> <span>Musicians earn 70% of the net price of their music being sold on OK Listen | Support musicians you love | Buy legal music at <a href="index.html">www.oklisten.com</a></span> </div>
  </div>
</div>
<footer>
    <div class="container">
        <div class="copyRightText">&copy; OK Listen Media India Pvt Ltd 2014</div>
        <ul class="netIcons clearfix">
            <li><a href="privacy_policy.html" class="terms_use">Privacy Policy</a> |</li>
            <li><a href="terms_of_use.html" class="terms_use">Terms of Use</a></li>
            <li><a href="http://www.facebook.com/oklisten" title="Facebook" class="facebookIcon transitionEffect" target="_blank">Facebook</a></li>
            <li><a href="http://twitter.com/#!/oklistenIN" title="Twitter" class="twitterIcon transitionEffect" target="_blank">Twitter</a></li>
        </ul>
    </div>
</footer><div id="jp_container_N" class="jp-video jp-video-270p hidePlayer">
    <div class="jp-type-playlist">
        <div id="jquery_jplayer_N" class="jp-jplayer"></div>
        <div class="jp-gui">
            <div class="jp-interface">
                <div class="jp-title">
                    <ul>
                        <li></li>
                    </ul>
                </div>
                <div class="playerLeft">
                    <div class="jp-controls-holder">
                        <a class="oklisten-logo">
                            oklisten
                        </a>
                        <ul class="jp-controls">
                            <li><a href="javascript:void(0);" class="jp-previous" tabindex="1">previous</a></li>
                            <li><a href="javascript:void(0);" class="jp-play" tabindex="1">play</a></li>
                            <li><a href="javascript:void(0);" class="jp-pause" tabindex="1">pause</a></li>
                            <li><a href="javascript:void(0);" class="jp-next" tabindex="1">next</a></li>
                        </ul>
                    </div>
                    <div class="player-separator"></div>
                </div>
                <div class="playerCenter">
                    <div class="now-playing">
                        <strong>Now Playing:</strong>
                        <span class="playListBtn close"></span>
                        <span class="now-playing-text"></span>
                    </div>
                    <div class="jp-current-time"></div>
                    <div class="jp-progress">

                        <div class="jp-seek-bar">
                            <div class="jp-play-bar">

                                <b id="pb-start"></b>
                                <b id="pb-end"></b>
                            </div>
                        </div>
                    </div>

<!--                    <div class="jp-duration"></div>-->

                </div>
                <div class="playerRight">
                    <div class="player-separator"></div>
<!--                    <div class="player_pin"></div>-->
                    <ul class="jp-controls">
                        <li><a href="javascript:void(0);" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                        <li><a href="javascript:void(0);" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                        <li><a href="javascript:void(0);" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                    </ul>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
        <div class="jp-playlist" id="playlist" style="display: none;">
            <a href="#" class="openClose"></a>
            <strong class="currentPlayList">Current Playlist</strong>
            <ul>
                <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                <li></li>
            </ul>
        </div>
        <div class="jp-no-solution">
            <span>Update Required</span>
            To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        </div>
    </div>
</div>
<script type="text/javascript" data-cfasync="false">
    //<![CDATA[
    $(document).ready(function(){
        $(".playListBtn").click(function () {
            if($(this).hasClass('close')){
                $("#playlist").slideDown("slow");
                $(this).removeClass('close');
            }else{
                $("#playlist").slideUp("slow");
                $(this).addClass('close');
            }
        });
        $('#playlist .currentPlayList, #playlist a.openClose').click(function(){
            $("#playlist").slideUp("slow");
            $('.playListBtn').addClass('close');
        });
    });
    //]]>
</script>
<script type="text/javascript" data-cfasync="false">
    //<![CDATA[
    $(document).ready(function () {
        $('#flashMessage').delay(10000).slideUp('slow');

        // used for login pop up
        $('a.login_button').live('click', function () {
            $('div#sign_in_page').removeClass('hide');
            $("#myModal").modal('show');
        });

        $('.similar-album a').tooltip(function () {
            placement: 'bottom'
        });


        //Used to intialize player
        var myPlaylist = new jPlayerPlaylist({
                jPlayer:"#jquery_jplayer_N",
                cssSelectorAncestor:"#jp_container_N"
            },
            [],
            {
                playlistOptions:{
                    autoPlay:true,
                    enableRemoveControls:true
                },
                swfPath:"https://dsmwuevg6fec3.cloudfront.net/js/jPlayer/Jplayer.swf",
                supplied:"mp3"
            });

        $('.songQueue').live('click', function () {
            var playData = $(this).attr('rel');
            var url = $(this).attr('data-url');


            $.ajax({
                type:"POST",
                url:url,
                data:{referenceId:playData},
                success:function (response) {
                    response = jQuery.parseJSON(response);

                    myPlaylist.setPlaylist();

                    //Pushing Songs Queue to Playlist
                    jQuery.each(response, function (key, value) {
                        myPlaylist.add({
                            'title':value.Song.name,
                            'artist':value.ArtistSong,
                            'mp3':'https://d3dzadow5k0y91.cloudfront.net/songs/' + value.Song.id + '/preview/' + value.UploadSong
                        });
                    });
                    myPlaylist.play();

                    $('#jp_container_N').show();
                }
            });
        });
    });

    function cart_alert() {
        alert("Item is already added in the cart!!");
    }

</script>
<script type="text/javascript" data-cfasync="false">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-28792190-1']);
    //Set samping rate to 75% of visitors for site speed stats
    _gaq.push(['_setSiteSpeedSampleRate', 75]);    
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
</body>

<!-- Mirrored from www.oklisten.com/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 22 Feb 2014 07:14:06 GMT -->
</html>