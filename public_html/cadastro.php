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

    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Inclua o jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
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
      <div class="row">
        <!--Col centralizado com card-->
        <div class=" col-md-6 sd-1 centralizar" >
          <!--card com o conteudo-->
          <div class="card shadow p-3 mb-5 border border-dark rounded-top">
            <h5 class="card-header rounded-top">Cadastro de cliente</h5>
            <div class="card-body">
              
              
              <form id="cadastro_cliente" action="validacao_cadastro.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-6 centralizar">
                    <label for="inputEmail4" class ="centralizar-esquerda" >Email</label>
                    <input type="email" class="form-control" name="input_email" id="input_email" placeholder="ex:fulano@gmail.com">
                  </div>
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Senha</label>
                  <input type="password" class="form-control" name="input_password" id="input_password" placeholder="Senha">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Usuario</label>
                  <input type="text" class="form-control" name="input_usuario" id="input_usuario" placeholder="Usuario">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Nome</label>
                  <input type="text" class="form-control" name="input_nome_usuario" id="input_nome_usuario" placeholder="Nome">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Nome da Empresa</label>
                  <input type="text" class="form-control" name="input_Nome_Empresa" id="input_Nome_Empresa" placeholder="Nome da Empresa">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">CNPJ</label>
                  <input type="text" class="form-control" name="input_CNPJ" id="input_CNPJ" placeholder="CNPJ">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Endereço</label>
                  <input type="text" class="form-control" name="input_Endereco" id="input_Endereco" placeholder="Endereço">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Numero</label>
                  <input type="number" class="form-control" name="input_Numero" id="input_Numero" placeholder="Numero">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">CEP</label>
                  <input type="text" class="form-control" name="input_CEP" id="input_CEP" placeholder="CEP">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Bairro</label>
                  <input type="text" class="form-control" name="input_Bairro" id="input_Bairro" placeholder="Bairro">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Estado</label>
                  <input type="text" class="form-control" name="input_Estado" id="input_Estado" placeholder="Estado">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Celular</label>
                  <input type="tel" class="form-control" name="input_Celular" id="input_Celular" placeholder="Celular">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Telefone</label>
                  <input type="tel" class="form-control" name="input_Telefone" id="input_Telefone" placeholder="Telefone">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Ramo de Atividade</label>
                  <input type="text" class="form-control" name="input_Ramo" id="input_Ramo" placeholder="Ramo de Atividade">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Número de Funcionários</label>
                  <input type="number" class="form-control" name="input_NumeroFuncionarios" id="input_NumeroFuncionarios" placeholder="Número de Funcionários">
                </div>
                <br>
                <div class="form-group col-md-6 centralizar">
                  <label for="inputPassword4" class ="centralizar-esquerda">Responsável Legal</label>
                  <input type="text" class="form-control" name="input_Responsavel" id="input_Responsavel" placeholder="Responsável Legal">
                </div>
                <br>
              </form>
              <button type="submit" class="btn btn-outline-info btn-lg" form="cadastro_cliente">Salvar</button>
            </div>
            <small><a href="index.php">tem uma conta? clique aqui e faça login</a></small>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      // Aplica a máscara ao campo CNPJ
      $(document).ready(function(){
        $('#input_CNPJ').mask('00.000.000/0000-00', {reverse: true});
        $('#input_Celular').mask('(00) 00000-0000');
        $('#input_Telefone').mask('0000-0000');
      });
    </script>
    
    
    
    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


























































































































































































