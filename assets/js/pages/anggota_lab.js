$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'alb_id',
		detailFocusId: 'alb_id',
		dataUrl: base_url + 'anggota_lab/get_datamaster',
		detailUrl: base_url + 'anggota_lab/detail',
		addUrl: base_url + 'anggota_lab/add',
		editUrl: base_url + 'anggota_lab/edit',
		deleteUrl: base_url + 'anggota_lab/delete',
		cols: [
				/* alb_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="alb_id[]" value="'+ data +'"/>';
					}
			   },
			/* peg_perguruan_tinggi - 1 */
			{ visible:    true },
			/* lab_kode - 2 */
			{ visible:    true },
			/* alb_status_ketua - 3 */
			{ visible:    true },
			/* alb_periode_aktif - 4 */
			{ visible:    true }
		],
		filters: [{id:'filter_pegawai', submittedName:'alb_pegawai'},
			{id:'filter_laboratorium_penelitian', submittedName:'alb_laboratorium'}],
		orders: [[0, 'desc']],
		validation: {alb_id: {digits: true},
			alb_pegawai: {digits: true},
			alb_laboratorium: {digits: true},
			alb_status_ketua: {maxlength: 1},
			alb_periode_aktif: {maxlength: 255}}
	});
});
