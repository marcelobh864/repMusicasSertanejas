<?php
	require_once "conexmusi.php";
	if (isset($_POST['Salvar'])){
		$id = ($_POST['codigo']);
		$sql = "DELETE FROM bandas WHERE idbanda = '$id'";
 		if($res=mysqli_query($con,$sql)){
			$msg = "Arquivo enviado com sucesso!";
			header('Location: excluir.php');
		}
		else{
			$msg = "Falha ao enviar arquivo.";
			echo "$msg";
		}
		$sql = "DELETE FROM musicas WHERE codbanda = '$id'";
 		if($res=mysqli_query($con,$sql)){
			$msg = "Arquivo enviado com sucesso!";
			header('Location: excluir.php');
		}
		else{
			$msg = "Falha ao enviar arquivo.";
			echo "$msg";
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

	.tabela{
		position:absolute;
   		width: 30%;
   		top: 36%;
   		left: 47%;
   		margin-left: 10px;  
   		margin-right: 10px;  
	} 	

	

	label.lbcodigo{
		position: absolute; 
		left: 20%; 
		top: 35%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	
	input.txtcodigo{ 
			width: 50px;
			position: absolute; 
			left: 33%; 
			top: 38%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

	label.lbsalvar{
			position: absolute; 
			left: 20%; 
			top: 45%;
			margin-left: 10px;  
   			margin-right: 10px; 
		} 

		input.salvar{
			width: 230px; 
			position: absolute; 
			left: 20%; 
			top: 53%;
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
	<form method="POST" name="Salvar" action="excluir.php" enctype="multipart/form-data">
		<label class="lbcodigo">Escreva o codigo do cantor ou banda <br>do qual você deseja excluir</label>
		<input class="txtcodigo" type="text" required="" name="codigo">
		<label class="lbsalvar"> Para excluir uma banda <br>ou cantor(a) tecle o botão abaixo : </label>
		<input type="submit" name="Salvar" class="salvar" value="Excluir banda ou cantor(a)" >
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