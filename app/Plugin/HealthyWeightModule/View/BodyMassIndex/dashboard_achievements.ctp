<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate your achievements.</p>
<?php } else { ?>
<table class="table">
	<tr>
		<td>My current BMI score:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['BmiAchievement']['latest_bmi'];?></span>
		</td>
	</tr>
	<tr>
		<td>My total weight change since week 1:</td>
		<td><span class="label label-primary pull-right"><?php 
			$kgs = $achievements['BmiAchievement']['change_since_start'];
			if ($kgs >= 0) $sign = "+ ";
			else $sign = " "; 
			echo $sign . round(($kgs * 2.20462),0) . "lbs"; 
			echo " (" . $sign . $kgs; ?>kg)</span>
		</td>
	</tr>
</table>
<?php } ?>
