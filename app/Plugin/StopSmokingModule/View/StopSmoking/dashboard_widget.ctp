<div class="thumbnail">
	<div class="caption">
		<h4>My smoke free days over recent weeks</h4>
	</div>
	<?php 
		echo $this->Html->image(
			'/img/ajax-loader.gif', 
			array(
				'alt' => 'Loading',
    			'url' => array('action' => 'view_records'),
				'class' => 'img-responsive',
				'id' => 'stopsmoking-minigraph'
			)
		);
	?>
</div>
<div class="achievements">
	<h3>My weekly achievements</h3>
	<?php echo $this->requestAction(array('action'=> 'dashboard_achievements')); ?>
</div>
<?php echo $this->Html->link(__('Add weekly record <span class="glyphicon glyphicon-plus"></span>'), array('action' => 'data_entry', date("Ymd")),array('class' => 'btn btn-success btn-md pull-right', 'escape' => false)); ?>

<script type="text/javascript">
<!--
$(document).ready(function() {
	graphLoader('/stop_smoking_module/stop_smoking/minigraph', 'My smoke free days over recent weeks', 'img-responsive', '#stopsmoking-minigraph');
});
//-->
</script>