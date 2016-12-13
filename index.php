<?php include("DbConnection.php"); ?>
<?php 

	$dbConnection = new DbConnection([
		'server' => 'localhost',
		'user' => 'root',
		'password' => '',
		'database' => 'reunion']);
	$usuarios = $dbConnection->query("SELECT * FROM users");

?>

<!DOCTYPE html>
<html>
<head>
	<title>reuniON</title>
	<link rel="icon" type="image/png" href="assets/img/logo.png" />
</head>
<body>

	<h1>Usuários:</h1>

	<?php foreach($usuarios as $usuario): ?>

		<ul>
			ID: <?= $usuario->id; ?>
			<li>Nome: <?= $usuario->nome; ?></li>
			<li>E-mail: <?= $usuario->email; ?></li>
		</ul>

	<?php endforeach ?>

</body>
</html>