<!DOCTYPE html>
<html>
<head>	
    <title>Login - Educatio - CEFET-MG</title>
    <meta charset="utf-8">
</head>
<body>
	<nav nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="150">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand"><img class="logo" src="../../Estaticos/Logo/Educatio.png"></a>
            
        <div id="menu" class="collapse navbar-collapse" id="navbar-menu">
            <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="gerencia-web-interface-aluno-academico.php?acao=default"><i class="nc-icon nc-book-bookmark"></i>Acessar Sistema Acadêmico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gerencia-web-interface-aluno-biblioteca.php?acao=default"><i class="nc-icon nc-book-bookmark"></i>Acessar Biblioteca</a>
                </li>
            </ul>            
            <ul class="nav navbar-nav">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" role="button" aria-haspopup="true" aria-expanded="false">

                    <?php 

                        if($usuario['foto'] == null){
                          echo '<img class="profile" src="../../Estaticos/imagens/perfil.png"/>';

                        } else {
                          echo '<img class="profile" src="data:image/jpeg;base64,'.base64_encode( $usuario['foto'] ).'"/>';
                        }
                    ?>  

                    <?php echo $usuario['nome'];?> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href= "../Login/gerencia-web-login.html" onclick = "fazerLogout()">Sair</a>
                    </ul>
                </div> 
            </ul>
        </div>
    </nav> 
</body>
</html>