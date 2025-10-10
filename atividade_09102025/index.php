<?php


//Atividade  1  Escreva um script que leia o nome de uma peça de roupa e o tamanho (P, M ou G). Use switch para definir o preço base e if para aplicar um acréscimo de 10% se for tamanho G. Mostre o preço final concatenando uma frase descritiva.

 $Roupas = [
        ['nome' => "Camisa" , 'tamanho' =>"P" , 'preco' => 0 ],
        ['nome' => "Camisa" , 'tamanho' =>"M" , 'preco' => 0 ],
        ['nome' => "Camisa" , 'tamanho' =>"G" , 'preco' => 0 ],
        ['nome' => "Calça" , 'tamanho' =>"P" , 'preco' =>  0 ],
        ['nome' => "Calça" , 'tamanho' =>"M" , 'preco' =>  0 ],
        ['nome' => "Calça" , 'tamanho' =>"G" , 'preco' =>  0 ] ];

    foreach ($Roupas as &$Roupa){

        switch ($Roupa['nome']){
            case 'Camisa' :
            $Roupa['preco'] = 50;
            break;

            case 'Calça' :
            $Roupa['preco'] = 150;
            break;
        }

        if ($Roupa['tamanho'] == "G"){
            $Roupa['preco'] = $Roupa['preco'] +($Roupa['preco']* 0.1);
        }
       
        echo (" Modelo :" . $Roupa['nome'] . " Tamanho :" . $Roupa['tamanho'] ."      "."Preço :"  .$Roupa['preco'] . "<br> <br>" );
      
    }

//2 - Crie um array de notas de alunos (ex.: 4 notas). Calcule a média de cada um usando foreach. Mostre se foi aprovado (>= 6) ou reprovado usando if/else.

    $Notas = [  [7,6,5,4],
                [8,7,5,6],
                [7,6,5,6],
                [9,3,4,4],
                [8,6,5,4]
            ];

     foreach ($Notas as &$Nota){
        $somaNotas = array_sum($Nota);
        $mediaNota = $somaNotas / 4 ;
        if ($mediaNota <= 6){
            echo "Aluno reprovado , média menor que 6 <br>";
        } else {
            echo "Aluno aprovado <br>";
        }
     }

 //3 - Some todos os números pares entre 1 e 50 com while e armazene os pares em um array. Mostre a soma final e a lista de pares.

    $Numero = 0;
    $somaPares = 0;
    $numeroPar =[];

     while ($Numero <= 50 ){
        if ($Numero % 2 == 0){
            $numeroPar[] = $Numero ;
            $somaPares += $Numero;

        } else {
            $numeroImpar = $Numero;
        }

        $Numero++;

     }

     echo "<br>" . $somaPares . "<br>";
     
     foreach ($numeroPar as $numeros){
        echo "<BR>" . $numeros ;
     }

//4 - Faça um simulador de caixa eletrônico: escolha a opção de saque (20, 50, 100) com switch e while para contar notas.

     echo "<BR>";

     $valorSaque = 100;

     switch ($valorSaque){
        case 20 :
            $quantidadeNotas = 0;
            $valorSacado = $valorSaque;

            while ($valorSacado >= 20) {
                $valorSacado =  $valorSacado - 20;
                $quantidadeNotas += 1;
            }
            echo "<BR>";
            echo "Saque no valor de :" . $valorSaque ." realizado";
            echo "Quantidade de notas :" . $quantidadeNotas;
            echo "<BR>";

            break;

            case 50 :
            $quantidadeNotas = 0;
            $valorSacado = $valorSaque;

            while ($valorSacado >= 50) {
                $valorSacado =  $valorSacado - 50;
                $quantidadeNotas += 1;
            }
            
            echo "Saque no valor de :" . $valorSaque ." realizado";
            echo "Quantidade de notas  :" . $quantidadeNotas;
            echo "<BR>";

            break;


            case 100 :
            $quantidadeNotas = 0;
            $valorSacado = $valorSaque;

            while ($valorSacado >= 100) {
                $valorSacado =  $valorSacado - 100;
                $quantidadeNotas += 1;
            }
            
            
            
            echo "Saque no valor de :" . $valorSaque ." realizado";
            echo "Quantidade de notas :" . $quantidadeNotas;
            echo "<BR>";

            break;

            default :
                echo "Valor não pode ser sacado , nesse caixa somente notas de 20 ,50 ,100";

     }

//5 - Monte um carrinho de compras com produtos e preços, use array, calcule total e mostre um recibo formatado.

 $Carinho = [
        ['item' => "Camisa" ,  'preco' => 100 ],
        ['item' => "Tenis" ,  'preco' => 3000 ],
        ['item' => "Camisa" ,  'preco' => 80 ],
        ['item' => "Calça" ,  'preco' =>  250 ],
        ['item' => "Meia" , 'preco' =>  40 ],
        ['item' => "Calça" ,  'preco' =>  270 ] ];
    
    $Total_pedido = array_sum(array_column($Carinho, 'preco'));
    

    foreach ($Carinho as $item){
       
        echo "Nome do item :";
        echo $item['item'];
        echo "<BR>";
        echo "Valor do item :";
        echo $item['preco'];
        echo "<BR>";
    }

    echo "Valor total :" . $Total_pedido;
    
//6 - De um array de salários, dê um aumento de 10% a quem ganha abaixo de 2000.



$salarios = [
    1850.50,
    2200.75,
    1550.00,
    2480.90,
    1765.25,
    1932.00,
    2310.45,
    1505.80,
    2055.00,
    1689.60,
];
echo "<BR>";

foreach ($salarios as &$salario){
    if ($salario <= 2000.00){
         $salarioAumentado =$salario + $salario * 0.2; 
        echo "<br>" ."Salario sem aumento " . $salario . "<br>";

        echo "Salario com aumento " . $salarioAumentado . "<br>";
    } else {
        echo "<br>";
        echo "Salario sem alteração ". $salario . "<br>";
    }

}



?>