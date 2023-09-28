<?php
define('TITLE', 'Success');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 echo "<div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
   <tr>
     <th>ID do Serviço</th>
     <td>".$row['request_id']."</td>
   </tr>
   <tr>
     <th>Nome</th>
     <td>".$row['requester_name']."</td>
   </tr>
   <tr>
   <th>ID do Email</th>
   <td>".$row['requester_email']."</td>
  </tr>
   <tr>
    <th>Informação do Serviço</th>
    <td>".$row['request_info']."</td>
   </tr>
   <tr>
    <th>Descrição do Serviço</th>
    <td>".$row['request_desc']."</td>
   </tr>

   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Imprimir' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>
 ";
 header("Location: RequesterProfile.php");

} else {
  echo "Falhou";
}
?>


<?php
include('includes/header("Location: RequesterProfile.php");'); 
$conn->close();
?>