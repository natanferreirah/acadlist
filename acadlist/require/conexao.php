
<?php 
    try {
    $conexao = new PDO("mysql:host=localhost;dbname=acadlist","root","",
        [
        PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>  PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $error) {
        echo "Erro no banco de dados" . $error->getMessage();
    }
?>