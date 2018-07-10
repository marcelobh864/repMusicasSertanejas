<?php 
		require_once "conexmusi.php";
		if (isset($_POST['Salvar'])){
		$NomeBanda = $_POST["Nbanda"];
		$BiografiaBanda = $_POST["Bbanda"];
		$AgendaBanda = $_POST["Bagenda"];
		$SiteBanda = $_POST["Bsite"];
		$RedeSocialBanda = $_POST["Bsite"];
		$TelefoneBanda =  $_POST["telbanda"];
		$extensao = strtolower(substr($_FILES['fimage']['name'], - 4));
		$novo_nome = md5(time()). $extensao;
		$imageFileType = strtolower(pathinfo($novo_nome,PATHINFO_EXTENSION));
		 if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
    || $imageFileType == "gif" ) {
			$diretorio = "cantores/";
			move_uploaded_file($_FILES['fimage']['tmp_name'], $diretorio.$novo_nome);
			$sql_cod = "INSERT INTO bandas (idbanda, nomebanda, biografiabanda, fotobanda, agendabanda, sitebanda, redesocialbanda, telefonebanda) VALUES(null, '$NomeBanda', '$BiografiaBanda', '$novo_nome', '$AgendaBanda', '$SiteBanda', '$RedeSocialBanda', '$TelefoneBanda')";
			if($res=mysqli_query($con,$sql_cod)){
				$msg = "Arquivo enviado com sucesso!";
				header('Location: configuracoes.php');
			}
			else{
				$msg = "Falha ao enviar arquivo.";
			}
		}else{
			
				echo "Não dá para salvar à imagem!";
			}

	}

?>
<!DOCTYPE html>
<html>
<head>
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

	a.retorno{
		text-decoration: none; 
		color: #FF4500; 
		position: absolute;
		left: 80%; 
		top: 15%; 
		font-size: 20px; 
			
		}

		#conteuto {  
			position:absolute;
   			width: 25%;
   			top: 36%;
   			height: 200px; 
   			left: 62%;
   			margin-left: 10px;  
   			margin-right: 10px;  
		}  

		label.lbbiografia {  
			position:absolute;
   			top: 31%;
   			left: 62%; 
   			margin-left: 10px;  
   			margin-right: 10px;  
		} 
	
		label.lbnomebanda {  
			position:absolute;
   			top: 31%;
   			left: 12%; 
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

		#conteutoagenda {  
			position:absolute;
   			width: 25%;
   			top: 78%;
   			height: 100px; 
   			left: 62%; 
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

		input.arquivo{
			position: absolute; 
			left: 33%; 
			top: 73%;
		} 

		label.lbfoto{ 
			position: absolute; 
			left: 33%; 
			top: 31%;
			}

		label.lbsite{ 
			position: absolute; 
			left: 12%;  
			top: 40%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

		input.txtsite{ 
			position: absolute; 
			left: 12%; 
			top: 48%;
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

		input.txtcontato{ 
			position: absolute; 
			left: 12%; 
			top: 62%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}

			

		#imagem{
			position: absolute; 
			left: 33%; 
			top: 36%;
			border-color:#000000; 
			border-style: solid;  
			border-width: 1px; 
		}   

		label.lbsalvar{
			width: 175px; 
			position: absolute; 
			left: 12%; 
			top: 82%;
			margin-left: 10px;  
   			margin-right: 10px; 
		} 

		input.enviar{
			width: 175px; 
			position: absolute; 
			left: 12%; 
			top: 90%;
			margin-left: 10px;  
   			margin-right: 10px; 
			}

		input.Limpar{
			width: 175px; 
			position: absolute; 
			left: 12%; 
			top: 76%;
			margin-left: 10px;  
   			margin-right: 10px; 
		}
		
		label.lblimpar{
			width: 175px; 
			position: absolute; 
			left: 12%; 
			top: 68%;
			margin-left: 10px;  
   			margin-right: 10px; 
			}
	    body {
	    	margin:0px;
	     padding:0px;
	 		}
		
	</style>
	
	<title></title>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="paginaconfiguracao2.php" class="retorno">Voltar para tela anterior</a>
	</div>
	<form method="POST" name="Salvar" action="configuracoes.php" enctype="multipart/form-data">
			<input type="file" required name="fimage" class="arquivo" onchange="showimage.call(this)">
			
			<div id="imagem">
				<img src="img/foto.jpg" id="fimage" height="195px" width="186px">
				<!-- Com o comando style="display:none" igual no exemplo abaixo o campo da imagem fica limpo sem -->
				<!-- <img src="imagens/foto.jpg" style="display:none"  id="image" height="125px" width="116px"> -->
			</div>

		<script type="text/javascript">
			function showimage()
			{
				if(this.files && this.files[0])
				{
					var obj = new FileReader();
					obj.onload = function(data){
						var image = document.getElementById("fimage");
						image.src = data.target.result;
						image.style.display = "block";
					}
					obj.readAsDataURL(this.files[0]);
				}
			}

			function redirecionar(){
				window.location="configuracoes.php";
			}

		</script>
			<label class="lbbiografia">Fale sobre a biografia da banda </label>
			<label class="lbnomebanda">Fale o nome da banda </label>
			<input class="txtnomebanda" type="text" required="" name="Nbanda">
			<textarea id="conteuto" name="Bbanda" required="" placeholder="Fale sobre a biografia da banda ou do cantor(a):"></textarea>
			<label class="lbfoto"> Escolha a imagem da banda: </label>
			<label class="lbagenda">Fale sobre a agenda da banda </label>
			<textarea id="conteutoagenda" name="Bagenda" required="" placeholder="Fale sobre a agenda da banda ou do cantor(a):"></textarea>
			<label class="lbcontato">Escreva o o telefone de<br> contato da banda: </label>
			<input class="txtcontato" type="text" required="" name="telbanda">
			<label class="lbsite">Escreva o link do site da<br> banda ou cantor(a): </label>
			<input class="txtsite" type="text" required="" name="Bsite">
			<label class="lbsalvar"> Para salvar a matéria tecle o botão abaixo : </label>
			<input type="submit" name="Salvar" class="enviar" value="Cadastrar" >
			<label class="lblimpar"> Para limpar o formulario tecle no botão abaixo : </label>
			<input type="button" onclick="redirecionar()" class="Limpar" value="Limpar todos os campos">
	</form>

</body>
</html>