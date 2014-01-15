<?php $this->extend('/Modules/module_template'); ?>
<h2>Complete this screening tool to get some feedback on your current
	diet</h2>
<div class="col-md-8 col-md-offset-2">
<?php echo $this->Form->create('FiveADayScreener', array(
		'inputDefaults' => array(
        'label' => false
    )))?>
<table class="table table-hover">
	<thead>
	<tr>
		<th class="col-md-3">Food Type</th>
		<th class="col-md-2"><span class="hidden-xs">On average, <em>how often</em> did you eat
			each food type during the past 7 days?</span>
			<span class="visible-xs" data-toggle="tooltip" title="On average, how often did you eat each food type during the past 7 days?">How often?</span>
		</th>
		<th class="col-md-2"><span class="hidden-xs">On an average day when you ate/drank this, <em>how
			many portions</em> of this food group did you have?</span>
			<span class="visible-xs" data-toggle="tooltip" title="On an average day when you ate/drank this, how many portions of this food group did you have?">How many portions?</span>	
		</th>
		<th class="col-md-1">Portion scale</th>
	</tr>
	</thead>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Vegetables</strong> e.g. cauliflower,
			cabbage, peas, carrots, mushrooms, tomatoes, leeks, swede,
			courgettes, broccoli, runner beans <strong>Do not include potatoes</strong></span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. cauliflower, cabbage, peas, carrots, mushrooms, tomatoes, leeks, swede, courgettes, broccoli, runner beans. Do not include potatoes">
			<strong>Vegetables</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('veg_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'),
					'empty' => '(choose one)'
				));?>
		</td>
		<td class="colpeach col3"><?php echo $this->Form->input('veg_no', array(
				'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'),
				'empty' => '(choose one)'
		));?></td>
		<td class="colpeach col4">Three heaped tablespoons</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Salad</strong> e.g. mixed greens,
			lettuce, cucumber, onion, peppers</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. mixed greens, lettuce, cucumber, onion, peppers">
			<strong>Salad</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('salad_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('salad_no', array('options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'),
    				'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">One dessert bowl</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Whole fresh fruits</strong> e.g.
			apple, pear, orange, banana, peach</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. apple, pear, orange, banana, peach">
			<strong>Whole fresh fruits</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>	
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('whole_fruit_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('whole_fruit_no', array(
    				'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">One fruit</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Medium fruits</strong> e.g. satsumas,
			plums, apricots</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. satsumas, plums, apricots">
			<strong>Medium fruits</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('medium_fruit_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('medium_fruit_no', array('options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'),
    				'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">Two fruits</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Small fruits</strong> e.g. grapes,
			berries, cherries, lychees, cherry tomatoes</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. grapes, berries, cherries, lychees, cherry tomatoes">
			<strong>Small fruits</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('small_fruit_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('small_fruit_no', array(
    				'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">One handful</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Tinned fruit, fruit in natural juice</strong>
			e.g. peaches, pineapple, pears <strong> or stewed fruit</strong> e.g.
			apple, rhubarb, cherries</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. peaches, pineapple, pears or stewed fruit e.g. apple, rhubarb, cherries">
			<strong>Tinned fruit, fruit in natural juice</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span>
		</td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('tinned_fruit_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('tinned_fruit_no', array(
    				'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">Three heaped tablespoons</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Dried fruit</strong> e.g. raisins</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. raisins">
			<strong>Dried fruit</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span></td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('dried_fruit_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('dried_fruit_no', array(
					'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">One heaped tablespoon</td>
	</tr>
	<tr>
		<td class="colblue col1"><span class="hidden-xs"><strong>Fruit juice</strong> e.g. fresh or
			carton fruit juice (150ml)</span>
			<span class="visible-xs" data-toggle="tooltip" title="e.g. fresh or carton fruit juice (150ml)">
			<strong>Fruit juice</strong>&nbsp;<?php 
			echo $this->Html->image(
				'info-icon.png', 
				array('alt' => 'Information',
					'class' => 'info')
			);
			?>
			</span></td>
		<td class="colgreen col2"><?php 
		echo $this->Form->input('fruit_juice_often', array(
    				'options' => array(0 => 'Never', 1 => '1 day', 2 => '2 days', 3 => '3 days', 4 => '4 days', 5 => '5 days',
					6 => '6 days', 7 => '7 days'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col3"><?php 
		echo $this->Form->input('fruit_juice_no', array(
					'options' => array(0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => '5 or more'), 'empty' => '(choose one)'
				));
			?>
		</td>
		<td class="colpeach col4">One small glass/carton</td>
	</tr>
</table>
<?php 
	$options = array(
    	'label' => 'Calculate my score',
		'class' => 'btn btn-success btn-md bot-buffer pull-right'
	);
	echo $this->Form->end($options);
?>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#FiveADayScreenerVegOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerVegNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerVegNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerSaladOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerSaladNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerSaladNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerWholeFruitOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerWholeFruitNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerWholeFruitNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerMediumFruitOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerMediumFruitNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerMediumFruitNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerSmallFruitOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerSmallFruitNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerSmallFruitNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerTinnedFruitOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerTinnedFruitNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerTinnedFruitNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerDriedFruitOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerDriedFruitNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerDriedFruitNo').parent().parent().show();
		}
	});
	$('#FiveADayScreenerFruitJuiceOften').change(function() {
		if(this.value == 0) {
			$('#FiveADayScreenerFruitJuiceNo').val("0").parent().parent().hide();
		} else {
			$('#FiveADayScreenerFruitJuiceNo').parent().parent().show();
		}
	});
});
</script>
