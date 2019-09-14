<?php 
	namespace App\Controller;

	class ControllerCarros {
		public function valorCarro($tipo, $motor) {
			if ($tipo == 'veiculo' && $motor == '1') {
				$valor = '1000,00';
			} elseif ($tipo == 'caminhao' && $motor == '2') {
				$valor = '5000,00';
			} else {
				$valor = '00,00';
			}

			echo "O tipo de carro é {$tipo}, usa o motor {$motor} e seu valor é {$valor}.";
		}
	}