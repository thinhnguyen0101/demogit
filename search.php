<?php
session_start();

include('functions.php');
$username=$_GET['username'];  
$results = [];

$query = "SELECT * FROM users WHERE username LIKE '%".$username."%' or email LIKE '%".$username."%'";
$results = mysqli_query($conn,$query);
?>

<html>
    <head>
        <title>Register</title>
        
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/css/styles.css">
    </head>
    <body>
		<div class="container">
        <div class="header">
            <h2>List Search</h2>
        </div>
        <form action="search.php" method="GET"> 
    <input type="text" name="username" placeholder="Nhập thông tin cần tìm" /> 
    <input type="submit" value="Search"></input> 
    </form>
        <form >
            <?php echo display_error(); ?>	

            <table class="table">
                <thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Full name</th>
						<th scope="col">Email</th>
						<th scope="col">Action</th>
					</tr>
                </thead>
                <tbody>
                
                    <?php foreach ($results as $result): ?>
                    <tr scope="row">
                        <td><?php echo $result['id']; ?></td>   
                        <td><?php echo $result['username']; ?></td>   
                        <td><?php echo $result['fullname']; ?></td>   
                        <td><?php echo $result['email']; ?></td> 
                        <td>
							<a href="chitiet.php?id=<?php echo $result['id']?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
						
							<a href="edit.php?id=<?php echo $result['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <a href="delete.php?id=<?php echo $result['id']?>" class="delete"><i class="fa fa-times" aria-hidden="true"></i></a>
							
						</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </form>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
          
        </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Are you delete?')){
                    e.preventDefault();
                    return false;
                 }
                return true;
            });
        });
</script>
    </body>
</html>