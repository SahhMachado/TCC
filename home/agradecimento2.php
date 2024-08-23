<?php
    include_once "../classes/autoload.php";
    $avaliar = isset($_POST['estrela']) ? $_POST['estrela'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/cad.css">
    <title>Obrigado!</title>
    <style>
        textarea{
            border-radius: 4px;
            border: none;
            background-color: #FFFAFA;
            color: #D97904;
            padding-left: 2%;
        }

        .save{
            background-color: #D97904;
            border: 1px dotted #D97904;
            padding: 6px;
            color: white;
            border-radius: 6px;
            width: 80px;
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
                    <br>
                    <form method="POST" action="https://api.staticforms.xyz/submit">
                    <div class="form">
                        <p style="font-weight: lighter; font-size: 2em;" class="text-center">Obrigado por <br>
                           nos avaliar!
                        </p>
                        <textarea hidden name="message" placeholder="Escreva aqui..." id="message" cols="31" rows="6" 
                            required autocomplete="off"><?php if ($avaliar == 1) { 
                                echo "1 Estrela :("; 
                                }elseif ($avaliar == 2) { 
                                    echo "2 Estrelas :("; 
                                }elseif ($avaliar == 3) { 
                                    echo "3 Estrelas :/"; 
                                }elseif ($avaliar == 4) { 
                                    echo "4 Estrelas :)"; 
                                }else{ 
                                    echo "5 Estrelas :D"; 
                                }?>
                        </textarea>
                    </div>
                        <br><br>
                        <center>
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Ok</button>
                        <br><br>
                        <!-- API que envia o email -->
                        <input type="hidden" name="accessKey" value="f42a8c24-3cec-4752-8073-60094286315e">
                            
                        <!-- Redireciona -->
                            <input type="hidden" name="redirectTo" value="http://localhost/program/La_Carte/home/index.php">
                        </center>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>