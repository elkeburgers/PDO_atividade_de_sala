<?php

$host = 'mysql:host=localhost;dbname=escola;port=3306';
// a linha acima eh chamada de linha/string de conexao
$user = 'root';
// sempre colocar root em user
$password = '';
// em windows deixar sempre a password vazia

$db = new PDO($host, $user, $password);

$query = $db->query('SELECT * from alunos where id='.$_GET['id']);
// tornando a query dinamica para receber a condicao (where) da url (get)
// do  jeito que esta pode gerar um problema serio de seguranca, porque o usuario consegue entender como fazer uma consulta no banco de dados, alterar ou ata dropar o banco de dados
// por isso, usa so o select e from, consulta fixa, para nao ter problemas

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lista de Alunos</h1>
    <ul>
        <?php foreach($resultado as $aluno){?>
        <li><?php echo $aluno['nome']; ?></li>
        <?php } ?>
    </ul>

</body>
</html>