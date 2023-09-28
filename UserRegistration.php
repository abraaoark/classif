<?php
  include('dbConnection.php');

  if(isset($_REQUEST['rSignup'])){
    // Checking for Empty Fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
      $regmsg = '<div class="alert alert-warning mt-2" role="alert"> All Fields are Required </div>';
    } else {
      $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert"> ID de e-mail já registrado </div>';
      } else {
        // Assigning User Values to Variable
        $rName = $_REQUEST['rName'];
        $rEmail = $_REQUEST['rEmail'];
        $rPassword = $_REQUEST['rPassword'];
        $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES ('$rName','$rEmail', '$rPassword')";
        if($conn->query($sql) == TRUE){
          $regmsg = '<div class="alert alert-success mt-2" role="alert"> Conta criada com sucesso </div>';
        } else {
          $regmsg = '<div class="alert alert-danger mt-2" role="alert"> Não foi possível criar conta </div>';
        }
      }
    }
  }
?>
<div class="container pt-5" id="registration">
  <h2 class="text-center">Criar uma Conta Anunciante</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="pl-2 font-weight-bold">Nome</label><input type="text"
            class="form-control" placeholder="Nome" name="rName">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input type="email"
            class="form-control" placeholder="Email" name="rEmail">
          <!--Add text-white below if want text color white-->
          <small class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</small>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Nova
            Senha</label><input type="password" class="form-control" placeholder="Senha" name="rPassword">
        </div>
        <button type="submit" class="btn btn-info mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Registrar-se</button>
        <em style="font-size:10px;"><a href="termosdeuso.php" target="_blank">Nota - Ao clicar em Cadastre-se, você concorda com nossos Termos, Dados e Política e Política de Cookies.</a></em>
        <?php if(isset($regmsg)) {echo $regmsg; } ?>
      </form>
    </div>
  </div>
</div>