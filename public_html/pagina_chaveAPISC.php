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
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
        <div class="row">
        <div class="col">
          <a href="pagina_monofasicoSC.php" class="card-header rounded-top " style="display: block;">Lista de monofasicos</a>
        </div>
        <div class="col">
        <a href="pagina_cria_mkpSC.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>
        </div>
        <div class="col">
        <a href="markup_faixaSC.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>
        </div>
		    <div class="col">
		    <a href="pagina_chaveAPISC.php" class="card-header rounded-top " style="display: block;">Chave API</a>
		    </div> 
        <div class="col">
        <a href="pagina_tabelaSC.php" class="card-header rounded-top " style="display: block;">Tempo de Estoque x Desconto Promoção</a>
        </div>  
        </div>  
        <!--conteudo da pagina-->
        <!--card com o conteudo-->
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
          <h5 id="gatilho" class="card-header rounded-top ">Chave Token API</h5>
          <div class="card-body">
            <!--primeira opção do card-->
            <form class="form-inline" id="chaveAPI" action="cadastrar_chaveAPISC.php" method="POST" enctype="multipart/form-data">
              <div class="form-group mx-sm-2 mb-2">
                <h6>Chave : </h6>
                <input type="text" class="form-control" name="chave" id="chave" >
              </div>
              <div class="form-group mx-sm-2 mb-2">
                 <button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
              </div>
              </form>
			  <div>
			  <?php
				$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
				$db = mysqli_select_db($connect,'banco_gp_1');
				$query_select = "SELECT * FROM `ChaveAPISC`";
				$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
				$array = mysqli_fetch_array($select);
				$chave_array = $array['chaveAPI'];
				echo "<h6 id=gatilho class=card-header rounded-top centralizar >Chave atual: $chave_array</h5>"
			  ?>
			  </div>
        <div hidden><!-- tabela legado escondida-->
			  <div class="table-responsive border-dark rounded">
			  <?php
				$query_select = "SELECT * FROM `DescontosSC`";
				$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
				$array = mysqli_fetch_array($select);
				$result = $select;

				// Verifica se há resultados
				if ($result->num_rows > 0) {
					// Inicializa um array para armazenar os resultados
					$clientesArray = array();
				
					// Loop para converter os resultados em um array
					while ($row = $result->fetch_assoc()) {
						$clientesArray[] = $row;
					}
				
					// Exibe o array
					//print_r($clientesArray);
				} else {
					echo "Nenhum resultado encontrado.";
				}
				

			?>
			<form method="POST" action="cadastra_DescontosSC.php">
			<table class="table table-striped table-bordered table-hover">
				<thead class="thead-dark table-striped centralizar ">
					<tr>
						<th scope="col">Estoque Fisico</th>
						<th scope="col">Media Mensal</th>
						<th scope="col">Cobertura Meses</th>
						<th scope="col">acima 100,00</th>
						<th scope="col">50,00 a 99,99</th>
						<th scope="col">0,00 a 49,99</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($clientesArray as $row) { ?>
					<tr>
						<td><input type="text" name="dados[<?php echo $indice; ?>][estoqueFisico]" value="<?php echo $row['estoqueFisico']; ?>"></td>
						<td><input type="text" name="dados[<?php echo $indice; ?>][mediaMensal]" value="<?php echo $row['mediaMensal']; ?>"></td>
						<td><input type="text" name="dados[<?php echo $indice; ?>][coberturaMeses]" value="<?php echo $row['coberturaMeses']; ?>"></td>
						<td><input type="text" name="dados[<?php echo $indice; ?>][acima 100]" value="<?php echo $row['acima 100']; ?>"></td>
						<td><input type="text" name="dados[<?php echo $indice; ?>][50 a 99]" value="<?php echo $row['50 a 99']; ?>"></td>
						<td><input type="text" name="dados[<?php echo $indice; ?>][00 a 49]" value="<?php echo $row['00 49']; ?>"></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			</div>
			<input type="submit" class='btn btn-outline-info btn-lg value-plus' value="Salvar Alterações">
			</form>
    </div>
		<?php
		
		?>
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
	      /*$("#gatilho").click(function () {
		    $("#monofasicos").hide();
	      });*/
        </script>
      </html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
























































































































































