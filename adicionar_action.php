<?php
require 'config.php';

$nome= filter_input(INPUT_POST, 'nome');
$descricao= filter_input(INPUT_POST, 'descricao');
$referencia= filter_input(INPUT_POST,'referencia');
$quantidade= filter_input(INPUT_POST,'quantidade');

if($nome && $descricao && $referencia && $quantidade){
    $sql= $pdo->prepare("SELECT * FROM estoque WHERE referencia= :referencia");
    $sql->bindValue(':referencia', $referencia);
    $sql->execute();

    if($sql->rowCount()===0) {
       $sql=$pdo->prepare("INSERT INTO estoque (nome,descricao,referencia,quantidade) VALUES (:nome, :descricao, :referencia, :quantidade)" );
       $sql->bindValue(':nome',$nome);
       $sql->bindValue(':descricao', $descricao);
       $sql->bindValue(':referencia', $referencia);
       $sql->bindValue(':quantidade', $quantidade);
       $sql->execute();
        header("location:index.php");
        exit;    
    }else{
    header("location: adicionar.php");
    exit;
    }
}else{
    header("location:adicionar.php");
    exit;
}