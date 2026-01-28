<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Conexão padrão KSWEB
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "blaze"; // Verifique se o banco se chama blaze mesmo

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "msg" => "Falha na conexao"]);
    exit;
}

$id = $_REQUEST['id'] ?? null;
$valor_saldo = $_REQUEST['saldo'] ?? null;

if ($id && $valor_saldo !== null) {
    // Atualizado com os nomes que você informou: usuarios e saldo
    $sql = "UPDATE usuarios SET saldo = '$valor_saldo' WHERE id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "msg" => "Saldo atualizado!"]);
    } else {
        echo json_encode(["status" => "error", "msg" => "Erro no banco: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "Dados nao recebidos"]);
}

$conn->close();
?>