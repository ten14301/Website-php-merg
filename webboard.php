<?php 
		$topic = $_POST["topic"];
		$detail = $_POST["detail"];
		$name = $_POST["name"];

		// กำหนดชื่อโฮสต์, user name และรหัสผ่าน	
		$link = mysqli_connect("localhost","t63301280024","26122543")or die("ไม่สามารถเข้าสู่ระบบได้");
		mysqli_set_charset($link,'utf8');
		$sql = "Use db6424";	//เรียกใช้ฐานข้อมูลชื่อว่า Board	
		$result = mysqli_query($link, $sql)or die ("ไม่สามารถเข้าฐานได้");	
		$sql = "Select * From Question;";	//ดึงทุกเรคอร์ดจากตาราง Question
		$count = 0;		// กำหนดจำนวนคำถามเริ่มต้นให้เท่ากับ 0
		if(isset($_POST['Submit'])){
		$result = mysqli_query($link, $sql);	
		while ($dbarr = mysqli_fetch_array($result)) 	
		{		
			$count++; 		//วนลูปเพื่อนับจำนวนคำถามที่มีอยู่ทั้งหมดในตาราง
		}	
		$itemno = $count + 1; 	//เพิ่มจำนวนข้อคำถามขึ้นอีกหนึ่ง	
		// เพิ่มหมายเลขข้อ, หัวข้อ, รายละเอียด, ชื่อผู้ตั้งกระทู้, 0 ลงในตาราง Question
		
		$sql = "Insert into Question Values($itemno, '$topic', 
				'$detail', '$name', 0);";
		$result = mysqli_query($link, $sql)or die ("ไม่สามารถแอดได้");
			echo '<script>alert("บันทึกข้อมูลสำเร็จ")</script>';
			
		}
?>



<html>
<head>
<title>ฟอร์มตั้งกระทู้</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
</head>
<body>
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
	body{
		background-color:Cornsilk;
	}


	form{
	background-color:white;
	max-width: 100%;
	border-radius: 15px;
	border: 0.5px solid;
	width: 1000px;
	height: 700px;
	text-align: center;
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


	input[type=submit] {
	background-color: #5F9EA0;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;


	}
	input[type=reset] {
	background-color: #FF6433;
	color: white;
	padding: 12px 20px;
	border: none;
	border-radius: 4px;
	cursor: pointer;


	}
	input[type=reset]:hover {
	background-color: #F0F8FF;
	}
	input[type=submit]:hover {
	background-color: #F0F8FF;
	}
	.button {
	color: #FF337D;
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	}

	.button:hover {
	background-color: #ddd;
	color: black;
	}
	div.scrollmenu {
  background-color: #062C30;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: #E2D784;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #F5F5F5;
  text-decoration: underline;
  color: #05595B;
}

</style>
<div class="scrollmenu">
  <a class ="one" href="cartmanage.php"><img src="images/cart.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบตะกร้าสินค้า</a>
  <a class ="one"href="membermanage.php"><img src="images/users.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบสมาชิก</a>
  <a class ="one"href="webboard.php"><img src="images/webboard.png" alt="" id="logo" style="width:80px;height:42px;"><br>webboard</a>
  <a class ="one"href="guestbook.php"><img src="images/book.png" alt="" id="logo" style="width:50px;height:42px;"><br>guestbook</a>
  <a class ="one"href="cart.php"><img src="images/shop.png" alt="" id="logo" style="width:50px;height:42px;"><br>shop</a>
  <a class ="one"href="index.php"><img src="images/exit.png" alt="" id="logo" style="width:50px;height:42px;"><br>LOGOUT</a>
</div>
<br>
<form name="form1" method="post" action="webboard.php">
<h1>Web Board</h1>
หัวข้อของกระทู้:<br> 
    <br><input type="text" name="topic"  required="required"><p><br>
รายละเอียด:<br>
  	 <br><textarea name="detail" cols="75" rows="10"  required="required"></textarea>
 
  <br><br>ชื่อผู้ตั้งกระทู้: <! ชื่อ Textbox ของผู้ตั้งกระทู้คือ name>
    <br><br><input type="text" name="name"  required="required" ><p>
    <input type="submit" name="Submit" value="ส่งกระทู้">    
    <input type="reset" name="Submit2" value="ยกเลิก"><br>
	<a class= "button" href="show_question.php">กระทู้ทั้งหมด</a>
</form>
</body>
</html>
