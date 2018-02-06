<!doctype>
<html lang="pt-br">
<meta charset="utf-8">
<head><title>Login</title>
<style>
#login{
	width:200px;
	heigth:100px;
}
</style>
<?php
session_start();
include "conexao.php";

if (isset($_POST["entrar"]))
{
	$login=$_REQUEST["login"];
	$senha=$_REQUEST["senha"];
	
	$logar=mysqli_query($conexao,"select * from usuario where email='$login' and senha='$senha'");
	$linha=mysqli_fetch_array($logar);
	
	if(!$linha)
	{
		echo"<script>alert('Usuário não encontrado')
		location.href='cadastrologin.php'</script>";
	}
	else
	{
		$_SESSION["login"]=$login;
		$_SESSION["senha"]=$login;
		echo "<script>alert ('Bem vindo $login')
		location.href='welcome.php'</script>";
	}
	
	
}
?>

</head>

<body>
<br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<fieldset id="login">
<legend>Segurança</legend>
<label>Login:</label>
<input type="text" maxlength="30" size="30" name="login"/><br><br>
<label>Senha:</label>
<input type="password" maxlength="30" size="30" name="senha"/><br><br>
<input type="submit" name="entrar" value="Entrar"/>
<input type="submit" name="cancelar" value="Cancelar"/>
</fieldset>
<br>
<a href="cadastrologin.php">Não sou cadastrado</a>
</form>
</body>
</html>