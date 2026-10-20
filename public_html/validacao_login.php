<?php
/*$conecta = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'tecnologia20', 'tecnologia20789123Vx@') or print (mysqli_error());
mysqli_select_db("banco_gp_1", $conecta) or print(mysqli_error());
print "Conexão e Seleção OK!";*/
  
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['input_usuario']) OR empty($_POST['input_senha']))) {

      header("Location: login.php"); exit;
  
  }

  // Tenta se conectar ao servidor MySQL
  $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20') or trigger_error(mysqli_error());
  // Tenta se conectar a um banco de dados MySQL
  mysqli_select_db($connect,'banco_gp_1') or trigger_error(mysqli_error());

  $usuario = mysqli_real_escape_string($connect,$_POST['input_usuario']);
  $senha = mysqli_real_escape_string($connect,$_POST['input_senha']);

  // Validação do usuário/senha digitados
  echo $usuario . $senha;
  $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '".$usuario ."') AND (`senha` = '". $senha ."') AND (`ativo` = 1) LIMIT 1";
  $query = mysqli_query($connect,$sql);
  var_dump($query);
  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo"<script language='javascript' type='text/javascript'>
      alert('Login Invalido!');window.location.
      href='index.php'</script>";
  } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);
    
      // Se a sessão não existir, inicia uma
      if (!isset($_SESSION)) session_start();

      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['id'];
      $_SESSION['UsuarioNome'] = $resultado['nome'];
      $_SESSION['UsuarioNivel'] = $resultado['nivel'];

      // Redireciona o visitante
      header("Location: restrito.php"); exit;
  }

  ?>



