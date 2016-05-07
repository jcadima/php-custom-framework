# PHP MICROFRAMEWORK: README

This is a PHP micro framework for web development, it aims to be simple, lightweight and flexible, the code is for learning purposes and is not intended to be used "as is" in production environments

# REQUIREMENTS
- PHP 5.2.x > with PDO


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
 $data['title'] = 'My website';
 $data['shares'] = $viewmodel->getShares() ;
 $this->returnView($data, true);
```



For a more detailed description visit my
[website](http://juancadima.com/creating-custom-php-mvc-framework-part-1/)

