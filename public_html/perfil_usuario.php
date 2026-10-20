<?php
require_once 'token.php';
?>
<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />

        <meta name="author" content="" />

        <!-- Favicon-->

        <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />

        <!-- Core theme CSS (includes Bootstrap)-->

        <link href="sidebar/css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Icones-->

        <!--<link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">-->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      

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

        .centralizar-direita{

          text-align: right ;

        }

        .transparent-card-header {

          background-color: transparent !important; /* Define o fundo como transparente */

          border: none !important; /* Remove a borda */

          color: #000 !important; /* Define a cor do texto */

        }

        

      </style>

    </head>

    <body>

        <div class="d-flex " id="wrapper">

            <!-- Sidebar-->

            <div class="border-end bg-white toggled" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom bg-light">Opções</div>

					<div class="list-group list-group-flush">

					<a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>

					<a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>

					<a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>

					<a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">

					<path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>

					<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>

					<path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>

					</svg>Formação de Preço</a>

					<!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="main.php">Estoque promocional</a>-->

				</div>

            </div>

            <!-- Page content wrapper-->

            <div class= "" id="page-content-wrapper">

                <!-- Top navigation-->

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

                  <div class="container-fluid">

                      <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>

                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">

                      </div>

                  </div>

              </nav>

              

            <!--conteudo da pagina-->

            <!--card com o conteudo-->

            <div class="card shadow p-3 mb-5 border border-dark rounded-top">

                <h5 class="card-header rounded-top d-flex justify-content-between">

                Perfil

                <button class="btn btn-danger" id="logoutButton"><i class="bi bi-box-arrow-right"></i> Sair</button>

                </h5>



                <div class="card-body">                

                <script>

                  // Obtém o valor do usuário do localStorage

                  var usuario = localStorage.getItem("usuario");

                  document.write("<h6>Usuário atual: " + usuario + "</h6>");



                </script>



                  <?php

                  session_start();

                  $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');

                  $db = mysqli_select_db($connect,'banco_gp_1');



                  $query_select = "SELECT * FROM usuarioAtual";

                  $result_select = mysqli_query($connect, $query_select);

                  $resultado = mysqli_fetch_assoc($result_select);

                  $usuarioAtual = $resultado['usuarioAtual'] ;



                  $query_select = "SELECT * FROM `usuarios` WHERE `usuario` = '$usuarioAtual' ";



                  // Execução da consulta

                  $result_select = mysqli_query($connect, $query_select);



                  // Inicialização do array de resultados

                  $usuariosArray = array();



                  // Busca dos resultados

                  while ($row = mysqli_fetch_assoc($result_select)) {

                      $usuariosArray[] = $row;

                  }

                  $usuariosArray[0]['Endereço'] = mb_convert_encoding($usuariosArray[0]['Endereço'], 'UTF-8', 'ISO-8859-1');

                  $usuariosArray[0]['Número de Funcionários'] = mb_convert_encoding($usuariosArray[0]['Número de Funcionários'], 'UTF-8', 'ISO-8859-1');

                  $usuariosArray[0]['Responsável Legal'] = mb_convert_encoding($usuariosArray[0]['Responsável Legal'], 'UTF-8', 'ISO-8859-1');



                  // Exibição dos resultados

                  //echo "<pre>";

                  //print_r($usuariosArray[0]);

                  //echo "</pre>";

                  ?>

                

                <div id="subUsuarios" class="card shadow p-3 mb-5 border border-dark rounded-top">

                  <div class="row">

                  <div class="col">

                      <a href="#" class="card-header rounded-top" onclick="mostrarDiv('dadosCadastrais', 'cadastro_usuario','sub_usuarios')" >Dados do usuario</a>

                    </div>

                    <div class="col">

                      <a href="#" class="card-header rounded-top" onclick="mostrarDiv('cadastro_usuario', 'sub_usuarios','dadosCadastrais')">Cadastro de sub usuário</a>

                    </div>

                    <div class="col">

                      <a href="#" class="card-header rounded-top" onclick="mostrarDiv('sub_usuarios', 'cadastro_usuario','dadosCadastrais')">Sub Usuários</a>

                    </div>

                  </div>

                </div>



                <div id="dadosCadastrais" style="display:none;">

                <form id="atualiza_cliente" action="atualiza_dados.php" method="POST" enctype="multipart/form-data">

                <div class="form-row">

                  <div class="form-group col-md-6 ">

                    <label for="inputEmail4" class ="centralizar-esquerda" >Email</label>

                    <input type="email" class="form-control" name="input_email" id="input_email" placeholder="ex:fulano@gmail.com" value="<?php echo $usuariosArray[0]['email']; ?>">

                  </div>

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Senha</label>

                  <input type="password" class="form-control" name="input_password" id="input_password" placeholder="Senha" value="<?php echo $usuariosArray[0]['senha']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Usuario</label>

                  <input type="text" class="form-control" name="input_usuarios" id="input_usuarios" placeholder="Usuario" value="<?php echo $usuariosArray[0]['usuario']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Nome</label>

                  <input type="text" class="form-control" name="input_nome_usuario" id="input_nome_usuario" placeholder="Nome" value="<?php echo $usuariosArray[0]['nome']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Nome da Empresa</label>

                  <input type="text" class="form-control" name="input_Nome_Empresa" id="input_Nome_Empresa" placeholder="Nome da Empresa" value="<?php echo $usuariosArray[0]['Nome_da_Empresa']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">CNPJ</label>

                  <input type="text" class="form-control" name="input_CNPJ" id="input_CNPJ" placeholder="CNPJ" value="<?php echo $usuariosArray[0]['CNPJ']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Endereço</label>

                  <input type="text" class="form-control" name="input_Endereco" id="input_Endereco" placeholder="Endereço" value="<?php echo $usuariosArray[0]['Endereco']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Numero</label>

                  <input type="number" class="form-control" name="input_Numero" id="input_Numero" placeholder="Numero" value="<?php echo $usuariosArray[0]['numero']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">CEP</label>

                  <input type="text" class="form-control" name="input_CEP" id="input_CEP" placeholder="CEP" value="<?php echo $usuariosArray[0]['CEP']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Bairro</label>

                  <input type="text" class="form-control" name="input_Bairro" id="input_Bairro" placeholder="Bairro" value="<?php echo $usuariosArray[0]['Bairro']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Estado</label>

                  <input type="text" class="form-control" name="input_Estado" id="input_Estado" placeholder="Estado" value="<?php echo $usuariosArray[0]['Estado']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Celular</label>

                  <input type="tel" class="form-control" name="input_Celular" id="input_Celular" placeholder="Celular" value="<?php echo $usuariosArray[0]['Celular']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Telefone</label>

                  <input type="tel" class="form-control" name="input_Telefone" id="input_Telefone" placeholder="Telefone" value="<?php echo $usuariosArray[0]['Telefone']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Ramo de Atividade</label>

                  <input type="text" class="form-control" name="input_Ramo" id="input_Ramo" placeholder="Ramo de Atividade" value="<?php echo $usuariosArray[0]['Ramo_de_Atividade']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Número de Funcionários</label>

                  <input type="number" class="form-control" name="input_NumeroFuncionarios" id="input_NumeroFuncionarios" placeholder="Número de Funcionários" value="<?php echo $usuariosArray[0]['Numero_de_Funcionarios']; ?>">

                </div>

                <br>

                <div class="form-group col-md-6 ">

                  <label for="inputPassword4" class ="centralizar-esquerda">Responsável Legal</label>

                  <input type="text" class="form-control" name="input_Responsavel" id="input_Responsavel" placeholder="Responsável Legal"value="<?php echo $usuariosArray[0]['Responsavel_Legal']; ?>">

                </div>

                <br>

                <button type="submit" class="btn btn-outline-info btn-lg" form="atualiza_cliente">Salvar</button>

              </form>

                </br> 

              </div>



                <div id="cadastro_usuario" style="display:none;">

                <h3>Sub usuario</h3>

                  <form id="cadastro_cliente" action="validacao_cadastro.php" method="POST" enctype="multipart/form-data">

                    <div class="form-row">

                        <div class="form-group col-md-6">

                            <label for="inputEmail4" class="centralizar-esquerda">Email</label>

                            <input type="email" class="form-control" name="input_email" id="input_email" placeholder="ex:fulano@gmail.com">

                        </div>

                        </div>

                        <br>

                        <div class="form-group col-md-6 ">

                        <label for="inputPassword4" class ="centralizar-esquerda">Senha</label>

                        <input type="password" class="form-control" name="input_password" id="input_password" placeholder="Senha">

                        </div>

                        <br>

                        <div class="form-group col-md-6 ">

                        <label for="inputPassword4" class ="centralizar-esquerda">Usuario</label>

                        <input type="text" class="form-control" name="input_usuario" id="input_usuario"  readonly>

                        </div>

                        <br>

                        <div class="form-group col-md-6 ">

                        <label for="inputPassword4" class ="centralizar-esquerda">Nome</label>

                        <input type="text" class="form-control" name="input_nome_usuario" id="input_nome_usuario" placeholder="Nome">

                        </div>

                        <br>

                    </form>

                    <button type="submit" class="btn btn-outline-info btn-lg" form="cadastro_cliente">Salvar</button>

                  </div>

                  <div id="sub_usuarios"style="display:none;">

                  <div class="container mt-6">

                  <div class="table-responsive">

                  <table class="table table-bordered">

                    <thead class="thead-dark">

                        <tr>

                            <th scope="col">ID</th>

                            <th scope="col">Nome</th>

                            <th scope="col">Usuario</th>

                            <th scope="col">Senha</th>

                            <th scope="col">Email</th>

                            <th scope="col">Ativo</th>

                            <th scope="col">Ativar/Desativar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        foreach ($usuariosArray as $valor) {

                            echo "<tr>";

                            echo "<td>" . $valor['id'] . "</td>";

                            echo "<td>" . $valor['nome'] . "</td>";

                            echo "<td>" . $valor['usuario'] . "</td>";

                            echo "<td>" . $valor['senha'] . "</td>";

                            echo "<td>" . $valor['email'] . "</td>";

                            echo "<td>" . ($valor['ativo'] == 1 ? 'Ativo' : 'Inativo') . "</td>";

                            echo "<td>

                                      <form action='desativa.php' method='post'>

                                          <input type='hidden' name='id' value='" . $valor['id'] . "'>

                                          <button type='submit' class='btn btn-danger'>" . ($valor['ativo'] == 1 ? 'Desativar' : 'Ativar') . "</button>

                                      </form>

                                  </td>";

                            echo "</tr>";

                        }

                        ?>

                    </tbody>

                  </table>

                </div>

              </div>

            </div>

                    <script>

                    // Define o valor do input_usuario usando JavaScript

                    



                    function mostrarDiv(divMostrar, divOcultar, divOcultar2 ) {

                        var divMostrar = document.getElementById(divMostrar);

                        var divOcultar = document.getElementById(divOcultar);

                        var divOcultar2 = document.getElementById(divOcultar2);



                        if (divMostrar && divOcultar) {

                            divMostrar.style.display = "block";

                            divOcultar.style.display = "none";

                            divOcultar2.style.display = "none";

                            document.getElementById("input_usuario").value = usuario;

                        }

                    }

                    function desativarUsuario(id) {

                      // Aqui você pode implementar a lógica para desativar o usuário com o ID fornecido

                      console.log("Usuário com ID " + id + " desativado.");

                      

                    }

                    function toggleDiv() {

                      document.getElementById("input_usuario").value = usuario;

                      var div = document.getElementById("dadosCadastrais");

                      var cadastroUsuario = document.getElementById("cadastro_usuario");

                      var subUsuarios = document.getElementById("sub_usuarios");

                      if (div.style.display === "none") {

                          div.style.display = "block";

                          cadastroUsuario.style.display = "none";

                          subUsuarios.style.display = "none";



                      } else {

                          div.style.display = "none";

                      }

                    }

    

                    </script>

                </div>

            </div>

          </div>

        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->

        <script src="sidebar/js/scripts.js"></script>

    </body>

</html>

<script>

  document.getElementById('logoutButton').addEventListener('click', function() {

      // Redirecione para a página de logout ou execute a lógica de logout aqui

      window.location.href = '/logout.php';

  });

  

</script>



























































