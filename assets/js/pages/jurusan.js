$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'jur_id',
		detailFocusId: 'jur_id',
		dataUrl: base_url + 'jurusan/get_datamaster',
		detailUrl: base_url + 'jurusan/detail',
		addUrl: base_url + 'jurusan/add',
		editUrl: base_url + 'jurusan/edit',
		deleteUrl: base_url + 'jurusan/delete',
		cols: [
				/* jur_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="jur_id[]" value="'+ data +'"/>';
					}
			   },
			/* jur_perguruan_tinggi - 1 */
			{ visible:    true },
			/* fak_perguruan_tinggi - 2 */
			{ visible:    true },
			/* jur_status_validasi - 3 */
			{ visible:    true },
			/* jur_log_audit - 4 */
			{ visible:    true },
			/* jur_nama_indonesia - 5 */
			{ visible:    true },
			/* jur_nama_inggris - 6 */
			{ visible:    true },
			/* jur_dosen_kepala - 7 */
			{ visible:    true },
			/* jur_created_at - 8 */
			{ visible:    true },
			/* jur_updated_at - 9 */
			{ visible:    true },
			/* jur_deleted_at - 10 */
			{ visible:    true },
			/* jur_periode_pelaporan - 11 */
			{ visible:    true }
		],
		filters: [{id:'filter_fakultas', submittedName:'jur_fakultas'}],
		orders: [[0, 'desc']],
		validation: {jur_id: {maxlength: 3},
			jur_perguruan_tinggi: {maxlength: 6},
			jur_fakultas: {maxlength: 3},
			jur_status_validasi: {maxlength: 2},
			jur_log_audit: {maxlength: 2},
			jur_nama_indonesia: {maxlength: 100},
			jur_nama_inggris: {maxlength: 100},
			jur_dosen_kepala: {maxlength: 18},
			jur_created_at: {valid_datetime: true},
			jur_updated_at: {valid_datetime: true},
			jur_deleted_at: {valid_datetime: true},
			jur_periode_pelaporan: {maxlength: 255}}
	});
});
