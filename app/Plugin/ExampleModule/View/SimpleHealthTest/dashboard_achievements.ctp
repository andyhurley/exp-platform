<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate your achievements.</p>
<?php } else {?>
<table class="table">
	<tr>
		<td>Number of days feeling healthy last week:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['SimpleHealthTestAchievement']['healthy_days_last_week'];?> days</span>
  		</td>
	</tr>
	<tr>
		<td>My total number of days feeling healthy:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['SimpleHealthTestAchievement']['total_days_healthy'];?> days</span>
  		</td>
	</tr>
	<tr>
		<td>My total weeks feeling healthy all week:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['SimpleHealthTestAchievement']['total_full_weeks_healthy'];?> weeks</span>
		</td>
	</tr>
</table>
<?php }?>
