var currentIndex = 0;
var jmlAnggota = 0;
var anggota = {};
var flag_pegawai;

function showPegawai(flag, index)
{
	flag_pegawai = flag;
	$("#lookup-pegawai").modal("show");
	$("#master-pegawai .table-page").show();
	currentIndex = index;
}

$("#peg_name").click(function(){
	showPegawai(0, 0);
});

//menambah anggota publikasi di view
function addNewAnggota(ang_id, peg_id, peg_name, ang_sebagai){
	
	jmlAnggota++;
	$("#ol-anggota").append('<li id="li_'+jmlAnggota+'"><div id="row_'+jmlAnggota+'" class="row" style="margin-bottom:10px">'+
		'<div class="col-md-5">'+
				'<input id="ang_pegawai_'+jmlAnggota+'" readonly type="text" class="form-control" value="'+peg_name+'" />'+
		'</div>'+
		'<div class="col-md-4">'+
			'<a class="btn red" onclick="javascript:showPublikasiDosen('+jmlAnggota+')">'+
				'Lihat Daftar Publikasi'+
			'</a>'+
		'</div>'+
	'</div></li>');
	newAnggota = {
		id : ang_id,
		peg_id : peg_id,
		ang_sebagai : ang_sebagai
	};

	anggota[jmlAnggota]= newAnggota;
}

//function untuk membuka link publikasi dosen dengan filter dosen
function showPublikasiDosen(index){
	var pegawai_id = anggota[index].peg_id;
	window.location = base_url + "publikasi_dosen?pegawai=" + pegawai_id;
}

//menghapus anggota dari view kemudian mengupdate json
function removeAnggota(index){
	delete anggota[index];
	$("#row_"+index).remove();
	updateJsonAnggota();
	show_alert(mp_lang['success'], "Anggota publikasi berhasil dihapus.", false);
}

//menghapus data anggota dari db (kalo sudah terimpan)
function delAnggota(index){
	if(confirm("Apakah Anda yakin ingin menghapus data tersebut? Data yang sudah dihapus tidak dapat disimpan ulang.")){
		//belum tersimpan di db
		if(anggota[index].id == -1){
			removeAnggota(index);
			return;
		}

		//hapus dari db
		WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		ajaxExtend({
	        url: base_url + 'publikasi_dosen/delete_anggota' ,
	        data: {ang_id : anggota[index].id},
	        success: function(resp){
	        	if(resp.status == 'ok'){
					removeAnggota(index);
				}
				else{
					show_alert(mp_lang['error'], resp.message, true);	
				}
				WebTemplate.unblockUI("#master-page");
	        },
	        error: function(resp){
	        	show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
	        	WebTemplate.unblockUI("#master-page");
	        }
	    });
	}
}

function updateSebagai(index){
	anggota[index].ang_sebagai = $("#ang_sebagai_"+index).val();
	updateJsonAnggota();
}

function updateJsonAnggota(){
	$("#anggota_publikasi").val(JSON.stringify(anggota));
}

function addNewCitation(number, tahun, jumlah){
	$("#table-citation>tbody").append(""+
		"<tr>"+
		"<td>"+number+"</td>"+
		"<td>"+tahun+"</td>"+
		"<td>"+jumlah+"</td>"+
		"</tr>");
}

$(document).ready(function(){
	$('#master-page .table-page').show();

	$('.date-picker').datepicker({
		format: "dd-mm-yyyy",
        orientation: "left",
        autoclose: true
    });
  //   var group = $("ol.ol-anggota").sortable({
  //   	group: 'ol-dosen',
  // 		handle: 'i.fa-arrows',
  // 		onDrop: function ($item, container, _super) {
  // 			var data = group.sortable("serialize").get();

		//     var jsonString = JSON.stringify(data, null, ' ');

		//     console.log(jsonString);
		//     _super($item, container);
		//   },
		// serialize: function (parent, children, isContainer) {
		// 	var row = parent.attr("id");
		// 	row = row.substr(3);
		// 	console.log($("#ang_pegawai_"+row).val()+"");
		// 	return isContainer ? children.join() : $("#ang_pegawai_"+row).val()+"";
		//     // return isContainer ? children.join() : parent.text();
		//   },
  //   });
	$('#master-page').masterPage({
		primaryKey: 'pub_id',
		detailFocusId: 'pub_id',
		dataUrl: base_url + 'publikasi_dosen/get_datamaster',
		detailUrl: base_url + 'publikasi_dosen/detail',
		addUrl: base_url + 'publikasi_dosen/add',
		editUrl: base_url + 'publikasi_dosen/edit',
		deleteUrl: base_url + 'publikasi_dosen/delete',
		access: {add: false, edit: true, delete: false, refresh: true},
		cols: [
				/* pub_id - 0*/
				{
					className: "text-center",
					sortable: false,
					width: '30px',
					render: function(data, type, full, meta){
						return meta.row + 1 + meta.settings._iDisplayStart;
					}
			   },
			/* dkp_kode - 1 */
			{ visible:    false,
			  render: function(data, type, full, meta){
			  			return full[29];
					}
			},
			/* pub_kode - 2 */
			{ visible:    false },
			/* pub_url_scholar - 3 */
			{ visible:    false },
			/* pub_jenis_peneliti - 4 */
			{ visible:    false },
			/* pub_media_publikasi - 5 */
			{ visible:    false },
			/* pub_pelaksanaan_penelitian - 6 */
			{ visible:    false },
			/* pub_jenis_pembiayaan - 7 */
			{ visible:    false },
			/* pub_status_validasi - 8 */
			{ visible:    false },
			/* pub_periode_pelaporan - 9 */
			{ visible:    false },
			/* pub_kode_pegawai - 10 */
			{ visible:    false },
			/* pub_jumlah_pembiayaan - 11 */
			{ visible:    false },
			/* pub_tahun - 12 */
			{ 
				visible:    true,
				render: function(data, type, full, meta){
					if(data != 0)
						return data;
					else if(data == 0)
						return "";
					else
						return "";
				} 
			},
			/* pub_bulan - 13 */
			{ visible:    false },
			/* pub_judul - 14 */
			{ 
				visible:  true,
				sortable: true
			},
			/* pub_kata_kunci - 15 */
			{ visible:    false },
			/* pub_total_waktu - 16 */
			{ visible:    false },
			/* pub_lokasi - 17 */
			{ visible:    false },
			/* pub_abstraksi - 18 */
			{ visible:    false },
			/* pub_pengarang - 19 */
			{ visible:    true },
			/* pub_keterangan - 20 */
			{ 
				visible:    true,
				sortable: false
			},
			/* pub_tanggal_mulai - 21 */
			{ 
				visible:    false,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* pub_tanggal_selesai - 22 */
			{
				visible:    false,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* pub_url_unduh - 23 */
			{ visible:    false },
			/* pub_duplicate - 24 */
			{ visible:    false },
			/* pub_rank_value - 25 */
			{ visible:    false },
			/* pub_created_at - 26 */
			{
				visible:    true,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* pub_updated_at - 27 */
			{
				visible:    false,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* pub_deleted_at - 28 */
			{
				visible:    false,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* dkp_keterangan - 29 */
			{ visible:    false },
			/* pub_status_tarik - 30 */
			{ 
				visible:    true,
				render: function(data, type, full, meta){
					if(data == 1)
						return "<p style='text-align:center'><i class='fa fa-check fa-lg'></i></p>"
					else
						return "";
				}
			}
		],
		filters: [],
		additionalInput: 
			[{id:'filter_detil_kode_publikasi', submittedName:'pub_detilkodepub'},
			{id:'filter_pegawai', submittedName:'pub_pegawai'},
			{id:'filter_startyear', submittedName:'pub_startyear'},
			{id:'filter_endyear', submittedName:'pub_endyear'},
			{id:'filter_tarik', submittedName:'pub_status_tarik'}],
		orders: [[26, 'desc']],
		validation: {pub_id: {digits: true},
			pub_detilkodepub: {digits: true},
			pub_kode: {maxlength: 255},
			pub_url_scholar: {maxlength: 255},
			pub_jenis_peneliti: {maxlength: 1},
			pub_media_publikasi: {maxlength: 1},
			pub_pelaksanaan_penelitian: {maxlength: 1},
			pub_jenis_pembiayaan: {maxlength: 1},
			pub_status_validasi: {maxlength: 255},
			pub_periode_pelaporan: {maxlength: 255},
			pub_kode_pegawai: {maxlength: 255},
			pub_jumlah_pembiayaan: {number: true},
			pub_tahun: {digits: true},
			pub_bulan: {digits: true},
			pub_judul: {},
			pub_kata_kunci: {maxlength: 255},
			pub_total_waktu: {digits: true},
			pub_lokasi: {maxlength: 255},
			pub_abstraksi: {},
			pub_pengarang: {maxlength: 255},
			pub_keterangan: {},
			pub_url_unduh: {maxlength: 255},
			pub_duplicate: {digits: true},
			pub_rank_value: {digits: true}},
		fillFormCallback: function(data, options){
			// if(data.pub_tanggal_selesai != null)
			// 	$("#pub_tanggal_selesai").val(
			// 		$.datepicker.formatDate('dd-mm-yy', new Date(data.pub_tanggal_selesai.split(" ")[0]))
			// 	);
			// if(data.pub_tanggal_mulai != null)
			// 	$("#pub_tanggal_mulai").val(
			// 		$.datepicker.formatDate('dd-mm-yy', new Date(data.pub_tanggal_mulai.split(" ")[0]))
			// 	);
			anggota = {};
			$("#ol-anggota").html("");
			for(i in data.anggota)
			{
				addNewAnggota(data.anggota[i].ang_id, data.anggota[i].ang_pegawai, data.anggota[i].peg_name, data.anggota[i].ang_sebagai);
			}

			$("#table-citation>tbody").html("");
			var number = 1;
			//console.log(data.citation);
			for(i in data.citation)
			{
				addNewCitation(number++, data.citation[i].cit_tahun, data.citation[i].cit_jumlah);
			}
			updateJsonAnggota();
			$("#link_pub_url_scholar").attr("href",data.pub_url_scholar);
		},
		addAfterResetCallback: function(options)
		{
			anggota = {};
			$("#ol-anggota").html("");
		}
	});

	//popup master pegawai
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

			if (flag_pegawai == 0)
			{
				$("#peg_name").val(clicked_data[19]);
				$("#filter_pegawai").val(clicked_data[0]);
			}
			else if (flag_pegawai == 1)
			{
				$("#ang_pegawai_"+currentIndex).val(clicked_data[19]);
				anggota[currentIndex].peg_id = clicked_data[0];

				updateJsonAnggota();	
			}

			$("#lookup-pegawai").modal("hide");
		}
	});

	$('#btn_reset').click(function() {
		$('#filter_detil_kode_publikasi').prop('selectedIndex', 0);
		$('#peg_name').val('');
		$('#filter_pegawai').val('');
		$('#filter_tahun').val('');
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	});

	if(pegawai != -1)
	{
		$('#peg_name').val(pegawai_name);
		$('#filter_pegawai').val(pegawai);
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	}

	if(status_tarik != -1)
	{
		$('#filter_tarik').val(status_tarik);
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	}

	$("#btn-download").click(function(){
		var kode_pub = $("#filter_detil_kode_publikasi").val();
		var startyear = $("#filter_startyear").val();
		var endyear = $("#filter_endyear").val();
		var pengarang = $("#filter_pegawai").val();
		var search = $(".dataTables_filter input").val();
        window.location.href = base_url + "publikasi_dosen/download?kode_pub="+kode_pub+
        						"&startyear="+startyear+"&endyear="+endyear+"&pengarang="+pengarang+"&search="+search;
    });

    $(".mask-integer").inputmask('integer',  { rightAlign: false });
});

