<?php
require_once('../bd/conn.php');

$id = filter_input(INPUT_GET,'id');

if($id){
    $sql = $pdo->prepare('DELETE FROM task WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql ->execute();
    header('Location: ../to_do_list.php');
    exit;
} 
else {
    header('Location: ../to_do_list.php');
    exit;
}
?>