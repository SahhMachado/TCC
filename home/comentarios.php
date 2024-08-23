<?php
    include_once "../classes/autoload.php";
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
    <title>Comentários</title>
    <style>
        textarea{
            border-radius: 4px;
            border: none;
            background-color: #FFFAFA;
            color: #D97904;
            padding-left: 2%;
        }

        .form{
            display: flex;
            justify-content: center;
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

        label{
            margin-bottom: 2%;
        }
    </style>
</head>
<body>
    <section class="content-site">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center">Deixe um comentário</h1>
                    <br>
                    <div class="lin"></div> 
                    <br>
                    <form method="POST" action="https://api.staticforms.xyz/submit">
                    
                    <label for="message" style="margin-left: 9%;">Comentário/Reclamação:</label>                      
                    <div class="form">
                            <textarea name="message" placeholder="Escreva aqui..." id="message" cols="31" rows="6" required autocomplete="off"></textarea>
                    </div>
                        <br><br>
                        <center>
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Enviar</button>
                        <br><br>
                        <!-- Envia o email -->
                            <input type="hidden" name="accessKey" value="f42a8c24-3cec-4752-8073-60094286315e">
                            
                        <!-- Redireciona -->
                            <input type="hidden" name="redirectTo" value="http://localhost/program/La_Carte/home/agradecimento.php">
                        </center>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>