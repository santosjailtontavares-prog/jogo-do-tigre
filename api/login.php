<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "blaze");

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($email && $senha) {
    $result = $conn->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Retorna os dados do usuário para o site usar
        echo json_encode([
            "status" => "success", 
            "id" => $user['id'], 
            "nome" => $user['nome'],
            "saldo" => $user['saldo']
        ]);
    } else {
        echo json_encode(["status" => "error", "msg" => "Email ou senha incorretos"]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "Preencha os dados"]);
}
?>