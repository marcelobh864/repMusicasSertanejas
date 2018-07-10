<?php 
	session_start();
	require_once "conexmusi.php";

	// chamando a primeira vez - carregando tela
	if(isset($_POST['codigo']))
	{
		$id = $_POST['codigo'];
		$_SESSION['codigo'] = $_POST['codigo'];
	}

  // chamando 2 vez - salvando tela
	if (isset($_POST['salvar2']))
	{
		$nome_musica 	= $_POST["exe1"];
		$texto 			= $_POST["texto"];
		
		$sql_cod = 'UPDATE musicas SET nomemusica = "'.$nome_musica.'", letraMusica = "'.$texto.'" WHERE codmusica = '.$_SESSION['codigo'];

		//var_dump($sql_cod); die;

		if(!$res=mysqli_query($con,$sql_cod)){
			$msg = "Falha ao alterar.";
		}
	}

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

		#Lmusica {  
			position: absolute; 
			left: 39%; 
			top: 31%;
			height: 47%;
			width: 25%;
			margin-left: 10px;  
   			margin-right: 10px;  
		} 

		#Lmusica2 {  
			position: absolute; 
			left: 69%; 
			top: 31%;
			height: 47%;
			width: 25%;
			margin-left: 10px;  
   			margin-right: 10px;  
		} 


		p.SiteB {  
			position:absolute;
   			top: 22%;
   			left: 39%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
   			font-weight: bold;
		} 

		p.Nletra {  
			position:absolute;
   			top: 22%;
   			left: 69%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
   			font-weight: bold;
		} 

		p.NomeS {  
			position:absolute;
   			top: 22%;
   			left: 6%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
   			font-weight: bold;
		} 

		p.Nnome {  
			position:absolute;
   			top: 78%;
   			left: 6%;;  
   			margin-left: 10px;  
   			margin-right: 10px; 
   			font-weight: bold;
		} 

		input.NomeNovo {  
			position:absolute;
   			top: 88%;
   			width: 374px;
   			left: 6%;  
   			margin-left: 10px;  
   			margin-right: 10px;
		} 

		input.Atualizar {  
			position:absolute;
   			top: 88%;
   			width: 342px;
   			left: 39%;  
   			margin-left: 10px;  
   			margin-right: 10px;
		} 


			
		#imagem{
			position: absolute; 
			left: 7%; 
			top: 31%;
			border-color:#000000; 
			border-style: solid;  
			border-width: 1px; 
			height: 47%;
			width: 27%;
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
		<?php $id = $_GET['id']; echo "<a href='atualizainicial.php?id=$id' class='retorno'>Voltar tela de anterior</a>";?>
	</div>
	<p class="Nnome">Se quiser mudar o nome da musica escreva o novo <br>nome abaixo</p>
	<p class="Nletra">Se quiser mudar a letra da musica escreva a nova <br>letra abaixo</p>
	<form method="POST" name="Salvar2" action="AtualizarMusica.php">
		<input type="text" class="NomeNovo" name="exe1">
		<textarea cols="40" rows="54" id="Lmusica2" name="texto"></textarea>
		<input type="submit" class="Atualizar" name="salvar2" value="Atualizar">
	</form>
	<?php
		
		$id=$_SESSION["GlobalBanda"];
			$sql="SELECT musicas.nomemusica,
			 			musicas.letraMusica, 	
			 			bandas.nomebanda, 	
			 			bandas.fotobanda  
			 	FROM musicas 
			 	join bandas on bandas.idbanda = musicas.codbanda 
			 	WHERE bandas.idbanda='$id'";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<div id='imagem'>";
				echo "<img src='cantores/" .$row['fotobanda']."' width='100%' height='100%'>";
				echo "</div>";
				echo "<textarea cols=60 rows=29 id='Lmusica'>". $row["letraMusica"]."</textarea>";
				echo "<p class='NomeS'>Nome da banda ou do cantor(a): ". $row["nomebanda"]."</p>";
				echo "<p class='SiteB'>Nome atual da música: ". $row["nomemusica"]."</p>";
			}
	?>

</body>
</html>