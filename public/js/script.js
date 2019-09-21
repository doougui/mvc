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


	$(document).on('click', '.imageEdit', function() {
		var imgRel = $(this).attr('rel');
		
		$.ajax({
			url: DIRPAGE + 'cadastro/puxaDB/' + imgRel,
			method: 'POST',
			dataType: 'html',
			data: {'id': imgRel},
			success: function(data) {
				$('.resultadoFormulario').html(data);
			}
		});
	});
});