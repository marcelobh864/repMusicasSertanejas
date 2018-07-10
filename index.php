
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style>
	body{
  		background: url(img/fundo7.jpg);
  		background-position: center center;
  		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;
  		margin:0px;
	    padding:0px;
       /* height: auto;
        width: 100%;
        background-size:100%;
        background-repeat: no-repeat; 
        Esse codigo que está comentado era para deixar a imagem responsiva só que teu certo nãom */
		}

		#topo{
		width: 100%;
		height: 110px;
	}
	p.Ptopo{
		text-decoration: none; 
		color: #000; 
		font-style: italic; 
		position: absolute; 
		font-weight: bold;
		left: 3%; 
		top: -1%; 
		font-size: 30px;
	}

	a.retorno{
		text-decoration: none; 
		color: #000; 
		font-weight: bold;
		position: absolute;
		left: 80%; 
		top: 8%; 
		font-size: 19px; 
			
		}

	a.retorno2{
		text-decoration: none; 
		color: #000; 
		font-weight: bold;
		position: absolute;
		left: 64%; 
		top: 8%; 
		font-size: 19px; 
			
		}

	.op{
		position:absolute;
		left:35%;
		top:25%;
		}

	table tr td { /* Toda a tabela com fundo creme */
	background: #ffc;
	overflow: hidden;
 	border-collapse: collapse;
 	text-align: center;
	} 
	.config{
		color: #ffffff;
		position:absolute;
		text-decoration:none;
		left:50%;
		top:95%;
		}
		
	</style>
	
	<title></title>
</head>
<body>
	
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJOS</p>
		<a href="curtidas.php" class="retorno2">Bandas mais curtidas</a>
		<a href="paginaconfiguracao2.php" class="retorno">Pagina Configurações</a>
	</div>
	
 	<table border="1" class="op">
		<tr>
			<td width="450px">Nome da Banda </td>
		</tr>
		<?php
			require_once "conexmusi.php";
			session_start();
			$query = "SELECT idbanda, nomebanda FROM bandas order by nomebanda";
			$consultando = mysqli_query($con, $query);
			while($dado = mysqli_fetch_array($consultando)) { 
				$id = $dado['idbanda'];
				$name = $dado['nomebanda'];
				
			  ?>
			<tr>
				<td width="450px"><?php echo "<a href='paginabandas.php?id=$id'>$name</a><br/>";?></td>
			</tr>
		<?php } ?>
</table>

</body>
</html>