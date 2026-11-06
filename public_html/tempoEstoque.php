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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="sidebar/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.17.5/dist/xlsx.full.min.js"></script>

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
            margin: left;
        }
    </style>
    <script type="text/javascript" src="jquery.js"></script>
    <!-- Funcionalidades da página -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Adicione suas funcionalidades aqui
        });
    </script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
<?php include __DIR__ . '/includes/menubar.php'; ?>
            <!-- Conteúdo da página -->
            <div class="card shadow rounded-top centralizar">
                <h5 class="card-header rounded-top">Tempo de Estoque x Desconto Promoção</h5>
                <div class="row">
                    <div class="col-4">
                    <h6>download</h6>
                    <button>--------</button>
                    </div>
                    <div class="col-4">
                        <h6>Lista de preço</h6>
                        <input type="file" id="fileInput" class="form-control" />
                    </div>
                    <div class="col-4">
                        <h6>Necessidade de compra</h6>
                    <input type="file" id="fileInput1" class="form-control" />
                    </div>
                </div>
            </div>
            <table id="dataTable" class="table table-sm table-striped table-bordered table-hover ">
                <thead class="table-secondary table-striped centralizar ">
                    <tr>
                    <th>Descrição</th>
                    <th>Código (SKU)</th>
                    <th>Preço</th>
                    <th>Preço promocional</th>
                    <th>% Desc</th>
                    <th>Estoque físico</th>
                    <th>Média mensal</th>
                    <th>Coberturas (meses)</th>
                    <th>Meses em Estoque</th>
                    <th>Última Entrada</th>
                    <th>Data Atual</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <script>
                var dadosTabela = [];
                document.getElementById('fileInput').addEventListener('change', function(e) {
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {type: 'array'});

                    // Aqui você pode acessar as planilhas e células do workbook
                    var firstSheetName = workbook.SheetNames[0];
                    var worksheet = workbook.Sheets[firstSheetName];

                     // Iniciar os arrays para armazenar os dados das colunas E e D
                    var colunaE = [];
                    var colunaD = [];
                    var colunaB = [];
                    var colunaA = [];
                        
                    // Obter os dados das colunas E e D
                    var range = XLSX.utils.decode_range(worksheet['!ref']);
                    for (var rowNum = range.s.r + 1; rowNum <= range.e.r; rowNum++) {
                        var cellE = worksheet[XLSX.utils.encode_cell({ c: 4, r: rowNum })]; // Coluna E é a coluna 4
                        var cellD = worksheet[XLSX.utils.encode_cell({ c: 3, r: rowNum })]; // Coluna D é a coluna 3
                        var cellB = worksheet[XLSX.utils.encode_cell({ c: 1, r: rowNum })]; // Coluna B é a coluna 1
                        var cellA = worksheet[XLSX.utils.encode_cell({ c: 0, r: rowNum })]; // Coluna A é a coluna 0
                        colunaE.push(cellE ? parseFloat(cellE.v) : undefined);
                        colunaD.push(cellD ? parseFloat(cellD.v) : undefined);
                        colunaB.push(cellB ? cellB.v : undefined);
                        colunaA.push(cellA ? cellA.v : undefined);
                    }

                    var tbody = document.querySelector('#dataTable tbody');
                    tbody.innerHTML = ''; // Limpar o corpo da tabela antes de preenchê-la

                    for (var i = 0; i < colunaE.length; i++) {
                        var tr = document.createElement('tr');

                        // Descrição (coluna A)
                        var descricaoTd = document.createElement('td');
                        descricaoTd.textContent = colunaA[i] !== undefined ? colunaA[i] : '';
                        tr.appendChild(descricaoTd);

                        // Código (SKU) (coluna B)
                        var skuTd = document.createElement('td');
                        skuTd.textContent = colunaB[i] !== undefined ? colunaB[i] : '';
                        tr.appendChild(skuTd);

                        // Preço (coluna E)
                        var precoTd = document.createElement('td');
                        precoTd.textContent = !isNaN(colunaE[i]) ? colunaE[i].toFixed(2) : '';
                        tr.appendChild(precoTd);

                        // Preço promocional (coluna D)
                        var precoPromocionalTd = document.createElement('td');
                        precoPromocionalTd.textContent = !isNaN(colunaD[i]) ? colunaD[i].toFixed(2) : '';
                        tr.appendChild(precoPromocionalTd);

                        // Calcular % Desc (se ambos os valores existirem)
                        var percentualDescTd = document.createElement('td');
                        var percentualDesc = '';
                        if (!isNaN(colunaE[i]) && !isNaN(colunaD[i]) && colunaD[i] !== 0) {
                            percentualDesc = ((colunaE[i] / colunaD[i]) - 1) * 100;
                            percentualDescTd.textContent = percentualDesc.toFixed(2) + '%';
                        } else {
                            percentualDescTd.textContent = '-';
                        }
                        tr.appendChild(percentualDescTd);

                        tbody.appendChild(tr);
                        dadosTabela.push(tr);
                    }
                };
                reader.readAsArrayBuffer(file);
                });
            </script>
            <script>
                //------------------------------------------------------------------------------------------------------------------------
                document.getElementById('fileInput1').addEventListener('change', function(e) {
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {type: 'array'});

                    // Aqui você pode acessar as planilhas e células do workbook
                    var firstSheetName = workbook.SheetNames[0];
                    var worksheet = workbook.Sheets[firstSheetName];

                     // Iniciar os arrays para armazenar os dados das colunas E e D
                    var colunaH = [];
                    var colunaK = [];
                    var colunaL = [];
                        
                    // Obter os dados das colunas E e D
                    var range = XLSX.utils.decode_range(worksheet['!ref']);
                    for (var rowNum = range.s.r + 1; rowNum <= range.e.r; rowNum++) {
                        var cellH = worksheet[XLSX.utils.encode_cell({ c: 7, r: rowNum })]; // Coluna H é a coluna 7
                        var cellK = worksheet[XLSX.utils.encode_cell({ c: 10, r: rowNum })]; // Coluna K é a coluna 10
                        var cellL = worksheet[XLSX.utils.encode_cell({ c: 11, r: rowNum })]; // Coluna L é a coluna 11
                        colunaH.push(cellH ? parseFloat(cellH.v) : undefined);
                        colunaK.push(cellK ? parseFloat(cellK.v) : undefined);
                        colunaL.push(cellL ? parseFloat(cellL.v) : undefined);
                    }

                    var tbody = document.querySelector('#dataTable tbody');

                    for (var i = 0; i < colunaH.length; i++) {
                        // Verificar se a linha correspondente já existe na tabela
                        var tr;
                        if (dadosTabela[i]) {
                            tr = dadosTabela[i];
                        } else {
                            tr = document.createElement('tr');
                            dadosTabela.push(tr);
                        }

                        // Estoque físico (coluna G)
                        var estoqueTd = document.createElement('td');
                        //estoqueTd.textContent = isNaN(colunaH[i]) ? colunaH[i] : '0';
                        if (!isNaN(colunaH[i])) {
                            estoqueTd.textContent = colunaH[i];
                        } else {
                            estoqueTd.textContent = '0';
                        }
                        tr.appendChild(estoqueTd);

                        // Média mensal (coluna H)
                        var mediaMensalTd = document.createElement('td');
                        mediaMensalTd.textContent = !isNaN(colunaK[i]) ? colunaK[i] : '0';
                        tr.appendChild(mediaMensalTd);

                        // Coberturas (meses) (coluna I)
                        var coberturasTd = document.createElement('td');
                        coberturasTd.textContent = !isNaN(colunaL[i]) ? colunaL[i] : '0';
                        tr.appendChild(coberturasTd);

                        // Atualiza a tabela com as novas linhas
                        var tbody = document.querySelector('#dataTable tbody');
                        dadosTabela.forEach(function(tr) {
                        tbody.appendChild(tr);
                        });
                    }
                };
                reader.readAsArrayBuffer(file);
                });
            </script>
        </div>
    </div>
    <?php

function enviarREST($url, $data, $optional_headers = null) {
    $params = array('http' => array(
        'method' => 'POST',
        'content' => $data
    ));

    if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
    }

    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if (!$fp) {
        throw new Exception("Problema com $url, $php_errormsg");
    }
    $response = @stream_get_contents($fp);
    if ($response === false) {
        throw new Exception("Problema obtendo retorno de $url, $php_errormsg");
    }

    return $response;
}

function getDataPeriodo() {
    $dataFinal = date('d/m/Y');
    $dataInicial = date('d/m/Y', strtotime('-30 days'));
    return array('dataInicial' => $dataInicial, 'dataFinal' => $dataFinal);
}

$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
$db = mysqli_select_db($connect,'banco_gp_1');
$query_select = "SELECT * FROM `ChaveAPI`";
$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
$array = mysqli_fetch_array($select);
$chave_array = $array['chaveAPI'];

$url = 'https://api.tiny.com.br/api2/notas.fiscais.pesquisa.php';
$token = $chave_array;
$tipoNota  = 'S';
$periodo = getDataPeriodo();
$dataInicial = $periodo['dataInicial'];
$dataFinal = $periodo['dataInicial'];
$data = "token=$token&tipoNota=$tipoNota&dataInicial=$dataInicial&dataFinal=$dataFinal&formato=JSON";

$retorno = enviarREST($url, $data);
$content = json_decode($retorno);

$ids = [];

foreach ($content->retorno->notas_fiscais as $item) {
    $ids[] = $item->nota_fiscal->id;
}

$limit = 10; // Reduzido para evitar timeouts
$delay = 5;  // Reduzido para minimizar o tempo total
$url = 'https://api.tiny.com.br/api2/nota.fiscal.obter.php';
$respostas = [];

//foreach (array_chunk($ids[0], $limit) as $lote) {
//    echo "<pre>";
//    print_r($lote);
//    echo "</pre>";
//    //foreach ($lote as $id) {
//    //    $data = "token=$token&id=$id&formato=JSON";
//    //    try {
//    //        $retorno = enviarREST($url, $data);
//    //        $content = json_decode($retorno);
//    //        if($content && isset($content->retorno->nota_fiscal->itens)){
//    //            foreach($content->retorno->nota_fiscal->itens as $item){
//    //                $respostas[] = $item->item->codigo;
//    //            }
//    //        }
//    //    } catch(Exception $e) {
//    //        error_log($e->getMessage());
//    //    }
//    //}
//    //sleep($delay);
//}
?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="sidebar/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>
