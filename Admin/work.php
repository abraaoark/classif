<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
?>
<div class="col-sm-9 col-md-10 mt-5">
  <?php 
 $sql = "SELECT * FROM assignwork_tb";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Informações</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Cidade</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
    echo '<tr>
    <th scope="row">'.$row["request_id"].'</th>
    <td>'.$row["request_info"].'</td>
    <td>'.$row["requester_name"].'</td>
    <td>'.$row["requester_add2"].'</td>
    <td>'.$row["requester_city"].'</td>
    <td>'.$row["requester_mobile"].'</td>
    <td>'.$row["assign_date"].'</td>
    <td><form action="viewassignwork.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button></form>
    <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["request_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>
    </td>
    </tr>';
   }
   echo '</tbody> </table>';
  } else {
    echo "0 Resultado";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Não foi possível excluir dados";
      }
    }
  ?>
</div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>