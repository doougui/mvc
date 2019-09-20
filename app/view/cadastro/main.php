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

<br><br>
<hr>
<br><br>

<h1>Seleção de Dados</h1>

<form name="formSelect" id="formSelect" method="POST" action="<?= DIRPAGE.'cadastro/seleciona' ?>">
	<label for="nome"><strong>Nome</strong></label><br>
	<input type="text" name="nome" id="nome"><br><br>

	<label for="cidade"><strong>Cidade</strong></label><br>
	<input type="text" name="cidade" id="cidade"><br><br>

	<label for="sexo"><strong>Sexo</strong></label><br>
	<select name="sexo" id="sexo">
		<option value="Masculino">Masculino</option>
		<option value="Feminino">Feminino</option>
	</select><br><br>

	<input type="submit" value="Pesquisar">
</form>

<!-- Responsável por receber a tabela de pesquisa -->
<div class="resultado" style="width: 100%; height: 300px; background-color: #7ed6df;"></div>