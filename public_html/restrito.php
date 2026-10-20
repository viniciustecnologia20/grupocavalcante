<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- Iconic CSS -->
    <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    
    <title> Projeto GP </title>
    
    <style type="text/css">
      
      .marcador {
        background: #fe9d9d;
        border: 1px solid #f94646;
      }
      
      .marcador-container {
        background: #5bf946;
        border: 1px solid #36ae26;
      }
      
      .barra-lateral{
        background: #1926e0;
      }
      
      .background{
        background: #ffffff;
      }
      
      .centralizar {
        text-align: center;
        margin: auto;
      }
      .centralizar-esquerda{
        text-align: left ;
        margin-left: left;
        display: flex;
        align-items: center;
      }
      
    </style>
    </head>
  <body class = "background">
    <!--Container body-->
    <div class="container-fluid ">
      <br>
      <div class="row">
        <!--Col centralizado com card-->
        <div class=" col-md-6 sd-1 centralizar" >
          <?php
            session_start();

            //// A sessão precisa ser iniciada em cada página diferente
            //if (!isset($_SESSION)) session_start();
            
            //// Verifica se não há a variável da sessão que identifica o usuário
            //if (!isset($_SESSION['UsuarioID'])) {
            //  // Destrói a sessão por segurança
            //  session_destroy();
            //  // Redireciona o visitante de volta pro login
            //  header("Location: login.php"); exit;
            //}
            if($_SESSION['UsuarioNome'] == 'GP@SP'){

              $_SESSION['UsuarioNome'] = 'GP@SP';
            }

            if($_SESSION['UsuarioNome'] == 'GP@SC'){

              $_SESSION['UsuarioNome'] = 'GP@SC';
            }
            

            $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
            if (!$connect) {
                die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
            }
            
            $db = mysqli_select_db($connect, 'banco_gp_1');
            if (!$db) {
                die('Erro ao selecionar o banco de dados: ' . mysqli_error($connect));
            }
            
            $sql = "UPDATE ultimoLogin SET dataHora = NOW()";

            if ($connect->query($sql) === TRUE) {
                //echo "Registro atualizado com sucesso.";
            } else {
                //echo "Erro ao atualizar registro: " . $connect->error;
            }

            $usuario = $_SESSION['UsuarioNome']; // dado a ser inserido/atualizado no banco na tabela 'usuarioAtual'
            
            // Verifica se já existe um registro na tabela
            $query_check = "SELECT COUNT(*) as total FROM usuarioAtual";
            $result_check = mysqli_query($connect, $query_check);
            if (!$result_check) {
                die('Erro ao executar a consulta: ' . mysqli_error($connect));
            }
            
            $row = mysqli_fetch_assoc($result_check);
            $total_registros = $row['total'];
            
            if ($total_registros == 0) {
                // Se não houver nenhum registro, insere um novo
                $query_insert = "INSERT INTO usuarioAtual (usuarioAtual) VALUES ('$usuario')";
                $result_insert = mysqli_query($connect, $query_insert);
                if (!$result_insert) {
                    die('Erro ao inserir registro: ' . mysqli_error($connect));
                }
                echo "Registro inserido com sucesso.";
            } else {
                // Se já houver um registro, atualiza os dados
                $query_update = "UPDATE usuarioAtual SET usuarioAtual = '$usuario'";
                $result_update = mysqli_query($connect, $query_update);
                if (!$result_update) {
                    die('Erro ao atualizar registro: ' . mysqli_error($connect));
                }
                //echo "Registro atualizado com sucesso.";
            }

            ?>
          <br>
          <br>
          <div class =" col-md-6 sd-1 centralizar bg-dark centralizar border-bottom border-dark rounded-top">
            <h5 class="font-weight-bold text-uppercase "><p>bem-vindo, <?php echo $_SESSION['UsuarioNome']; ?>!</p></h5>
          </div>
          <meta http-equiv="refresh" content="1; URL='home.html'"/>
            <!--Optional JavaScript; choose one of the two! -->
        </div>
      </div>
    </div>
    <script>
      var usuario = "<?php echo $_SESSION['UsuarioNome']; ?>";
      localStorage.setItem("usuario", usuario);
    </script>
    
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>












