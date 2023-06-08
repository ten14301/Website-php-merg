<?php
$conn = mysqli_connect("localhost","t63301280024","26122543","db6424")or die("die");

if(isset($_POST['submit'])){
	echo '<script>alert("การสั่งซื้อเสร็จสิ้น")</script>';
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@font-face {
    font-family: 'PS LCD 3310';
    src: url('PSLCD3310.eot');
    src: url('PSLCD3310.eot?#iefix') format('embedded-opentype'),
        url('PSLCD3310.woff2') format('woff2'),
        url('PSLCD3310.woff') format('woff'),
        url('PSLCD3310.ttf') format('truetype'),
        url('PSLCD3310.svg#PSLCD3310') format('svg');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
* {
    font-family: 'PS LCD 3310';
    font-weight: normal;
    font-style: normal;
	text-align: center;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  background-color: #8B0000;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


.container {
  padding: 250px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
a {
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	background-color: #04AA6D;
	color: white;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 97%;
	align: center;
	}

	a:hover {
	background-color: #ddd;
	color: black;
	}


}
</style>
</head>
<body>


<form action="checkbill.php" method="post">

  <div class="container">
    <label for="uname"><b>ชื่อ</b></label> 
    <input type="text"  name="name" value ="" required>

	<label for="psw"><b>ที่อยู่</b></label>
    <input type="text"  name="password" value ="" required>
	
	<label for="permission"><b>เบอร์โทรศัพท์</b></label>
	<input type="text"  name="password" value ="" required>

        
    <button type="submit" name="submit">สั่งซื้อ</button>
	<a href="cart.php" style="font-size:14px; text-align: center">back</a>
  </div>
</form>

</body>
</html>