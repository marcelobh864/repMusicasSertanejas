<?php 
		session_start();
		require_once "conexao.php";
		if (isset($_POST['Salvar'])){
		$codigo = $_POST["codigo"];	
		$NomeBanda = $_POST["Nbanda"];
		$BiografiaBanda = $_POST["Bbanda"];
		$AgendaBanda = $_POST["Bagenda"];
		$SiteBanda = $_POST["Bsite"];
		$RedeSocialBanda = $_POST["Bsite"];
		$TelefoneBanda =  $_POST["telbanda"];
		$extensao = strtolower(substr($_FILES['fimage']['name'], - 4));
		$novo_nome = md5(time()). $extensao;
		$diretorio = "ImgMaterias/";
		move_uploaded_file($_FILES['fimage']['tmp_name'], $diretorio.$novo_nome);
		
		$sql_cod = "UPDATE bandas SET  nomebanda = $NomeBanda, biografiabanda = $BiografiaBanda, fotobanda = $novo_nome , agendabanda = $AgendaBanda, sitebanda = $SiteBanda, telefonebanda = $TelefoneBanda , WHERE idbanda = $codigo";
		

		if($res=mysqli_query($con,$sql_cod))
			{
			$msg = "Falha ao enviar arquivo.";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p.Pnome{position: absolute; left: 76px; top: 130px;}
	    #image{border-color:#000; border-style: solid;  border-width: 1px; position: absolute; top: 20px; left: 76px; height: 110px; width: 90px;}
	    #imagebanco{border-color:#000000; border-style: solid;  border-width: 1px; position: absolute; left: 270px; top: 140px; height: 205px; width: 196px;}
	     #foto{border-color:#000000; border-style: solid;  border-width: 1px; position: absolute; left: 490px; top: 140px; height: 205px; width: 196px;}
	    textarea.Tprincipal{ position: absolute; left: 800px; top: 140px;}
	    textarea.Tsecundario{ position: absolute; left: 270px; top: 440px;}
	    a.retorno{text-decoration: none; color: #000000; position: absolute; left: 1120px; top: 45px;}
		h1.Ptopo{text-decoration: none; color: #000000; position: absolute; left: 272px; top: -22px; font-size: 52px; }
		p.Pnomemat{position: absolute; left: 76px; top: 270px;}
		p.NomeS{position: absolute; left: 76px; top: 220px;}
		input.arquivo{position: absolute; left: 490px; top: 405px; width: 120px;}
		label.Nimg{position: absolute; left: 490px; top: 360px; width: 280px;}
		label.Nimgatual{position: absolute; left: 270px; top: 360px; width: 220px;}
		label.lbsalvar{position: absolute; left: 70px; top: 358px; width: 220px;}
		input.enviar{position: absolute; left: 70px; top: 400px; }
		label.lblimpar{position: absolute; left: 70px; top:438px; width: 220px;}
		input.Limpar{position: absolute; left: 70px; top: 480px; }
	</style>
</head>
<body>
<div id="topo">
	<h1 class="Ptopo"> Caderno digital</h1>
	<a href="index.php" class="retorno">Voltar tela de login</a>
</div>
<?php 
		require_once "conexao.php";
		$user=$_SESSION["username"];
		$senha=$_SESSION["senha"];
		$sql = "SELECT Nome, foto FROM cadernocad WHERE login = '$user' AND senha = '$senha'";
		$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result)){
		echo "<div id='image'>";
		echo "<img src='load/" .$row['foto']."' width='100%' height='100%'>";
		echo "</div>";
		echo "<p class='Pnome'>Bem vindo(a)<br> ". $row["Nome"]."</p>";
		}

?>

<?php 
		require_once "conexao.php";
		$Matcod=$_SESSION["matcod"];
		$usercpf=$_SESSION["cpfuser"];
		$userusuario=$_SESSION["username"];
		$consulta = "SELECT NomeMat FROM matprincipal WHERE codigo = '$Matcod' AND cpf = '$usercpf'";
		$consultando = mysqli_query($con, $consulta);
		while($dado = mysqli_fetch_array($consultando)) {  
		echo "<p class='Pnomemat'>Esse tópico está <br>relacionado com à <br>materia: ". $dado["NomeMat"]."</p>";}
	?>
<form method="POST" name="Salvar" action="Atualizar.php" enctype="multipart/form-data">
<?php 
		require_once "conexao.php";
		$Matcodprincipal=$_SESSION["CMAT"];
		$Matcodsecundario=$_SESSION["matcod"];
		$sql = "SELECT Nmateria, imagem, textoprinc, observacao1 FROM materias WHERE codmat = '$Matcodprincipal' AND codmatprinc = '$Matcodsecundario'";
		$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result)){
		echo "<div id='imagebanco'>";
		echo "<img src='ImgMaterias/" .$row['imagem']."' width='100%' height='100%'>";
		echo "</div>";
		echo "<textarea name='texto' cols=60 rows=30 class='Tprincipal'>". $row["textoprinc"]."</textarea>";
		echo "<textarea name='exe1' cols=60 rows=10 class='Tsecundario'>". $row["observacao1"]."</textarea>";
		echo "<p class='NomeS'>Esse tópico é o <br>tópico: ". $row["Nmateria"]."</p>";
		}

	?>
	
			<label class="Nimg">Se quiser escolha uma nova <br>imagem:</label>
			<label class="Nimgatual">Imagem atual:</label>
			<input type="file" required name="fimage" class="arquivo" onchange="showimage.call(this)">
			
			<div id="foto">
				<img src="imagens/foto.jpg" id="fimage" name="fimage" height="205px" width="196px">
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
				window.location="Atualizar.php";
			}

		</script>
			<label class="lbsalvar"> Para atualizar a matéria <br>tecle o botão abaixo : </label>
			<input type="submit" name="Salvar" class="enviar" value="Atualizar" >
			<label class="lblimpar"> Para limpar o formulario <br>tecle no botão abaixo : </label>
			<input type="button" onclick="redirecionar()" class="Limpar" value="Limpar todos os campos">
	</form>
</body>
</html>