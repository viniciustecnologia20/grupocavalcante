
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
                // Obtém o valor do usuário do localStorage
                var usuario = localStorage.getItem("usuario");
              
                // Define o conteúdo do elemento span com o nome do usuário
                document.getElementById("userName").innerText = usuario;
              </script>
        <div class="list-group list-group-flush">
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.html"><i class="bi bi-house-fill"></i> Home</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_consulta.html"><i class="bi bi-receipt-cutoff"></i> Conferencia de quantidade NFe</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_conferencia.html"><i class="bi bi-ui-checks"></i> Conferencia Cadastral</a>
          <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pagina_formacão_de_preço_manu.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
            </svg> Formação de Preço</a>
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
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
        <div class="row">
        <div class="col">
          <a href="pagina_monofasico.php" class="card-header rounded-top " style="display: block;">Lista de Monofasicos</a>
        </div>
        <div class="col">
        <a href="pagina_cria_mkp.php" class="card-header rounded-top " style="display: block;">Cálculo de Markup</a>
        </div>
		<div class="col">
        <a href="markup_faixa.php" class="card-header rounded-top " style="display: block;">Markup por faixa</a>
        </div>
		<div class="col">
		<a href="pagina_chaveAPI.php" class="card-header rounded-top " style="display: block;">Chave API</a>
		</div>
		<div class="col">
      <a href="pagina_tabela.php" class="card-header rounded-top " style="display: block;">Tempo de Estoque x Desconto Promoção</a>
      </div> 
        </div>  
        <!--conteudo da pagina-->
        <!--card com o conteudo-->
        <div id="monofasicos" class="card shadow p-3 mb-5 border border-dark rounded-top ">
          <h5 id="gatilho" class="card-header rounded-top ">Cálculo de Markup</h5>
        <div class="card-body">
            <!--primeira opção do card-->
		<?php
		$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');
		$db = mysqli_select_db($connect,'banco_gp_1');
		$query_select = "SELECT * FROM `Markup` WHERE `ID` = 1";
		$select = mysqli_query($connect,$query_select)or die(mysqli_error($connect));
		$array = mysqli_fetch_array($select);
		$markup_array = $array;
		//var_dump($markup_array);
		?>
		<form id="form_mkp" action="cadastra_mkp.php" method="POST" enctype="multipart/form-data">
          <div class="table-responsive border-dark rounded">
            <table class="table table-striped table-bordered table-hover">
              <thead class="thead-dark table-striped centralizar ">
                <tr>
                      <th scope="col">Descrição</th>
                      <th scope="col">Valores</th>
                    </tr>
                  </thead>
				  <tbody>
				  <tr>
				  <td>Icms venda</td>
				  <td>
					<div class="input-group" style="width:280px" >
					<input id="camp_val_1" value= "<?php echo $markup_array['camp_val_1']?> " name="camp_val_1" type="text" class="form-control text-input" style="width:180px">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div>
					</td>
				  </tr>
				  <tr>
				  <td>Pis</td>
				  <td>
					<div class="input-group" style="width:280px" >
					<input id="camp_val_2" value= "<?php echo $markup_array['camp_val_2']?> " name="camp_val_2"  type="text" class="form-control text-input"style="width:180px">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div>
					</td>
				  </tr>
				  <tr>
				  <td>Cofins</td>
				  <td>
				  <div class="input-group" style="width:280px" >
					<input id="camp_val_3" value= "<?php echo $markup_array['camp_val_3']?> " name="camp_val_3"  type="text" class="form-control text-input"style="width:180px">
					<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div>
					</td>
				  </tr>
				  <tr>
				  <td>Outros Impostos</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="camp_val_4" value= "<?php echo $markup_array['camp_val_4']?> " name="camp_val_4"  type="text" class="form-control text-input"style="width:180px">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div></td>
				  </tr>
				  <tr>
				  <td>Comissão - Intermediação / Marketing</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="camp_val_5" value= "<?php echo $markup_array['camp_val_5']?> " name="camp_val_5" type="text" class="form-control text-input"style="width:180px">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div>
					</td>
				  </tr>
				  <tr>
				  <td>Publicidade</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="camp_val_6" value= "<?php echo $markup_array['camp_val_6']?> " name="camp_val_6" type="text" class="form-control text-input"style="width:180px">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div>
					</td>
				  </tr>
				  <tr>
				  <td>Percas</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="camp_val_7" value= "<?php echo $markup_array['camp_val_7']?> " name="camp_val_7" type="text" class="form-control text-input"style="width:180px"><div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div></td>
				  </tr>
				  <tr>
				  <td>Custo fixo</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="custo" value= "<?php echo $markup_array['custo']?> " name="custo" type="text" class="form-control text-input"style="width:180px"><div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div></td>
				  </tr>
				  <tr>
				  <td>Margem de Lucro</td>
				  <td>
				  <div class="input-group" style="width:280px" >
				  <input id="margem" value= "<?php echo $markup_array['margem']?> " name="margem" type="text" class="form-control text-input"style="width:180px"><div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">%</span>
					</div>
					</div></td>
				  </tr>
				  <tr>
				  <td>CTV % - Custo total de Venda</td>
				  <td><input id="ctv" value= "<?php echo $markup_array['ctv']?>" name="ctv" type="text" class="form-control text-input" readonly=""style="width:180px"></td>
				  </tr>
				  <tr>
				  <td>MKD - Markup Divisor</td>
				  <td><input id="mkd" value= "<?php echo $markup_array['mkd']?>" name="mkd" type="text" class="form-control text-input" readonly=""style="width:180px"></td>
				  </tr>
				  <tr>
				  <td>MKM - Markup Multiplicador</td>
				  <td><input id="mkm" value= "<?php echo $markup_array['mkm']?>" name="mkm" type="text" class="form-control text-input" readonly=""style="width:180px"></td>
				  
				  </tr>
				  </tbody>
				  </table>
				</div>
				</form>
				<div>

				<button id='botaoEnviar'  class=' botaoEnviar btn btn-outline-info btn-lg value-plus'>Calcular</button>
				<button  class='btn btn-outline-info btn-lg value-plus' form="form_mkp">Salvar</button>
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
					$("#botaoEnviar").click(function(){
						
					var icms = document.querySelector("#camp_val_1");//icms
					var icms = icms.value.replace(",", ".");
					var icms_float = parseFloat(icms);
					
					var pis = document.querySelector("#camp_val_2");//pis
					var pis = pis.value.replace(",", ".");
					var pis_float = parseFloat(pis);
					
					var cofins = document.querySelector("#camp_val_3");//cofins
					var cofins = cofins.value.replace(",", ".");
					var cofins_float = parseFloat(cofins);
					
					var difal = document.querySelector("#camp_val_4");//difal
					var difal = difal.value.replace(",", ".");
					var difal_float = parseFloat(difal);
					
					var comissao_I_M = document.querySelector("#camp_val_5");//comissao_I_M
					var comissao_I_M = comissao_I_M.value.replace(",", ".");
					var comissao_I_M_float = parseFloat(comissao_I_M);
					
					var comissao_F_C = document.querySelector("#camp_val_6");//comissao_F_C
					var comissao_F_C = comissao_F_C.value.replace(",", ".");
					var comissao_F_C_float = parseFloat(comissao_F_C);
					
					var percas = document.querySelector("#camp_val_7");//percas
					var percas = percas.value.replace(",", ".");
			        var percas_float = parseFloat(percas);
					
					var custo = document.querySelector("#custo");
					var custo = custo.value.replace(",", ".");
			        var custo_float = parseFloat(custo);
					
					var margem = document.querySelector("#margem");
					var margem = margem.value.replace(",", ".");
			        var margem_float = parseFloat(margem);
					
					var ctv = (icms_float + pis_float + cofins_float + difal_float + comissao_I_M_float + comissao_F_C_float + percas_float + custo_float + margem_float);
					var ctv = ctv.toFixed(4);
					var temp = document.getElementById("ctv").value = ctv;
					
					
					var mkd = (100 - temp) / 100;
					var mkd = mkd.toFixed(4);
					var temp = document.getElementById("mkd").value = mkd;
					
					var mkm = (100 / temp) / 100;
					var mkm = mkm.toFixed(4);
					var mkmFinal = document.getElementById("mkm").value = mkm;

					
					console.log(icms_float);
					console.log(pis);
					console.log(cofins);
					console.log(difal);
					console.log(comissao_I_M);
					console.log(comissao_F_C);
					console.log(percas);
					console.log(ctv);
					console.log(mkd);
					
					var mkm = parseFloat(mkm) 
					console.log(typeof(mkm));
					console.log(mkm);
						
					//localStorage.setItem("MKM",mkm);


					});
				</script>

      </html>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
























































































































































