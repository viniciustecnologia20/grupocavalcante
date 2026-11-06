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
                <h5 class="card-header rounded-top ">Conferencia Cadastral</h5>
                <div class="card-body">
                  <!--primeira opção do card-->
                  <div class=" col-md-12 centralizar">
                    <form id="form2" action="conferencia de compra.php" method="post" enctype="multipart/form-data">
                        <h5 class="text-md-center">Para fazer a Conferencia Cadastral coloque os arquivos abaixo </h5>
                        <br>
                        <div class="custom-file centralizar">
                            <i class="bi bi-file-excel-fill" style="font-size: 2rem; color:;"></i>
                            <input type="file" name="CSV" id="CSV" accept=".csv"><br><!--O ID é mecanismo de envio para o action-->
                          <label class="input-group-text centralizar">Importe o arquivo CSV</label>
                        </div>
                        <hr>
                        <div class="custom-file centralizar">
                            <i class="bi bi-file-earmark-x-fill" style="font-size: 2rem; color:;"></i>
                            <input type="file" name="XML" id="XMl" accept=".xml"><br>
                          <label class="input-group-text centralizar">Importe o arquivo XML</label>
                        </div>
                    </form>
                    <br>
                    <button type="submit" class="btn btn-outline-info btn-lg" form="form2">Consultar</button>
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







