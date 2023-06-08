
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
	.job{
		width: 50%;
		height: 500px;
		padding: 20px;
		margin-bottom: 4px;
		background-color: white;
		border-radius: 4px;
		box-shadow: 5px 3px;
		top: 50%;
		left: 50%;
		margin-left: 25%;
		margin-top: 5%;
		font-size: 150%;
		
	}
	div{
	display: block;
	margin-left: auto;
	margin-right: auto;
	}

	
</style>
<body>

<a href="guestbook3.php" class="next">โพสต์จ้างงาน</a><br>



</body>
</html>
<?php
	$conn = mysqli_connect("localhost","t63301280024","26122543","db6424");


	$select  = "select * from  toppic order by id desc";
	
	$result= mysqli_query($conn, $select );
	while($row = mysqli_fetch_assoc($result)){
		echo "<div class = 'job'>";
		echo   อีเมลล์.": &nbsp";
		echo $row['email']."&nbsp&nbsp";
		echo   หัวข้อ.": &nbsp";
		echo $row['toppic']."<br><br>";
		echo $row['text']."<br><br>";
		echo "</div>";
	}

	
	
?>
