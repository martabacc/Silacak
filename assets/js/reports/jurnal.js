$(document).ready(function(){
    $(document.body).on('change', '#filter_fakultas', function(element) {
        var faknow = $("#filter_fakultas").val();
        $('#filter_jurusan').html('');

        $('#filter_jurusan').append('<option value="">Semua</option>'); 

        for (i in list_jurusan)
        {
            if (faknow == "" || list_jurusan[i].jur_fakultas == faknow)
            {
                $('#filter_jurusan').append('<option value="' + list_jurusan[i].jur_id + '">' + list_jurusan[i].jur_nama_indonesia + '</option>');        
            }
        }

        $('#filter_jurusan').trigger('change');
    });

    $("#filter_fakultas").val(fakultas);
    $('#filter_fakultas').trigger('change');
    $("#filter_jurusan").val(jurusan);
    $("#filter_jurusan").val(jurusan);
    $("#filter_dkp").val(kode_jurnal);


	$('#btn_reset').click(function() {
        $('#filter_tahun').val('');

        $('#filter_fakultas').prop('selectedIndex', 0);
        $('#filter_fakultas').trigger('change');

        $('#filter_jurusan').prop('selectedIndex', 0);
        $('#filter_jurusan').trigger('change');

        $('#filter_kode').prop('selectedIndex', 0);
        $('#filter_kode').trigger('change');
        
        $('#filter_dkp').prop('selectedIndex', 0);
        $('#filter_dkp').trigger('change');

        $('#btn_filter').click();
    });

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page');
        masterPage.refreshData();
	});

     $("#btn-download").click(function(){
        var fak = $("#filter_fakultas").val();
        if(fak == '') fak = 0;
        var jur = $("#filter_jurusan").val();
        if(jur == '') jur = 0;
        var tahun = $("#filter_tahun").val();
        window.location = base_url + "report/download_by_keterangan/" + fak + "/" + jur + "/" + tahun + "/" + kode;
    });

     var zz = null;
    $('#master-page').masterPage({
        primaryKey: 'pub_keterangan',
        detailFocusId: 'pub_keterangan',
        dataUrl: base_url + 'report/get_datamaster_keterangan',
        // detailUrl: base_url + 'publikasi_dosen/listpub',
        // addUrl: base_url + 'publikasi_dosen/add',
        // editUrl: base_url + 'publikasi_dosen/listpub',
        // deleteUrl: base_url + 'anggota/delete',
        access: { add: false, edit: false, delete: false, refresh: true },
        cols: [
            /* No */
            {
                    className: "text-center",
                    sortable: false,
                    width: '30px',
                    render: function(data, type, full, meta){
                        return meta.row + 1 + meta.settings._iDisplayStart;
                    }
               },
            /* nama jurnal - 1 */
            { className : 'judulJurnal' , 'visible':    true },
            /* jumlah - 2 */
            { 'visible':    true }
        ],
        filters: [],
        additionalInput: 
            [{id:'filter_fakultas', submittedName:'filter_fakultas'},
            {id:'filter_jurusan', submittedName:'filter_jurusan'},
            {id:'filter_tahun', submittedName:'filter_tahun'},
            {id:'filter_keterangan', submittedName:'filter_keterangan'}],
        orders: [[2, 'desc']],
        validation: {},
        selectCallback: function(clicked_data, options){
            // get data
            $('input[name="journalName"]').val(clicked_data[0]);
            $('#hiddenSubmit').click();

        }
    });

});