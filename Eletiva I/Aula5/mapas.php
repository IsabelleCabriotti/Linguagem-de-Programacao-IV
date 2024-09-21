<?php
    //mapa com array
    $frutas = array("morango", "maça", "abacaxi"); //indice/fruta de 0 >

    echo "<p>".$frutas[0]."</p>";

    $frutas[0] = "laranja";

    $frutas["fruta"] = 15;//adicionando novo item

    //novo mapa colocando 1 a 1
    $cores[0] = "azul";
    $cores["cor"] = "laranja";

    //novo mapa, em laravel
    $mapa = [
        "valor1" => 1,
        "valor2" => 2,
        "valor3" => 3,
    ];

    var_dump($cores);
    echo "<p></p>";
    print_r($mapa);
    asort($frutas); //ordena pelo valor
    #ksort($frutas); //ordena pela chave

    #foreach($frutas as $valor); //não acessa a chave, somente o valor da posição
    foreach($frutas as $chave => $valor){ //acesso a chave e ao valor
        echo "<p>Na posição $chave temos a fruta: $valor</p>";
    }
    echo "Quantidade de elemento: ".count($frutas);
