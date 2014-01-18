<?php
$this->extend('/Modules/module_template');
echo $this->Html->css('/take_regular_exercise_module/css/module.css', array('inline'=> false));

$cellTemplates = array(
		'<img src="/take_regular_exercise_module/img/Emotes-face-smile-big-icon.png" alt="Big smile" class="img-responsive" /><span>%1$s</span>',
		'<img src="/take_regular_exercise_module/img/Emotes-face-smile-icon.png" alt="Smile" class="img-responsive" /><span>%1$s</span>',
		'<img src="/take_regular_exercise_module/img/Emotes-face-sad-icon.png" alt="Sad face" class="img-responsive" /><span>%1$s</span>'
);
?>

<h2>Your monthly records</h2>
<p class="lead">Use this screen to quickly review your records on a month-by-month basis.</p>
<div class="calendar-holder col-md-8">
<?php 
	echo $this->Calendar->calendar($year,$month,$records,'/take_regular_exercise_module/exercise/view_records','/take_regular_exercise_module/exercise/data_entry', $cellTemplates, 'No. of minutes of exercise'); 
?>
</div>
<div class="calendar-key col-md-4">
	<div class='panel panel-primary'>
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $this->Html->image('/img/Status-dialog-password-icon.png', array('alt' => "Key", 'escape' => false, 'class'=> 'img-thumbnail'));?>
&nbsp;Key to icons</h3>
		</div>
		<div class="panel-body">
			<ul class="list-group">
			<li class="list-group-item">
				<?php echo $this->Html->image('/img/Actions-window-new-icon.png', array('alt' => "New data record icon", 'escape' => false, 'class'=> 'small-icon'));?>
				No entry recorded for this day (click on the icon to add a record)
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->image('/take_regular_exercise_module/img/Emotes-face-smile-big-icon.png', array('alt' => "Big Smiley face icon", 'escape' => false, 'class'=> 'small-icon'));?>
				You've reached at least 25 minutes of exercise on this day, which will help you towards your target of 150 for the week! If you hover your mouse over the icon, you'll see exactly how many minutes you recorded.
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->image('/take_regular_exercise_module/img/Emotes-face-smile-icon.png', array('alt' => "Smiley face icon", 'escape' => false, 'class'=> 'small-icon'));?>
				You've done some exercise today but not the 25 minutes of exercise on this day you need to help you reach your target of 150 for the week! If you hover your mouse over the icon, you'll see exactly how many minutes you recorded.
			</li>
			<li class="list-group-item">
				<?php echo $this->Html->image('/take_regular_exercise_module/img/Emotes-face-sad-icon.png', array('alt' => "Sad face icon", 'escape' => false, 'class'=> 'small-icon'));?>
				You've recorded an entry for this day, but you weren't able to fit in at least 10 minutes of exercise.
			</li>
			</ul>
			<p>Any calendar dates which don't have an icon are days in the future (so you can't record anything for those days, yet!)
		</div>
	</div>
	<?php echo $this->Html->link(__('Return to the module dashboard >'), array('action' => 'module_dashboard'),array('class' => 'btn btn-success btn-md pull-right bot-buffer')); ?>
</div>
