<?php
//require_once('db.php');
$slq = "SELECT * FROM contatos";
//$stmt = mysqli_query($conn, $slq);
$data = [];
$i = 0;
/*while($row = mysqli_fetch_assoc($stmt)){
    $data[$i]['id'] = $row['id'];
    $data[$i]['name'] = $row['name'];
    $data[$i]['email'] = $row['email'];
    $data[$i]['phone'] = $row['phone'];
    $i++;
}*/
require_once('Export(2).php');
$export = new Export();

if(isset($_GET['export']) && $_GET['export'] == 'excel'){
    $export->excel('Lista de Contatos', $_GET['fileName'], $data);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exportando dados com PHP</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    </head>
    <body>

    <div class="container">
        <div class="row">
            <h1>Lista de contatos</h1>
        </div>
        <div class="row">
            <buttom class="dropdown-button btn right" data-activates="btn-export">Exportar</buttom>
            <ul id="btn-export" class="dropdown-content" style="margin-top: 40px;">
                <li><a href="?export=excel&&fileName=Conferencia de quantidade">Excel</a></li>
            </ul>
        </div>
        <div class="row">
            <table class="bordered highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row): ?>
                        <tr>
                            <td><?php echo $row['id'];  ?></td>
                            <td><?php echo $row['name'];  ?></td>
                            <td><?php echo $row['email'];  ?></td>
                            <td><?php echo $row['phone'];  ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    </body>
</html>





