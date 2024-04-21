<?php

session_start();

function db_query(string $query, array $data = array())
{
	$string = "mysql:hostname=localhost;dbname=new";
	$con = new PDO($string, 'root', '');

	$stm = $con->prepare($query);
	$check = $stm->execute($data);

	if($check)
	{
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if(is_array($res) && !empty($res))
		{
			return $res;
		} 
	}

	return false;
}

function is_logged_in():bool
{

	if(!empty($_SESSION['PROFILE']))
	{
		return true;
	}

	return false;
}

function redirect($path):void
{
	header("Location: $path");
	die;
}

function esc(string $str):string
{
	return htmlspecialchars($str);
}

function get_image($path = ''):string 
{
	if(file_exists($path))
	{
		return $path;
	}

	return './images/no-image.jpg';
}

function user(string $key = '')
{
	if(is_logged_in())
	{
		if(!empty($_SESSION['PROFILE'][$key]))
		{
			return $_SESSION['PROFILE'][$key];
		}
	}

	return false;
}

function addTodoItem($user_id, $item) {
    // Perform database query to insert the to-do item for the given user_id
}

function getTodoItems($user_id) {
    // Perform database query to retrieve the to-do items for the given user_id
    // Return the results as an array
}

function deleteTodoItem($todo_id) {
    // Perform database query to delete the to-do item with the given todo_id
}