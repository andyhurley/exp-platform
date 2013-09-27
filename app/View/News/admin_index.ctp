<h1 class="module-title"><?php echo $this->Html->image('/img/Mimetypes-message-news-icon.png', array('alt' => "News icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - News</h1>
<div class="row">
<div class="col-md-9 col-md-push-3">
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('headline'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($news as $article): ?>
	<tr>
		<td><?php echo h($article['News']['id']); ?>&nbsp;</td>
		<td><?php echo h($article['News']['headline']); ?>&nbsp;</td>
		<td><?php echo h($article['News']['created']); ?>&nbsp;</td>
		<td><?php echo h($article['News']['modified']); ?>&nbsp;</td>
		<td class="col-md-4">
			<span class="btn-group btn-group-justified">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $article['News']['id']), array('class' => 'btn btn-default')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['News']['id']), array('class' => 'btn btn-default')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['News']['id']), array('class' => 'btn btn-default'), __('Are you sure you want to delete # %s?', $article['News']['id'])); ?>
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
		<?php
			echo $this->Html->link(__('Add news'), array('action' => 'add'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
