<?php
session_start();

$_SESSION['teste'] = false;

print_r($_SESSION['teste']);

echo"<script language='javascript' type='text/javascript'>
  alert('Autorizador desligado com sucesso!');window.location.
  href='pagina_autorizar.php'</script>";
  
?>