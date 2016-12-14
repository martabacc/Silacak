function showModalPegawai()
{
	$("#lookup-pegawai").modal("show");
}
$("#peg_name").click(function(){
	showModalPegawai();
});


importPengarang = function(){
        var selected_file = $('#file-input').get(0).files[0];
        var text;
        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            text = e.target.result;
            data = $.csv.toArrays(text);
            ajaxExtend({
                url: "pegawai/import_data/",
                data : { 'data' : data },
                success: function(data)
                {
			if(data.status == 'ok')
                    {
						$('#form-import-pengarang').modal('hide');
                    }
                    else
                    {
                        alert(data.message);
                    }

                },
                error: function(res)
                {
			$('#form-import-pengarang').modal('hide');                   
                },
                dataType : 'json'
            });
          };
        })(selected_file);

        if(selected_file.name.match(/\.csv$/gi)==".csv")
        {
            reader.readAsText(selected_file);
        }
        else
        {
            $.showError("File harus bertipe csv.");
        }
    }

$(document).ready(function(){

	if(pegawai != '-1'){
		$("#peg_id").val(pegawai.peg_id);
		$("#peg_name").val(pegawai.peg_name);
		$("#peg_email").val(pegawai.peg_email);
		$("#peg_google_schoolar").val(pegawai.peg_google_schoolar);
		$("#link_peg_google_scholar").attr("href",pegawai.peg_google_schoolar);
	}
	var validation = {
		peg_email: {maxlength: 255, email: true},
		peg_confirm_email: {equalTo: "#peg_email"},
		peg_google_schoolar: {maxlength: 255}
	};
	var validatorObj = $(".form-detail").validate(
				                {
				                    ignore: '',
				                    ignoreTitle: true,
				                    errorElement: 'span',
				                    errorClass: 'help-block help-block-error masterpage-error',
				                    invalidHandler: function (event, validator) {
				                        show_alert(mp_lang['error'], mp_lang['error_form']);
				                    },
				                    errorPlacement: function (error, element) {
				                        $(element).parents('.input-placement').append(error);
				                    },
				                    highlight: function (element) {
				                        $(element).closest('.form-group').addClass('has-error');
				                    },
				                    unhighlight: function (element) {
				                        $(element).closest('.form-group').removeClass('has-error');
				                    },
				                    success: function (label, element) {
				                        label.closest('.form-group').removeClass('has-error');
				                    },
				                    rules: validation
				                }
				            );
	$("#btn-show").click(function(){

		if(validatorObj.form()){

			WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		
            var posted_data = serialize_form(".form-detail");

            console.log(posted_data);
            ajaxExtend({
                url:  base_url + 'pegawai/edit',
                data: posted_data,
                success: function(resp){
                    WebTemplate.unblockUI("#master-page");
                    if(resp.status == 'ok'){
                        show_alert(mp_lang['success'], concat_message(mp_lang['info_edit'], resp.message), false);

                    }else if(resp.status == 'expired'){
                        document.location = resp.message;
                    }else{
                        show_alert(mp_lang['error'], concat_message(mp_lang['error_edit'], resp.message));
                    }
                },
                error: function(resp){
	        		show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
                	WebTemplate.unblockUI("#master-page");
                }
            });
		}

	});
	$('#master-pegawai').masterPage({
		primaryKey: 'peg_id',
		detailFocusId: 'peg_id',
		dataUrl: base_url + 'pegawai/get_datamaster',
		detailUrl: base_url + 'pegawai/detail',
		addUrl: base_url + 'pegawai/add',
		editUrl: base_url + 'pegawai/edit',
		deleteUrl: base_url + 'pegawai/delete',
		access: { add: false, edit: false, delete: false, refresh: false },
		cols: [
			/* peg_id - 0*/
			{ 
				sortable: false,
				className: "text-center",
				width: '30px',
				render: function(data, type, full, meta){
					return meta.row + 1 + meta.settings._iDisplayStart;
				}
			},
			/* fak_perguruan_tinggi - 1 */
			{ visible:    false },
			/* jur_perguruan_tinggi - 2 */
			{ visible:    false },
			/* peg_program_studi - 3 */
			{ visible:    false },
			/* peg_jenjang_pendidikan - 4 */
			{ visible:    false },
			/* peg_satuan_kerja - 5 */
			{ visible:    false },
			/* peg_ikatan_kerja_pegawai - 6 */
			{ visible:    false },
			/* peg_status_aktivitas_pegawai - 7 */
			{ visible:    false },
			/* peg_jenis_pegawai - 8 */
			{ visible:    false },
			/* peg_jenis_dosen - 9 */
			{ visible:    false },
			/* peg_pangkat_pns - 10 */
			{ visible:    false },
			/* peg_jenis_kelamin - 11 */
			{ visible:    false },
			/* peg_provinsi - 12 */
			{ visible:    false },
			/* peg_kota - 13 */
			{ visible:    false },
			/* peg_kode_validasi - 14 */
			{ visible:    false },
			/* peg_log_audit - 15 */
			{ visible:    false },
			/* peg_nip_baru - 16 */
			{ visible:    false },
			/* peg_nip_lama - 17 */
			{ visible:    false },
			/* peg_nidn - 18 */
			{ visible:    false },
			/* peg_name - 19 */
			{ visible:    true },
			/* peg_gelar_depan - 20 */
			{ visible:    false },
			/* peg_gelar_belakang - 21 */
			{ visible:    false },
			/* peg_alamat - 22 */
			{ visible:    false },
			/* peg_telepon - 23 */
			{ visible:    false },
			/* peg_handphone - 24 */
			{ visible:    false },
			/* peg_email - 25 */
			{ visible:    false },
			/* peg_tanggal_berhenti - 26 */
			{ visible:    false },
			/* peg_tanggal_masuk - 27 */
			{ visible:    false },
			/* peg_is_dosen - 28 */
			{ visible:    false },
			/* peg_google_schoolar - 29 */
			{ visible:    false },
			/* peg_penelitian - 30 */
			{ visible:    false },
			/* peg_created_at - 31 */
			{ visible:    false },
			/* peg_updated_at - 32 */
			{ visible:    false },
			/* peg_deleted_at - 33 */
			{ visible:    false },
			/* fak_nama_indonesia - 44 */
			{ visible: true },
			/* jur_nama_indonesia - 45 */
			{ visible: true }
		],
		filters: [],
		orders: [[23, 'asc']],
		validation: {},
		selectCallback: function(clicked_data, options){
			$("#peg_id").val(clicked_data[0]);
			$("#peg_name").val(clicked_data[19]);
			$("#peg_email").val(clicked_data[25]);
			$("#peg_google_schoolar").val(clicked_data[29]);
			$("#lookup-pegawai").modal("hide");
			$("#link_peg_google_scholar").attr("href",clicked_data[29]);
		}
	});
	$("#btn-show-impor").click(function(){
		$("#form-import-pengarang").modal("show");
	});

    $("#btn-import").click(function(){
    	importPengarang();
    });
});
