<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate
	your achievements.</p>
<?php } else { ?>
<table class="table">
	<tr>
		<td>% of days achieving 5-a-day last week:</td>
		<td><span class="label label-primary pull-right"><?php echo round(($achievements['FiveADayAchievement']['healthy_days_last_week']/7)*100,2);?>%</span>
		</td>
	</tr>
	<tr>
		<td>My total number of days achieving 5-a-day:</td>
		<td><span class="label label-primary pull-right"> <?php 
		if ($achievements['FiveADayAchievement']['total_days_healthy'] != 1) $s = "s";
		else $s = "";
		echo $achievements['FiveADayAchievement']['total_days_healthy'];
		?> day<?php echo $s; ?>
		</span></td>
	</tr>
	<tr>
		<td>My total weeks achieving an average of 5-a-day:</td>
		<td><span class="label label-primary pull-right"> <?php 
		if ($achievements['FiveADayAchievement']['total_full_weeks_healthy'] != 1) $s = "s";
		else $s = "";
		echo $achievements['FiveADayAchievement']['total_full_weeks_healthy'];?>
				week<?php echo $s; ?>
		</span>
		</td>
	</tr>
</table>
<?php }?>
