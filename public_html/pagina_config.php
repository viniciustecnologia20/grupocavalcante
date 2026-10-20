<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="sidebar/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Icones-->
    <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script>
      function mascara(i){
        
        var v = i.value;
        
        if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
          i.value = v.substring(0, v.length-1);
          return;
            }
        
        i.setAttribute("maxlength", "10");
        if (v.length == 4 || v.length == 7) i.value += ".";
        
      }
    </script>
    
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
  <body>
    <div class="d-flex " id="wrapper">
      <!-- Sidebar-->
      <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light">
                <div class="d-flex align-items-center">
                  <a href="perfil_usuario.php" class="text-decoration-none text-dark">
                      <i class="bi bi-person me-2"></i>
                      <span id="userName" class="me-3"></span>
                  </a>
                </div>
              </div>
              <script>
                // Obtém o valor do usuário do localStorage
                var usuario = localStorage.getItem("usuario");
              
                // Define o conteúdo do elemento span com o nome do usuário
                document.getElementById("userName").innerText = usuario;
              </script>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
            </svg> Formação de Preço</a>
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
        <?php
        var_dump($_SESSION['UsuarioNivel']);
        if($_SESSION['UsuarioNivel'] == 1){

          ?>
        <!--card com o conteudo-->
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
        <div class="row">
        <div class="col">
        <a href="pagina_monofasico.php" class="card-header rounded-top" style="display: block;">Lista de Monofasicos</a>
        </div>
        <div class="col">
        <a href="pagina_cria_mkp.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>
        </div>
        <div class="col">
        <a href="markup_faixa.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>
        </div>
		    <!--<div class="col">
        <a href="pagina_chaveAPI.php" class="card-header rounded-top " style="display: block;">Chave API</a>
        </div> 
        <div class="col">
        <a href="pagina_tabela.php" class="card-header rounded-top " style="display: block;">Tempo de Estoque x Desconto Promoção</a>
        </div>
        </div>-->
        <?php
        }
        if($_SESSION['UsuarioNivel'] == 2){
          ?>
          <!--card com o conteudo-->
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
        <div class="row">
        <div class="col">
        <a href="pagina_monofasicoSC.php" class="card-header rounded-top" style="display: block;">Lista de Monofasicos</a>
        </div>
        <div class="col">
        <a href="pagina_cria_mkpSC.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>
        </div>
        <div class="col">
        <a href="markup_faixaSC.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>
        </div>
		    <!--<div class="col">
        <a href="pagina_chaveAPISC.php" class="card-header rounded-top " style="display: block;">Chave API</a>
        </div>
        <div class="col">
        <a href="pagina_tabelaSC.php" class="card-header rounded-top " style="display: block;">Tempo de Estoque x Desconto Promoção</a>
        </div>  
        </div>-->
        <?php
        }
        if($_SESSION['UsuarioNivel'] == 0){
          ?>
          <!--card com o conteudo-->
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
        <div class="row">
        <div class="col">
        <a href="pagina_monofasicoo.php" class="card-header rounded-top" style="display: block;">Lista de Monofasicos</a>
        </div>
        <div class="col">
        <a href="pagina_cria_mkpp.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>
        </div>
        <div class="col">
        <a href="markup_faixaa.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>
        </div>
		    <!--<div class="col">
        <a href="pagina_chaveAPI.php" class="card-header rounded-top " style="display: block;">Chave API</a>
        </div>
        <div class="col">
        <a href="pagina_tabela.php" class="card-header rounded-top " style="display: block;">Tempo de Estoque x Desconto Promoção</a>
        </div>-->  
        </div>
        <?php
        }
        ?>
        <!-- Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>

      </body>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
	      $("#gatilho").click(function () {
		    $("#monofasicos").hide();
	      });
        </script>
      </html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
























































































































































