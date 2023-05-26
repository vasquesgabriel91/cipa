<?php
$hostname='192.168.0.30';
$dbname='PROTHEUS_PRD';
$dbname2 = 'ELIPSE_E3';
$username='elipse';
$password='E#lipse#365#ic';

try {
    $dbDB  = new  PDO ("sqlsrv:Server=$hostname;Database=$dbname", $username, $password);
        echo "Conexão com banco de dados realizada com sucesso.";
}catch (PDOException $e) {
        echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();      
}
try {
        $dbDB2 = new  PDO ("sqlsrv:Server=$hostname;Database=$dbname2", $username, $password);
            echo "Conexão com banco de dados2 realizada com sucesso.";
    }catch (PDOException $e) {
            echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
            
}
?>
