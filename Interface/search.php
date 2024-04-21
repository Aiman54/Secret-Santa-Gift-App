<?php
require 'functions.php';

if (!is_logged_in()) {
    redirect('login.php');
}

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResults = db_query("SELECT * FROM users WHERE firstname LIKE :search OR lastname LIKE :search", ['search' => "%$searchTerm%"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- ... your head content ... -->
</head>
<body>
    <!-- ... your navigation header ... -->

    <div class="container">
        <h2>Search Results</h2>
        <?php if (!empty($searchResults)): ?>
            <div class="row">
                <?php foreach ($searchResults as $result): ?>
                    <!-- Display search results here -->
                    <div class="col-md-3">
                        <div class="user-card">
                            <!-- Display user information here -->
                            <p><?= esc($result['firstname']) ?> <?= esc($result['lastname']) ?></p>
                            <!-- ... other user data ... -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>

    <!-- ... rest of your content ... -->
</body>
</html>
