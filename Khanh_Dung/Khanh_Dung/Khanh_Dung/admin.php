<?php
session_start();
    $MaThiSinh = "";
    $TenThiSinh = "";
    $NgaySinh = "";
    $QueQuan = "";
    $TongDiem = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'giuaki');
if (isset($_POST['create']))
{
    $MaThiSinh = mysqli_real_escape_string($db, $_POST['MaThiSinh']);
    $TenThiSinh = mysqli_real_escape_string($db, $_POST['TenThiSinh']);
    $NgaySinh = mysqli_real_escape_string($db, $_POST['NgaySinh']);
    $QueQuan = mysqli_real_escape_string($db, $_POST['QueQuan']);
    $TongDiem = mysqli_real_escape_string($db, $_POST['TongDiem']);

    if (count($errors) == 0)
    {
        $sql = "INSERT INTO thisinh (MaThiSinh, TenThiSinh, NgaySinh, QueQuan, TongDiem) VALUES ('$MaThiSinh', '$TenThiSinh', '$NgaySinh', '$QueQuan', '$TongDiem')";
        mysqli_query($db, $sql);
        $_SESSION['success'] = "you are now log in";
        header('location:index.php');
    }
}
if(isset($_POST['delete'])){
    $TenThiSinh = trim($_POST['TenThiSinh']);

    $sql = "DELETE FROM thisinh WHERE TenThiSinh='$TenThiSinh'";
    mysqli_query($db, $sql); 
    header('location:index.php');
}
if(isset($_POST['update'])){
    $MaThiSinh = mysqli_real_escape_string($db, $_POST['MaThiSinh']);
    $TenThiSinh = mysqli_real_escape_string($db, $_POST['TenThiSinh']);
    $NgaySinh = mysqli_real_escape_string($db, $_POST['NgaySinh']);
    $QueQuan = mysqli_real_escape_string($db, $_POST['QueQuan']);
    $TongDiem = mysqli_real_escape_string($db, $_POST['TongDiem']);
    $sql = "UPDATE thisinh SET MaThiSinh ='$MaThiSinh',NgaySinh='$NgaySinh',QueQuan='$QueQuan',TongDiem='$TongDiem' WHERE TenThiSinh = '$TenThiSinh'";
    mysqli_query($db, $sql);
    header('location:index.php');
}
// if(isset($_POST['search'])){
             
//     $TenThiSinh = mysqli_real_escape_string($db, $_POST['TenThiSinh']);
//     $sql = "SELECT * FROM thisinh WHERE  TenThiSinh >= '$TenThiSinh'";
//     $result = $db->query($sql);

//     if ($result->num_rows > 0) {
//       // output data of each row
//       while($row = $result->fetch_assoc()) {
//         echo "<table style='width: 100%'>",
//         "<tr>",
//           "<td>" . $row["MaThiSinh"]. "</td>",
//           "<td>" . $row["TenThiSinh"]. "</td>",
//           "<td>" . $row["NgaySinh"]. "</td>",
//           "<td>" . $row["QueQuan"]. "</td>",
//           "<td>" . $row["TongDiem"]. "</td>",
//           "<td>" . '<a href="update.php">Sửa</a>'. 
//                     '<a href="delete.php">Xóa</a>'. 
//           "</td>",
//         "</tr>
//         </table>
//         ";
//       }
//     } else {
//       echo "<h1>Không có kết quả theo yêu cầu</h1>";
//     }
//     $db->close();
//     }
?>