$(document).ready(function(){
	
	$('#btn_filter').click(function(){
		var fak = $("#filter_fakultas").val();
		var jur = $('#filter_jurusan').val();
        var awal = $("#filter_tahunawal").val();
        var akhir = $("#filter_tahunakhir").val();
        if(fak == '') fak = 0;
        if(jur == '') jur = 0;
        if(awal == '') awal = 0;
        if(akhir == '') akhir = 0;
		window.location = base_url + "report/lab/" + fak + "/"+ jur + "/" + awal + "/" + akhir;
	});

	$('.select2').select2();

});