<div class="row">
<div class="col-md-9 col-md-push-3">
	<dl class="dl-horizontal">
		<dt><?php echo __('Module name'); ?></dt>
		<dd>
			<?php echo $module['Module']['name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($module['Module']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php if($module['Module']['active']== 1) {
				echo 'Y';
		}else {
				echo 'N';
		}?>&nbsp;
		</dd>
		<dt><?php echo __('No. of users'); ?></dt>
		<dd>
			<?php echo count($module['ModuleUser']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No. of screener records'); ?></dt>
		<dd>
			<?php echo $screeners; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No. of weekly records'); ?></dt>
		<dd>
			<?php echo $weeklyRecords; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="col-md-3 col-md-pull-9">
	<div class="list-group">
		<?php
			echo $this->Html->link(__('Export screeners'), array('action' => 'export_screeners'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Export weekly'), array('action' => 'export_weekly'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
