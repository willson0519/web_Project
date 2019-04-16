<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_stafffs_a161060_pt2(Staff_ID, Staff_Name, Gender, username, password, email) VALUES(:sid, :sname, 
      :gender, :uname, :password, :email)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sname', $sname, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':uname', $userid, PDO::PARAM_STR);
    $stmt->bindParam(':password', $passid, PDO::PARAM_STR);
    $stmt->bindParam(':email', $emailid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $gender = $_POST['gender'];
     $userid = $_POST['uname'];
      $passid = $_POST['password'];
       $emailid = $_POST['email'];
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_stafffs_a161060_pt2 SET
      Staff_ID = :sid, Staff_Name = :sname,
      Gender = :gender, username = :uname, password = :password, email = :email
      WHERE Staff_ID= :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':sname', $sname, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
     $stmt->bindParam(':uname', $userid, PDO::PARAM_STR);
      $stmt->bindParam(':password', $passid, PDO::PARAM_STR);
       $stmt->bindParam(':email', $emailid, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $gender = $_POST['gender'];
    $userid = $_POST['uname'];
    $passid = $_POST['password'];
    $emailid = $_POST['email'];

    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_stafffs_a161060_pt2 where Staff_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: staffs.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_stafffs_a161060_pt2 where Staff_ID = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
 
?>