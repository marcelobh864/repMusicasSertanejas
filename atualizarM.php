<?php
	session_start();
	require_once "conexmusi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
	body{
  		background-color: #FFFAF0; 
        background-position: center center;
  		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;
		}

	#topo{background-color: #000000; 
		width: 100%;
		height: 110px;
	}
	p.Ptopo{
		text-decoration: none; 
		color: #FF4500; 
		font-style: italic; 
		position: absolute; 
		left: 3%; 
		top: 1%; 
		font-size: 31px;
	}

	a.retorno{
		text-decoration: none; 
		color: #FF4500; 
		position: absolute;
		left: 80%; 
		top: 12%; 
		font-size: 18px; 
			
		}

		#Tprincipal {  
			position: absolute; 
			left: 68%; 
			top: 31%;
			height: 37%;
			width: 24%;
			margin-left: 10px;  
   			margin-right: 10px;  
		}  

		
		p.Pbiografia {  
			position:absolute;
   			top: 24%;
   			left: 68%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
		} 
	
		p.NomeS {  
			position:absolute;
   			top: 17%;
   			left: 32%;  
   			margin-left: 10px;  
   			margin-right: 10px;  
   			font-weight: bold;
   			font-size: 26px;
		} 

		p.codMus {  
			position:absolute;
   			top: 84%;
   			left: 14%;  
   			margin-left: 10px;  
		} 

		input.txtcodigoM{ 
			width: 80px;
			position: absolute; 
			left: 22%; 
			top: 90%;
			
		}
			
		#imagem{
			position: absolute; 
			left: 14%; 
			top: 31%;
			border-color:#000000; 
			border-style: solid;  
			border-width: 1px; 
			height: 52%;
			width: 23%;
			margin-left: 10px;  
   			margin-right: 10px;  
		} 

		.op{
		position:absolute;
		left:52%;
		top:31%;
		margin-left: 10px;  
   		margin-right: 10px;  
		}

	input.salvarM{
			width: 310px; 
			position: absolute; 
			left: 15%; 
			top: 94%; 
			}

	table tr td { /* Toda a tabela com fundo creme */
	background: #fff;
	overflow: hidden;
 	border-collapse: collapse;
 	text-align: center;
	} 
		
	    body {
	    	margin:0px;
	     padding:0px;
	 		}
		
	</style>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="atualizainicial.php" class="retorno">Voltar tela anterior</a>
	</div>
	<form method="POST" name="Salvar" action="AtualizarMusica.php">
		<p class="codMus"> Digite o codigo da musica que você deseja alterar</p>
		<input class="txtcodigoM" type="text" required="" name="codigo">
		<input type="submit" name="salvar1" class="salvarM" value="Alterar Musica" >
	</form>
	<table border="1" class="op">
		<tr>
			<td width="150px">Codigo da Musicas </td>
			<td width="280px">Musicas da banda </td>
		</tr>
		<?php
		
		$id = $_POST['codigo'];
		$id2= $_POST['codigo'];

		$_SESSION['banda']=$id;

		if(isset($_POST['Salvar']))
		{
			$query = "SELECT codmusica, nomemusica FROM musicas WHERE codbanda = $id2";
			$consultando = mysqli_query($con, $query);
			while($dado = mysqli_fetch_array($consultando)) { 
				$idmusica = $dado['codmusica'];
				$name = $dado['nomemusica'];
			  ?>
			<tr>
				<td width="150px"><?php echo "$idmusica";?></td>
				<td width="280px"><?php echo "$name";?></td>
			</tr>
		<?php } 
		}?>
</table>

<?php
		require_once "conexmusi.php";
		$id = $_POST['codigo'];
		$_SESSION['GlobalBanda']=$id;
		$id2=$_SESSION["GlobalBanda"];
		if(isset($_POST['Salvar']))
		{
			$sql="SELECT musicas.nomemusica,
					 	musicas.letraMusica, 	
					 	bandas.nomebanda, 	
					 	bandas.fotobanda  
				FROM musicas 
				JOIN bandas ON bandas.idbanda = musicas.codbanda 
				WHERE bandas.idbanda='$id2'";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<div id='imagem'>";
				echo "<img src='cantores/" .$row['fotobanda']."' width='100%' height='100%'>";
				echo "</div>";
				echo "<p class='NomeS'>Nome da banda ou do cantor(a): ". $row["nomebanda"]."</p>";
			}
		}

		else
		{

			echo "Erro!";
		}
	?>


</body>
</html>
