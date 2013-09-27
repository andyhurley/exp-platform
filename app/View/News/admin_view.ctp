<h1 class="module-title"><?php echo $this->Html->image('/img/Mimetypes-message-news-icon.png', array('alt' => "Admin Panel News icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - View News</h1>
<div class="row">
<div class="col-md-9 col-md-push-3">
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Headline'); ?></dt>
		<dd>
			<?php echo h($news['News']['headline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo h($news['News']['article']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($news['News']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="col-md-3 col-md-pull-9">
	<div class="list-group">
		<?php
			echo $this->Html->link(__('Edit news'), array('action' => 'edit', $news['News']['id']), array('class' => 'list-group-item'));
			echo $this->Form->postLink(__('Delete news'), array('action' => 'delete', $news['News']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $news['News']['id']));
			echo $this->Html->link(__('Add news'), array('action' => 'add'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('News list'), '/admin/news', array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
