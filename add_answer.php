<?php
	$answerno = $_GET["answerno"];
	$a_answer = $_POST["a_answer"];
	$a_name = $_POST["a_name"];
		
	$link = mysqli_connect("localhost","t63301280024","26122543")or die("ไม่สามารถเข้าสู่ระบบได้");		// กำหนดชื่อโฮสต์, user name และรหัสผ่าน
	mysqli_set_charset($link,'utf8');
	mysqli_query($link,"Use db6424;")or die ("ไม่สามารถเข้าฐานได้");		// เรียกใช้ฐานข้อมูล Board
	// ดึงเรคคอร์ดจากตาราง Answer โดยมีเงื่อนไขว่าดึงเฉพาะเรคคอร์ดที่หมายเลขข้อของกระทู้
	// ตรงกับค่าที่ส่งมาจากไฟล ์ show_detail.php
	$sql = "Select * From Answer Where ano=$answerno;";
	$count = 1;
	$result = mysqli_query($link,$sql);
	while ($dbarr = mysqli_fetch_array($result))	 // วนลูปเพื่อนับจำนวนคำตอบ
	{
		$count++;		
	}
// เพิ่มเรคคอร์ดใหม่ (คำตอบใหม่) ลงไปในตาราง Answer
$sql = "Insert Into Answer Values ('$answerno', '$count', '$a_answer', '$a_name');";
$result = mysqli_query($link,$sql);
if ($result) 
{
	// แก้ไขจำนวนคำตอบที่มีผู้ตอบในตาราง Question ให้เป็นปัจจุบัน
	$sql = "Update Question Set qCount=qCount+1 Where qno=$answerno;";
	$result = mysqli_query($link,$sql);
	header("location:show_question.php");
}
else {
  echo '<script>alert("ไม่สามารถบันทึกข้อมูลได้")</script>';
}
mysqli_close($link);
?>

