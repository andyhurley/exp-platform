<div class="modules form">
<?php echo $this->Form->create('Module'); ?>
	<fieldset>
		<legend><?php echo __('Edit Module'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('version');
		echo $this->Form->input('type', array('options' => array('dashboard'=> 'Dashboard','widget'=>'Widget')));
		echo $this->Form->input('parent_id');
		echo $this->Form->input('base_url');
		echo $this->Form->input('icon_url');
		echo $this->Form->input('table_prefix');
		echo $this->Form->input('active', array('options' => array('1'=> 'Yes','0'=>'No')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Module.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Module.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Modules'), array('action' => 'index')); ?></li>
	</ul>
</div>
