

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

	  .text-input{

		width:300px

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

          <a href="pagina_monofasicoo.php" class="card-header rounded-top " style="display: block;">Lista de Monofasicos</a>

        </div>

        <div class="col">

        <a href="pagina_cria_mkpp.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>

        </div>

        <div class="col">

        <a href="markup_faixaa.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>

        </div>

        </div>  

        <!--conteudo da pagina-->

        <!--card com o conteudo-->

        <div id="markupFaixa" class="card shadow p-3 mb-5 border border-dark rounded-top ">

          <h5 id="gatilho" class="card-header rounded-top ">Markup por Faixa de Custo</h5>

        <div class="card-body">

            <!--primeira opção do card-->

		<?php

		$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');

		$db = mysqli_select_db($connect,'banco_gp_1');

		$query_select = "SELECT * FROM `markup_faixa_custoo`";

		$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));

    $markup_array = array();



    while ($row = mysqli_fetch_assoc($select)) {

        $markup_array[] = $row;

    }

    //echo "<pre>";

		//print_r($markup_array);

    //echo "</pre>";

    $id = 1

		?>

    <form id="form_markup_faixa" action="cadastra_markup_faixa.php" method="POST">

      <div class="table-responsive border-dark rounded">

        <table class="table table-striped table-bordered table-hover">

          <thead class="thead-dark table-striped centralizar">

            <tr>

              <th scope="col">#</th>

              <th scope="col">Custo Financeiro - Bonificação - Início da Faixa de Preço</th>

              <th scope="col">Custo Financeiro - Bonificação - Fim da Faixa de Preço</th>

              <th scope="col">% de Lucro a ser demonstrado</th>

            </tr>

          </thead>

          <tbody>

            <?php foreach ($markup_array as $row): ?>

              <tr>

                <td><?php echo $row['ID']; ?></td>

                <td><input type="text" id="inicio_<?php echo $row['ID']; ?>" name="inicio[]" value="<?php echo $row['inicio_faixa_preco']; ?>" /></td>

                <td><input type="text" id="fim_<?php echo $row['ID']; ?>" name="fim[]" value="<?php echo $row['fim_faixa_preco']; ?>" /></td>

                <td><input type="text" id="markup_<?php echo $row['ID']; ?>" name="markup[]" value="<?php echo $row['margem_lucro']; ?>" /></td>

              </tr>

            <?php endforeach; ?>

          </tbody>

        </table>

      </div>

      <button type="submit" class='btn btn-outline-info btn-lg value-plus'>Salvar</button>

    </form>





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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

				<script>



				</script>



      </html>

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

















































































































































































































































































































