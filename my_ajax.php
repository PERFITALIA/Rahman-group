<?php
require("array.php");
if(isset($_POST['action'])){
	$action =  $_POST['action'];
	if($action == "getBod"){
		$id = $_POST['id'];
		if(!isset($bodd['other-details-'.$id])){
			echo "<p>No Data Found.</p>";
		}
		?>

		<?php if(isset($bodd['other-details-'.$id])){ ?>
			<div class="bod-details">
				<?php foreach($bodd['other-details-'.$id] as $row){ ?>
					<div class="bdnm">
						<div class="col-md-3"> 
							<div class="bod-box">
<img class="img-responsive" src="<?php echo $row['img']; ?>"/>
<div class="bod-text">
	<h4><?php echo $row['name']; ?></h4>
	<p><?php echo $row['desg']; ?></p>
</div>
</div>
						</div>
						
						<div class="bdnmd col-md-9">
							<p><?php echo $row['descr']; ?></p>
						</div>
						
					</div>
					
				<?php }?>
			</div><!--event-slider-->  
		<?php } ?>
		<?php
	}
}else{
	echo "<p>Page Not Found.</p>";
}



?>