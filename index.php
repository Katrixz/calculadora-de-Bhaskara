<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Equações do Segundo Grau</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="container">
    <div class="painel laranja">
        <div class="cabecalho">
            <h3 class="titulo"><i class="fa fa-calculator"></i> Resolver uma equação completa de segundo grau</h3>
        </div>
        <div class="corpo">                                                      
            <form class="formulario" method="post">
                <p><b>Exemplo:</b> Encontrar os zeros da equação: <b> x^2 + 2x - 15 = 0</b></p>
                <label for="coefAcomp">a:</label>
                <input type="text" class="campo" placeholder="1" maxlength="4" size="4" name="coefAcomp"> 
                <label for="coefBcomp">b:</label>
                <input type="text" class="campo" placeholder="2" maxlength="4" size="4" name="coefBcomp">
                <label for="coefCcomp">c:</label>
                <input type="text" class="campo" placeholder="-15" maxlength="4" size="4" name="coefCcomp"> 
            
                <span style="float:right;">
                    <input type="submit" class="botao" name="submitCompleta" value="Calcular">&nbsp;&nbsp;
                </span>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitCompleta'])) {
                $resultado = calcularEquacaoSegundoGrau($_POST['coefAcomp'], $_POST['coefBcomp'], $_POST['coefCcomp']);
                exibirResultado($resultado);
            }
            ?>
        </div>
    </div>

   <div class="painel roxo">
        <div class="cabecalho">
            <h3 class="titulo"><i class="fa fa-calculator"></i> Resolver uma equação incompleta de segundo grau (falta o termo independente)</h3>
        </div>
        <div class="corpo">                                                      
            <form class="formulario" method="post">
                <p><b>Exemplo:</b> Encontrar os zeros da equação:  <b>4x^2 + 6x = 0</b></p>
                <label for="coefAincomp1">a:</label>
                <input type="text" class="campo" placeholder="4" maxlength="4" size="4" name="coefAincomp1"> 
                <label for="coefBincomp1">b:</label>
                <input type="text" class="campo" placeholder="6" maxlength="4" size="4" name="coefBincomp1">
            
                <span style="float:right;">
                    <input type="submit" class="botao" name="submitIncompleta1" value="Calcular">&nbsp;&nbsp;
                </span>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitIncompleta1'])) {
                $resultado = calcularEquacaoSegundoGrau($_POST['coefAincomp1'], $_POST['coefBincomp1'], 0);
                exibirResultado($resultado);
            }
            ?>
        </div>
    </div>

     <div class="painel verde">
        <div class="cabecalho">
            <h3 class="titulo"><i class="fa fa-calculator"></i> Resolver uma equação incompleta de segundo grau (falta o termo de primeiro grau)</h3>
        </div>
        <div class="corpo">                                                      
            <form class="formulario" method="post">
                <p><b>Exemplo:</b> Encontrar os zeros da equação:  <b>3x^2 - 27 = 0</b></p>
                <label for="coefAincomp2">a:</label>
                <input type="text" class="campo" placeholder="3" maxlength="4" size="4" name="coefAincomp2"> 
                <label for="coefCincomp2">c:</label>
                <input type="text" class="campo" placeholder="-27" maxlength="4" size="4" name="coefCincomp2">
            
                <span style="float:right;">
                    <input type="submit" class="botao" name="submitIncompleta2" value="Calcular">&nbsp;&nbsp;
                </span>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitIncompleta2'])) {
                $resultado = calcularEquacaoSegundoGrau($_POST['coefAincomp2'], 0, $_POST['coefCincomp2']);
                exibirResultado($resultado);
            }
            ?>
        </div>
    </div>
</div>

<?php
// Função para calcular as raízes da equação de segundo grau
function calcularEquacaoSegundoGrau($a = 0, $b = 0, $c = 0)
{
    // Verifica se os campos foram preenchidos e são numéricos
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        return "Por favor, preencha todos os coeficientes com valores numéricos.";
    }

    // Convertendo os coeficientes para float
    $a = floatval($a);
    $b = floatval($b);
    $c = floatval($c);

    // Verifica se 'a' é diferente de zero
    if ($a == 0) {
        return "O coeficiente 'a' não pode ser zero. Esta não é uma equação de segundo grau válida.";
    }

    // Calculando o delta
    $delta = $b * $b - 4 * $a * $c;

    if ($delta > 0) {
        // Duas raízes reais distintas
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        return "A equação possui duas raízes reais distintas: x1 ≈ " . number_format($x1, 2) . ", x2 ≈ " . number_format($x2, 2);
    } elseif ($delta == 0) {
        // Raiz real dupla
        $x = -$b / (2 * $a);
        return "A equação possui uma raiz real dupla: x ≈ " . number_format($x, 2);
    } else {
        // Sem raízes reais
        return "A equação não possui raízes reais.";
    }
}

// Função para exibir o resultado formatado
function exibirResultado($resultado)
{
    echo '<div class="resultado">';
    echo '<h4>Resultado:</h4>';
    echo '<p>' . $resultado . '</p>';
    echo '</div>';
}
?>
</body>
</html>
