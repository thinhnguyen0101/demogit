<?php 
session_start();

include('functions.php');

// if (isset($_GET['edit'])) {
//     if(isLoggedIn()){
//         $query = "SELECT * FROM users WHERE id=" . $_SESSION['user']['id'];
//         $results = mysqli_query($conn, $query);
        
//     }
// }
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `users` where id='$id'");
$row=mysqli_fetch_assoc($query);

?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
<div class="header">
	<h2>Edit User</h2>
</div>
</form>

<form method="post" action="">
	<?php echo display_error(); ?>	
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" value="<?php echo $row['username']; ?>" name="username1">
        </div>
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" value="<?php echo $row['fullname']; ?>" name="fullname1">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" value="<?php echo $row['email']; ?>" name="email1">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="save_btn">Save</button>
        </div>


        <?php
        if (isset($_POST['save_btn'])){
            $id=$_GET['id'];
            $username=$_POST['username'];
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
        
            // Create connection
            $conn = new mysqli("localhost", "root", "", "users");
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "UPDATE `users` SET username='$username', fullname=$fullname', email='$email' WHERE id='$id'";
            
            if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            } else {
            echo "Error updating record: " . $conn->error;
            }
            
            $conn->close();
            }
            ?>

<div class="back" style="text-align: center">
    <input type="button" value="Back" onClick="javascript:history.go(-2)" />
</div>
	


</body>
</html>