<?php

require_once("conecta_bd.php");

function checaUsuario($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from usuario
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaUsuarios() {
    $conexao = conecta_bd();
    $query = "select *
              from usuario";

    $resultado = mysqli_query($conexao, $query);
    $usuarios = array();
    while ($dados = mysqli_fetch_array($resultado)) {
        $usuarios[] = $dados;
    }

    return $usuarios;
}

function buscaUsuario($email) {
    $conexao = conecta_bd();
    $query = "select *
              from usuario
              where email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function cadastraUsuario($nome, $senha, $email, $perfil, $status, $data) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "insert into usuario (nome, senha, email, perfil, status, data)
              values ('$nome', '$senhaMd5', '$email', $perfil, $status, '$data')";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}

function alteraUsuario($cod, $nome, $email, $perfil, $status) {
    $conexao = conecta_bd();
    $query = "update usuario
              set nome='$nome', email='$email', perfil=$perfil, status=$status
              where cod=$cod";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}

function removeUsuario($id) {
    $conexao = conecta_bd();
    $query = "delete from usuario
              where cod=$id";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}

function buscaUsuarioPorId($id) {
    $conexao = conecta_bd();
    $query = "select *
              from usuario
              where id=$id";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function buscaUsuarioeditar($codigo) {
    $conexao = conecta_bd();
    $query = "select *
              from usuario
              where cod=$codigo";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function editarUsuario($codigo, $status, $data) {
    $conexao = conecta_bd();
    $query = "update usuario
              set status=$status, data='$data'
              where cod=$codigo";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}


function editarSenhaUsuario($codigo, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "update usuario
              set senha='$senhaMd5'
              where cod=$codigo";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}

function editarPerfilUsuario($codigo, $nome, $email, $data,  $status) {
    $conexao = conecta_bd();
    $query = "update usuario
              set nome='$nome', status=$status, email='$email', data='$data'
              where cod=$codigo";

    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}
?>

