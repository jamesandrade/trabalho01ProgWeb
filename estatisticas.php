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
<div class="estatistics">
	<p>Quantidade de Testadores Beta do Jogo: <?php
		$conn = new PDO("mysql:dbname=db_site;host=localhost","root","");
		
		$stmt = $conn->prepare("SELECT * FROM tb_usuarios;");
		$stmt->execute();
		$results = (string) count($stmt->fetchALL(PDO::FETCH_ASSOC));
		
			echo ($results);
	
    ?>
	</p>
</div>
<div class="estatistics">
	<p>Idade do Jogador mais Velho: <?php
		$conn = new mysqli("localhost", "root", "", "db_site");
		
		$sql ="SELECT MAX(idade) FROM tb_usuarios;";
		$result = $conn->query($sql);
			$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
		
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo  $row["MAX(idade)"];
			}}else {
						echo "0 results";
			}
			
$conn->close();
    ?>
	</p>
</div>
<div class="estatistics">
	<p>Idade do Jogador mais Novo: <?php
		$conn = new mysqli("localhost", "root", "", "db_site");
		
		$sql ="SELECT MIN(idade) FROM tb_usuarios;";
		$result = $conn->query($sql);
			$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
		
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo  $row["MIN(idade)"];
			}}else {
						echo "0 results";
			}
			
$conn->close();
    ?>
	</p>
</div>
<div class="estatistics">
	<p>Média da Idade dos Jogadores: <?php
		$conn = new mysqli("localhost", "root", "", "db_site");
		
		$sql ="SELECT AVG(idade) FROM tb_usuarios;";
		$result = $conn->query($sql);
			$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
		
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo  $row["AVG(idade)"];
			}}else {
						echo "0 results";
			}
			
$conn->close();
    ?>
	</p>
	</div>
</body>
</html>