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
        function mascara(i) {

            var v = i.value;

            if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
                i.value = v.substring(0, v.length - 1);
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
            <div id="ordemCompra" class="card shadow p-3 mb-5 border border-dark rounded-top ">

                <!--conteudo da pagina-->
                <!--card com o conteudo-->
                <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
                    <h5 id="gatilho" class="card-header rounded-top ">Lista de SKU</h5>
                    <div class="card-body">
                        <!--primeira opção do card-->
                        <?php
                        if ($_SESSION['UsuarioNivel'] == 1) {
                        ?>
                            <form class="form-inline" id="cadastro_ncm" action="cadastro_sku.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group mx-sm-2 mb-2">
                                    <h6>Cadastrar SKU:</h6>
                                    <input type="text" class="form-control" name="NCM" id="NCM">
                                </div>
                                <div class="form-group mx-sm-2 mb-2">
                                    <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
                                </div>
                                <div class="form-group mx-sm-2 mb-2">
                                    <button type="button" id="deleteButton" class="btn btn-danger mb-2">Deletar</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_SESSION['UsuarioNivel'] == 2) {
                        ?>
                            <form class="form-inline" id="cadastro_ncm" action="cadastro_skuSC.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group mx-sm-2 mb-2">
                                    <h6>Cadastrar SKU:</h6>
                                    <input type="text" class="form-control" name="NCM" id="NCM">
                                </div>
                                <div class="form-group mx-sm-2 mb-2">
                                    <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
                                </div>
                                <div class="form-group mx-sm-2 mb-2">
                                    <button type="button" id="deleteButton" class="btn btn-danger mb-2">Deletar</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                        <div class="">
                            <div class="table-responsive border-dark rounded">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="thead-dark table-striped centralizar ">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">SKU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SESSION['UsuarioNivel'] == 1) {

                                        ?>
                                            <tr>
                                                <?php
                                                $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
                                                $db = mysqli_select_db($connect, 'banco_gp_1');
                                                $query_select = "SELECT * FROM `ordemCompraSKU` ORDER BY `ID` ASC";
                                                $select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));

                                                while ($row = mysqli_fetch_array($select)) {
                                                    $arrayNCM[] = $row["NCM"];
                                                }
                                                $contagem = 1;
                                                foreach ($arrayNCM as $NCM) {
                                                    echo "<td class= centralizar>$contagem</td>";
                                                ?>
                                                    <form id="form_deletar" action="cadastro_ncm_deletar.php" method="POST">
                                                        <?php
                                                        echo "<td class= centralizar><input class=form-check-input type=checkbox  name=NCM id=NCM > $NCM </td>";
                                                        ?>
                                                    </form>
                                                <?php
                                                    $contagem = $contagem + 1;
                                                    echo "</tr>";
                                                }

                                                ?>
                                            <?php
                                        }
                                            ?>
                                            <?php
                                            if ($_SESSION['UsuarioNivel'] == 2) {

                                            ?>
                                            <tr>
                                                <?php
                                                $connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br', 'banco_gp_1', 'tecnologia20');
                                                $db = mysqli_select_db($connect, 'banco_gp_1');
                                                $query_select = "SELECT * FROM `ordemCompraSKUSC` ORDER BY `ID` ASC";
                                                $select = mysqli_query($connect, $query_select) or die(mysqli_error($connect));

                                                while ($row = mysqli_fetch_array($select)) {
                                                    $arrayNCM[] = $row["NCM"];
                                                }
                                                $contagem = 1;
                                                foreach ($arrayNCM as $NCM) {
                                                    echo "<td class= centralizar>$contagem</td>";
                                                ?>
                                                    <form id="form_deletar" action="cadastro_ncm_deletar.php" method="POST">
                                                        <?php
                                                        echo "<td class= centralizar><input class=form-check-input type=checkbox  name=NCM id=NCM > $NCM </td>";
                                                        ?>
                                                    </form>
                                                <?php
                                                    $contagem = $contagem + 1;
                                                    echo "</tr>";
                                                }

                                                ?>
                                            <?php
                                            }
                                            ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>

                </div>
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
    document.getElementById('deleteButton').addEventListener('click', function() {
        let selectedValues = [];

        document.querySelectorAll('input[name="NCM"]:checked').forEach(function(checkbox) {
            selectedValues.push(checkbox.nextSibling.nodeValue.trim());
        });
        if (selectedValues.length === 0) {
            alert("Selecione pelo menos um item!");
            return;
        }

        // Cria um formulário dinamicamente
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = 'deletaSKU.php'; // Substitua pelo destino correto

        // Cria um campo oculto para enviar os valores
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'selectedNCMs';
        input.value = JSON.stringify(selectedValues); // Envia os valores como JSON

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit(); // Envia o formulário
        console.log(selectedValues); // Para ver o resultado no console
    });
</script>

</html>