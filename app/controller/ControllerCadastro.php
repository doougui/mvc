<?php 
	namespace App\Controller;

	use Src\Classes\ClassRender;
	use Src\Interfaces\InterfaceView;
	use App\Model\ClassCadastro;

	class ControllerCadastro extends ClassCadastro {

		protected $nome;
		protected $sexo;
		protected $cidade;

		public function __construct() {
			$render = new ClassRender();

			$render -> setDir('cadastro');
			$render -> setTitle('MVC - Cadastro');
			$render -> setDescription('Cadastro de clientes da estrutura MVC.');
			$render -> setKeywords('cadastro de clientes, cadastro');
			$render -> renderLayout();
		}

		# Recebe as variáveis
		public function recVariaveis() {
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
			<table border='1'>
				<tr>
					<td>Nome</td>
					<td>Sexo</td>
					<td>Cidade</td>
				</tr>
			";

			foreach ($b as $c) {
				echo "
				<tr>
					<td>$c[nome]</td>
					<td>$c[sexo]</td>
					<td>$c[cidade]</td>
				</tr>
				";
			}

			echo "
			</table>";
		}
	}