<?php
	$conn = mysqli_connect("localhost","t63301280024","26122543","db6424")or die("die");
	$ipv = $_SERVER['REMOTE_ADDR'];
	date_default_timezone_set('Asia/Bangkok');
	if(isset($_POST['send'])){
		
	$toppic = $_POST['toppic'];
	$text = $_POST['text'];
	$email = $_POST['email'];
		
	$savedata = "insert into toppic(toppic,text,email)values('$toppic','$text','$email');";
	if (mysqli_query($conn, $savedata) === TRUE) {
	$date=date("Y-m-d H:i:s");
	$ipinsert = "insert into ipaddress(ipaddress,time)values('$ipv','$date');";
	mysqli_query($conn, $ipinsert );
	}
	
	}
	
	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
</head>
<title>freelance</title>
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
	
}
	body{
		background-color:Cornsilk;
	}

	h1{
	text-align: center;
	}
	form{
	background-color:white;
	max-width: 100%;
	border-radius: 15px;
	border: 0.5px solid;
	width: 1000px;
	height: 650px;
	display: block;
	margin-left: auto;
	margin-right: auto;

	}
	input[type=text], textarea{
	width: 65%;
	padding: 10px;
	border: 1px solid #ccc;
	border-radius: 10px;
	resize: vertical;
	}
	label {
	padding: 65px;
	}


	.toppic {
	float: left;
	width: 25%;
	margin-top: 6px;

	}
	.input1{
	float: left;
	width: 75%;
	margin-top: 6px;

	}
	input[type=submit] {
	background-color: #5F9EA0;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	margin-left: -200px;

	}
	input[type=submit]:hover {
	background-color: #F0F8FF;
	}
	a {
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	}

	a:hover {
	background-color: #ddd;
	color: black;
	}
	.next {
	background-color: #FFA07A;
	color: white;
	}
	div.scrollmenu {
  background-color: #062C30;
  overflow: auto;
  white-space: nowrap;
  text-align: center;
}

div.scrollmenu a {
  display: inline-block;
  color: #E2D784;
  text-align: center;
  padding: 14px;
  text-decoration: none;
  text-align: center;
}

div.scrollmenu a:hover {
  background-color: #F5F5F5;
  text-decoration: underline;
  color: #05595B;
  text-align: center;
}


</style>
<body>
<div class="scrollmenu">
  <a class ="one" href="cartmanage.php"><img src="images/cart.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบตะกร้าสินค้า</a>
  <a class ="one"href="membermanage.php"><img src="images/users.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบสมาชิก</a>
  <a class ="one"href="webboard.php"><img src="images/webboard.png" alt="" id="logo" style="width:80px;height:42px;"><br>webboard</a>
  <a class ="one"href="guestbook.php"><img src="images/book.png" alt="" id="logo" style="width:50px;height:42px;"><br>guestbook</a>
  <a class ="one"href="cart.php"><img src="images/shop.png" alt="" id="logo" style="width:50px;height:42px;"><br>shop</a>
  <a class ="one"href="index.php"><img src="images/exit.png" alt="" id="logo" style="width:50px;height:42px;"><br>LOGOUT</a>
</div>
<br>


<form method="post" action="guestbook.php"> 


<h1><b>งานที่จะว่าจ้าง<br></h1>
<div class="toppic">
<label>หัวข้อ</label>
</div>
<div class = "input1">
<input type="text" name="toppic"  required="required" ><br>
</div>


<div class = "toppic">
<label>อีเมลล์</label>
</div>
<div class = "input1">
<input type ="text" name="email"  required="required" ><br>
</div>
<div class="toppic">
<label>ข้อความ</label>
</div>
<div class = "input1">
 <textarea id="text" name="text" style="height:200px"  required="required" >
 
 </textarea><br>
 <a href="page2.php" class="next">หางาน</a>
 
</div>


<br><br>
<input type="submit" name="send" value="โพสต์จ้างงาน"><br>	
</form>



</body>
</html>