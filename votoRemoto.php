<?php
include_once('conexao.php'); 
session_start(); 

$matricula = $_SESSION['matricula'];
$nome = $_SESSION['nome'];

echo "Sua Matricula: " . $matricula . "<br>";
echo "Nome: " . $nome . "<br>";
?>
<?php    
        $buscar = $dbDB2->prepare("SELECT * FROM candidato_cipa");
        $buscar->execute();
        $resultados = $buscar->fetchAll(PDO::FETCH_ASSOC);

        
        if (isset($_POST['id_votado'])) {
            $id_votado = $_POST['id_votado'];
            
            $buscar = $dbDB->prepare("SELECT ZRA_MAT, ZRA_NOME FROM PROTHEUS_PRD.dbo.ZRA010 WHERE ZRA_MAT = :matricula");
            $buscar->bindParam(':matricula', $matricula);
            $buscar->execute();
            $dados_resultado = $buscar->fetch(PDO::FETCH_ASSOC);

            if ($dados_resultado) {
                $re = $dados_resultado['ZRA_MAT'];

                $inserir = $dbDB2->prepare("INSERT INTO eleitor_cipa (nome, data_votação, id_votado, re) VALUES (:nome, CURRENT_TIMESTAMP, :id_votado, :re)");
                $inserir->bindParam(':nome', $nome);
                $inserir->bindParam(':id_votado', $id_votado);
                $inserir->bindParam(':re', $re);
                $inserir->execute(); 
            }
            if($dados_resultado){
                header("Location: agradecimento.php");
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


<body class="background ">

    <header class="card-body d-flex justify-content-center shadow bg-light mb-5 p-0">
            <img src="img/logos.png" alt="" class="col-3  ">
    </header>
    <main>
        <div class="card card-body m-5 pt-5 ">

            <div class="lista-DataWake ms-5">
                <h5 class="drop "> <img class="imp" src="img/imp_verde.png" alt=""> VOTAÇÃO REMOTA</h5>

                    <ul>
                        <li>Permitido votar apenas <strong>uma vez</strong></li>
                        <li class="mt-2">Votação interna!</li>
                    </ul>
            </div>
            <!------------------------------------------RE------------------------------------------------>
            <div class="card-body border-0 card row d-flex flex-wrap justify-content-around">

                <form class="p-0 border-0 d-flex flex-row justify-content-around flex-wrap card-body col-sm-12 " action="votoRemoto.php" method="POST">
                    <?php           
                        foreach ($resultados as $row) {

                            echo ' <div class="btn container-flex-DataWake p-4 d-flex flex-row justify-content-around border lista-DataWake">
                                        <img class="image me-3" src="img/fotos/amanda.png" title="" alt="" />
                
                                        <div class="text-start ps-3">
                                            <div class="d-flex input-check mt-3 mb-3">
                                                <input type="checkbox" class="list-style-datawake me-4" name="id_votado" value="'.$row['id'].'">
                                                 <p class="text-uppercase fw-bolder fst-italic fs-5 m-0 ">'.$row['nome'].'<br></p> 
                                            </div>

                                            <ul class="p-0 fs-6 text-secondary">
                                                <li> Inteligência Corporativa</li>
                                                <li>Estagiária</li>
                                            </ul>
                                        </div>
                                        
                                    </div>';
                        }

                    ?>
                    <input  type="submit" value="enviar"> 
                </form>
                
            </div>
        
        </div>
    </main>

    
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