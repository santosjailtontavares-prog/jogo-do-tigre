<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "blaze");

$nome = $_POST['nome'] ?? null;
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

if ($nome && $email && $senha) {
    // Insere o novo usuário. O saldo começa em 0.
    $sql = "INSERT INTO usuarios (nome, email, senha, saldo) VALUES ('$nome', '$email', '$senha', 0)";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "msg" => "Cadastro realizado!"]);
    } else {
        echo json_encode(["status" => "error", "msg" => "Erro ao cadastrar: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "msg" => "Preencha todos os campos"]);
}
?>