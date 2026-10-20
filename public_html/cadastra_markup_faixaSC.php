<?php

$connect = mysqli_connect('banco_gp_1.mysql.dbaas.com.br','banco_gp_1','tecnologia20');

$db = mysqli_select_db($connect,'banco_gp_1');



// Verificar se os dados foram recebidos por POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Receber o array enviado por POST

    $dados_post = $_POST;

    //echo "<pre>";

    //print_r($dados_post);

    //echo "</pre>";

    // Iterar sobre os arrays e executar as instruções UPDATE correspondentes

    for ($i = 0; $i < count($dados_post['inicio']); $i++) {

        $inicio_faixa = $dados_post['inicio'][$i];

        $fim_faixa = $dados_post['fim'][$i];

        $margem_lucro = $dados_post['markup'][$i];



        // Construir e executar a instrução SQL UPDATE

        $sql = "UPDATE markup_faixa_custoSC SET inicio_faixa_preco = '$inicio_faixa', fim_faixa_preco = '$fim_faixa', margem_lucro = '$margem_lucro' WHERE ID = $i + 1";



        if (mysqli_query($connect, $sql)) {

            //echo "Registro atualizado com sucesso para ID " . ($i + 1) . "<br>";

        } else {

            //echo "Erro ao atualizar registro: " . mysqli_error($connect) . "<br>";

        }

    }

    echo"<script language='javascript' type='text/javascript'>

          alert('Atualizado com sucesso!');window.location.

          href='markup_faixaSC.php'</script>";

} else {

    echo "Acesso inválido.";

}

?>