<?php
	$conn = mysqli_connect("localhost","t63301280024","26122543","db6424")or die("die");
	$query  = "select * from  user";

	$result=mysqli_query($conn,$query);
	
	
?>
<html>
<title>จัดการระบบสมาชิก</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

</head>
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
td,
th {
    border: 1px solid rgb(190, 190, 190);
    padding: 10px;
}

td {
    text-align: center;
}

tr:nth-child(even) {
    background-color: #eee;
}

th[scope="col"] {
    background-color: #696969;
    color: #fff;
}

th[scope="row"] {
    background-color: #d7d9f2;
}
.btn-edit{
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	background-color: #04AA6D;
	color: white;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 30%;
	align: center;
	}

	.btn-edit:hover {
	background-color: #ddd;
	color: black;
	}
	.btn-delete{
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	background-color: red;
	color: white;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 30%;
	align: center;
	}
	.btn-delete:hover {
	background-color: #ddd;
	color: black;
	}
	.btn-insert{
	text-decoration: none;
	display: inline-block;
	padding: 8px 16px;
	background-color: grey;
	color: white;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 30%;
	align: center;
	}
	.btn-insert:hover {
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
<body>
<div class="scrollmenu">
  <a class ="one" href="cartmanage.php"><img src="images/cart.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบตะกร้าสินค้า</a>
  <a class ="one"href="membermanage.php"><img src="images/users.png" alt="" id="logo" style="width:42px;height:42px;"><br>จัดการระบบสมาชิก</a>
  <a class ="one"href="webboard.php"><img src="images/webboard.png" alt="" id="logo" style="width:80px;height:42px;"><br>webboard</a>
  <a class ="one"href="guestbook.php"><img src="images/book.png" alt="" id="logo" style="width:50px;height:42px;"><br>guestbook</a>
  <a class ="one"href="cart.php"><img src="images/shop.png" alt="" id="logo" style="width:50px;height:42px;"><br>shop</a>
  <a class ="one"href="index.php"><img src="images/exit.png" alt="" id="logo" style="width:50px;height:42px;"><br>LOGOUT</a>
</div>
<br><br>
<table align="center" border = "1px" style"width:50%; line-height:30px;">
	<tr>
		<th>ID</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>PERMISSION</th>
		<th>ACTION</th>
	</tr>
	<?php 
		while($rows=mysqli_fetch_array($result))
			{ 
		?>
		
				<tr>
					<td><?php echo $rows['id'];?></td>
					<td><?php echo $rows['name'];?></td>
					<td><?php echo $rows['password'];?></td>
					<td><?php echo $rows['permission'];?></td>
					<td><a class='btn-edit' href='edit.php?id=<?php echo $rows['id'];?>'>edit</a>
					<a class='btn-delete' href='delete.php?id=<?php echo $rows['id'];?>'>delete</a>
					<a class='btn-insert' href='insert.php'>insert</a>
					</td>
				</tr>
		<?php	
		}
			?>
</table>
</body>
</html>