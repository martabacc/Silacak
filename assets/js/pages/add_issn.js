
$(document).ready(function(){
	$('button#btn-save').click(function(){
		$.ajax({
			method : 'post',
			url : 'add_data',
			data: { issn_judul :  $('#issn_judul').val() , csrf_token : $('#tkn').val() },
			success : function(e){
				console.log(e);
			},
			error: function(exception){
				console.log(exception);
			}
		});
	});
});