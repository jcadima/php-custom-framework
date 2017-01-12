<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>ADMIN DASHBOARD</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="script.js"></script>
  </head>
  <body>
  <h1>ADMIN DASHBOARD PAGE</h1>

<h3>Posts</h3>
	       
	<?php foreach($posts as $post) : ?>
		<ul class="well">
			<li><?php echo $post['title']; ?></li>
		</ul>
	<?php endforeach; ?>

  </body>
</html>