# PHP MICROFRAMEWORK: ARMADILLO

![alt tag](http://juancadima.com/wp-content/uploads/armadillo.jpg)

This is a PHP micro framework for web development, it aims to be simple, lightweight and flexible, the code is for learning purposes and is not intended to be used "as is" in production environments.
A simple blog and user registration is integrated into this custom framework.

# REQUIREMENTS
- PHP 5.4.x > with PDO


### Installation
You can get this microframework up and running by simply copying the directory structure.
The only requirements are to have a working Apache web server with PHP.
#### Note: 
If using IIS the controler/action will not work since this framework uses .htaccess for the URL rewriting

# Project Details & Structure
- The main URL structure should be in this format: http://domain/controller/action/id, action and id are optional, if controller is not specified it will use a specified default controller.
- All Controllers must extend the Base Controller.
- If you want any view to be shown without using a main template, pass a boolean false as the second argument in the $this->view->output() call of your controller methods (where the first argument is the data being send to the view).
- Directories under /views share the same name of the controller class, for example a controller Home has a view called /views/home , and inside the folder name you would have and index and/or another file that would describe the action
- If you want to call only a specific part of the view without using the main template , you can do so by just passing a boolean of false as the second argument 
- You are able to pass an array with as many values as you like , and can also return objects from the model. i.e: 
```php
$data = [] ;
$postid = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$viewmodel = new Post_Model();
$data = $viewmodel->getPostById($postid['id'] );
$data['title'] = 'My website';
// pass this $data array to the view
$this->view->output($data, true ) ;
```


### Tutorial & Demo
For a more detailed description visit my
- [Website](http://juancadima.com/creating-custom-php-mvc-framework-part-1/)
- [Live Demo](http://juancadima.com/projects/phpframework/) 


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








