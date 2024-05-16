<?php
require_once('../bd/conn.php');

$id = filter_input(INPUT_POST, 'id');
$completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_BOOLEAN); // Converta para um valor booleano

if ($id !== null && $completed !== null) { // Verifique se os valores não são nulos
    $sql = $pdo->prepare("UPDATE task SET completed = :completed WHERE id = :id");
    $sql->bindValue(':completed', $completed, PDO::PARAM_BOOL); // Associe o valor como um booleano
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo json_encode(['success' => true]);
    exit;
} else {
    echo json_encode(['success' => false]);
    exit;
}
?>