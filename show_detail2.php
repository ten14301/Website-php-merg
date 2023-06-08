
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
	h1{
	
	}

	form{
	background-color:white;
	max-width: 100%;
	border-radius: 15px;
	border: 0.5px solid;
	width: 1000px;
	height: 400px;
	margin-left: 20%;
	margin-top: 5%;

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
	a {
	color: #FF337D;
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	}

	a:hover {
	background-color: #ddd;
	color: black;
	}
	.center{
	margin-left: auto;
	margin-right: auto;
	border-bottom-left-radius: 50px 20px;
	border-bottom-right-radius: 10px;
	padding: 10px;
	}


</style>
<?php
	$item = $_GET["item"];
	
	$link = mysqli_connect("localhost","t63301280024","26122543")or die("ไม่สามารถเข้าสู่ระบบได้");		// กำหนดชื่อโฮสต์, user name และรหัสผ่าน
	mysqli_set_charset($link,'utf8');
	mysqli_query($link,"Use db6424;")or die ("ไม่สามารถเข้าฐานได้");	// เรียกใช้ฐานข้อมูล Board

	function renHTML($strTemp)	 // ฟังก์ชันที่ใช้เปลี่ยนตัวอักษรพิเศษของ HTML ให้แสดงผลได้
	{
		$strTemp = nl2br(htmlspecialchars($strTemp));
		return $strTemp;
	}
	// ดึงเรคคอร์ดจากตาราง Question โดยดึงเฉพาะกระทู้ที่ตรงกับหมายเลขกระทู้ที่ส่งมา
	// มาจากไฟล์ show_question.php
	$sql = "Select * From Question Where qno=$item;";	
	$result = mysqli_query($link,$sql);
	$dbarr = mysqli_fetch_array($result);
?>
คำถาม <b>
<?php
	echo renHTML($dbarr['qtopic']);		// พิมพ์ชื่อหัวข้อกระทู้
?>
</b><br>
<table class = "center" width="20%" border="0"  bgcolor="#E0E0E0">
<tr><td>
<?php 
	echo renHTML($dbarr['qdetail']);	// พิมพ์รายละเอียดของกระทู้
?><br>
	โดย <b>
<?php echo renHTML($dbarr['qname']);	// พิมพ์ชื่อผู้ตั้งกระทู้
?></b>
	</td></tr>
	</table><br>
<?php
// ดึงเรคคอร์ดจากตาราง Answer โดยดึงเฉพาะเรคคอร์ดที่เป็นคำตอบของกระทู้นั้นๆ
	$sql = "Select * From Answer Where ano=$item;";
	$result = mysqli_query($link,$sql);
	if ($result) 
	{
		while ($dbarr = mysqli_fetch_array($result))	 // วนลูปเพื่อแสดงคำตอบทั้งหมด
		{
?>


	<table class = "center" width="20%" border="0" bgcolor="white">
	<tr><td>
<?php
	echo renHTML($dbarr['adetail']);	// พิมพ์คำตอบของกระทู้
?><br>
โดย <b>
<?php 
	echo renHTML($dbarr['aname']);	// พิมพ์ชื่อผู้ตอบกระทู้
?></b>
</td></tr>
</table><br>
<?php
  }
}
// สร้างฟอร์ม โดยกำหนดชื่อไฟล์ที่ทำงานต่อคือ add_answer.php 
// โดยส่งหมายเลขข้อของกระทู้ผ่านตัวแปร answerno ไปด้วย
echo "<form method=post action=add_answer.php?answerno=".$item.">";
mysqli_close($link);
?>
<br><br>คำตอบ : <br>
<! สร้าง Text Area สำหรับรับคำตอบของกระทู้ โดยตั้งชื่อว่า a_answer >
<textarea cols="40" rows="5" name="a_answer" required="required" ></textarea><br>
<! สร้าง Text Box สำหรับรับชื่อของผู้ตอบกระทู้ โดยตั้งชื่อว่า a_name >
<br>ชื่อ :<br> <input type="text" name="a_name" size="30" required="required"><br><br>
<input type="submit" value="ส่งคำตอบ">&nbsp;
<input type="reset" value="ยกเลิก"><br>
<a href="show_question2.php">ย้อนกลับ</a>

</form>