<?php
require 'config.php';
$lista=[];
$sql=$pdo->query("SELECT * FROM estoque");
$lista=$sql->fetchAll(pdo::FETCH_ASSOC);
?>
<a href="adicionar.php">Adicionar Produto</a>
<table border="2" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>DESCRIÇÃO</th>
        <th>REFERÊNCIA</th>
        <th>QUANTIDADE</th>
        <th>VENDIDOS</th>
    </tr>
    <?php foreach($lista as $estoque): ?>
        <tr>
            <td><?=$estoque['id'];?></td>
            <td><?=$estoque['nome'];?></td>
            <td><?=$estoque['descricao'];?></td>
            <td><?=$estoque['referencia'];?></td>
            <td><input type="number" name="quanti" value="<?=$estoque['quantidade'];?>"onclick="location.href=('quantidade.php')"/></td>
            <td><?=$estoque['vendidos'];?></td>
        </tr>
        <?php endforeach; ?>
</table>