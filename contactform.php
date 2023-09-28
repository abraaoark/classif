<?php
// The contact Us Form wont work with Local Host but it will work on Live Server
if(isset($_REQUEST['submit'])) {
 // Checking for Empty Fields
 if(($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
  // msg displayed if required field missing

  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  
 } else {
 $name = $_REQUEST['name'];
 $subject = $_REQUEST['subject'];
 $email = $_REQUEST['email'];
 $message = $_REQUEST['message'];

 $mailTo = "suyash.gautam97@gmail.com";
 $headers = "From: ". $email;
 $txt = "Você recebeu um e-mail de". $name. ".\n\n".$message;
 mail($mailTo, $subject, $txt, $headers);
 $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Enviado com Sucesso </div>';

}
}
?>

<!--Start Contact Us Row-->
<div class="col-md-8">
 <!--Start Contact Us 1st Column-->
 <form action="" method="post">
  <input type="text" class="form-control" name="name" placeholder="Nome"><br>
  <input type="text" class="form-control" name="subject" placeholder="Objetivo"><br>
  <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
  <textarea class="form-control" name="message" placeholder="Como posso te ajudar?" style="height:150px;"></textarea><br>
  <input class="btn btn-primary" type="submit" value="Enviar" name="submit"><br><br>
  <?php if(isset($msg)) {echo $msg; } ?>
 </form>
</div> <!-- End Contact Us 1st Column-->