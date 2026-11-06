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

    <style type="text/css">
        .marcador {
            background: #fe9d9d;
            border: 1px solid #f94646;
        }
        
        .marcador-container {
            background: #5bf946;
            border: 1px solid #36ae26;
        }
        
        .barra-lateral {
            background: #1926e0;
        }
        
        .background {
            background: #ffffff;
        }
        
        .centralizar {
            text-align: center;
            margin: auto;
        }
        
        .centralizar-esquerda {
            text-align: left;
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
                <h5 class="card-header rounded-top ">Autorizador de NF</h5>
                <div class="card-body">
                    <!--primeira opção do card-->
                    <div class=" col-md-12 centralizar">
                        <br>
						<div class=" col-md-6 centralizar">
						<form method="get" action="autorizar.php">
                        <input type="text" class="form-control" name="token" id="token" placeholder="Insira o token da API">
                        <?php

                        if($_SESSION['teste'] == false){
                            ?>
                            <button type="submit"  class="btn btn-outline-info btn-lg">Ligado</button>
                            <a type="submit"  href="desliga.php" class="btn btn-outline-info btn-lg active">Desligado</a>
                            <?php  
                        }else{
                           ?>
                            <button type="submit" class="btn btn-outline-info btn-lg active">Ligado</button>
                            <a type="submit" href="desliga.php" class="btn btn-outline-info btn-lg ">Desligado</a>
                            <?php
                        }
                        ?>
						</form>
						</div>
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