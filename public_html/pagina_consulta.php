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
            <!--card com o conteudo-->
            <div class="card shadow p-3 mb-5 border border-dark rounded-top">
                <h5 class="card-header rounded-top">Conferencia de quantidade NFe</h5>
                <i class="fas fa-file-alt"></i>
                <div class="card-body">
                  <!--primeira opção do card-->
                  <div class=" col-md-12 centralizar">
                    <form id="form1" action="consulta_manu.php" method="post" enctype="multipart/form-data">
                        <h5 class="text-md-center">Para fazer a Conferencia de quantidade NFe coloque os arquivos abaixo </h5>
                        <br>
                        <div class="custom-file centralizar">
                            <i class="bi bi-file-earmark-text-fill centralizar " style="font-size: 2rem; color:;"></i>
                            <input type="file" name="txt" id="txt" accept=".txt"><br><!--O ID é mecanismo de envio para o action-->
                            <label class="input-group-text centralizar">Importe o arquivo TXT</label>
                        </div>
                        <hr>
                        <div class="custom-file centralizar">
                            <i class="bi bi-file-earmark-x-fill" style="font-size: 2rem; color:;"></i>
                            <input type="file" name="XML" id="XMl" accept=".xml"><br><!--O ID é mecanismo de envio para o action-->
                          <label class="input-group-text centralizar">Importe o arquivo XML</label>
                        </div>
                        <br>     
                    </form>
                    <button type="submit" class="btn btn-outline-info btn-lg" form="form1">Consultar</button>
                </div>
                </div>
              </div>
            </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sidebar/js/scripts.js"></script>
    </body>
</html>


