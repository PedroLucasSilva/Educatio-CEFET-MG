<html>
    <head>
        <title>Remover Curso</title>
        <meta charset="utf-8" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="../../../Estaticos/Bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../../Estaticos/Bootstrap/css/bootstrap.css" rel="stylesheet"/>

        <!-- CSS do grupo -->
        <link href="../../../Estaticos/CSS/gerencia-web-login.css" rel="stylesheet">
        
        <!-- Arquivos js -->
        <script src="../../../Estaticos/Bootstrap/js/popper.js"></script>
        <script src="../../../Estaticos/Bootstrap/js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="../../../Estaticos/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="MAE-web-script.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Abel|Inconsolata" rel="stylesheet">
        <link href="../../../Estaticos/Bootstrap/css/nucleo-icons.css" rel="stylesheet">
        
        <style type="text/css">
        .text-center{
           font-family: 'Abel', sans-serif;
           color: #d8ac29;
        }
        .fonteTexto{
           font-family: 'Inconsolata', monospace;
           font-size: 16px;
        }
        .btn-info {
          background-color: #162e87;
          border-color: #162e87;
          color: #FFFFFF;
          opacity: 1;
          filter: alpha(opacity=100);
        }
        .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .show > .btn-info.dropdown-toggle {
          background-color: #11277a;
          color: #FFFFFF;
          border-color: #11277a;
        }
        </style>
        
    </head>
    <body>
		
		<?php
      session_start();
      header ('Content-type: text/html; charset=ISO-8859-1');

      
			//Seta as strings de acordo com seus respectivos inputs
			$StringNovoIdDepto = $_POST["NovoIdDepto"];
			$StringNovoNome = $_POST["NovoNome"];
			$StringNovoHorasTotal = $_POST["NovoHorasTotal"];
			$StringNovoModalidade = $_POST["NovoModalidade"];

			$StringIdDepto = $_POST["idDepto"];
			$StringNome = $_POST["nome"];
			$StringHorasTotal = $_POST["horasTotal"];
			$StringModalidade = $_POST["modalidade"];

			// Cria conexão
			$conn = new mysqli("localhost", "root", "usbw","educatio");
			// Checa conexão
			if ($conn->connect_error) {
				die("Conecção falhou: " . $conn->connect_error);
			}

			$sqlSELECT = "SELECT `id` FROM `cursos` WHERE idDepto = '$StringIdDepto' AND nome = '$StringNome' AND horasTotal = '$StringHorasTotal' AND modalidade = '$StringModalidade'";
			$resultadoSELECT = $conn->query($sqlSELECT);
			while($linha = $resultadoSELECT->fetch_array() ) {
				  
				//atualiza na tabela as variaveis do input
				$sqlUPDATE = "UPDATE `cursos` SET `idDepto` = '$StringNovoIdDepto', `nome` = '$StringNovoNome', `horasTotal` = '$StringNovoHorasTotal', `modalidade` = '$StringNovoModalidade' WHERE `id` = ". $linha["id"];
				$resultadoUPDATE = $conn->query($sqlUPDATE);
			}
		?>

        <!-- exibindo informações dentro de um painel -->
        <div class="wrapper">
          <?php require "../../Menu-Rodape-Secundarios/caso-2/gerencia-web-menu-interface-coordenador.php"; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            
                            <h2 class="text-center">Altera&ccedil;&atilde;o de Curso</h2>
                            
                             <!-- exibindo informações do novo campus adicionado dentro de um painel -->
                             
                            <div class="contact-form">
                                <h4>Curso alterado com sucesso!</h4>
                                <label class="fonteTexto">ID do departamento:<?php echo " ".$StringNovoIdDepto ?></label><br />
                                <label class="fonteTexto">Nome:<?php echo " ".$StringNovoNome ?></label><br />
                                <label class="fonteTexto">Horas Totais:<?php echo " ".$StringNovoHorasTotal ?></label><br />
                                <label class="fonteTexto">Modalidae:<?php echo " ".$StringNovoModalidade ?></label><br />

                                <div class="col-md-4 ml-auto mr-auto">
                                    <button type="submit" class="btn btn-info" onClick="window.location.href ='../../Entrada/gerencia-web-interface-coordenador.php?acao=alterarCurso'">Voltar</button>
                                </div>
                            </div>  
                            
                        </div>
                    </div>
                </div>
            <?php require "../../Menu-Rodape-Secundarios/caso-2/gerencia-web-rodape-caso-2.php";  ?>
        </div>
    </body>
</html>