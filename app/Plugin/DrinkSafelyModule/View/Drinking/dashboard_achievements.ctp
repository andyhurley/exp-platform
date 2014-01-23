<?php
if (empty($achievements)) {?>
<p>You haven't yet recorded enough weekly data to be able to calculate your achievements.</p>
<?php } else { ?>
<table class="table">
	<tr>
		<td>Total days within sensible drinking limits:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['DrinkingAchievement']['total_sensible_days']; ?></span>
		</td>
	</tr>
	<tr>
		<td>Total days exceeding sensible drinking limits:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['DrinkingAchievement']['total_excess_days']; ?></span>
		</td>
	</tr>
	<tr>
		<td>Total days exceeding binge drinking levels:</td>
		<td><span class="label label-primary pull-right"><?php echo $achievements['DrinkingAchievement']['total_binge_days'];?></span>
		</td>
	</tr>
</table>
<?php }?>
