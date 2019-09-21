<?php 
	namespace App\Controller;

	use Src\Classes\ClassRender;
	use Src\Interfaces\InterfaceView;
	use App\Model\ClassCadastro;

	class ControllerCadastro extends ClassCadastro {

		protected $id;
		protected $nome;
		protected $sexo;
		protected $cidade;

		use \Src\Traits\TraitUrlParser;

		public function __construct() {
			if (count($this -> parseUrl()) === 1) {
				$render = new ClassRender();

				$render -> setDir('cadastro');
				$render -> setTitle('MVC - Cadastro');
				$render -> setDescription('Cadastro de clientes da estrutura MVC.');
				$render -> setKeywords('cadastro de clientes, cadastro');
				$render -> renderLayout();
			}
		}

		# Recebe as variáveis
		public function recVariaveis() {
			if (isset($_POST['id'])) { $this -> id = $_POST['id']; }
			if (isset($_POST['nome'])) { $this -> nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); }
			if (isset($_POST['sexo'])) { $this -> sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_SPECIAL_CHARS); }
			if (isset($_POST['cidade'])) { $this -> cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS); } 
		}

		# Chamar o método de cadastro da ClassCadastro
		public function cadastrar() {
			$this -> recVariaveis();
			$this -> cadastroClientes($this -> nome, $this -> sexo, $this -> cidade);
			echo "Cadastro efetuado com sucesso!";
		}

		# Selecionar e exibir os dados do banco de dados
		public function seleciona() {
			$this -> recVariaveis();
			$b = $this -> selecionaClientes($this -> nome, $this -> sexo, $this -> cidade);

			echo "
			<form name='formDeletar' id='formDeletar' action='".DIRPAGE."cadastro/deletar' method='POST'>
			<table border='1'>
				<tr>
					<td>Nome</td>
					<td>Sexo</td>
					<td>Cidade</td>
					<td>Ação</td>
				</tr>
			";

			foreach ($b as $c) {
				echo "
				<tr>
					<td>$c[nome]</td>
					<td>$c[sexo]</td>
					<td>$c[cidade]</td>
					<td><input type='checkbox' id='id' name='id[]' value='$c[id]'><img class='imageEdit' rel='$c[id]' width='15' src='".DIRIMG."edit.png' alt='Editar'></td>
				</tr>
				";
			}

			echo "
			</table>
			<input type='submit' value='Deletar'>
			</form>";
		}

		# Deletar dados o banco de dados
		public function deletar() {
			$this -> recVariaveis();
			foreach ($this -> id as $idDeletar) {
				$this -> deletarClientes($idDeletar);
			}
		}

		# Puxando dados do banco de dados
		public function puxaDB($id) {
			$this -> recVariaveis();
			$b = $this -> selecionaClientes($this -> nome, $this -> sexo, $this -> cidade);

			foreach ($b as $c) {
				if ($c['id'] == $id) {
					$nome = $c['nome'];
					$sexo = $c['sexo'];
					$cidade = $c['cidade'];
				}	
			}

			echo "
				<form name='formAtualizar' id='formAtualizar' method='POST' action='".DIRPAGE."cadastro/atualizar' ?>'

					<input type='hidden' name='id' id='id' value='{$id}'><br><br>

					<label for='nome'><strong>Nome</strong></label><br>
					<input type='text' name='nome' id='nome' value='{$nome}'><br><br>

					<label for='cidade'><strong>Cidade</strong></label><br>
					<input type='text' name='cidade' id='cidade' value='{$cidade}'><br><br>

					<label for='sexo'><strong>Sexo</strong></label><br>
					<select name='sexo' id='sexo'>
						<option value='Masculino'>Masculino</option>
						<option value='Feminino'>Feminino</option>
					</select><br><br>

					<input type='submit' value='Atualizar'>
				</form>
			";
		}

		# Atualizar dados dos clientes
		public function atualizar() {
			$this -> recVariaveis();
			$this -> atualizarClientes($this -> id, $this -> nome, $this -> sexo, $this -> cidade);
			echo "Usuário atualizado com sucesso!";
		}
	}