<?php include "templates/include/header.php" ?>

      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['title'])?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['organisation_id'])?></div>
      <div style="width: 75%;"><?php echo $results['description']?></div>
	  <div style="width: 75%;"><img src="data:image/png;base64,<?php echo  base64_encode($results['article']->image)?>"/></div>
	  <div style="width: 75%;"><?php echo $results['article']->image_name?></div>
      <p class="pubDate">From:  <?php echo $results['fromdate'])?></p>
      <p class="pubDate">To:  <?php echo $results['todate'])?></p>

      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
