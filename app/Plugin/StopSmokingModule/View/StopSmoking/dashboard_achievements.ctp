<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate your achievements.</p>
<?php } else { ?>
<table class="table">
	<tr>
		<td>My smoke free days last week:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['StopSmokingAchievement']['healthy_days_last_week'];?> days</span>
		</td>
	</tr>
	<tr>
		<td>My total number of smoke free days:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['StopSmokingAchievement']['total_days_healthy'];?> days</span>
		</td>
	</tr>
	<tr>
		<td>My total weeks smoke free all week:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['StopSmokingAchievement']['total_full_weeks_healthy'];?> weeks</span>
	</td>
	</tr>
	<tr>
		<td>I've saved in total:</td>
		<td><span class="label label-primary pull-right">&pound;<?php echo sprintf('%0.2f',round(7.47 * $achievements['StopSmokingAchievement']['total_days_healthy'],2));?></span>
		</td>
	</tr>
</table>
<?php }?>
