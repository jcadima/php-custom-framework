<div>
	
	<?php   // do not display the add POST button if user is not logged in 
	if(isset($_SESSION['is_logged_in'])) : ?>

	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>posts/add">Post Something</a>
	<?php  endif; ?>

	<?php foreach($viewData['posts'] as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']; ?></h3>
			<small><?php echo $item['create_date']; ?></small>
			<hr />
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn btn-default" href="/posts/view/<?php echo $item['id']; ?>">Read More</a>
		</div>
	<?php endforeach; ?>


</div>