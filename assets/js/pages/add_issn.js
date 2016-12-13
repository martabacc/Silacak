
$(document).ready(function(){
	$('button#btn-save').click(function(){
		$.ajax({
			method : 'post',
			url : 'add_data',
			data: { issn_judul :  $('#issn_judul').val() , csrf_token : $('#tkn').val() },
			success : function(e){
				$('#success-alert').show();
				setTimeout(function(){
					$('#success-alert').hide();
				}, 3000);
				$('#issn_judul').val('');
			},
			error: function(exception){
				console.log('error');
			}
		});
	});
});