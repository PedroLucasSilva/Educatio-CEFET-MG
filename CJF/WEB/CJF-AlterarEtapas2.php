<?php

printf("<!DOCTYPE html>
<html>
<head>
	<title>Manutenção de Etapas - Alterar</title>
  	<meta charset='utf-8'>
  	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
  	<link href='https://fonts.googleapis.com/css?family=Abel|Inconsolata' rel='stylesheet'>

	<!-- CSS do Bootstrap -->
	<link href='css/bootstrap.min.css' rel='stylesheet' />
	<link href='css/bootstrap.css' rel='stylesheet'/>

	<!-- CSS do grupo -->
	<link href='CJF-web-estilos.css' rel='stylesheet' type='text/css' >

	<!-- Arquivos js -->
	<script src='js/popper.js'></script>
	<script src='js/jquery-3.2.1.js' type='text/javascript'></script>
	<script src='js/bootstrap.min.js' type='text/javascript'></script>

	<!-- Fontes e icones -->
	<link href='css/nucleo-icons.css' rel='stylesheet'>	
</head>
<body>
	<div class='section landing-section'>
		<div class='container'>
			<div class='row'>
				<div class='col-md-8 ml-auto mr-auto'>
					<h2 class='text-center'>");

if (isset($_POST['valor'])) {
	if (isset($_POST['etapa'])) {


		//Abre conexao
		$sqlConexao = mysqli_connect("localhost", "root", "", "educatio");

		if (!$sqlConexao) {
			echo "Falha na conexao com o Banco de Dados!";
			exit;
		}

		//Seleciona as variaveis;
		$intId = $_POST['etapa'];
		$intValor = $_POST['valor'];


		//Verifica se a etapa existe
		$sqlSql = "SELECT idOrdem FROM etapas WHERE ativo='S'";
		$sqlResultado = $sqlConexao->query($sqlSql);
		$arrayDados = array();
		$intContador = 0;
		while ($genAux = $sqlResultado->fetch_assoc()) {
			if ($intId == $genAux['idOrdem']) {
				$intContador++;
				break;
			}
		}

		if ($intContador == 0) {
			echo "Etapa inexistente!";
			exit;
		}


		//Altera a etapa selecionada
		$sqlSql = "UPDATE etapas SET valor='".$intValor."' WHERE idOrdem='".$intId."'";
	

		$resultado = $sqlConexao->query($sqlSql);
		if ($resultado) {
			echo"Alteração efetuada com sucesso!";
		} else {
			echo"Erro ao alterar etapa!";
		}

		echo "<br></br><form method='post' action='CJF-AlterarEtapas1.php'>
				<input class='btn btn-info btn-round' type='submit' value='Alterar Outra'>
			  </form>";

	} else {

		printf("<div class='alert alert-info' role='alert'>
 					 Falha ao processar sua requisição! <a href='CJF-AlterarEtapas1.php' class='alert-link'>Tentar novamente</a>. 
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>				
	</div>					
</body>
</html>");
		exit;
	}

} else {

	printf("<div class='alert alert-info' role='alert'>
 					 Falha ao processar sua requisição! <a href='CJF-AlterarEtapas1.php' class='alert-link'>Tentar novamente</a>. 
							</div>
						</div>
					</div>	
				</div>
			</div>	
		</div>				
	</div>					
</body>
</html>");
		exit;
}
printf("		</h>		
				</div>
			</div>
		</div>				
	</div>
</body>
</html>");
?>
