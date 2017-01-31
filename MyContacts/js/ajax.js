$(function() {
	$('#search_form').submit(function(e){
		e.preventDefault();
	})

	$('#search').keyup(function(){

	var envio = $('#search').val();

		$.ajax({
			type: 'POST',
			url: '../php/buscar.php',
			data: ('search='+envio),
			success: function(resp){
				if (resp!="") {
					$('#resultado').html(resp);
				}
			
			}
		})
	})
})