<?php
/*$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";*/

$email = $_POST['input_email'];
$senha = $_POST['input_password'];//MD5
$login = $_POST['input_usuario']; //usuario*
$Nome = $_POST['input_nome_usuario'];
$Nome_Empresa = $_POST['input_Nome_Empresa'];
$CNPJ = $_POST['input_CNPJ'];
$Endereco = $_POST['input_Endereco'];
$Numero = $_POST['input_Numero'];
$CEP = $_POST['input_CEP'];
$Bairro = $_POST['input_Bairro'];
$Estado = $_POST['input_Estado'];
$Celular = $_POST['input_Celular'];
$Telefone = $_POST['input_Telefone'];
$Ramo = $_POST['input_Ramo'];
$Numero_funcionarios = $_POST['input_NumeroFuncionarios'];
$Responsavel = $_POST['input_Responsavel'];
$ativo = 1;
$cadastro = date('d/m/Y');
var_dump($_POST);
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `usuarios` WHERE usuario = '$login'";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];
var_dump('logarray'. $logarray);

if($login == 'GP@SP'){
  $nivel = 1;
};
if($login == 'GP@SC'){
  $nivel = 2;
}
if($login != 'GP@SC' && $login != 'GP@SP'){
  $nivel = 0;
}

  if($Nome == "" || $Nome == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo nome deve ser preenchido');
    window.location.href='cadastro.php'</script>";

    }else{
      if($logarray == $Nome){
        
        echo"<script language='javascript' type='text/javascript'>
        alert('Usuário ja cadastrado!');window.location.
        href='cadastro.php'</script>";
        

      }else{
        $query = "INSERT INTO usuarios (nome,usuario,senha,email,`Nome_da_Empresa`,CNPJ,Endereco,Numero,CEP,Bairro,Estado,Celular,Telefone,`Ramo_de_Atividade`,`Numero_de_Funcionarios`,`Responsavel_Legal`,nivel,ativo,cadastro) VALUES ('$Nome','$login','$senha','$email','$Nome_Empresa','$CNPJ','$Endereco','$Numero','$CEP','$Bairro','$Estado','$Celular','$Telefone','$Ramo','$Numero_funcionarios','$Responsavel','$nivel','$ativo','$cadastro')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo "sucesso";
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.php'</script>";

        }else{
          //$errorMessage = mysqli_error($connect);
          //echo "Erro: " . $errorMessage;
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.php'</script>";
          
        }
      }
    }

?>















































