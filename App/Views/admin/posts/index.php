<?php  Core\Messages::isLoggedIn() ; ?>

<h1>ADMIN DASHBOARD FOR POSTS</h1>

<hr>
<h5>Print values from $data array:</h5>
<?php
echo '$viewData[' . "pagetitle " .'] => ' . $viewData['pagetitle']  . '<br>' ;
// echo  '$viewData[' . "text" . '] => ' . $viewData['text']   . '<br>' ;
?>
<hr>
   
<h3>Posts</h3>

<?php foreach($viewData['posts'] as $item) : ?>
	<ul class="well">
		<li><?php echo $item['title']; ?></li>
	</ul>
<?php endforeach; ?>

