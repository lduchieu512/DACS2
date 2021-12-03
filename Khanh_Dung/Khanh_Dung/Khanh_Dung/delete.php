<?php require 'admin.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style type="text/css">

		.btn-link {
			position: relative;
			z-index: 20;
		}
		.container {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		input {
			padding: 12px;
		}

		.form-control {
			width: 600px;
		}

		.btn-delete {
			padding: 12px 40px;
			background-color: rgba(0, 0, 0, 0.4);
			border:none;
			border: 1px solid rgba(0, 0, 0, 0.4);
			cursor: pointer;
		}

		.btn-delete:hover {
			opacity: 0.6;
		}

		.nav-bar {
	      display: flex;
	      justify-content: center;
	      align-items: center;
	      background-color: rgba(0, 0, 0, 0.4);
	      margin-bottom: 12px;
	      height: 72px;
	      overflow: hidden;
	      position: relative;
	      z-index: 10;
	    }

	    .nav-bar a {
	      padding: 12px;
	      font-size: 1.6rem;
	      text-decoration: none;
	      color: white;
	      margin: 8px 0;
	    }

	    .home,
	    .delete,
	    .update,
	    .create {
	      border-top: 2px solid white;
	      border-bottom: 2px solid white;
	      height: 50px;
	      line-height: 50px;
	      transition: all linear 0.2s;
	    }

	    .home:hover,
	    .delete:hover,
	    .update:hover,
	    .create:hover {
	      height: 28px;
	      line-height: 28px;
	    }
	</style>
</head>
<body>
	<div class="main">
		<div class="nav-bar">
			<a href="index.php" class="home">Trang Chủ</a>
		    <a href="create.php" class="create">Tạo</a>
		    <a href="update.php" class="update">Sửa</a>
		    <a href="delete.php" class="delete">Xóa</a>
	    </div>
		<div class="container">
			<form action="" method="post">
				<input type="text" name="TenThiSinh" placeholder="Nhập tên thí sinh cần xóa" class="form-control" required>
				<input type="submit" name="delete" value="Xóa" class="btn-delete">
			</form>
		</div>
	</div>
</body>
</html>