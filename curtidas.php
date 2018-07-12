<?php 
		require_once "conexmusi.php";
		if (isset($_POST['Salvar'])){
		$comentario= $_POST["salvarcomentario"];
		$nomeusuario= $_POST["usuario"];
		$sql_cod = "INSERT INTO comentario (CodComentario, NomeUsuario, Comentario) VALUES(null, '$nomeusuario', '$comentario')";
			if($res=mysqli_query($con,$sql_cod)){
				$msg = "Arquivo enviado com sucesso!";
				header('Location: curtidas.php');
			}
			else{
				$msg = "Falha ao enviar arquivo.";
			}
		}

?>

<style>
	body{
  		background-color: #FFFAF0; 
        background-position: center center;
  		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;
		}

	#topo{
		position: fixed;
		top: 0px;
		z-index: 3;
		background-color: #000000; 
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

	input.nome{
		position:absolute;
   		top: 45%;
   		left: 21%;
   		width: 270px;
   		margin-left: -250px;  
   		margin-right: 10px;  

	}

	input.btcomentar{
		position:absolute;
   		top: 50%;
   		left: 21%;
   		width: 270px;
   		margin-left: -250px;  
   		margin-right: 10px;  

	}


	textarea.txtcomentario{
		position:absolute;
		top: 33%;
		left: 2%; 
		margin-left: 10px;  
   		margin-right: 10px; 
	}

	textarea.coment{
		margin-top: 5px;
	}

	#idcoment{
		position:absolute;
   		top: 400px;
   		left: 2%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	p.lbcomentario{
		position:absolute;
   		top: 23%;
   		left: 2%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	p.lbnome{
		position:absolute;
   		top: 39%;
   		left: 2%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	p.Ncomentario{
		margin-top: 5px;
	}

	#comentarios{
		top: 105px;
		position: relative;
		width: 270px;
		left: 37px; 
		z-index: 2
	}

	#principal{
		top: 230px;
		left: -2px;
		position: relative;
		z-index: 1;
		
	}

	p.sorteio{
		position:absolute;
   		top: 24%;
   		left: 77%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	p.NomeS{
		position:absolute;
   		top: 59%;
   		left: 2%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	p.opinioes{
		position:absolute;
   		top: 47%;
   		left: 77%;
   		margin-left: 10px;  
   		margin-right: 10px; 
	}

	a.retorno{
		text-decoration: none; 
		color: #FF4500; 
		position: absolute;
		left: 80%; 
		top: 12%; 
		font-size: 18px; 
			
		}

	textarea.coment{
		margin-left: 5px;
		margin-bottom: 9px;
		max-height: 1000px;
	}

	.op{
		position:absolute;
		left:30%;
		top:26%;
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
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div id="topo">
		<p class="Ptopo"> REPOSITORIO DE BANDAS E CANTORES SERTANEJAS</p>
		<a href="index.php" class="retorno">Voltar tela anterior</a>
	</div>
		<div>
			<table border="1" class="op">
				<tr>
					<td width="100px">Colocação </td>
					<td width="300px">Nome da Banda </td>
					<td width="200px">Quantidade de curtidas </td>
				</tr>
		
				<?php
					require_once "conexmusi.php";
					session_start();
					$contador = 0;
					$query = "SELECT COUNT(c.CodBanda) AS 'Quantidade de curtidas', b.nomebanda AS 'Nomes das bandas' FROM curtidas c JOIN bandas b ON b.idbanda = c.codBanda GROUP by c.CodBanda ORDER BY COUNT(c.CodBanda) DESC";
					$consultando = mysqli_query($con, $query);
					while($dado = mysqli_fetch_array($consultando)) { 
						$cont = $dado['Quantidade de curtidas'];
						$name = $dado['Nomes das bandas'];
						$contador = $contador + 1;
				 ?>
			
					<tr>
						<td width="100px"><?php echo "$contador";?>º</td>
						<td width="300px"><?php echo "$name<br/>";?></td>
						<td width="200px"><?php echo "$cont<br/>";?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div>
			<p class="lbcomentario">Deixe abaixo o seu comentario sobre <br>a banda se você quiser.</p>
			<p class="lbnome">Informe o seu nome abaixo:</p>
			<p class="sorteio">Para participar de sorteios de ingressos para ir em shows da sua banda predileta envie um e-mail para o sorteios@repositoriosertanejos.com.br, deixando o seu whatssap e de um amigo seu e fale o nome da banda que você deseja assistir um show ao vivo.</p>

			<p class="opinioes">Sugestões, criticas e opiniões mande um e-mail para sugestões@repositoriosertanejos.com.br</p>
			<form action="curtidas.php" method="POST">
				<textarea name="salvarcomentario" rows="3" cols="35" class="txtcomentario" required="" placeholder="Deixe o seu comentario sobre alguma banda"></textarea>
				<input type="text" name="usuario" required="" class="nome" >
				<input type="submit" class="btcomentar" required="" value="Comentar" name="Salvar">
				
			</form>

			<?php
				require_once "conexmusi.php";
				$sql = "SELECT 	NomeUsuario, Comentario FROM comentario";
				$result = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($result)){ ?>
						<div id="principal">
							<div id="comentarios">
								 <?php 
								 echo "<p class='Ncomentario'>Comentario do : ". $row["NomeUsuario"]."</p>";
								 echo "<textarea class='coment' cols=34 rows=4 >". $row["Comentario"]."</textarea><br>";?>
							 </div>
						</div><?php
				}
			?>
		</div>
</body>
</html>