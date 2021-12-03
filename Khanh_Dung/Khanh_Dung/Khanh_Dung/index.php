<?php include('admin.php') ?>
<!DOCTYPE html>
<html>
  <style>
    body {
      font-size: 62.5%;
    }
    tr:last-child {
      margin-bottom: 20px;
    }
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      font-size: 1.6rem;
    }

    td a {
      text-decoration: none;
      color: black;
      padding: 0px 12px;
    }

    td a:hover {
      color: blue;
      border-bottom: 1px solid blue;
    }

    .nav-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.4);
      margin-bottom: 12px;
      height: 72px;
      overflow: hidden;
    }

    .nav-bar a {
      padding: 12px;
      font-size: 1.6rem;
      text-decoration: none;
      color: white;
      margin: 8px 0;
    }

    .delete,
    .update,
    .create {
      border-top: 2px solid white;
      border-bottom: 2px solid white;
      height: 50px;
      line-height: 50px;
      transition: all linear 0.2s;
    }

    .delete:hover,
    .update:hover,
    .create:hover {
      height: 28px;
      line-height: 28px;
    }
  </style>

  <body>
    <div class="nav-bar">
      <a href="create.php" class="create">Tạo</a>
      <a href="update.php" class="update">Sửa</a>
      <a href="delete.php" class="delete">Xóa</a>
    </div>
    <form action="" method="post">

      <table style="width: 100%">
        <tr>
          <th>Mã thí sinh</th>
          <th>Tên thí sinh</th>
          <th>Ngày sinh</th>
          <th>Quê quán</th>
          <th>Tổng điểm</th>
        </tr>

 <?php $results = mysqli_query($db, "SELECT * FROM thisinh"); ?>
 <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['MaThiSinh']; ?></td>
          <td><?php echo $row['TenThiSinh']; ?></td>
          <td><?php echo $row['NgaySinh']; ?></td>
          <td><?php echo $row['QueQuan']; ?></td>
          <td><?php echo $row['TongDiem']; ?></td>
        </tr>

         <?php } ?>

         <input type="submit" name="search">
        <input type="text" name="TenThiSinh" placeholder="Tìm kiếm theo tên">
      </table>
    </form>
    
  </body>
</html>
