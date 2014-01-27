<div class="thumbnail">
	<div class="caption">
		<h4>My 5-a-day over recent weeks</h4>
	</div>
	<?php 
		echo $this->Html->image(
			'/img/ajax-loader.gif', 
			array(
				'alt' => 'Loading',
    			'url' => array('action' => 'view_records'),
				'class' => 'img-responsive',
				'id' => 'fiveaday-minigraph'
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
	graphLoader('/healthy_eating_module/five_a_day/minigraph', 'My 5-a-day over recent weeks', 'img-responsive', '#fiveaday-minigraph');
});
//-->
</script>