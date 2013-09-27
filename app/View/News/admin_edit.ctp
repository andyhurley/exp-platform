<h1 class="module-title"><?php echo $this->Html->image('/img/Mimetypes-message-news-icon.png', array('alt' => "Admin Panel news icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Edit News</h1>
<div class="row">
<div class="col-md-6 col-md-push-3">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('headline');
		echo $this->Form->textarea('article', array('cols' => '25', 'rows' => '5'));
	?>
	</fieldset>
	<div class="submit top-buffer">
         <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'div' => false, 'id' =>'submit', 'class' => 'btn btn-success btn-md bot-buffer pull-right')); ?>
         <?php echo $this->Form->submit(__('Cancel (without saving changes)', true), array('name' => 'cancel','div' => false, 'id' =>'cancel', 'class' => 'btn btn-default btn-md bot-buffer pull-right')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<div class="col-md-3 col-md-pull-6">
	<div class="list-group">
		<?php 
			echo $this->Form->postLink(__('Delete news'), array('action' => 'delete', $this->Form->value('News.id')), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $this->Form->value('News.id')));
			echo $this->Html->link(__('News list'), '/admin/news', array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
