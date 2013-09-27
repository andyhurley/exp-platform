<?php
	if($medal != "") {
		?>
		<div class="col-md-12 news">
			<div class="alert alert-dismissable alert-info">
		  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><strong>Congratulations, You have earned your <?php echo $medal; ?> medal!</strong></h4>
				<?php
				echo $this->Html->image(
						'Medal-'. $medal .'-icon.png',
						array('alt' => $medal . ' Medal', 'class' => 'img-thumbnail pull-left')
				);

				if($medal == 'Bronze') {
				?>
					<p>Congratulations &ndash; you have achieved the bronze medal for being smoke-free for the last <?php echo $consecutive_weeks; ?> weeks.</p>
				<?php 
				} elseif ($medal == 'Silver') {
				?>
					<p>Congratulations and well done. You have achieved the silver medal for maintaining a smoke-free lifestyle for the last <?php echo $consecutive_weeks; ?> weeks.</p>
					<p>How are you feeling now? You should be feeling better and starting to notice some differences in your body and health!</p>
				<?php 
				} elseif ($medal == 'Gold') {
				?>
					<p>Congratulations, you are a Stop Smoking champion and have achieved the gold medal which is fantastic. You have successfully maintained a smoke-free lifestyle for the last <?php echo $consecutive_weeks; ?> weeks.</p>
					<p>This shows you have made a great effort to build some changes into your lifestyle. If you can maintain these changes, why not add another health module to your dashboard and make more positive changes?</p>
				<?php 
				}
				?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php
	}
?>
