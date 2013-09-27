<h1 class="module-title"><?php echo $this->Html->image('/img/Apps-system-users-icon.png', array('alt' => "Admin Panel icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Add User</h1>
<div class="row">
<div class="col-md-6 col-md-offset-3">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('role', array(
			'options' => array('super-admin' => 'Super-Admin', 'admin' => 'Admin', 'user' => 'User')
		));
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
				echo $this->Form->input('Profile.post_code');
				echo $this->Form->input('Profile.mobile_no');
				echo $this->Form->input('Profile.allow_research', array('label' => 'This user&rsquo;s information can be used for research into improving health', 'after' => '<br />(Researchers will not have access to their personal details)', 'checked' => true, 'type' => 'checkbox'));
			?>
	</fieldset>
	<div class="submit">
         <?php echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'div' => false, 'id' =>'submit', 'class' => 'btn btn-success btn-md bot-buffer pull-right')); ?>
    </div>
	<?php echo $this->Form->end(); ?>
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
