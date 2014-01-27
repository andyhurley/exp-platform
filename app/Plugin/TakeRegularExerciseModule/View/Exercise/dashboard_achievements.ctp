<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate your achievements.</p>
<?php } else { ?>
<table class="table">
	<tr>
		<td>My best week so far:</td>
		<td><span class="label label-primary pull-right">w/c   
			<?php echo date('j M Y',strtotime($achievements['ExerciseAchievement']['best_week_so_far'])); ?></span>
		</td>
	</tr>
	<tr>
		<td>My total minutes of activity:</td>
		<td><span class="label label-primary pull-right"><?php 
			$totalmins = $achievements['ExerciseAchievement']['total_minutes'];
			$totalhours = round($totalmins/60,1);
			echo "$totalmins minutes<br />($totalhours hours)"; ?></span>
		</td>
	</tr>
	<tr>
		<td>How many weeks have I achieved 150 minutes?</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['ExerciseAchievement']['total_full_weeks_healthy'] . " week" .($achievements['ExerciseAchievement']['total_full_weeks_healthy'] != 1 ? 's' : '');?></span>
		</td>
	</tr>
</table>
<?php }?>
