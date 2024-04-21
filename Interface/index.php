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

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wishlist = $_POST['wishlist'] ?? '';
    
    // Update the user's wishlist
    db_query("UPDATE users SET wishlist = :wishlist WHERE id = :id", ['wishlist' => $wishlist, 'id' => $id]);
    
    // Redirect to the profile page
    redirect("profile.php?id=$id");
    }


?><br><br><br>

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
	
	
</head>
<body>

<style>

  .btn2 {
    display: inline-block;
    background-color: #097969; /* Green background */
    color: white; /* White text */
    padding: 10px 20px; /* Padding around   text */
    text-align: center; /* Centered text */
    text-decoration: none; /* Remove underline */
    border-radius: 4px; /* Rounded corners */
    transition: background-color 0.3s; /* Smooth transition on hover */
    font-size: 16px; /* Font size */
  }

  .btn2:hover:hover {
    background-color: #45a049; /* Darker green on hover */
  }

  
</style>

<?php if (!empty($row)): ?>
    <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
        <div class="col-md-4 text-center">
            <img src="<?= get_image($row['image']) ?>" class="img-fluid rounded"
                 style="width: 180px; height: 180px; object-fit: cover;">
            <div>
                <?php if (user('id') == $row['id']): ?>
                    <a href="profile-edit.php">
                        <button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
                    </a>
                    <a href="profile-delete.php">
                        <button class="mx-auto m-1 btn-sm btn btn-warning text-white">Delete</button>
                    </a>
                    <a href="logout.php">
                        <button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
                    </a>
                    <div class="button-container align-self-end">
                        <a href="wishlist.php">
                            <button class="mx-auto m-1 btn-sm btn btn-success text-white">Write your Wishlist!</button>
                        </a>
                    </div>
                    <div class="button-container align-self-end">
                      <a href="interest.php">
                          <button class="mx-auto m-1 btn-sm btn btn-danger text-red">My Interest</button>
                      </a>
                   </div><br>
                <?php endif; ?>
            </div><br>
            <table class="table table-striped">
              <tr>
                  <th></th>
                  <th>I'm Interested with:</th>
              </tr>
              <tr>
                  <td>1.</td>
                  <td><?= esc($row['interest1']) ?></td>
              </tr>
              <tr>
                  <td>2.</td>
                  <td><?= esc($row['interest2']) ?></td>
              </tr>
              <tr>
                  <td>3.</td>
                  <td><?= esc($row['interest3']) ?></td>
              </tr>
          </table>

            <div class="col-md-8 d-flex flex-column"><br>
        </div>
      </div>
        <div class="col-md-8 d-flex flex-column">
            <div class="h2">User Profile</div>
            <table class="table table-striped">
                <tr>
                    <th colspan="2">User Details:</th>
                </tr>
                <tr>
                    <th><i class="bi bi-envelope"></i> Email</th>
                    <td><?= esc($row['email']) ?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-person-circle"></i> First name</th>
                    <td><?= esc($row['firstname']) ?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-person-square"></i> Last name</th>
                    <td><?= esc($row['lastname']) ?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                    <td><?= esc($row['gender']) ?></td>
                </tr>
            </table>
            <table class="table table-striped mt-4">
                <tr>
                    <th>My Wishlist</th>
                </tr>
                <?php
                // Split the wishlist items by new lines
                $wishlistItems = explode("\n", $row['wishlist']);
                foreach ($wishlistItems as $item):
                    ?>
                    <tr>
                        <td>
                            <div class="form-check">
                            <input class="form-check-input wishlist-checkbox" type="checkbox" name="selectedWishlist[]" 
                                    value="<?= esc($item) ?>" id="checkbox-<?= esc($item) ?>">
                                <label class="form-check-label"><?= esc($item) ?></label>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="flex-grow-1"></div> <!-- Empty space to push the button to the bottom -->
        </div>
    </div><br>

    <div class="text-center p-1">
        <form action="users.php?id=<?= $id ?>" method="POST">
            <button type="submit" class="btn2">Back To All User</button>
        </form>
    </div>

<?php else: ?>
    <br>
    <div class="text-center alert alert-danger">That profile was not found</div>
    <a href="index.php">
        <button class="btn btn-primary m-4">Home</button>
    </a>

<?php endif; ?>

<script>
  // Retrieve the selected checkboxes from localStorage
  const selectedCheckboxes = JSON.parse(localStorage.getItem('selectedCheckboxes')) || [];

  // Check the corresponding checkboxes based on the stored selections
  selectedCheckboxes.forEach(item => {
    const checkbox = document.getElementById(`checkbox-${item}`);
    if (checkbox) {
      checkbox.checked = true;
    }
  });

  // Add event listeners to the checkboxes to update the stored selections
  const checkboxes = document.querySelectorAll('.wishlist-checkbox');
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      const checkboxValue = this.value;
      if (this.checked) {
        selectedCheckboxes.push(checkboxValue);
      } else {
        const index = selectedCheckboxes.indexOf(checkboxValue);
        if (index > -1) {
          selectedCheckboxes.splice(index, 1);
        }
      }
      // Store the updated selections in localStorage
      localStorage.setItem('selectedCheckboxes', JSON.stringify(selectedCheckboxes));
    });
  });
</script>

</body>
</html>


