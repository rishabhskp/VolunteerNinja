<?php include_once "templates/include/header_homepage.php";
?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53488b501f2d6f3b"></script>
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
     <div class="container navbar-fixed-top" style="width:inherit;background-color:#FEE252; height:30px;padding-left:15px;top:39px;font-family:castellar; align:middle;">
				<ul class="unstyled ventures1" style="height:inherit; padding-top:10px;">
                                     <?php
                                        $result=mysql_query("SELECT distinct category FROM events");
                                        if($result === FALSE) {
                                                  die(mysql_error()); // TODO: better error handling
                                        }
                                        while ($myrow = mysql_fetch_array($result)){	
	  	                        ?> 
					<li style="display:inline; padding-top:4px;height:inherit; margin-right:23px;font-size:20px;"><b><a href="#<?php echo strtoupper($myrow[0]);?>" style="color:#6D6D6D;font-family:"bodoni MT condensed"><?php echo strtoupper($myrow[0]);?> </b> <?php } ?></a></li>					
				</ul>
    </div>
    <div id="container" class="clickable clearfix" style="width:inherit !important; margin:0 auto;top:32px;">
        <div class="element sliderHolder" style="'width:inherit' !important">
    <div id="slider" style="'width:inherit' !important">
       <a href=""><img src="images/img/mainLogo.png" alt="" style="width:1175px; height:250px;"/></a></li>     
    </div>  
</div>        <!--        New album -->
<?php
	  	$result=mysql_query("SELECT distinct category FROM events");
                $counter =0;
		if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}

	  	while ($myrow = mysql_fetch_array($result)){	
                 if($counter != 0)
                 { 
                      $counter = $counter + 1;
                      if($counter %5 != 0)
                      {
                           $counter = $counter % 5;
                           $counter = 5 - $counter;
                           for($i=0;$i<$counter;$i++) 
                           { ?>  
                                <div style="width:inherit; height:20px"></div>
                                <div class="element">
                                           <div class="box"></div>
                                </div>
                                             
                          <?php  }
                      }
                 }
	  	?>
				<div class="element">
                                           <div class="box">
                                                
						<img id="<?php echo strtoupper($myrow[0])?>" src="images/img/orange.png" alt="<?php echo $myrow[0]?>" class="category " />
                                                <div class="caption genre-caption">
                                                    <p class="captionInside"> <?php echo $myrow[0];?> </p>
                                                </div>
                                            </div>
				         </div>
	  	<?php
	  	$events=array();
	  	$events=mysql_query("SELECT e.event_id, e.title, e.fromdate, org.name, v.area FROM events e join organisations org on e.organisation_id = org.organisation_id join venue v on v.venue_id = e.venue_id WHERE e.category='$myrow[0]' ORDER BY e.fromdate");
                 $counter = mysql_num_rows($events);
	  	while($row = mysql_fetch_array($events)){
                       
	  		$fromdate = date("j M", strtotime($row['fromdate']));
	  ?>
                    <div class="element">
                                <div class="box"  style="border: 1px solid #DBDBDB; width:auto">
                               
                               <img src="images/events/event_<?php echo $row[event_id]?>.jpg"  alt="" style="height:250px; width:240px" /><a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>"><img src="images/events/event_<?php echo $row[event_id]?>.jpg" class="color" alt="" style="height:250px; width:240px" /></a>
									<div class='caption'>
										<p class='captionInside'>
										<a href=".?action=viewEvent&eventId=<?php echo $row['event_id'];?>"><?php echo htmlspecialchars($row['title']);?></a><br/>by        
										<?php echo $row['name'];?></br>@ 
                                                                              <b><?php echo $row['area'];?></b>                                                                                </p>
										<div class="captionRupee"><?php echo $fromdate;?></div>
                                                                                
									</div> 
								</div>

                
					</div>
					
		<?php } }?>	

                        

            
    </div>      
    </section>
<div class="clearfix"></div></div>

<!--<a href="#" class="loadMoreBtn">LOAD MORE</a>-->


<?php include "templates/include/footer_new.php" ?>