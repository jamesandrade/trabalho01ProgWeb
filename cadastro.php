

<html>
<!-- TRABALHO FEITO POR JAMESON FELIPE DE ANDRADE -->

<head>
<meta charset="UTF-8"/>
<title>Super Mario 2019</title>
<link rel="stylesheet" href="style.css"/>

</head>
<body>
<input type="checkbox" id="bt_menu">
<label for="bt_menu">&#9776;</label> <!-- adiciona o simbolo com três risquinhos -->
<nav class="menu">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="cadastro.php">Cadastrar</a></li>
		<li><a href="estatisticas.php">Estatísticas</a></li>
	</ul>
</nav>



<div class="conteudo">
<div class="login">
<form action="cadastro.php" method="post">
<p>Nome:    <input type="name" name="name" ></p>
<p>Idade:    <input type="number" name="idade" ></p>
<p>Email:    <input type="email" name="email" ></p>
<p>Senha: <input type="password" name="pass"></p>
<button type="submit" name="submit">Cadastrar</button>
</form>
</div>	
</div>

</body>
</html>
<?php

if(isset($_POST['submit'])){
	
	$conn = new PDO("mysql:dbname=db_site;host=localhost","root","");

	$email = $_POST['email'];
	$senha = $_POST['pass'];
	$nome = $_POST['name'];
	$idade = (int) $_POST['idade'];
	if($idade >= 130 ||  $idade < 4){
		echo  "<script>alert('Idade invalida!');</script>";
		return;
	}else{
	$stmt = $conn->prepare("SELECT * FROM tb_usuarios WHERE email = :EMAIL");
	$stmt->bindParam(":EMAIL",$email);
	$stmt->execute();
	$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
	if($results !=null){
		echo  "<script>alert('Esse E-mail já está Cadastrado!');</script>";
		return;
	}else{

	$stmt = $conn->prepare("INSERT into tb_usuarios (nome, idade, email, pass) VALUES (:NOME, :IDADE, :EMAIL, :SENHA);");

		$stmt->bindParam(":NOME",$nome);
 		$stmt->bindParam(":IDADE",$idade);
		$stmt->bindParam(":EMAIL",$email);
		$stmt->bindParam(":SENHA",$senha);
		$stmt->execute();
		echo  "<script>alert('Cadastrado Com Sucesso! Link Para Download do Jogo Enviado em seu E-mail');</script>";
	}
}
}

?>