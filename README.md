# CUSTOM PHP FRAMEWORK


This is a custom PHP framework for personal web applications, it aims to be simple, lightweight and flexible, the code is for learning purposes and is not intended to be used "as is" in production environments.
A simple blog and user registration is integrated into this php custom framework.

# REQUIREMENTS
- PHP 5.3.x > with PDO


### Installation
This custom PHP framework makes use of namespaces the "public" directory contains the front controller.

Download:
[php-frameworkv2](http://juancadima.com/downloads/phpframeworkv2/phpframeworkv2.zip)

The only requirements are to have a working Apache web server with PHP.
#### Note: 
If using IIS the controler/action will not work since this framework uses .htaccess for the URL rewriting

# Project Details & Structure
- The main URL structure should be in this format: 
```bash
http://domain/controller/action/{params}
```
action and params are optional, if controller is not specified it will use a specified default controller.

To pass a view
```php
View::renderTemplate($data, "./App/Views/blog/index.php") ;
```

- Directories under /views share the same name of the controller class, for example a controller Home has a view called /views/home , and inside the folder name you would have and index and/or another file that would describe the action

- You are able to pass an array with as many values as you like , and can also return objects from the model. i.e: 
```php
$viewmodel = new Post_Model();
$data['pagetitle'] = 'Add a New Post';
$data['add'] = $viewmodel->add() ;
View::renderTemplate($data, "../App/Views/blog/add.php") ;
```


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








