var jum_fakultas = 0;
var flag_pegawai = 0; // 0 = filter, 1 = edit


function showModalPegawai(_flag)
{
	flag_pegawai = _flag;
	$("#lookup-pegawai-anggota").modal("show");
}

$("#peg_name").click(function(){
	showModalPegawai(0);
});

// copied from publikasi_dosen.js
var jmlAnggota = 0;
var anggota = {};

function showPublikasiDosen(index){
	var pegawai_id = anggota[index].peg_id;
	window.location = base_url + "publikasi_dosen?pegawai=" + pegawai_id;
}

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

function addNewCitation(number, tahun, jumlah){
	$("#table-citation>tbody").append(""+
		"<tr>"+
		"<td>"+number+"</td>"+
		"<td>"+tahun+"</td>"+
		"<td>"+jumlah+"</td>"+
		"</tr>");
}
//---

$(document).ready(function(){
	$('#master-page .table-page').hide();

	$('#master-page-anggota').masterPage({
		primaryKey: 'pub_id',
		detailFocusId: 'pub_id',
		dataUrl: base_url + 'anggota/get_datamaster',
		detailUrl: base_url + 'publikasi_dosen/detail',
		addUrl: base_url + 'publikasi_dosen/add',
		editUrl: base_url + 'publikasi_dosen/edit',
		deleteUrl: base_url + 'anggota/delete',
		access: { add: false, edit: true, delete: false, refresh: true },
		cols: [
				/* pub_id - 0*/
				{
					sortable: false,
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return meta.row + 1 + meta.settings._iDisplayStart;//'<input type="checkbox" name="ang_id[]" value="'+ data +'"/>';
					}
			   },
			/* pub_tahun - 1 */
			{ visible:    true },
			/* pub_judul - 2 */
			{ visible:    true,
				render: function(data, type, full, meta){
						return data + '<br />(Pengarang: ' + full[9] + ')';//'<input type="checkbox" name="ang_id[]" value="'+ data +'"/>';
					}
			},
			/* dkp_keterangan - 3 */
			{ visible:    true },
			/* pub_keterangan - 4 */
			{ visible:    true },
			/* peg_name - 5 */
			{ visible:    true },
			/* ang_sebagai - 6 */
			{ visible:    true },
			/* peg_fakultas - 7 */
			{ visible:    false },
			/* peg_jurusan - 8 */
			{ visible:    false },
			/* pub_pengarang - 9 */
			{ visible:    false }
		],
		filters: [],
		additionalInput : [{id:'filter_pegawai', submittedName:'ang_pegawai'},
			{id:'filter_fakultas', submittedName:'peg_fakultas'},
			{id:'filter_jurusan', submittedName:'peg_jurusan'},
			{id:'filter_judul', submittedName:'pub_judul'},
			{id:'filter_startyear', submittedName:'pub_startyear'},
			{id:'filter_endyear', submittedName:'pub_endyear'},
			{id:'filter_detil_kode_publikasi', submittedName:'pub_detilkodepub'}],
		orders: [[1, 'desc']],
		validation: {ang_id: {digits: true},
			ang_pegawai: {digits: true},
			ang_publikasi: {digits: true},
			ang_sebagai: {maxlength: 25}
		},
		fillFormCallback: function(data, options) {
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
			$("#link_pub_url_scholar").attr("href",data.pub_url_scholar);
		},
		cancelCallback: function(){
			$('#master-page .table-page').hide();
		}
	});

	$(document.body).on('change', '#filter_startyear', function(element) {
		var yearnow = $("#filter_startyear").val();
		$('#filter_endyear').html('');

		$('#filter_startyear option').each(function() { 
		    var val = $(this).attr('value');
		    var text = $(this).text();

		   	if (yearnow == "" || yearnow <= val)
		   	{
		   		$('#filter_endyear').append('<option value="' + val + '">' + text + '</option>');
		   	}
		});

		$('#filter_endyear').trigger('change');
	});

	$(document.body).on('change', '#filter_fakultas', function(element) {
		var faknow = $("#filter_fakultas").val();
		$('#filter_jurusan').html('');

		$('#filter_jurusan').append('<option value="">Semua</option>');	

		for (i in jurusan)
		{
			if (faknow == "" || jurusan[i].jur_fakultas == faknow)
			{
				$('#filter_jurusan').append('<option value="' + jurusan[i].jur_id + '">' + jurusan[i].jur_nama_indonesia + '</option>');		
			}
		}

		$('#filter_jurusan').trigger('change');
	});

	$('#master-pegawai-anggota').masterPage({
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
			/* fak_nama_indonesia - 34 */
			{ visible: true },
			/* jur_nama_indonesia - 35 */
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
			else
			{
				$("#ang_pegawai_name").val(clicked_data[19]);
				$("#ang_pegawai").val(clicked_data[0]);
			}

			$("#lookup-pegawai-anggota").modal("hide");
			
		}
	});

	$('#btn_reset').click(function() {
		$('#peg_name').val('');
		$('#filter_pegawai').val('');
		$('#filter_judul').val('');
		$('#filter_startyear').val('');
		$('#filter_endyear').val('');

		$('#filter_fakultas').prop('selectedIndex', 0);
		$('#filter_fakultas').trigger('change');

		$('#filter_jurusan').prop('selectedIndex', 0);
		$('#filter_jurusan').trigger('change');
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page-anggota');
		masterPage.refreshData();
	});

	$(".mask-integer").inputmask('integer',  { rightAlign: false });
});
