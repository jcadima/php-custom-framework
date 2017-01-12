<div>
	
	<?php   // do not display the add POST button if user is not logged in 
	if(isset($_SESSION['is_logged_in'])) : ?>

	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>blog/add">Post Something</a>
	<?php  endif; ?>

	<?php foreach($posts as $post) : ?>
		<div class="well">
			<h3><?php echo $post['title']; ?></h3>
			<small><?php echo $post['create_date']; ?></small>
			<hr />
			<p><?php echo substr( $post['body'] , 0 , 500) . "[...]" ; ?></p>
			<br />
			<a class="btn btn-default" href="<?php echo ROOT_PATH;  ?>blog/view/<?php echo $post['id']; ?>">Read More</a>
		</div>
	<?php endforeach; ?>


</div>