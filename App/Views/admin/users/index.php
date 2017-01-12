
<?php  Core\Messages::isLoggedIn() ; ?>

<h1>ADMIN DASHBOARD PAGE FOR USERS</h1>

<hr>
<h5>Print values from $data array:</h5>
<?php
echo 'pagetitle => ' . $pagetitle  . '<br>' ;
?>
<hr>

<h3>All Users</h3>
       
<?php foreach($users as $user) : ?>
	<ul class="well">
		<li><?php echo $user['name']; ?></li>
	</ul>
<?php endforeach; ?>
