<?php
session_start();
include 'dbconnect.php';

// Update User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $updated_email = $_POST['updated_email'];
    $updated_phone = $_POST['updated_phone'];
    $updated_username = $_POST['updated_username'];
    $updated_password = $_POST['updated_password'];

    // Use the updateUser function
    updateUser($edit_id, $updated_email, $updated_phone, $updated_username, $updated_password);
    // Redirect back to the user data page
    header("Location: userdata.php");
    exit();
}

// Delete User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];

    // Use the deleteUser function
    deleteUser($delete_id);
    // Redirect back to the user data page
    header("Location: userdata.php");
    exit();
}

// Fetch user data
$user_data = [];
$result = $connection->query("SELECT * FROM users");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row" style="padding-top: 5%;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <!-- User Data Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Display user data -->
                    <?php foreach ($user_data as $user) : ?>
                        <tr>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['phone_number']; ?></td>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['password']; ?></td>
                            <td>
                                <!-- Edit User Modal Button -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $user['id']; ?>">
                                    Edit
                                </button>
                                <!-- Delete User Modal Button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user['id']; ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editModal<?= $user['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $user['id']; ?>" aria-hidden="true">
                            <!-- Your edit user modal content goes here -->
                            <!-- Example: Include form fields for updating user information -->
                        </div>

                        <!-- Delete User Modal -->
                        <div class="modal fade" id="deleteModal<?= $user['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $user['id']; ?>" aria-hidden="true">
                            <!-- Your delete user modal content goes here -->
                            <!-- Example: Confirmation message and form for deleting user -->
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
