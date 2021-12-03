<?php include('admin.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body {
        font-size: 62.5%;
      }
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .form-container {
        width: 960px;
        max-width: calc(100% + 24px);
        height: auto;
        border-radius: 4px;
        padding: 12px;
      }

      .form-group {
        display: flex;
        flex-direction: column;
      }

      .form-label {
        display: block;
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 8px;
      }

      .form-control {
        flex: 1;
        padding: 12px 12px;
        margin-bottom: 20px;
      }

      .btn {
        display: block;
        margin: 0 auto;
        padding: 12px;
        background-color: rgba(0, 0, 0, 0.4);
        border: none;
        border-radius: 4px;
        width: 200px;
        font-size: 1.6rem;
        cursor: pointer;
      }
      .btn:hover {
        opacity: 0.8;
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
          <div class="form-container">
            <div class="form-group">
              <label for="" class="form-label">Mã thí sinh</label>
              <input type="text" name="MaThiSinh" placeholder="Mã thí sinh" class="form-control" required />
            </div>
            <div class="form-group js-form-group">
              <label for="" class="form-label">Tên thí sinh</label>
              <input type="text" name="TenThiSinh" placeholder="Tên thí sinh" class="form-control" required />
            </div>
            <div class="form-group js-form-group">
              <label for="" class="form-label">Ngày sinh</label>
              <input type="text" name="NgaySinh" placeholder="Ngày sinh" class="form-control" required />
            </div>
            <div class="form-group js-form-group">
              <label for="" class="form-label">Quê quán</label>
              <input type="text" name="QueQuan" placeholder="Quê quán" class="form-control" required />
            </div>
            <div class="form-group js-form-group">
              <label for="" class="form-label">Tổng điểm</label>
              <input type="number" name="TongDiem" placeholder="Tổng điểm" class="form-control" required />
            </div>
              <input type="submit" value="create" class="btn btn-create" name="create" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
