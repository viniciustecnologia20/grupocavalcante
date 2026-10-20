<?php
$email = $_POST['input_email'];
$senha = $_POST['input_password'];//MD5
$login = $_POST['input_usuarios']; //usuario*
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
//var_dump($_POST);
$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');

$query = "UPDATE usuarios SET 
            nome = '$Nome',
            senha = '$senha',
            email = '$email',
            `Nome_da_Empresa` = '$Nome_Empresa',
            CNPJ = '$CNPJ',
            Endereco = '$Endereco',
            Numero = '$Numero',
            CEP = '$CEP',
            Bairro = '$Bairro',
            Estado = '$Estado',
            Celular = '$Celular',
            Telefone = '$Telefone',
            `Ramo_de_Atividade` = '$Ramo',
            `Numero_de_Funcionarios` = '$Numero_funcionarios',
            `Responsavel_Legal` = '$Responsavel',
            nivel = '$nivel',
            ativo = '$ativo',
            cadastro = '$cadastro'
          WHERE usuario = '$login'
          LIMIT 1";


$insert = mysqli_query($connect,$query);

if($insert){
    //echo "sucesso";
    echo"<script language='javascript' type='text/javascript'>
    alert('Usuário atualizado com sucesso!');window.location.
    href='index.php'</script>";

}else{
    //$errorMessage = mysqli_error($connect);
    //echo "Erro: " . $errorMessage;
    echo"<script language='javascript' type='text/javascript'>
    alert('Não foi possível cadastrar esse usuário');window.location
    .href='cadastro.php'</script>";

}
?>