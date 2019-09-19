<form name="formCadastro" id="formCadastro" method="POST" action="<?= DIRPAGE.'cadastro/cadastrar' ?>">
	<label for="nome"><strong>Nome</strong></label><br>
	<input type="text" name="nome" id="nome"><br><br>

	<label for="cidade"><strong>Cidade</strong></label><br>
	<input type="text" name="cidade" id="cidade"><br><br>

	<label for="sexo"><strong>Sexo</strong></label><br>
	<select name="sexo" id="sexo">
		<option value="Masculino">Masculino</option>
		<option value="Feminino">Feminino</option>
	</select><br><br>

	<input type="submit" value="Cadastrar">
</form>