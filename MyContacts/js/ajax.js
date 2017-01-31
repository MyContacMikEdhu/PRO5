$(function(){

	$('#check_form, #search').on('change keyup', function(){
		var checkbox = "search="+$('#search').val();

		var result = $('input[type="checkbox"]:checked')
		result.each(function(){
			if ($(this).val()=="familia"){
				checkbox+="&familia="+$(this).val();
			}
			if ($(this).val()=="amigos"){
				checkbox+="&amigos="+$(this).val();
			}
			if ($(this).val()=="trabajo"){
				checkbox+="&trabajo="+$(this).val();
			}
			if ($(this).val()=="otro"){
				checkbox+="&otro="+$(this).val();
			}
		})

		$.ajax({
			type: 'POST',
			url: '../php/checkbox.php',
			data: (checkbox),
			success: function(resp){
				if (resp!="") {
					$('#resultado').html(resp);
				}
			
			}
		})

	})
})