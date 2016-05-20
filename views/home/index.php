
<div class="text-center">

	<h1>Custom PHP Framework Home Page</h1>

	<p class="lead">Home Page</p>

</div>

<h5>GET Array:</h5>
<?php
echo '<pre>';
print_r($_GET) ;
echo  '</pre>';
?>


<h5>Print values from $data array:</h5><br>
<?php
echo $viewData['hometitle']  . '<br>' ;
echo $viewData['texttitle']   . '<br>' ;
?>

<br><br>
<a class="btn btn-primary text-center" href="<?php echo ROOT_PATH;?>posts">View All Posts</a>