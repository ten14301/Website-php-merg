<?php
$conn = mysqli_connect("localhost","t63301280024","26122543","db6424")or die("die");

$id = $_POST['id'];
$pass = $_POST['pass'];
$sql = "select * from user where name = '$id'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0 ){

$row = mysqli_fetch_assoc($result);
$userid =  $row['name'];
$password = $row['password'];
$permission = $row['permission'];

if($pass==$password && $id==$userid){
	if($permission == 'admin'){
		echo '<script>alert("welcome admin")</script>';
		header("location: membermanage.php");
	}
	else if($permission == 'member'){
		echo '<script>alert("welcome staff")</script>';
		header("location: cartmanage2.php");
	}
	else if($permission == 'guest'){
		echo '<script>alert("welcome guess")</script>';
		header("location: guestbook3.php");
	}
	else{
		echo '<script>alert("no permission for you")</script>';
	}

}
else{
	echo '<script>alert("USERNAME OR PASSWORD INCCORECT")</script>';
}
}


	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://fonts.cdnfonts.com/css/smw-text-nc" rel="stylesheet">
<style>
*{
	font-family: 'SMW Text NC', sans-serif;
}
form {border: 3px solid #f1f1f1;
	border-radius: 30px;

}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
}

button {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  align: center;
  display: inline-block;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  

}


.container {
  padding: 250px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

.center {
    display: block;
    margin: 0 auto;
}

     
   button:hover{
     animation:  shake 0.8s  ;
	 background-color: red;
   }
   
   @keyframes shake{
     0%{
       transform: translateX(0)
     }
     25%{
       transform: translateX(25px);
     }
       
     50%{
       transform: translateX(-25px);
     }
     100%{
       transform: translateX(0px);
     }
   }
     

</style>
</head>
<body>


<form action="index.php" method="post">

  <div class="container">
  <img src="../ALL/images/userbit.png" width="250" height="225" class="center">
	<H1>LOGIN</H1>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="admin or member or guest" name="id" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="admin or member or guest" name="pass" required>
    <div style="text-align:center;">   
    <button type="submit">Login</button>
	</div>
  </div>
</form>

</body>
</html>
