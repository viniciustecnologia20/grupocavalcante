<!DOCTYPE html>
<html lang="pt-BR">

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
        .marcador { background: #fe9d9d; border: 1px solid #f94646; }
        .marcador-container { background: #5bf946; border: 1px solid #36ae26; }
        .barra-lateral { background: #1926e0; }
        .background { background: #ffffff; }
        .centralizar { text-align: center; margin: auto; }
        .centralizar-esquerda { text-align: left; position: absolute; right: 15px; }

        /* Estilos do filtro e link de check */
        .filter-container {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 1.25rem;
        }

        .check-link {
            color: #b0b0b0;
            text-decoration: none;
            font-size: 1.25rem;
            transition: color 0.2s ease, transform 0.2s ease;
            display: block;
            cursor: pointer; /* Garante que o mouse fique com a 'mãozinha' */
        }

        .check-link:hover {
            color: #28a745;
        }

        /* Classe ativada via JS quando a ordem for selecionada */
        .check-link.selecionado {
            color: #28a745;
            font-weight: bold;
            transform: scale(1.3);
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
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
                // Define o conteúdo do elemento span com o nome do usuário
                var usuario = localStorage.getItem("usuario");
                document.getElementById("userName").innerText = usuario;
            </script>

            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><i class="bi bi-coin"></i> Formação de Preço</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ordemCompraMenu.php"><i class="bi bi-cart-check-fill"></i> Ordem de compra</a>
            </div>
        </div>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="w-100">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
                </div>
            </nav>

            <!-- Conteudo da pagina -->
            <div class="container-fluid p-4">
                <p class="small fw-bold text-danger mb-4">Caso as ordens de compra não estejam aparecendo, faça login no <a href="https://grupocavalcante.net.br/login.php" target="_blank">Tiny</a></p>
                <div class="card shadow border-dark rounded-top mb-5">
                    <div class="card-header rounded-top d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Ordem de Compra</h5>
                        <a class="btn btn-sm btn-outline-dark" href="configOrdem.php">
                            <i class="bi bi-gear-fill"></i> Configuração
                        </a>
                    </div>

                    <div class="card-body">

                        <!-- 1. FORMULÁRIO DE UPLOAD DE ARQUIVO (POST) -->
                        <form id="form2" action="ordemCompra.php" method="post" enctype="multipart/form-data">
                            
                            <!-- CAMPO OCULTO QUE GUARDARÁ O ID DA ORDEM SELECIONADA NA TABELA -->
                            <input type="hidden" name="id_ordem" id="idOrdemOculto" value="">

                            <div class="text-center mb-4">
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-outline-info btn-lg">
                                        <i class="bi bi-search"></i> Consultar Arquivo
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- FIM DO FORMULÁRIO DE UPLOAD -->

                        <hr class="my-4">
                        <h6 class="text-center fw-bold mb-3">Selecione a ordem de compra</h6>

                        <!-- 2. FORMULÁRIO DE FILTROS DA API (GET) -->
                        <form id="form3" method="GET" action="ordemCompraMenu.php" class="filter-container mb-4">
                            <h6 class="text-muted mb-3"><i class="bi bi-funnel"></i> Filtros de Busca (API)</h6>
                            <div class="row g-2 align-items-end">
                                <div class="col-md-2">
                                    <label class="form-label small text-muted mb-1">Número</label>
                                    <input type="number" name="numero" class="form-control" placeholder="Ex: 5826" value="<?= htmlspecialchars($_GET['numero'] ?? '') ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small text-muted mb-1">Fornecedor (Nome)</label>
                                    <input type="text" name="nomeFornecedor" class="form-control" placeholder="Nome exato ou parcial" value="<?= htmlspecialchars($_GET['nomeFornecedor'] ?? '') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small text-muted mb-1">Cód. Fornecedor</label>
                                    <input type="text" name="codigoFornecedor" class="form-control" placeholder="Código" value="<?= htmlspecialchars($_GET['codigoFornecedor'] ?? '') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label small text-muted mb-1">Situação</label>
                                    <select name="situacao" class="form-select">
                                        <option value="">Todas</option>
                                        <option value="0" <?= (isset($_GET['situacao']) && $_GET['situacao'] === '0') ? 'selected' : '' ?>>Em Aberto</option>
                                        <option value="1" <?= (isset($_GET['situacao']) && $_GET['situacao'] === '1') ? 'selected' : '' ?>>Atendido</option>
                                        <option value="2" <?= (isset($_GET['situacao']) && $_GET['situacao'] === '2') ? 'selected' : '' ?>>Cancelado</option>
                                        <option value="3" <?= (isset($_GET['situacao']) && $_GET['situacao'] === '3') ? 'selected' : '' ?>>Em Andamento</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="dataInicial" class="form-label small text-muted mb-1">Data Inicial</label>
                                    <input type="date" name="dataInicial" class="form-control" value="<?= htmlspecialchars($_GET['dataInicial'] ?? '') ?>">
                                </div>
                                <div class="col-md-2">
                                    <label for="dataFinal" class="form-label small text-muted mb-1">Data Final</label>
                                    <input type="date" name="dataFinal" class="form-control" value="<?= htmlspecialchars($_GET['dataFinal'] ?? '') ?>">
                                </div>
                                <div class="col-md-12 text-end mt-3">
                                    <a href="ordemCompraMenu.php" class="btn btn-secondary btn-sm"><i class="bi bi-eraser-fill"></i> Limpar</a>
                                    <button type="submit" class="btn btn-primary btn-sm" form="form3"><i class="bi bi-search"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                        <!-- FIM DO FORMULÁRIO DE FILTROS -->

                        <!-- 3. BLOCO PHP PRINCIPAL (Requisição e Tabela) -->
                        <?php
                        require_once 'tinyAuth.php';
                        $token = obterTokenValidoTiny();

                        // Prepara os parâmetros da URL
                        $parametrosApi = [];

                        if (!empty($_GET['numero'])) $parametrosApi['numero'] = $_GET['numero'];
                        if (!empty($_GET['nomeFornecedor'])) $parametrosApi['nomeFornecedor'] = $_GET['nomeFornecedor'];
                        if (!empty($_GET['codigoFornecedor'])) $parametrosApi['codigoFornecedor'] = $_GET['codigoFornecedor'];
                        if (isset($_GET['situacao']) && $_GET['situacao'] !== '') $parametrosApi['situacao'] = $_GET['situacao'];

                        if (!empty($_GET['dataInicial'])) {
                            $parametrosApi['dataInicial'] = date('d/m/Y', strtotime($_GET['dataInicial']));
                        }
                        if (!empty($_GET['dataFinal'])) {
                            $parametrosApi['dataFinal'] = date('d/m/Y', strtotime($_GET['dataFinal']));
                        }

                        // Monta a URL final
                        $url = "https://api.tiny.com.br/public-api/v3/ordem-compra";
                        $queryString = http_build_query($parametrosApi);

                        if (!empty($queryString)) {
                            $url .= "?" . $queryString;
                        }

                        // Faz a requisição
                        $curl = curl_init($url);
                        curl_setopt_array($curl, [
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                                "Authorization: Bearer " . $token,
                                "Accept: application/json"
                            ]
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);
                        curl_close($curl);

                        if ($err):
                        ?>
                            <div class="alert alert-danger">Erro na requisição cURL: <?= $err ?></div>
                            <?php
                        else:
                            $dados = json_decode($response, true);
                            if (isset($dados['itens'])):
                                $ordens = $dados['itens'];
                            ?>
                                <div class="table-responsive">
                                    <table id="tabelaOrdens" class="table table-hover table-bordered table-striped align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Data</th>
                                                <th class="text-center">Situação</th>
                                                <th>Fornecedor (Nome)</th>
                                                <th class="text-center"><i class="bi bi-check2-square"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $mapaSituacao = [
                                                '0' => 'Em Aberto',
                                                '1' => 'Atendido',
                                                '2' => 'Cancelado',
                                                '3' => 'Em Andamento'
                                            ];

                                            foreach ($ordens as $ordem):
                                                $id = htmlspecialchars($ordem['id'] ?? '-');
                                                $codigo = htmlspecialchars($ordem['numero'] ?? '-');
                                                $situacao = htmlspecialchars($ordem['situacao'] ?? '-');

                                                $textoSituacao = $mapaSituacao[$situacao] ?? $situacao;

                                                $dataOriginal = $ordem['data'] ?? '';
                                                $dataExibicao = '-';

                                                if (!empty($dataOriginal) && $dataOriginal != '0000-00-00') {
                                                    $dataExibicao = date('d/m/Y', strtotime($dataOriginal));
                                                }

                                                $nome = '-';
                                                if (isset($ordem['contato']['nome'])) {
                                                    $nome = htmlspecialchars($ordem['contato']['nome']);
                                                }
                                            ?>
                                                <tr>
                                                    <td class="text-center fw-bold text-muted"><?= $id ?></td>
                                                    <td class="text-center"><?= $codigo ?></td>
                                                    <td class="text-center"><?= $dataExibicao ?></td>
                                                    <td class="text-center">
                                                        <span class="badge bg-secondary"><?= $textoSituacao ?></span>
                                                    </td>
                                                    <td><?= $nome ?></td>
                                                    <td class="text-center">
                                                        <!-- MUDADO: O link agora aciona o JavaScript para selecionar a ordem -->
                                                        <a onclick="selecionarOrdem('<?= $id ?>', this)" class="check-link" title="Selecionar Ordem">&#10004;</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            <?php elseif (isset($dados['mensagem'])): ?>
                                <div class="alert alert-warning text-center mt-3">
                                    <i class="bi bi-exclamation-triangle-fill"></i> Retorno da API: <?= htmlspecialchars($dados['mensagem']) ?>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info text-center mt-3">
                                    <i class="bi bi-info-circle-fill"></i> Nenhuma ordem de compra encontrada para estes filtros.
                                </div>
                        <?php
                            endif;
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="sidebar/js/scripts.js"></script>

    <!-- ========================================== -->
    <!-- SCRIPT DE SELEÇÃO E VALIDAÇÃO DO FORMULÁRIO -->
    <!-- ========================================== -->
    <script>
        // Função ativada quando clica no ✔ da tabela
        function selecionarOrdem(idSelecionado, elementoClicado) {
            // 1. Remove a cor verde (classe selecionado) de todos os checks
            document.querySelectorAll('.check-link').forEach(function(el) {
                el.classList.remove('selecionado');
            });
            
            // 2. Coloca a cor verde e dá destaque apenas no que foi clicado
            elementoClicado.classList.add('selecionado');
            
            // 3. Preenche o campo invisível do Formulário 2 com o ID da ordem
            document.getElementById('idOrdemOculto').value = idSelecionado;
        }

        // Intercepta o envio do formulário 2 para garantir que o usuário fez tudo certo
        document.getElementById('form2').addEventListener('submit', function(evento) {
            var inputArquivo = document.getElementById('XLS');
            var idOculto = document.getElementById('idOrdemOculto');

            // Verifica se o arquivo foi anexado
            if (!inputArquivo.value) {
                evento.preventDefault(); // Trava o envio
                alert('Por favor, importe a lista de preços (.xls) antes de consultar.');
                return;
            }

            // Verifica se alguma ordem foi clicada na tabela
            if (idOculto.value === '') {
                evento.preventDefault(); // Trava o envio
                alert('Por favor, selecione uma ordem de compra na tabela clicando no ✔.');
                return;
            }
        });
    </script>
</body>

</html>