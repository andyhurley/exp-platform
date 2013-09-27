<?php
	foreach ($news as $article): ?>
		<div class="alert alert-dismissable alert-info">
	  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><?php echo $article['News']['headline']; ?></h4>
			<p><?php echo $article['News']['article']; ?></p>
			<p class="small" style="text-align:right;"><?php echo h($article['News']['modified']); ?></p>
		</div>
<?php endforeach; ?>