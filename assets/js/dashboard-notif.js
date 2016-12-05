$(document).ready(function(){
    $.notify({
        // options
        icon: 'glyphicon glyphicon-info-sign',
        title: 'Pemberitahuan : Perubahan yang ada',
        message: '<br>Sedang dalam proses perbaikan.',
        url: 'http://10.199.14.13/silacak/notification',
    },{
        // settings
	    z_index: 999,
        url_target:'',  
        type: 'info',
        mouse_over:"pause",
    });

});