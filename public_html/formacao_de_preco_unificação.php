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
        <!-- Icones-->
        <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
      
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
            <div class="border-end bg-white toggled" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Opções</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço.html"><i class="bi bi-coin"></i> Formação de Preço</a>
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
              <h5 class="card-header rounded-top">Opções</h5>
              <div class="card-body">
                <!--primeira opção do card
                <h5 class="card-title text-primary">Ação Consolidada</h5>
                <p class="card-text centralizar-esquerda">Nesta opção voce pode fazer uma Conferencia de quantidade NFe e uma Conferencia Cadastral ao mesmo tempo utilizando arquivos ( TXT, CSV, XML ).</p>
                <a type="button" href="pagina_operação_conjunta.html" class="btn btn-outline-info btn-lg">Entrar</a>
                <hr>-->
                <!--segunda opção do card-->
                <h5 class="card-title text-primary">Conferencia de quantidade NFe</h5>
                <p class="card-text centralizar-esquerda">Nesta opção voce pode fazer uma Conferencia de quantidade NFe obtendo resultados separadamente utilizando arquivos ( TXT, XML ).</p>
                <a type="submit" href="pagina_consulta.html" class="btn btn-outline-info btn-lg">Entrar</a>
                <hr>
                <!--terceira opção do card-->
                <h5 class="card-title text-primary">Conferencia Cadastral</h5>
                <p class="card-text centralizar-esquerda">Nesta opção voce pode fazer uma Conferencia Cadastral obtendo resultados separadamente utilizando arquivos ( CSV, XML ).</p>
                <a type="submit" href="pagina_conferencia.html" class="btn btn-outline-info btn-lg">Entrar</a>
                <!--terceira opção do card-->     
                <hr>  
                <h5 class="card-title text-primary">Formação de Preço</h5>
                <p class="card-text centralizar-esquerda">Nesta opção voce pode fazer a Operação de formação de preço utilizando arquivos ( XML ).</p>
                <a type="button" href="pagina_formacão_de_preço.html" class="btn btn-outline-info btn-lg">Entrar</a>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>































