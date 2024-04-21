<?php 

	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$rows = db_query("select * from users");


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsive Christmas Website</title>
  <style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }
  
  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    background-color: transparent;
    z-index: 999;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect */
  }
  
  .header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .header-logo {
    font-size: 24px;
    font-weight: bold;
    color: black;
    margin-right: auto; /* Move logo to the left */
  }
  
  .header-buttons {
    display: flex;
    align-items: center;
  }
  
  .header-button {
    margin-left: 22px;
    padding: 6px 12px;
    background-color: #D22B2B; /* Light red color */
    border: none;
    color: whitesmoke;
    font-size: 17px;
    cursor: pointer;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Shadow effect on cursor hover */
  }
  
  .header-button:hover {
    background-color: #ffb3b3; /* Lighter red color on cursor hover */
  }
</style>
</head>
<body>
  <header class="header">
    <div class="header-content">
      <div class="header-logo">
        Gift Wishlist Recommender System
      </div>
      <div class="header-buttons">
        <button class="header-button" onclick="location.href='../home.php'">Home</button>
        <button class="header-button" onclick="location.href='login.php'">Login</button>
        <button class="header-button" onclick="window.open('http://localhost:8501/', '_blank')">Gift Recommender</button>
        <button class="header-button" onclick="location.href='users.php'">Friend List</button>
        <button class="header-button" onclick="location.href='signup.php'">Signup</button>
      </div>
    </div>
  </header>

  <!-- Rest of your content -->
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
  <style>
    
  </style>
	
</head>

<body>
<div class="background-image"></div> <!-- Create a div for the background image -->
	<div class="row">
	<?php if(!empty($rows)):?>
		<?php foreach($rows as $row):?>
			<div class="col-2 border rounded mx-auto mt-5 p-2 shadow-lg" style="width:200px;">
				<a href="index.php?id=<?=$row['id']?>">
					<div class="col-md-12 text-center">
						<img src="<?=get_image($row['image'])?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
						<div>

						 	<div><?=esc($row['email'])?></div>
						 	<div><?=esc($row['firstname'])?> <?=esc($row['lastname'])?></div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach;?>
	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>
	</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Redirect Form</title>
  <style>
    /* CSS styles for the button and form */
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }

    form {
      display: flex;
      justify-content: center;
      align-self: flex-end;
    }

    .redirect-button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .redirect-button:hover {
      background-color: #45a049;
    }
	
  </style>
</head>
<body>
  <h1></h1>
  
  </form>
</body>
</html>


