<h1 class="module-title"><?php echo $this->Html->image('/img/Apps-system-users-icon.png', array('alt' => "Admin Panel icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - View User</h1>
<div class="row">
<div class="col-md-9 col-md-push-3">
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($viewuser['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($viewuser['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date of Birth'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height (cm)'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['height_cm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Post Code'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['post_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile No'); ?></dt>
		<dd>
			<?php echo h($viewuser['Profile']['mobile_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered'); ?></dt>
		<dd>
			<?php echo h($viewuser['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modules'); ?></dt>
		<dd>
			<?php foreach($userModules as $module) {
				echo $module."<br />";
			}?>
			&nbsp;
		</dd>
	</dl>
	<p class="top-buffer bot-buffer">
		<?php if($viewuser['Profile']['allow_research']) {
			echo "This user's information MAY be used for research into improving health";
		} else {
			echo "This user's information MAY NOT be used for research into improving health";
		}
		?>
	</p>
</div>
<div class="col-md-3 col-md-pull-9">
	<div class="list-group">
		<?php 
			echo $this->Html->link(__('Edit user'), array('action' => 'edit', $viewuser['User']['id']), array('class' => 'list-group-item'));
			echo $this->Form->postLink(__('Delete user'), array('action' => 'delete', $viewuser['User']['id']), array('class' => 'list-group-item'), __('Are you sure you want to delete user #%s?', $viewuser['User']['id']));
			echo $this->Html->link(__('List users'), array('action' => 'index'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
