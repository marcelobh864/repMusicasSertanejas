
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

	input.lbbanda{
		width: 350px;
		height: 30px;
		position: absolute; 
		left: 40%; 
		top: 46%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}

	input.lbmusica{
		width: 350px;
		height: 30px;
		position: absolute; 
		left: 40%; 
		top: 56%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	input.lbaltera{
		width: 350px;
		height: 30px;
		position: absolute; 
		left: 40%; 
		top: 66%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	input.lbexcluir{
		width: 350px;
		height: 30px;
		position: absolute; 
		left: 40%; 
		top: 76%;
		margin-left: 10px;  
   		margin-right: 10px; 
		}
	</style>
	
	<title></title>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="index.php" class="retorno">Voltar para tela inicial</a>
	</div>
	<input type="button" onclick="banda()" class="lbbanda" value="Cadastrar cantor ou banda">
	<input type="button" onclick="paginamusica()" class="lbmusica" value="Inserir uma musica para um cantor ou uma banda">
	<input type="button" onclick="atualizabanda()" class="lbaltera" value="Altera banda ou cantor(a)">
	<input type="button" onclick="excluirbanda()" class="lbexcluir" value="Excluir uma banda ou cantor(a)">
	<script type="text/javascript">
		function banda(){
		window.location="configuracoes.php";
		}
		function paginamusica(){
		window.location="configuracoesmusicas.php";
		}
		function atualizabanda(){
		window.location="atualizainicial.php";
		}
		function excluirbanda(){
		window.location="excluir.php";
		}
	</script>

</body>
</html>