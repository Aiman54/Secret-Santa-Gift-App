<?php 

	require 'functions.php';

	if(!is_logged_in())
	{
		redirect('login.php');
	}

	$id = $_GET['id'] ?? $_SESSION['PROFILE']['id'];

	$row = db_query("select * from users where id = :id limit 1",['id'=>$id]);

	if($row)
	{
		$row = $row[0];
	}

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
</html><br><br><br><br>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
	<style>
		textarea[name="wishlist"] {
        height: auto;
        min-height: 200px;
       
    }

   
	</style>

	
</head>
<body>

	<?php if(!empty($row)):?>
	
		<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-4 text-center">
				<img src="<?=get_image($row['image'])?>" class="js-image img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
				<div><br>
					
					<div><small class="js-error js-error-image text-danger"></small></div>
				</div>
			</div>
			<div class="col-md-8">
				
				<div class="h2">Edit Wishlist</div>

				<form method="post" onsubmit="myaction.collect_data(event, 'wishlist')">
					<table class="table table-striped">
						<tr><th colspan="2">User Wishlist:</th></tr>
						<tr>
							
							<td style="display: none;">
								<input value="<?=$row['email']?>" type="text" class="form-control" name="email" placeholder="Email">
								<div><small class="js-error js-error-email text-danger"></small></div>
							</td>
						</tr>
						<tr>
							
							<td style="display: none;">
								<input value="<?=$row['firstname']?>" type="text" class="form-control" name="firstname" placeholder="First name">
								<div><small class="js-error js-error-firstname text-danger"></small></div>
							</td>
						</tr>
						<tr>
							<td style="display: none;">
								<input value="<?=$row['lastname']?>" type="text" class="form-control" name="lastname" placeholder="Last name">
								<div><small class="js-error js-error-lastname text-danger"></small></div>
							</td>
						</tr>
                        <tr>
                            <th><i class="bi bi-person-square"></i> Wish list</th>
                            <td>
								<textarea class="form-control" name="wishlist" placeholder="Wishlist" rows="4"><?=$row['wishlist']?></textarea>
                                <div><small class="js-error js-error-wishlist text-danger"></small></div>
                            </td>
                        </tr>
						<tr>
							
							<td style="display: none;">
								<select name="gender" class="form-select form-select mb-3" aria-label=".form-select-lg example">
									<option value="">--Select Gender--</option>
									<option selected value="<?=$row['gender']?>"><?=$row['gender']?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
								<div><small class="js-error js-error-gender text-danger"></small></div>
							</td>
						</tr>
						<tr>
							
							<td style="display: none;">
								<input type="password" class="form-control" name="password" placeholder="Password (leave empty to keep old password)">
								<div><small class="js-error js-error-password text-danger"></small></div>
							</td>
						</tr>
						<tr>
							
							<td style="display: none;">
								<input type="password" class="form-control" name="retype_password" placeholder="Retype Password">
							</td>
						</tr>

					</table>

					<div class="progress my-3 d-none">
					  <div class="progress-bar" role="progressbar" style="width: 50%;">Working... 25%</div>
					</div>

					<div class="p-2">
						<button class="btn btn-primary float-end">Save</button>
						<a href="index.php">
							<label class="btn btn-secondary">Back</label>
						</a>
					</div>
				</form>

			</div>
		</div>

	<?php else:?>
		<div class="text-center alert alert-danger">That profile was not found</div>
		<a href="index.php">
			<button class="btn btn-primary m-4">Home</button>
		</a>
	<?php endif;?>

</body>
</html>


<script>

	var image_added = false;

	function display_image(file)
	{
		var img = document.querySelector(".js-image");
		img.src = URL.createObjectURL(file);

		image_added = true;
	}
 
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select, form textarea");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			if(image_added)
			{
				myform.append('image',document.querySelector('.js-image-input').files[0]);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			});

			ajax.open('post','ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(result);
			var obj = JSON.parse(result);
			if(obj.success)
			{
				alert("Profile edited successfully");
				window.location.reload();
			}else{

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for(key in obj.errors)
				{
					document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>
