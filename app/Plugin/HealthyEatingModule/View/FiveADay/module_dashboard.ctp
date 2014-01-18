<?php
$this->extend('/Modules/module_template');
echo $this->Html->css('/HealthyEatingModule/css/module.css', array('inline' => false));

$cellTemplates = array(
	'<img src="/healthy_eating_module/img/five_a_day/apple-full.png" alt="Apple" class="img-responsive" /><span>%1$s</span>',
	'<img src="/healthy_eating_module/img/five_a_day/apple-core.png" alt="Apple core" class="img-responsive" /><span>%1$s</span>'
);
?>
<div class="row">
<?php
// News and updates widget - only display if there is news or updates!
$newswidget = $this->requestAction(array('action'=> 'dashboard_news')); 
if ($newswidget != "") echo $newswidget;
?>
</div>

<div class="row" id="panel-container">
	<div class="col-md-6 panel-item">
		<div class='panel panel-primary'>
		<div class="panel-heading">
			<h3 class="panel-title">
				<?php echo $this->Html->image('/img/Actions-office-chart-pie-icon.png', array('alt' => "Piechart icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=> array('action' => 'view_records')));
						?>&nbsp;<?php echo $this->Html->link(__('My progress over time'), array('action' => 'view_records')); ?>
			</h3>
		</div>
		<div class="panel-body">
			<div class="thumbnail">
				<div class="caption">
					<h4>My 5-a-day over recent weeks</h4>
				</div>
				<?php 
					echo $this->Html->image(
						'/healthy_eating_module/five_a_day/minigraph', 
						array(
							'alt' => 'My 5-a-day over recent weeks',
		    				'url' => array('action' => 'view_records'),
							'class' => 'img-responsive'
						)
					);
				?>
		</div>
		</div>
		<div class="panel-footer">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-calendar"></span> View my monthly records'), array('action' => 'view_records'),array('escape' => false)); ?>
		</div>
		</div>
	</div>
	<div class="col-md-6 panel-item">
		<div class='panel panel-primary'>
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Actions-view-calendar-icon.png', array('alt' => "Calendar icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=> array('action' => 'view_records')));
						?>&nbsp;<?php echo $this->Html->link(__('My month at a glance'), array('action' => 'view_records')); ?>
			</h3>
		</div>
		<div class="panel-body">
			<?php echo $this->Calendar->calendar($year,$month,$records,'/healthy_eating_module/five_a_day/module_dashboard','/healthy_eating_module/five_a_day/data_entry',$cellTemplates, 'Number of portions eaten'); ?>
			<?php echo $this->Html->link(__('Add weekly record <span class="glyphicon glyphicon-plus"></span>'), array('action' => 'data_entry', date("Ymd")),array('class' => 'btn btn-success btn-md pull-right', 'escape' => false)); ?>
		</div>
		<div class="panel-footer">
			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-calendar"></span> View my monthly records'), array('action' => 'view_records'),array('escape' => false)); ?>
		</div>
		</div>
	</div>
	<div class="col-md-6 panel-item">
		<div class='panel panel-primary achievements'>
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Actions-rating-icon.png', array('alt' => "Star icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=> array('action' => 'view_records')));
						?>&nbsp;<?php echo $this->Html->link(__('My 5-a-day achievements'), array('action' => 'view_records')); ?>
		</h3>
		</div>
		<div class="panel-body">
		<?php echo $this->requestAction(array('action'=> 'dashboard_achievements')); ?>
		</div>
		</div>
	</div>
</div>
