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
                <!--card com o conteudo-->
                <div class="card shadow p-3 mb-5 border border-dark rounded-top">
                    <h5 class="card-header rounded-top">Faça seu login ou cadastre-se</h5>
                    <div class="card-body">
                      <form id="login_cliente" action="validacao_login.php" method="POST" enctype="multipart/form-data">
                        <br>
                        <!--Usuario-->
                        <div class="col-auto">
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="bi bi-person-circle" style="font-size: 1rem; color:;"></i></div>
                            </div>
                            <input type="text" class="form-control" name="input_usuario" id="input_usuario" placeholder="Usuário">
                          </div>
                        </div>
                        <!--Senha-->
                        <br>
                        <div class="col-auto">
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="bi bi-key-fill" style="font-size: 1rem; color:;"></i></div>
                            </div>
                            <input type="password" class="form-control" name="input_senha" id="input_senha" placeholder="Senha" aria-describedby="passwordHelpInline">
                          </div>
                        </div>
                        <!--Botão de enviar-->
                      </form>
                      <button type="submit" class="btn btn-outline-info btn-lg" form="login_cliente">Enviar</button>
                      <br>
                      <small><a href="cadastro.php">Não tem uma conta? clique aqui</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>





















































































































































