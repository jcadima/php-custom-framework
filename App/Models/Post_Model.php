<?php
namespace App\Models;


class Post_Model extends \Core\Model{

/*====================================================
	GET ALL POSTS
====================================================*/
	public function get_posts(){
	//	Descending Posts
		$this->query('SELECT * FROM posts ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
	}


/*====================================================
	ADD
====================================================*/
	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['title'] == '' || $post['body'] == '' ){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO posts (title, body, user_id) 
						  VALUES(:title, :body, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':user_id', 1);
			$this->execute();
			// Verify
			if($this->lastInsertId() ) {
				// Redirect
				header('Location: '.ROOT_URL.'posts');
			}
		}
		return;
	}

/*====================================================
	GET SINGLE POST
====================================================*/
	public function getPostById($id){
		
		$this->query('SELECT * FROM posts WHERE id=:id');
		$this->bind(':id', $id ) ;
		$row = $this->single();
		return $row;
	}


}