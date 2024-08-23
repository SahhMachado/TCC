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
    <title>Obrigado!</title>
    <style>
        input{
            border-radius: 4px;
            border: none;
            background-color: #FFFAFA;
            color: #D97904;
            padding-left: 5px;
            width: 15em;
            align-content: center;
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
                    <form method="POST" action="index.php">
                    <div class="form">
                        <p style="font-weight: lighter; font-size: 2em;" class="text-center">Obrigado por <br>
                           nos avaliar!
                        </p>
                    </div>
                        <br><br>
                        <center>
                        <button name="acao" id="acao" type="submit" value="salvar" class="save">Ok</button>
                        <br><br>
                        </center>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>