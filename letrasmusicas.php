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

		#Lmusica {  
			position: absolute; 
			left: 55%; 
			top: 38%;
			height: 54%;
			width: 30%;
			margin-left: 10px;  
   			margin-right: 10px;  
		}  

		p.SiteB {  
			position:absolute;
   			top: 28%;
   			left: 62%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
   			font-weight: bold;
		} 

		p.NomeS {  
			position:absolute;
   			top: 28%;
   			left: 17%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
   			font-weight: bold;
		} 

			
		#imagem{
			position: absolute; 
			left: 16%; 
			top: 38%;
			border-color:#000000; 
			border-style: solid;  
			border-width: 1px; 
			height: 54%;
			width: 30%;
		}

	    body {
	    	margin:0px;
	     padding:0px;
	 		}
		
	</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="paginabandas.php" class='retorno'>Voltar tela de anterior</a>
	</div>
	<?php
		require_once "conexmusi.php";

		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql="SELECT musicas.nomemusica,
			 	musicas.letraMusica, 	
			 	bandas.nomebanda, 	
			 	bandas.fotobanda  FROM musicas inner join bandas on bandas.idbanda = musicas.codbanda WHERE codmusica='$id'";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<div id='imagem'>";
				echo "<img src='cantores/" .$row['fotobanda']."' width='100%' height='100%'>";
				echo "</div>";
				echo "<textarea cols=60 rows=29 id='Lmusica'>". $row["letraMusica"]."</textarea>";
				echo "<p class='NomeS'>Nome da banda ou do cantor(a): ". $row["nomebanda"]."</p>";
				echo "<p class='SiteB'>Nome da música: ". $row["nomemusica"]."</p>";
				
				
			}
		}

		else
		{

			echo "Erro!";
		}
	?>

</body>
</html>