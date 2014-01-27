<?php
$this->extend('/Modules/module_template');
echo $this->Html->css('/stop_smoking_module/css/module.css', array('inline' => false));

$cellTemplates = array(
		'<img src="/stop_smoking_module/img/smiley-face.png" alt="Smoke-free" class="img-responsive" /><span>SF</span>',
		'<img src="/stop_smoking_module/img/smoking-face.png" alt="Smoked" class="img-responsive" /><span>S</span>'
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
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Actions-office-chart-pie-icon.png', array('alt' => "Piechart icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=> array('action' => 'view_records')));
				?>&nbsp;<?php echo $this->Html->link(__('My progress over time'), array('action' => 'view_records')); ?>
			</h3>
		</div>
		<div class="panel-body">
			<div class="thumbnail">
				<div class="caption">
					<h4>My smoke free days over recent weeks</h4>
				</div>
				<?php 
					echo $this->Html->image(
						'/stop_smoking_module/stop_smoking/minigraph', 
						array(
							'alt' => 'My smoke free days over recent weeks',
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
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Actions-view-calendar-icon.png', array('alt' => "Calendar icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=>array('action' => 'view_records')));
				?>&nbsp;<?php echo $this->Html->link(__('My month at a glance'), array('action' => 'view_records')); ?>
			</h3>
		</div>
		<div class="panel-body">
			<?php echo $this->Calendar->calendar($year,$month,$records,'/stop_smoking_module/stop_smoking/module_dashboard','/stop_smoking_module/stop_smoking/data_entry',$cellTemplates); ?>
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
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Actions-rating-icon.png', array('alt' => "Star icon", 'escape' => false, 'class'=> 'img-thumbnail', 'url'=>array('action' => 'view_records')));
						?>&nbsp;<?php echo $this->Html->link(__('My stop smoking achievements'), array('action' => 'view_records')); ?>
			</h3>
		</div>
		<div class="panel-body">
		<?php echo $this->requestAction(array('action'=> 'dashboard_achievements')); ?>
		</div>
		</div>
	</div>
</div>
						