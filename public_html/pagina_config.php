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
<?php include __DIR__ . '/includes/menubar.php'; ?>
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
























































































































































