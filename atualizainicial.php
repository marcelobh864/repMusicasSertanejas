
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
			width: 80px;
			position: absolute; 
			left: 20%; 
			top: 41%;
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

	label.lbcodigoM{
		position: absolute; 
		left: 20%; 
		top: 60%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	input.txtcodigoM{ 
			width: 50px;
			position: absolute; 
			left: 20%; 
			top: 67%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}
	label.lbsalvarM{
			position: absolute; 
			left: 20%; 
			top: 72%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}
	input.salvarM{
			width: 230px; 
			position: absolute; 
			left: 20%; 
			top: 80%;
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
	<!--<form method="POST" name="Salvar" action="atualizar.php" enctype="multipart/form-data">
		<label class="lbcodigo">Escreva o codigo do cantor ou banda <br>do qual você deseja alterar</label>
		<input class="txtcodigo" type="text" required="" name="codigo">
		<label class="lbsalvar"> Para fazer alguma alteração na banda <br>ou cantor(a) tecle o botão abaixo : </label>
		<input type="submit" name="Salvar" class="salvar" value="Alterar banda ou cantor(a)" >
	</form>-->	
	<form method="POST" name="Salvar" action="atualizarM.php" enctype="multipart/form-data">
		<label class="lbcodigo">Digite o codigo do cantor ou banda <br>que você deseja alterar alguma musica</label>
		<input class="txtcodigo" type="text" required="" name="codigo">
		<label class="lbsalvar"> Para alterar alguma musica da banda <br>ou cantor(a) tecle o botão abaixo : </label>
		<input type="submit" name="Salvar" class="salvar" value="Alterar musica" >
	</form>	
	<table border="1" class="tabela">
		<tr>
			<td >Codigo da banda</td>
			<td>Nome da banda ou cantor(a)</td>
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
	<!-- <form method="POST" name="Salvar" action="atualizarM.php" enctype="multipart/form-data">
		<label class="lbcodigoM">Digite o codigo do cantor ou banda <br>que você deseja alterar alguma musica</label>
		<input class="txtcodigoM" type="text" required="" name="codigo">
		<label class="lbsalvarM"> Para alterar alguma musica da banda <br>ou cantor(a) tecle o botão abaixo : </label>
		<input type="submit" name="Salvar" class="salvarM" value="Alterar musica" >
	</form>-->