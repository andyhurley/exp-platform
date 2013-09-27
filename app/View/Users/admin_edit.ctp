<h1 class="module-title"><?php echo $this->Html->image('/img/Apps-system-users-icon.png', array('alt' => "Admin Panel icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Edit User</h1>
<div class="row">
<div class="col-md-6 col-md-push-3">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('User.email');
		echo $this->Form->input('Profile.name');
		echo $this->Form->input('Profile.gender', array(
				'options' => array('M' => 'Male', 'F' => 'Female'),
				'style' => 'width:30%;'
		));
		echo $this->Form->input('Profile.date_of_birth', array(
				'label' => 'Date of birth',
				'dateFormat' => 'DMY',
				'minYear' => date('Y') - 90,
				'maxYear' => date('Y') - 18,
				'style' => 'width:25%; display:inline;'
		));
		?>
		
		<table>
			<tr>
				<td style="vertical-align:bottom;"><?php
					echo $this->Form->input('Profile.height_cm', array(
							'label' => 'Height in cm'
					));
					?>
				</td>
				<td style="vertical-align:middle;">OR</td>
				<td style="vertical-align:bottom;"><?php 
					echo $this->Form->input('height_feet', array(
							'label'=>'Height in feet &amp; inches'
					));
					?>
				</td>
				<td style="vertical-align:bottom;"><?php 
					echo $this->Form->input('height_inches', array(
							'label'=>'&nbsp;'
					));
					?>
				</td>
			</tr>
		</table>
		
		<?php
		echo $this->Form->input('Profile.post_code', array('label' => 'Home post code (UK)'));
		echo $this->Form->input('Profile.mobile_no', array('label' => 'Mobile number'));
		
		echo $this->Form->input('new_password', array('type' => 'password'));
		echo $this->Form->input('repeat_password', array('type' => 'password'));
	?>
	</fieldset>
	<div class="submit">
         <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'div' => false, 'id' =>'submit', 'class' => 'btn btn-success btn-md bot-buffer pull-right')); ?>
         <?php echo $this->Form->submit(__('Cancel (without saving changes)', true), array('name' => 'cancel','div' => false, 'id' =>'cancel', 'class' => 'btn btn-default btn-md bot-buffer pull-right')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<div class="col-md-3 col-md-pull-6">
	<div class="list-group">
		<?php 
			echo $this->Form->postLink(__('Delete user'), array('action' => 'delete', $this->Form->value('User.id')), array('class' => 'list-group-item'), __('Are you sure you want to delete # %s?', $this->Form->value('User.id')));
			echo $this->Html->link(__('List users'), array('action' => 'index'), array('class' => 'list-group-item'));
			echo $this->Html->link(__('Admin panel'), '/admin_panel', array('class' => 'list-group-item'));
		?>
	</div>
</div>
</div>

<script type="text/javascript">
	jQuery("input[id$='Feet']").bind("blur", function() 
	{
		getMetricHeight(parseFloat($("input[id$='Feet']").val()), parseFloat($("input[id$='Inches']").val()));
	});
	
	jQuery("input[id$='Inches']").bind("blur", function() 
	{
		getMetricHeight(parseFloat($("input[id$='Feet']").val()), parseFloat($("input[id$='Inches']").val()));
	});
	
	jQuery("input[id$='Cm']").bind("blur", function() {
	    getImperialHeight(parseFloat($("input[id$='Cm']").val()));
	});
	
	jQuery("body").ready(function() {
	    var imperial = getImperialHeight(parseFloat($("input[id$='Cm']").val()));
	    
	});
</script>
