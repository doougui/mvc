$(document).ready(function() {
	$('#formSelect').on('submit', function(event) {
		event.preventDefault();
		var dados = $(this).serialize();

		$.ajax({
			url: DIRPAGE + 'cadastro/seleciona',
			method: 'POST',
			dataType: 'html',
			data: dados,
			success: function(dados) {
				$('.resultado').html(dados);
			}
		});
	});
});