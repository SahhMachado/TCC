<?php
    $prato = isset($_GET['nome']) ? $_GET['nome'] : "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/cad.css">
    <title>Avaliar o Prato</title>
    <style>
        .estrelas{
            display: flex;
            justify-content: center;
        }

        .estrelas input[type=radio]{
            display: none;
        }.estrelas label i.fa::before{
            content: '\f005';
            color: #D97904;
        }.estrelas input[type=radio]:checked ~ label i.fa::before{
            color: #CCC;
        }

        .save{
            background-color: #D97904;
            border: 1px dotted #D97904;
            padding: 6px;
            color: white;
            border-radius: 6px;
            width: 100px;
            font-weight: bold;
        }

        .save:hover{
            background-color: #590202;
            transition: all .5s;
        }
    </style>
</head>
<body>
    <section class="content-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Avaliar</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <form method="POST" action="agradecerP.php">
                    <div class="form">
                        <input hidden type="text" name="prato" value="<?php echo $prato?>">
                        <div class="estrelas">
                            <input type="radio" id="vazio" name="estrela" value="" checked>

                            <label for="estrela_um"><i class="fa"></i></label>
                                <input type="radio" id="estrela_um" name="estrela" value="1">&nbsp;
                            
                            <label for="estrela_dois"><i class="fa"></i></label>
                                <input type="radio" id="estrela_dois" name="estrela" value="2">&nbsp;
                            
                            <label for="estrela_tres"><i class="fa"></i></label>
                                <input type="radio" id="estrela_tres" name="estrela" value="3">&nbsp;
                            
                            <label for="estrela_quatro"><i class="fa"></i></label>
                                <input type="radio" id="estrela_quatro" name="estrela" value="4">&nbsp;
                            
                            <label for="estrela_cinco"><i class="fa"></i></label>
                                <input type="radio" id="estrela_cinco" name="estrela" value="5">
                        </div>
                    </div>
                        <br><br>
                        <center>
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Enviar</button>
                        <br><br>
                        </center>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>