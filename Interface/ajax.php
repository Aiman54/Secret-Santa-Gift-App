<?php

require 'functions.php';

if (!empty($_POST['data_type'])) {
    $info['data_type'] = $_POST['data_type'];
    $info['errors'] = [];
    $info['success'] = false;

    if ($_POST['data_type'] == "signup") {
        require 'includes/signup.php';
    } elseif ($_POST['data_type'] == "profile-edit") {
        
			$id = user('id');
	
			$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);
			if($row)
			{
				$row = $row[0];
			}
			require 'includes/profile-edit.php';
		
    } elseif ($_POST['data_type'] == "wishlist") {
        $id = user('id');

		$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);
		if($row)
		{
			$row = $row[0];
		}
		require 'includes/wishlist.php';
    } elseif ($_POST['data_type'] == "profile-delete") {
        $id = user('id');

		$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);
		if($row)
		{
			$row = $row[0];
		}
		require 'includes/profile-delete.php';
    } elseif ($_POST['data_type'] == "login") {
        require 'includes/login.php';
    } elseif ($_POST['data_type'] == "update_interests") {
        // Handle updating user interests
        // Retrieve the "interest1", "interest2", and "interest3" data from the form submission
        $interest1 = $_POST['interest1'];
        $interest2 = $_POST['interest2'];
        $interest3 = $_POST['interest3'];

        // Validate the data (you can add more validation as needed)
        if (empty($interest1)) {
            $info['errors']['interest1'] = "Interest 1 cannot be empty.";
        }
        if (empty($interest2)) {
            $info['errors']['interest2'] = "Interest 2 cannot be empty.";
        }
        if (empty($interest3)) {
            $info['errors']['interest3'] = "Interest 3 cannot be empty.";
        }

        // Check if there are any errors before updating the database
        if (empty($info['errors'])) {
            // If the data is valid, update the user's interests in the database
            $user_id = user('id');
            $update_query = "UPDATE users SET interest1 = :interest1, interest2 = :interest2, interest3 = :interest3 WHERE id = :user_id";
            $update_data = array(
                'interest1' => $interest1,
                'interest2' => $interest2,
                'interest3' => $interest3,
                'user_id' => $user_id
            );

            $result = db_query($update_query, $update_data);

            // Check if the update was successful
            if ($result) {
                $info['success'] = true;
            } else {
                $info['errors']['general'] = "Failed to update interests. Please try again later.";
            }
        }
    } else {
        // Invalid data_type provided
        $info['errors']['general'] = "Invalid data_type.";
    }

    echo json_encode($info);
} else {
    $info['errors']['general'] = "Invalid request method.";
}

