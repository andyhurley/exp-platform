<?php $this->extend('/Modules/module_template');
echo $this->Html->css('/stop_smoking_module/css/module.css', array('inline' => false));?>

<h3 class="week-commencing"><?php 

?>Week Commencing: <span class="date-control"><?php
echo $this->Html->image(
		'Actions-go-previous-view-icon.png',
		array('alt' => 'Previous week',
			  'url' => 'data_entry/' . date('Ymd',$previousWeek),
			  'class' => 'previous',
			  'title' => 'Go to previous week'
		)
);
echo date('d-m-Y',$weekBeginning);

if(isset($nextWeek)) {
	echo $this->Html->image(
			'Actions-go-next-view-icon.png',
			array('alt' => 'Next week',
				  'url' => 'data_entry/' . date('Ymd',$nextWeek),
				  'class' => 'next',
				  'title' => 'Go to next week'
			)
	);
}?></span></h3>

<p class="lead">How did you do this week? Click a picture on each day of the week to record whether or not that day was smoke free.</p>
<?php echo $this->Form->create('ExampleModule.StopSmokingWeekly', array(
    'inputDefaults' => array(
        'label' => false
    ))) ?>
<table class="weekly-entry table">
	<thead>
	<tr>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
		<th>Sunday</th>
		<th>Number of smoke-free days</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><?php 
			if (!empty($this->request->data)){
				$monday = $this->request->data["StopSmokingWeekly"]["monday"];
				$tuesday = $this->request->data["StopSmokingWeekly"]["tuesday"];
				$wednesday = $this->request->data["StopSmokingWeekly"]["wednesday"];
				$thursday = $this->request->data["StopSmokingWeekly"]["thursday"];
				$friday = $this->request->data["StopSmokingWeekly"]["friday"];
				$saturday = $this->request->data["StopSmokingWeekly"]["saturday"];
				$sunday = $this->request->data["StopSmokingWeekly"]["sunday"];
				$total = $this->request->data["StopSmokingWeekly"]["total"];
			}
			else
			{
				$monday = null;
				$tuesday = null;
				$wednesday = null;
				$thursday = null;
				$friday = null;
				$saturday = null;
				$sunday = null;
				$total = 0;
			} ?>
			<div class="nosmoke mon<?php if ($monday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke mon<?php if (!is_null($monday) && $monday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.monday',array('label'=>false, 'value'=>$monday)); ?></td>
		<td>
			<div class="nosmoke tue<?php if ($tuesday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke tue<?php if (!is_null($tuesday) && $tuesday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.tuesday',array('label'=>false, 'value'=>$tuesday)); ?>
		</td>
		<td>
			<div class="nosmoke wed<?php if ($wednesday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke wed<?php if (!is_null($wednesday) && $wednesday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.wednesday',array('label'=>false, 'value'=>$wednesday)); ?>
		</td>
		<td>
			<div class="nosmoke thu<?php if ($thursday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke thu<?php if (!is_null($thursday) && $thursday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.thursday',array('label'=>false, 'value'=>$thursday)); ?>
		</td>
		<td>
			<div class="nosmoke fri<?php if ($friday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke fri<?php if (!is_null($friday) && $friday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.friday',array('label'=>false, 'value'=>$friday)); ?>
		</td>
		<td>
			<div class="nosmoke sat<?php if ($saturday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke sat<?php if (!is_null($saturday) && $saturday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.saturday',array('label'=>false, 'value'=>$saturday)); ?>
		</td>
		<td>
			<div class="nosmoke mon<?php if ($sunday == 1) echo " nosmokeup"; ?>"><img src="/stop_smoking_module/img/no-smoking.png" alt="I did not Smoke"/>
				Did not Smoke</div>
			<div class="smoke mon<?php if (!is_null($sunday) && $sunday == 0) echo " smokeup"; ?>"><img src="/stop_smoking_module/img/smoking.png" alt="I smoked"/>
				Smoked</div>
			<?php echo $this->Form->hidden('StopSmokingWeekly.sunday',array('label'=>false, 'value'=>$sunday)); ?>
		</td>
		<td><?php 
			echo $this->Form->input('StopSmokingWeekly.total',array('readonly'=>true,'label'=>false, 'value'=>$total)); 
			echo $this->Form->hidden('StopSmokingWeekly.week_beginning',array('value'=>date('Y-m-d',$weekBeginning)));
			echo $this->Form->hidden('StopSmokingWeekly.id');
		?></td>
	</tr>
	</tbody>
</table>
<div class="form-group">
	<label for="StopSmokingWeeklyWhatWorked">What worked for me this week?
		<a data-toggle="modal" href="#whatworked" class="info" title="Click for more information on the 'What worked for me?' box">
		<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'What is this?',
					'class' => 'info')
			);
		?>
		</a></label>
		<?php echo $this->Form->textarea('StopSmokingWeekly.what_worked',array('rows'=>'5')); ?>
</div>
<div class="submit">
         <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'div' => false, 'id' =>'submit', 'class' => 'btn btn-success btn-md bot-buffer pull-right')); ?>
         <?php echo $this->Form->submit(__('Cancel (without saving changes)', true), array('name' => 'cancel','div' => false, 'id' =>'cancel', 'class' => 'btn btn-default btn-md bot-buffer pull-right')); ?>
</div>
<?php echo $this->Form->end(); ?>
		
<script type="text/javascript">
<!--
$(document).ready(function() {
	// Transpose the weekly entry table if viewing on a smaller screen
	if($(".container").width() < 600) {
		transposeTable(".weekly-entry");
		$(".weekly-entry thead tr").prepend("<th>Week day</th><th>Smoked?</th>");
	}
	
	$(".weekly-entry img").bind("click", function() 
	{
    	var value = 0;

		if ($(this).parent("div").hasClass('smoke')){
			value = 0;
			$(this).parent().addClass('smokeup');
			$(this).parent().siblings('.nosmoke').removeClass('nosmokeup');
		} else {
			value = 1;
			$(this).parent().addClass('nosmokeup');
			$(this).parent().siblings('.smoke').removeClass('smokeup');
		}

		$(this).parent().siblings("input").val(value);
    	var monday = parseFloat($("#StopSmokingWeeklyMonday").val());
    	var tuesday = parseFloat($("#StopSmokingWeeklyTuesday").val());
    	var wednesday = parseFloat($("#StopSmokingWeeklyWednesday").val());
    	var thursday = parseFloat($("#StopSmokingWeeklyThursday").val());
    	var friday = parseFloat($("#StopSmokingWeeklyFriday").val());
    	var saturday = parseFloat($("#StopSmokingWeeklySaturday").val());
    	var sunday = parseFloat($("#StopSmokingWeeklySunday").val());
    	if(isNaN(monday)) monday = 0;
    	if(isNaN(tuesday)) tuesday = 0;
    	if(isNaN(wednesday)) wednesday = 0;
    	if(isNaN(thursday)) thursday = 0;
    	if(isNaN(friday)) friday = 0;
    	if(isNaN(saturday)) saturday = 0;
    	if(isNaN(sunday)) sunday = 0;
    	$("#StopSmokingWeeklyTotal").val(monday + tuesday + wednesday + thursday + friday + saturday + sunday);
	});
});
//-->

</script>
<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
	<div id='help' class='popup'>
		<h3>Help for the Stop Smoking Module</h3>
		<p>This is where you can display extra information and suggestions for this data entry page.</p>
	</div>
</div>
<?php echo $this->element('what_worked'); ?>