<?php
/*$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";*/
$NCM= $_POST['NCM']; //usuario*
//print_r($NCM);
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `NCM_monofasicosSC` WHERE NCM = '$NCM'";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$ncmarray = $array['NCM'];
  
  if($NCM == "" || $NCM == null){
    echo"<script language='javascript' type='text/javascript'>
      alert('Insira ncm por favor');window.location.
      href='pagina_monofasicoSC.php'</script>";
  }else{
    if($ncmarray == $NCM){  
    echo"<script language='javascript' type='text/javascript'>
      alert('NCM ja cadastrado!');window.location.
      href='pagina_monofasicoSC.php'</script>";
      die();
    }else{
      $query = "INSERT INTO NCM_monofasicosSC (NCM) VALUES ('$NCM')";
      $insert = mysqli_query($connect,$query);
      
      if($insert){
        echo"<script language='javascript' type='text/javascript'>
          alert('NCM cadastrado com sucesso!');window.location.
          href='pagina_monofasicoSC.php'</script>";
      }else{
        /*echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário');window.location
        .href='cadastro.php'</script>";*/
        
        echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse NCM')</script>";
      }
    }
  }
//header("Location: pagina_monofasico.php"); exit;
?>


















































































































