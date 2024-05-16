<?php
require_once('../bd/conn.php');

$description = filter_input(INPUT_POST,'description');
if ($description){ 
    $sql = $pdo->prepare("INSERT INTO task (description) VALUES (:description)");
    $sql->bindValue(':description', $description);
    $sql->execute();

    header('Location: ../to_do_list.php');
    exit;
} else {
    header('Location: ../to_do_list.php');
    exit;
}
?>