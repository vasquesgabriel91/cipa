<?php
                            
    include_once('conexao.php'); 
    session_start();

    if(isset($_POST['mat'])){ 

        $matricula = $_POST['mat']  ;

        $consulta = $dbDB->prepare("SELECT ZRA_MAT, ZRA_NOME FROM PROTHEUS_PRD.dbo.ZRA010 WHERE ZRA_MAT = :matricula");
        $consulta->bindParam(':matricula', $matricula);
        $consulta->execute();
        $result = $consulta->fetch(PDO::FETCH_ASSOC);
                                
        if ($result) {

            $_SESSION['matricula'] = $result['ZRA_MAT'];
            $_SESSION['nome'] = $result['ZRA_NOME'];
                    
        } else {
            echo "Nenhum registro encontrado.";
        }
    }             
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>VOTAÇÃO REMOTA - CIPA</title>
</head>

<body class="background">

    <header class="card-body d-flex justify-content-center shadow bg-light mb-5 p-0">
            <img src="img/logos.png" alt="" class="col-3  ">
    </header>

        <div class=" card-body col-sm-12 d-flex justify-content-center">
            <div class="card col-sm-11 p-3 border-0 container-DataWake lista-DataWake">
                <h5 class="drop "> <img class="imp" src="img/imp_verde.png" alt=""> VOTAÇÃO REMOTA</h5>
                <ul>
                    <li>Permitido votar apenas <strong>uma vez</strong></li>
                    <li class="mt-2">Votação interna!</li>
                </ul>
            </div>
        </div>
        <!------------------------------------------RE------------------------------------------------>
        <div class="card-body col-sm-12 d-flex justify-content-center mt-5 mb-5 ">
            <div class="card col-sm-11 p-4 border-0 container-DataWake">
                <form action="" method="POST" class="row g-3">
                    <div class="col-md-3">
                        <label for="re" class="form-label">RE:</label>
                        <input type="number" class="form-control" name="mat" > 
                    </div>
                    <div class="col-md-6">

                        <label for="nome" class="form-label">NOME:</label>
                            <?php 
                                echo '<input type="text" class="form-control" disabled value="'.$_SESSION['nome'].'">';
                            ?>

                    </div>
                    <div class="col-md-3">
                        <label for="nome" class="form-label">Seu RE:</label>
                        <?php
                            echo '<input type="text" class="form-control" disabled value="' .  $_SESSION['matricula'] . '">';
                        ?>
                    </div>
                    <div class="col-sm-3 d-flex mt-4">
                        <button class=" btn btn-outline-success me-5" type="submit">Consultar</button>
                        <a href="votoRemoto.php" class="btn btn-success">Acessar</a>
                    </div>
                    
                </form>
            </div>
        </div>

     
    <!---------------------FOOTER---------------------->
    <div class="card-body d-flex justify-content-center bg-light p-0">
        <div class="card-header border-0 d-flex bg-transparent lista-DataWake">
            <ul class="d-flex ">
                <li>
                    ©2022 Copyright:
                </li>
                <li>
                    <a class="direitos-black ms-3" href="https://datawake.com.br" target="_blank"> datawake.com.br</a>
                </li>
            </ul>
        </div>
    </div>

</body>

</html>