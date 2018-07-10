
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
			left: 48%; 
			top: 31%;
			height: 37%;
			width: 24%;
			margin-left: 10px;  
   			margin-right: 10px;  
		}  

		
		p.Pbiografia {  
			position:absolute;
   			top: 24%;
   			left: 48%;  
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

		p.lbagenda {  
			position:absolute;
   			top: 73%;
   			left: 48%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
		} 


		p.SiteB {  
			position:absolute;
   			top: 73%;
   			left: 13%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
		}

		p.RedeB {  
			position:absolute;
   			top: 82%;
   			left: 13%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
		}  

		p.ContadoB {  
			position:absolute;
   			top: 90%;
   			left: 13%;  
   			margin-left: 10px;  
   			margin-right: 10px; 
		} 

		input.txtnomebanda {  
			position:absolute;
   			top: 35%;
   			left: 12%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
		} 

		#conteutomusica {  
			position:absolute;
   			top: 45%;
   			left: 79%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
		}

		#Tsecundario {  
			position:absolute;
   			width: 24%;
   			top: 81%;
   			height: 14%; 
   			left: 48%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
		} 

		label.lbagenda {  
			position:absolute;
   			top: 73%;
   			left: 62%;
   			margin-left: 10px;  
   			margin-right: 10px;  
		} 

		label.lbcontato{ 
			position: absolute; 
			left: 12%;  
			top: 54%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

			
		#imagem{
			position: absolute; 
			left: 14%; 
			top: 31%;
			border-color:#000000; 
			border-style: solid;  
			border-width: 1px; 
			height: 37%;
			width: 24%;
		} 

		.op{
		position:absolute;
		left:75%;
		top:31%;
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

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="paginaconfiguracao2.php" class="retorno">Voltar tela anterior</a>
	</div>
	<p class="lbagenda">Abaixo é a agenda da banda: </p>
	<p class="Pbiografia">Biografia da banda ou cantor(a): </p>
	<?php
		require_once "conexmusi.php";

		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$sql="SELECT * FROM bandas WHERE idbanda='$id'";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<div id='imagem'>";
				echo "<img src='cantores/" .$row['fotobanda']."' width='100%' height='100%'>";
				echo "</div>";
				echo "<textarea cols=60 rows=29 id='Tprincipal'>". $row["biografiabanda"]."</textarea>";
				echo "<textarea cols=60 rows=10 id='Tsecundario'>". $row["agendabanda"]."</textarea>";
				echo "<p class='NomeS'>Nome da banda ou do cantor(a): ". $row["nomebanda"]."</p>";
				echo "<p class='SiteB'>Site da banda ou do cantor(a):<br> ". $row["sitebanda"]."</p>";
				echo "<p class='RedeB'>Rede social da banda ou do cantor(a):<br> ". $row["redesocialbanda"]."</p>";
				echo "<p class='ContadoB'>Telefone de contado da banda ou do cantor(a): ". $row["telefonebanda"]."</p>";
			}
		}
		else
		{
			echo "Erro!";
		}
	?> 
	<table border="1" class="op">
		<tr>
			<td width="280px">Musicas da banda </td>
		</tr>
		<?php
		if(isset($_GET['id']))
		{
			require_once "conexmusi.php";
			$id = $_GET['id'];
			$query = "SELECT codmusica, codbanda, nomemusica FROM musicas WHERE codbanda = $id";
			$consultando = mysqli_query($con, $query);
			while($dado = mysqli_fetch_array($consultando)) { 
				$idmusica = $dado['codmusica'];
				$codbanda = $dado['codbanda'];
				$name = $dado['nomemusica'];
			  ?>
			<tr>
				<td width="280px"><?php echo "<a href='letrasmusicas.php?id=$id>$name</a><br/>";?></td>
			</tr>
		<?php } 
	}?>
</table>


</body>
</html>