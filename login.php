<?php
                            
    include_once('conexao.php'); 
    session_start();
    $email = 'admcipa@paranoa.com.br';
    $senha = '12345678';

    if(isset($_POST['e-mail'])  && isset($_POST['senha']) ){  
        if(($_POST['e-mail']) === $email && ($_POST['senha']) === $senha){
            header("Location: eleicao.php");
            exit();
        }elseif(($_POST['e-mail']) != $email){
            echo "você errou o email ";
        }elseif(($_POST['senha']) != $senha){
            echo "você errou a senha ";
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

    <body>
        <div class=" col-sm-12 col-md-12 col-lg-12 d-flex flex-row vw_DataWake">
            <div class="d-flex col-sm-6 col-md-6 col-lg-6 ">
                <div class="col-sm-9 color_DataWake1 overflow-hidden d-flex justify-content-center align-items-center">
                    <img src="img/logos.png" alt="" class="col-sm-12 ">
                </div>
                <img src="img/login.svg" alt="">    
            </div>
            <div class="d-flex flex-column col-sm-6 justify-content-center align-items-center ">
                <div class="background_DataWake d-flex flex-column justify-content-center align-items-center ">
                    <div class="circulo d-flex justify-content-center align-items-center ">
                        <img src="img/P_logo.svg" alt="">
                    </div>
                    <form action="" method="POST" class="d-flex flex-column form-input">
                        <input type="email" name="e-mail" id="" placeholder="Seu Email:" class="shadow">
                        <input type="password" name="senha" id="" placeholder="Sua Senha:" class="shadow">
                        <a href="#">Esqueceu a senha? </a>
                        <button type="submit" class="shadow login-button">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<style>
        .color_DataWake1 {
            background: linear-gradient(60deg, rgba(3,94,131,1) 0%, rgba(72,199,244,1) 60%);
        }
        .form-input input {
            border-radius: .8rem;
            border: none;
            margin-top: 3vh;
            padding:3%;
            background-color: #dadadaa4;
            width: 25vw;
        }
        .login-button {
            color: #ffff;
            font-weight: 600;
            text-transform: uppercase;
            border-radius: 2rem;
            border: none;
            margin-top: 6vh;
            padding:3%;
            transition: ease-in-out .8s;
            background-image: linear-gradient(90deg, rgba(3,94,131,1) 0%, rgba(72,199,244,1) 100%);
        }
        .login-button:hover{
            background-image: linear-gradient(90deg,  rgba(72,199,244,1) 60%, rgba(3,94,131,1) 100%);
        }
        .form-input a{
            width: 10vw;
            margin-top: 2vh;
            text-decoration: none ;
        }
        .background_DataWake{
            background: linear-gradient(332deg, #ffffff00 0%, #b9b9b928 80%);
            border-radius: 5%;
            backdrop-filter: blur(0.6em);
            width: 30vw;
            height: 60vh;
        }
        .circulo img{
            padding: 0;
            margin: 0;
            width: 80%;
        }
        .circulo{
            background-color: red;
            border-radius: 20em;
        }
</style>