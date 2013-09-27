<h1 class="module-title"><?php echo $this->Html->image('/img/Actions-view-list-icons-icon.png', array('alt' => "Admin Panel - Modules icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Modules</h1>
<div class="row">
<div class="col-md-9 col-md-push-3">
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('version'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo __('No. of users'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($modules as $module): ?>
	<tr>
		<td><?php echo h($module['Module']['id']); ?>&nbsp;</td>
		<td><?php echo $module['Module']['name']; ?>&nbsp;</td>
		<td><?php echo h($module['Module']['version']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['type']); ?>&nbsp;</td>
		<td><?php if($module['Module']['active']) {
				echo 'Y';
		}else {
				echo 'N';
		}?>&nbsp;</td>
		<td>
			<?php if ($module['Module']['type']!="dashboard") {
				echo "N/A";
			} else {
				echo count($module['ModuleUser']); 
			}?>&nbsp;</td>
		<td class="col-md-5">
			<span class="btn-group btn-group-justified">
			<?php echo $this->Html->link(__('Health data'), '/admin_panel/health_data/'. $module['Module']['id'], array('class' => 'btn btn-default')); ?>
			<?php
			if($module['Module']['active']) {
				echo $this->Form->postLink(__('De-activate'), array('action' => 'activate', $module['Module']['id'], 0), array('class' => 'btn btn-default'), __('Are you sure you want to de-activate module #%s?', $module['Module']['id']));
			} else {
				echo $this->Html->link(__('Activate'), array('action' => 'activate', $module['Module']['id'], 1), array('class' => 'btn btn-default'));
				echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $module['Module']['id']), array('class' => 'btn btn-default'), __('Are you sure you want to delete module #%s? All health data will also be deleted...', $module['Module']['id']));
			}?>
			</span>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev(' < ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</ul>
</div>
<div class="col-md-3 col-md-pull-9">
	<div class="list-group">
		<?php echo $this->Html->link(__('Add module'), array('action' => 'add'), array('class' => 'list-group-item')); ?>
		<?php echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item')); ?>
	</div>
</div>
</div>
