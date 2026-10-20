<?php
$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";
$var_1 = $_POST['camp_val_1'];
$var_2 = $_POST['camp_val_2'];
$var_3 = $_POST['camp_val_3'];
$var_4 = $_POST['camp_val_4'];
$var_5 = $_POST['camp_val_5'];
$var_6 = $_POST['camp_val_6'];
$var_7 = $_POST['camp_val_7'];
$custo = $_POST['custo'];
$margem = $_POST['margem'];
$ctv = $_POST['ctv'];
$mkd = $_POST['mkd'];
$mkm = $_POST['mkm'];
//echo "<pre>";
//print_r ($_POST);
//echo "</pre>";
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `MarkupSC`";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$mkm_array = $array['mkm'];
echo "<pre>";
//print_r ($mkm_array);
echo "</pre>";

if($mkm == "" || $mkm == null){
	echo"<script language='javascript' type='text/javascript'>
	alert('Markup Multiplicador invalido');window.location.
	href='pagina_cria_mkpSC.php'</script>";
}else{
	echo $mkm_array;
	echo $mkm;
	if($mkm_array == $mkm){  
    echo"<script language='javascript' type='text/javascript'>
      alert('Markup Multiplicador ja cadastrado!');window.location.
      href='pagina_cria_mkpSC.php'</script>";
      die();
	}else{
	$query = "UPDATE MarkupSC SET camp_val_1='$var_1',camp_val_2='$var_2',camp_val_3='$var_3',camp_val_4='$var_4',camp_val_5='$var_5',camp_val_6='$var_6',camp_val_7='$var_7',custo='$custo',margem='$margem',ctv='$ctv',mkd='$mkd',mkm='$mkm' WHERE `ID` = 1 ";
	//$query = "INSERT INTO Markup (camp_val_1,camp_val_2,camp_val_3,camp_val_4,camp_val_5,camp_val_6,camp_val_7,custo,margem,ctv,mkd,mkm) VALUES ('$var_1','$var_2','$var_3','$var_4','$var_5','$var_6','$var_7','$custo','$margem','$ctv','$mkd','$mkm')";
	$insert = mysqli_query($connect,$query)or die ('Erro na consulta ::. '. mysqli_error($connect));
	
		if($insert){
			echo"<script language='javascript' type='text/javascript'>
			alert('Markup Multiplicador cadastrado com sucesso!');window.location.
			href='pagina_cria_mkpSC.php'</script>";
	
		}else{
			echo"<script language='javascript' type='text/javascript'>
			alert('Não foi possível cadastrar esse Markup');//window.location.
			href='pagina_cria_mkpSC.php'</script>";
		}
	
	}
}
//header("Location: pagina_cria_mkp.php"); exit;
?>


















































































































