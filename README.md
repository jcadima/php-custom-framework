# CUSTOM PHP FRAMEWORK


This is a custom PHP framework for personal web applications, it aims to be simple, lightweight and flexible, the code is for learning purposes and is not intended to be used "as is" in production environments.
A simple blog and user registration is integrated into this php custom framework.

# REQUIREMENTS
- PHP 5.3.x > with PDO


### Installation
This custom PHP framework makes use of namespaces and it has a directory structure similar to Laravel where a "public" directory contains the front controller. This directory structure sometimes makes it difficult for shared hosting environments where the virtual hosts file is not available to edit, a modified version of this framework is available to download here:

[php-framework-(shared hosting)](http://juancadima.com/projects/php-framework-shared-hosting.zip)

Simply copy the directory structure into a folder to get this framework running

Download the regular version:
[php-framework](http://juancadima.com/projects/php-framework.zip)

The only requirements are to have a working Apache web server with PHP.
#### Note: 
If using IIS the controler/action will not work since this framework uses .htaccess for the URL rewriting

# Project Details & Structure
- The main URL structure should be in this format: 
```bash
http://domain/controller/action/id 
```
action and id are optional, if controller is not specified it will use a specified default controller.
- All Controllers must extend the Base Controller.

- If you want any view to be shown without using a main template, pass a boolean false as the second argument in the 
```php
View::renderTemplate($data, "./App/Views/blog/index.php", false) ;
```
To use the main template pass the second argument as true
```php
View::renderTemplate($data, "./App/Views/blog/index.php", true) ;
```

- Directories under /views share the same name of the controller class, for example a controller Home has a view called /views/home , and inside the folder name you would have and index and/or another file that would describe the action

- You are able to pass an array with as many values as you like , and can also return objects from the model. i.e: 
```php
$viewmodel = new Post_Model();
$data['pagetitle'] = 'Add a New Post';
$data['add'] = $viewmodel->add() ;
View::renderTemplate($data, "../App/Views/blog/add.php", true) ;
```


### Tutorial & Demo
For a more detailed description visit my
- [Website](http://juancadima.com/creating-custom-php-mvc-framework-part-1/)
- [Live Demo](http://phpframework.juancadima.com/) 


### Database Tables Description
Posts:
```mysql
+-------------+--------------+------+-----+-------------------+----------------+
| Field       | Type         | Null | Key | Default           | Extra          |
+-------------+--------------+------+-----+-------------------+----------------+
| id          | int(11)      | NO   | PRI | NULL              | auto_increment |
| user_id     | int(11)      | NO   |     | NULL              |                |
| title       | varchar(255) | NO   |     | NULL              |                |
| body        | text         | NO   |     | NULL              |                |
| create_date | datetime     | NO   |     | CURRENT_TIMESTAMP |                |
+-------------+--------------+------+-----+-------------------+----------------+
```

Users:
```mysql
+---------------+--------------+------+-----+-------------------+----------------+
| Field         | Type         | Null | Key | Default           | Extra          |
+---------------+--------------+------+-----+-------------------+----------------+
| id            | int(11)      | NO   | PRI | NULL              | auto_increment |
| name          | varchar(255) | NO   |     | NULL              |                |
| email         | varchar(255) | NO   |     | NULL              |                |
| password      | varchar(255) | NO   |     | NULL              |                |
| register_date | datetime     | NO   |     | CURRENT_TIMESTAMP |                |
+---------------+--------------+------+-----+-------------------+----------------+
```








