<?php
/*$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";*/
$NCM = $_POST['NCM']; //usuario*
//print_r($NCM);
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
$db = mysqli_select_db($connect, 'banco_gp_1');
$query_select = "SELECT * FROM `ordemCompraSKUSC` WHERE NCM = '$NCM'";
$select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$ncmarray = $array['NCM'];

if ($NCM == "" || $NCM == null) {
    echo "<script language='javascript' type='text/javascript'>
      alert('Insira SKU por favor');window.location.
      href=''configOrdem.php'</script>";
} else {
    if ($ncmarray == $NCM) {
        echo "<script language='javascript' type='text/javascript'>
      alert('SKU ja cadastrado!');window.location.
      href='configOrdem.php'</script>";
        die();
    } else {
        $query = "INSERT INTO ordemCompraSKUSC (NCM) VALUES ('$NCM')";
        $insert = mysqli_query($connect, $query);

        if ($insert) {
            echo "<script language='javascript' type='text/javascript'>
          alert('Cadastrado com sucesso!');window.location.
          href='configOrdem.php'</script>";
        } else {
            /*echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário');window.location
        .href='cadastro.php'</script>";*/

            echo "<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse SKU')</script>";
        }
    }
}
//header("Location: pagina_monofasico.php"); exit;
