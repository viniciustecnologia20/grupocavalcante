<?php
// === MODO DE DEPURAÇÃO: Obriga o servidor a mostrar erros em vez da tela 500 ===
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Verifica se o usuário chegou aqui através do formulário
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id_ordem'])) {
    die("Acesso inválido. Nenhuma ordem de compra foi selecionada. <a href='ordemCompraMenu.php'>Voltar</a>");
}

$idOrdem = $_POST['id_ordem'];
$arquivoXls = $_FILES['XLS'] ?? null;

// ==========================================
// REQUISIÇÃO API TINY - ORDEM DE COMPRA
// ==========================================
require_once 'tinyAuth.php';
$token = obterTokenValidoTiny();

$url = "https://api.tiny.com.br/public-api/v3/ordem-compra/" . $idOrdem;
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

if ($err) {
    die("Erro na requisição cURL (Ordem de Compra): " . $err);
}

$dadosOrdem = json_decode($response, true);
$itensOrdem = $dadosOrdem['itens'] ?? [];
$numeroPedido = htmlspecialchars($dadosOrdem['numeroPedido'] ?? $idOrdem);

$dataOrdemBruta = $dadosOrdem['data'] ?? '';
$dataOrdem = (!empty($dataOrdemBruta) && $dataOrdemBruta != '0000-00-00') ? date('d/m/Y', strtotime($dataOrdemBruta)) : '-';

// ==========================================
// BUSCA DETALHES DE CADA PRODUTO PELO ID
// ==========================================
$detalhesProdutos = []; // Array para armazenar os dados de cada produto usando o ID como chave

if (!empty($itensOrdem)) {
    foreach ($itensOrdem as $item) {
        $idProduto = $item['produto']['id'] ?? null;

        // Se o ID existir e ainda não tivermos buscado esse produto
        if ($idProduto && !isset($detalhesProdutos[$idProduto])) {
            $urlProduto = "https://api.tiny.com.br/public-api/v3/produtos/" . $idProduto;
            $curlProd = curl_init($urlProduto);

            curl_setopt_array($curlProd, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer " . $token,
                    "Accept: application/json"
                ]
            ]);

            $respProd = curl_exec($curlProd);
            curl_close($curlProd);

            if ($respProd) {
                // Decodifica e salva os dados completos do produto no array
                $detalhesProdutos[$idProduto] = json_decode($respProd, true);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ordem de Compra - <?= $numeroPedido ?></title>
    <link rel="icon" type="image/x-icon" href="sidebar/assets/favicon.ico" />
    <link href="sidebar/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

    <style type="text/css">
        .barra-lateral {
            background: #1926e0;
        }

        body {
            background-color: #f8f9fa;
        }

        .bg-mint {
            background-color: #6ed6a8;
            color: #2b4538;
        }

        .bg-mint-light {
            background-color: #7ce5b6;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .bg-mint-light:hover {
            background-color: #68cfa3;
        }

        .card-custom {
            border: 1px solid #d3d3d3;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            background: #ffffff;
            margin: 20px;
        }

        .table-custom th {
            font-size: 0.85rem;
            vertical-align: middle;
            text-align: center;
            color: #333;
            border-bottom: 2px solid #dee2e6;
        }

        .table-custom td {
            font-size: 0.85rem;
            vertical-align: middle;
            text-align: center;
        }

        .destaque-oc {
            background-color: #e8f5e9 !important;
            font-weight: bold;
            color: #198754;
        }

        .destaque-excel {
            background-color: #e3f2fd !important;
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <div class="d-flex align-items-center">
                    <a href="perfil_usuario.php" class="text-decoration-none text-dark">
                        <i class="bi bi-person me-2"></i>
                        <span id="userName" class="me-3"></span>
                    </a>
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia NFe</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="ordemCompraMenu.php"><i class="bi bi-cart3"></i> Ordem de compra</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle"><i class="bi bi-list"></i></button>
                </div>
            </nav>
            <div class="bg-mint-light p-2 text-center" id="btnExportarExcel">
                <span class="fw-semibold"><i class="bi bi-file-earmark-excel"></i> Exportar para Excel</span>
            </div>
            <div class="container-fluid p-0">
                <!-- Alertas de Sucesso/Erro do Excel -->
                <?php if ($arquivoXls && $arquivoXls['error'] === UPLOAD_ERR_OK): ?>
                    <?php if (!file_exists('SimpleXLS.php')): ?>
                        <div class="alert alert-danger m-3">
                            <i class="bi bi-exclamation-triangle-fill"></i> <strong>Atenção:</strong> O arquivo <code>SimpleXLS.php</code> não foi encontrado na pasta. O Excel não foi lido.
                        </div>
                    <?php elseif (isset($leituraExcelSucesso) && $leituraExcelSucesso): ?>
                        <div class="alert alert-success m-3">
                            <i class="bi bi-check-circle-fill"></i> Arquivo <strong><?= htmlspecialchars($arquivoXls['name']) ?></strong> lido com sucesso. Cruzando SKUs com a Ordem de Compra...
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning m-3">
                            <i class="bi bi-x-circle-fill"></i> O arquivo enviado não é um formato XLS válido ou está corrompido.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="card-custom">
                    <div class="bg-mint p-3 border-bottom d-flex justify-content-between align-items-center" style="border-color: rgba(255,255,255,0.2) !important;">
                        <h5 class="m-0 text-dark">Ordem de Compra: <?= $numeroPedido ?></h5>
                        <a href="ordemCompraMenu.php" class="btn btn-sm btn-light"><i class="bi bi-arrow-left"></i> Voltar</a>
                    </div>

                    <!-- Substitua toda a sua div table-responsive por esta: -->
                    <div class="table-responsive p-3">
                        <table class="table table-bordered table-hover table-custom mb-0">
                            <thead>
                                <tr>
                                    <th>*</th>
                                    <th>SKU</th>
                                    <th>Código<br>de<br>Fábrica</th>
                                    <th>Quantidade<br>O.C</th>
                                    <th>Quantidade<br>Cotação</th>
                                    <th>#<br>Quantidade</th>
                                    <th>Preço<br>de<br>Custo O.C</th>
                                    <th>Custo da<br>Cotação</th>
                                    <th>#<br>Custo<br>%</th>
                                    <th>Total<br>do<br>item O.C</th>
                                    <th>Preço<br>de<br>Venda</th>
                                    <th>Preço<br>promocional</th>
                                    <th>Desconto<br>(%)</th>
                                    <th>Estoque<br>Disponível</th>
                                    <th>Data de<br>Compra</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($itensOrdem)): ?>
                                    <?php foreach ($itensOrdem as $index => $item):
                                        $idProdutoAtual = $item['produto']['id'] ?? null;
                                        $sku = htmlspecialchars($item['produto']['sku'] ?? '-');
                                        $gtin = htmlspecialchars($item['gtin'] ?? '-');

                                        // Recupera os dados completos do produto
                                        $dadosExtrasAPI = $detalhesProdutos[$idProdutoAtual] ?? null;

                                        // Acessa o preço de venda e promocional
                                        $precoVendaAPI = (float)($dadosExtrasAPI['precos']['preco'] ?? 0);
                                        $precoVendaFormatado = number_format($precoVendaAPI, 2, ',', '.');

                                        $precoPromocionalAPI = (float)($dadosExtrasAPI['precos']['precoPromocional'] ?? 0);
                                        $precoPromocionalFormatado = number_format($precoPromocionalAPI, 2, ',', '.');

                                        $EstoqueDisponivel = $dadosExtrasAPI['estoque']['quantidade'] ?? 0;

                                        // Calcula o percentual de desconto
                                        if ($precoVendaAPI > 0 && $precoPromocionalAPI > 0) {
                                            $DescontoPercentual = (1 - ($precoPromocionalAPI / $precoVendaAPI)) * 100;
                                        } else {
                                            $DescontoPercentual = 0;
                                        }
                                        $DescontoPercentualFormatado = number_format($DescontoPercentual, 2, ',', '.');

                                        // Cálculos da Ordem de Compra (Variáveis de Quantidade e Custo base)
                                        $quantidadeOC = (float)($item['quantidade'] ?? 0);
                                        $precoOC = (float)($item['preco'] ?? 0);
                                        $totalOC = $quantidadeOC * $precoOC;

                                        $precoFormatado = number_format($precoOC, 2, ',', '.');
                                        $totalFormatado = number_format($totalOC, 2, ',', '.');

                                        $quantidadeExcelEncontrada = isset($quantidadesExcel[$sku]) ? htmlspecialchars($quantidadesExcel[$sku]) : '-';
                                    ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $sku ?></td>
                                            <td><?= $gtin ?></td>

                                            <!-- Coluna Base: Quantidade O.C -->
                                            <td class="qtd-oc" data-valor="<?= $quantidadeOC ?>"><?= $quantidadeOC ?></td>

                                            <!-- Coluna Input: Quantidade Cotação -->
                                            <td style="width: 100px;">
                                                <input type="number" class="form-control form-control-sm input-qtd-cotacao" placeholder="0" min="0">
                                            </td>

                                            <!-- Coluna Resultado: # Quantidade -->
                                            <td class="resultado-qtd fw-bold text-secondary text-center align-middle">
                                                <?= $quantidadeExcelEncontrada ?>
                                            </td>

                                            <!-- ================= NOVIDADE AQUI ================= -->
                                            <!-- Coluna Base: Preço Custo O.C -->
                                            <td class="custo-oc" data-valor="<?= $precoOC ?>">R$<?= $precoFormatado ?></td>

                                            <!-- Coluna Input: Custo da Cotação (Step 0.01 permite centavos) -->
                                            <td style="width: 130px;">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">R$</span>
                                                    <input type="number" class="form-control input-custo-cotacao" placeholder="0.00" step="0.01" min="0">
                                                </div>
                                            </td>

                                            <!-- Coluna Resultado: # Custo % -->
                                            <td class="resultado-custo fw-bold text-secondary text-center align-middle" style="white-space: nowrap;">
                                                -
                                            </td>
                                            <!-- ================================================= -->

                                            <td>R$<?= $totalFormatado ?></td>

                                            <!-- Coluna preenchida com o Preço de Venda vindo da API -->
                                            <td class=" text-primary">R$<?= $precoVendaFormatado ?></td>

                                            <!-- Coluna preenchida com o Preço promocional vindo da API -->
                                            <td class=" text-primary">R$<?= $precoPromocionalFormatado ?></td>

                                            <!-- Coluna preenchida com o desconto vindo da API -->
                                            <td class=" text-primary"><?= $DescontoPercentualFormatado ?>%</td>

                                            <!-- Coluna preenchida com o estoque vindo da API -->
                                            <td class=" text-primary"><?= $EstoqueDisponivel ?></td>

                                            <td><input type="date"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="15" class="text-muted p-4 text-center">Nenhum item encontrado nesta ordem de compra.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- SCRIPT PARA CÁLCULO EM TEMPO REAL -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {

                            // --------------------------------------------------------
                            // 1. EVENTO PARA QUANTIDADE
                            // --------------------------------------------------------
                            const inputsCotacao = document.querySelectorAll('.input-qtd-cotacao');

                            inputsCotacao.forEach(function(input) {
                                input.addEventListener('input', function() {
                                    const tr = this.closest('tr');
                                    const qtdOcBase = parseFloat(tr.querySelector('.qtd-oc').getAttribute('data-valor')) || 0;

                                    // Se o input estiver vazio, volta ao traço
                                    if (this.value === '') {
                                        const tdResultado = tr.querySelector('.resultado-qtd');
                                        tdResultado.textContent = '-';
                                        tdResultado.className = 'resultado-qtd fw-bold text-secondary text-center align-middle';
                                        return;
                                    }

                                    const qtdCotacao = parseFloat(this.value) || 0;
                                    const diferenca = qtdCotacao - qtdOcBase;
                                    const tdResultado = tr.querySelector('.resultado-qtd');

                                    tdResultado.textContent = diferenca;

                                    // Cores da Quantidade: Faltou item = Vermelho | Sobrou ou Igual = Verde
                                    if (diferenca < 0) {
                                        tdResultado.className = 'resultado-qtd fw-bold text-danger text-center align-middle';
                                    } else {
                                        tdResultado.className = 'resultado-qtd fw-bold text-success text-center align-middle';
                                    }
                                });
                            });

                            // --------------------------------------------------------
                            // 2. EVENTO PARA CUSTO DA COTAÇÃO
                            // --------------------------------------------------------
                            const inputsCustoCotacao = document.querySelectorAll('.input-custo-cotacao');

                            inputsCustoCotacao.forEach(function(input) {
                                input.addEventListener('input', function() {
                                    const tr = this.closest('tr');
                                    const custoOcBase = parseFloat(tr.querySelector('.custo-oc').getAttribute('data-valor')) || 0;
                                    const tdResultadoCusto = tr.querySelector('.resultado-custo');

                                    // Se apagar o input, reseta a coluna
                                    if (this.value === '') {
                                        tdResultadoCusto.textContent = '-';
                                        tdResultadoCusto.className = 'resultado-custo fw-bold text-secondary text-center align-middle';
                                        return;
                                    }

                                    const custoCotacao = parseFloat(this.value);
                                    const diferenca = custoCotacao - custoOcBase;

                                    // Calcula a porcentagem de variação
                                    let porcentagem = 0;
                                    if (custoOcBase > 0) {
                                        porcentagem = (diferenca / custoOcBase) * 100;
                                    }

                                    // Formatação Brasileira para Moeda (R$) e Porcentagem (%)
                                    const diferencaMoeda = diferenca.toLocaleString('pt-BR', {
                                        style: 'currency',
                                        currency: 'BRL'
                                    });
                                    // Adiciona o sinal de + para ficar explícito visualmente
                                    const sinalPerc = porcentagem > 0 ? '+' : '';
                                    const textoPorcentagem = `${sinalPerc}${porcentagem.toFixed(2).replace('.', ',')}%`;

                                    // Aplica o texto na tabela: Ex -> R$ 1,50 (+10,00%)
                                    tdResultadoCusto.textContent = `${diferencaMoeda} (${textoPorcentagem})`;

                                    // Cores do Custo: Ficou MAIS CARO = Vermelho | Ficou MAIS BARATO = Verde
                                    if (diferenca > 0) {
                                        tdResultadoCusto.className = 'resultado-custo fw-bold text-danger text-center align-middle';
                                    } else if (diferenca < 0) {
                                        tdResultadoCusto.className = 'resultado-custo fw-bold text-success text-center align-middle';
                                    } else {
                                        // Exatamente o mesmo preço
                                        tdResultadoCusto.className = 'resultado-custo fw-bold text-secondary text-center align-middle';
                                    }
                                });
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="sidebar/js/scripts.js"></script>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const btnExportarExcel = document.getElementById('btnExportarExcel');
        
        if (btnExportarExcel) {
            btnExportarExcel.addEventListener('click', function() {
                // 1. Pega a tabela original que está na tela
                const tableOriginal = document.querySelector('.table-custom');
                
                // 2. Cria um clone exato da tabela em memória (para não estragar a tela do usuário)
                const tableClone = tableOriginal.cloneNode(true);
                
                // 3. Pega todos os inputs (Quantidades e Custos) da tabela ORIGINAL para ler o que foi digitado
                const inputsOriginais = tableOriginal.querySelectorAll('input');
                const inputsClone = tableClone.querySelectorAll('input');
                
                // 4. Substitui os inputs do clone pelo valor real digitado como texto simples
                for (let i = 0; i < inputsOriginais.length; i++) {
                    let valorDigitado = inputsOriginais[i].value;
                    
                    // Se for o input de custo, adiciona o "R$" para ficar bonito no Excel
                    if (inputsOriginais[i].classList.contains('input-custo-cotacao') && valorDigitado !== '') {
                        valorDigitado = 'R$ ' + parseFloat(valorDigitado).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
                    }
                    
                    // Cria um nó de texto e substitui a tag <input> por ele no clone
                    let textoNode = document.createTextNode(valorDigitado || '-');
                    inputsClone[i].parentNode.replaceChild(textoNode, inputsClone[i]);
                }
                
                // 5. Remove colunas vazias ou indesejadas (opcional, como a coluna de inputs se quisesse, mas vamos manter tudo)
                // Remove os cifrões estáticos dos spans que acompanhavam o input-group para não duplicar "R$ R$"
                const spansR$ = tableClone.querySelectorAll('.input-group-text');
                spansR$.forEach(span => span.remove());

                // 6. Converte a tabela clonada para uma planilha (Workbook) do SheetJS
                const workbook = XLSX.utils.table_to_book(tableClone, { sheet: "Cotação" });
                
                // 7. Gera o nome do arquivo dinamicamente com o número da Ordem
                const nomeArquivo = "Cotacao_Ordem_<?= $numeroPedido ?>.xlsx";
                
                // 8. Força o download
                XLSX.writeFile(workbook, nomeArquivo);
            });
        }
    });
</script>