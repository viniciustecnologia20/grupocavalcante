<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ventura</title>
    <!---
    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB23TeJDlWwZTIzZ48EdqBhYKhXx00Ei9A&libraries=places"></script>
    <script src="https://kit.fontawesome.com/d14346c4d6.js" crossorigin="anonymous"></script>


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #formulario {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[readonly] {
            background-color: #eee;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        #precoFinal {
            font-weight: bold;
        }

        #map {
            height: 400px;
            width: 100%;
        }

        .input-container {
            position: relative;
        }

        .icon {
            position: absolute;
            right: 10px;
            top: 41%;
            transform: translateY(-50%);
        }

        .input-container input {
            padding-right: 10%; /* Ajuste conforme necessário */
        }

        .checkbox-group {
            display: flex;
        }

        .checkbox-group label {
            margin-right: 10px;
        }

    </style>

</head>
<body>

    <header>
        <h1>Pet Ventura</h1>
    </header>

    <nav>
        <a href="#">Página Inicial</a>
        <a href="#">Calculo de frete</a>
        <a href="#">Contato</a>
    </nav>
    <div>
    <title>Formulário de Cálculo</title>

        <div id="formulario">

            <label for="origin">Origem:</label>
            <div class="input-container">
            <input type="text" id="origin" placeholder="Digite o endereço de origem">
            <i class="fas fa-home icon" onclick="alterarTexto('origin')"></i>
            </div>
            
            <label for="destination">Destino:</label>
            <div class="input-container">
            <input type="text" id="destination" placeholder="Digite o endereço de destino">
            <i class="fas fa-home icon " onclick="alterarTexto('destination')"></i>
            </div>

            <label for="carro">Carro:</label>
            <input type="text" id="carro" name="carro" value="Clio" readonly>
    
            <label for="precoFinal">Preço Final:</label>
            <input type="text" id="precoFinal" name="precoFinal" readonly>

            <div class="checkbox-group">
                <label for="idaEVolta">Ida e Volta:</label>
                <input type="checkbox" id="idaEVolta" name="tipoViagem" onchange="atualizarTipoViagem('idaEVolta')">

                <label for="ida">Ida:</label>
                <input type="checkbox" id="ida" name="tipoViagem" onchange="atualizarTipoViagem('ida')">

                <label for="volta">Volta:</label>
                <input type="checkbox" id="volta" name="tipoViagem" onchange="atualizarTipoViagem('volta')">
            </div>
            
            <div class="checkbox-group">

                <label for="ida">50%:</label>
                <input type="checkbox" id="ida" name="tipoViagem" onchange="atualizarTipoViagem('ida')">

                <label for="volta">100%:</label>
                <input type="checkbox" id="volta" name="tipoViagem" onchange="atualizarTipoViagem('volta')">


            </div>
            
            <button onclick="calcularDistancia()">Calcular Distância</button>
            
            <div id="resultado"></div>

        </div>

    <script>
        function alterarTexto(inputId) {
            document.getElementById(inputId).value = 'Pet Ventura - Rua Ernesto Pincinato - Jardim Quintas das Videiras, Jundiaí - SP, Brasil';
        }
    </script>

    <script>
        var originAutocomplete, destinationAutocomplete;

        function initAutocomplete() {
            originAutocomplete = new google.maps.places.Autocomplete(
                document.getElementById('origin'),
                { types: ['geocode','establishment'] }
            );

            destinationAutocomplete = new google.maps.places.Autocomplete(
                document.getElementById('destination'),
                { types: ['geocode','establishment'] }
            );
        }

        function calcularDistancia() {
            var origin = document.getElementById('origin').value;
            var destination = document.getElementById('destination').value;

            var service = new google.maps.DistanceMatrixService();

            service.getDistanceMatrix({
                origins: [origin],
                destinations: [destination],
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, callback);
        }

        function callback(response, status) {
            var resultadoDiv = document.getElementById('resultado');

            if (status == 'OK') {
                if (response.rows.length > 0 && response.rows[0].elements.length > 0 &&
                    response.rows[0].elements[0].distance && response.rows[0].elements[0].duration) {
                    var distancia = response.rows[0].elements[0].distance.text;
                    var duracao = response.rows[0].elements[0].duration.text;
                    var preço = calcularPreco(distancia);

                    resultadoDiv.innerHTML = 'Distância: ' + distancia + '<br>Duração: ' + duracao + '<br>Valor de frete sugerido:' + preço;
                } else {
                    resultadoDiv.innerHTML = 'Não foi possível calcular a distância. Verifique os endereços fornecidos.';
                }
            } else {
                resultadoDiv.innerHTML = 'Erro ao calcular a distância: ' + status;
            }
        }

        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>
    </script>

    </div>

    <script>
        function atualizarTipoViagem(opcao) {
            var idaEVoltaCheckbox = document.getElementById('idaEVolta');
            var idaCheckbox = document.getElementById('ida');
            var voltaCheckbox = document.getElementById('volta');

            // Se o usuário selecionar "Ida e Volta", desmarca "Ida" e "Volta"
            if (opcao === 'idaEVolta' && idaEVoltaCheckbox.checked) {
                idaCheckbox.checked = false;
                voltaCheckbox.checked = false;
            } else {
                // Se o usuário selecionar "Ida" ou "Volta", desmarca "Ida e Volta"
                idaEVoltaCheckbox.checked = false;
            }
        }
    </script>

    <script>
        function calcularPreco(distancia) {
            //  chave api (AIzaSyB23TeJDlWwZTIzZ48EdqBhYKhXx00Ei9A)

            var idaEVoltaCheckbox = document.getElementById('idaEVolta');
            var idaCheckbox = document.getElementById('ida');
            var voltaCheckbox = document.getElementById('volta');
            var distanciaViagem = distancia.replace(",", "."); // em km
            var distanciaViagem = parseFloat(distanciaViagem)
            var consumoVeiculo = 12; // em km/l
            var precoLitroGasolina = 5.50; // em R$


            if(idaEVoltaCheckbox.checked){
                var distanciaViagem = distanciaViagem * 4;
            }
            if(idaCheckbox.checked && voltaCheckbox.checked){
                var distanciaViagem = distanciaViagem * 2;
            }
            console.log(distanciaViagem);

            // Calcular quantidade de litros necessária
            var quantidadeLitros = distanciaViagem / consumoVeiculo;

            // Calcular custo total
            var custoTotal = quantidadeLitros * precoLitroGasolina;

            // Arredondar para duas casas decimais
            quantidadeLitros = quantidadeLitros.toFixed(2);
            custoTotal = custoTotal.toFixed(2);
            custoTotal = custoTotal.replace(".", ",");

            document.getElementById("precoFinal").value = custoTotal;
            return custoTotal;
            // Atualizar o campo de preço final no formulário
            //document.getElementById("precoFinal").value = "R$ " + precoFinal.toFixed(2);
        }
    </script>
</body>
</html>