<div class="thumbnail">
	<div class="caption">
		<h4>My &lsquo;simple health&rsquo; scores over recent weeks</h4>
	</div>
	<?php 
		echo $this->Html->image(
			'/img/ajax-loader.gif', 
			array(
				'alt' => 'Loading',
    			'url' => array('action' => 'view_records'),
				'class' => 'img-responsive',
				'id' => 'simplehealthtest-minigraph'
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
	graphLoader('/example_module/simple_health_test/minigraph', 'My &lsquo;simple health&rsquo; scores over recent weeks', 'img-responsive', '#simplehealthtest-minigraph');
});
//-->
</script>