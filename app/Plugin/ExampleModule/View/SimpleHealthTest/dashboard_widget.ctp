<h4><strong>Your health progress to date</strong></h4>
		<p>&nbsp;<br/>
			<?php 
				echo $this->Html->image(
					'graph-dummy.jpg', 
					array('alt' => '5 A Day Dummy Graph',
    				'url' => array('action' => 'view_records')
					)
				);
			?>
<div class="achievements">
	<h4><strong>Your weekly achievements</strong></h4>
	<?php echo $this->requestAction(array('action'=> 'dashboard_achievements')); ?>
</div>
<p><?php echo $this->Html->link(__('Add weekly record'), array('action' => 'data_entry', date("Ymd")),array('class' => 'button')); ?></p>
