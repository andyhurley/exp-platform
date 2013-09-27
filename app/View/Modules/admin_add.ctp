<h1 class="module-title"><?php echo $this->Html->image('/img/Actions-view-list-icons-icon.png', array('alt' => "Admin Panel - Modules icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Add Module</h1>
<div class="row">
<div class="col-md-9 col-md-push-3">
<?php 
if(empty($healthModuleList)) { ?>
	<h2>No health module plugins were found on this server that could be added to the website.</h2>
	<p>First install the new health module into the Plugin directory and then try again.</p>
<?php } else {?>
	<table class="table table-striped module-list">
		<?php
		foreach ($healthModuleList as $module): ?>
			<tr>
				<td>
					<?php
					echo $this->Html->link(__('Add this module'),
						array('action' => 'install',$module['plugin'],$module['controllerName']),
						array('class' => 'btn btn-success btn-md', 'target' => '_self')
					);			
					?>
				</td>
				<td>
					<h4>
					<?php
					echo $this->Html->link(
						Inflector::humanize(Inflector::underscore($module['plugin'])." - ".Inflector::underscore($module['controllerName'])),
						array('action' => 'install',$module['plugin'],$module['controllerName']),
						array('target' => '_self', 'escape' => false)
					);
					?>
					</h4>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php }?>
</div>
<div class="col-md-3 col-md-pull-9">
	<div class="list-group">
		<?php
			echo $this->Html->link(__('List Modules'), array('action' => 'index'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>
