<?php 
		require_once "conexmusi.php";
		if (isset($_POST['Salvar'])){
		$CodBanda = $_POST["codbanda"];
		$NomeMusica = $_POST["Nmusica"];
		$LetraMusica = $_POST["Lmusica"];
		$sql_cod = "INSERT INTO musicas (codmusica, codbanda, nomemusica, letraMusica) VALUES(null, '$CodBanda', '$NomeMusica', '$LetraMusica')";
			if($res=mysqli_query($con,$sql_cod)){
				$msg = "Arquivo enviado com sucesso!";
				header('Location: configuracoesmusicas.php');
			}
			else{
				$msg = "Falha ao enviar arquivo.";
			}
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
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
		height: 155px;
	}

	p.Ptopo{
		text-decoration: none; 
		color: #FF4500; 
		font-style: italic; 
		position: absolute; 
		left: 3%; 
		top: 2%; 
		font-size: 36px;
	}
	 body {
	    	margin:0px;
	     padding:0px;
	 		}

	 a.retorno{
		text-decoration: none; 
		color: #FF4500; 
		position: absolute;
		left: 80%; 
		top: 15%; 
		font-size: 20px;
		}

	label.lblmusica{
		position: absolute; 
		left: 70%; 
		top: 36%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}


	#txtletraM{
		position:absolute;
   		width: 20%;
   		top: 40%;
   		height: 300px; 
   		left: 70%;
   		margin-left: 10px;  
   		margin-right: 10px;  
	}  

	.tabela{
		position:absolute;
   		width: 30%;
   		top: 36%;
   		left: 31%;
   		margin-left: 10px;  
   		margin-right: 10px;  
	} 	

	label.lbNmusica{
		position: absolute; 
		left: 9%; 
		top: 36%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}

	input.txtNmusica{ 
			position: absolute; 
			left: 9%; 
			top: 44%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

	label.lbcodigo{
		position: absolute; 
		left: 9%; 
		top: 50%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	
	input.txtcodigo{ 
			width: 50px;
			position: absolute; 
			left: 14%; 
			top: 56%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

	label.lbsalvar{
			width: 175px; 
			position: absolute; 
			left: 9%; 
			top: 62%;
			margin-left: 10px;  
   			margin-right: 10px; 
		} 

		input.salvar{
			width: 175px; 
			position: absolute; 
			left: 9%; 
			top: 69%;
			margin-left: 10px;  
   			margin-right: 10px; 
			}


	</style>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="paginaconfiguracao2.php" class="retorno">Voltar para tela anterior</a>
	</div>
	<form method="POST" name="Salvar" action="configuracoesmusicas.php" enctype="multipart/form-data">
		<label class="lblmusica">Insira abaixo a letra da musica </label>
		<textarea id="txtletraM" name="Lmusica" required="" placeholder="Insira a letra da musica:"></textarea>
		<label class="lbNmusica">Escreva abaixo o nome da musica<br> que você deseja salvar: </label>
		<input class="txtNmusica" type="text" required="" name="Nmusica">
		<label class="lbcodigo">Escreva o codigo do cantor ou banda <br>do qual é a musica que você está<br> salvando: </label>
		<input class="txtcodigo" type="text" required="" name="codbanda">
		<label class="lbsalvar"> Para salvar a matéria tecle o botão abaixo : </label>
		<input type="submit" name="Salvar" class="salvar" value="Cadastrar" >
	</form>	
	<table border="1" class="tabela">
		<tr>
			<td >Codigo da música </td>
			<td>Nome da música</td>
		</tr>
		<?php
			require_once "conexmusi.php";
			$consulta = "SELECT idbanda, nomebanda FROM bandas";
			$consultando = mysqli_query($con, $consulta);
			while($dado = mysqli_fetch_array($consultando)) {   ?>
			<tr>
				<td width="200px"><?php echo $dado["idbanda"];?> </td>
				<td width="450px"><?php echo $dado["nomebanda"];?> </td>
			</tr>
		<?php } ?>
	</table>
	
</body>
</html>