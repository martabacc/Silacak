$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'lab_id',
		detailFocusId: 'lab_id',
		dataUrl: base_url + 'laboratorium_penelitian/get_datamaster',
		detailUrl: base_url + 'laboratorium_penelitian/detail',
		addUrl: base_url + 'laboratorium_penelitian/add',
		editUrl: base_url + 'laboratorium_penelitian/edit',
		deleteUrl: base_url + 'laboratorium_penelitian/delete',
		cols: [
				/* lab_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="lab_id[]" value="'+ data +'"/>';
					}
			   },
			/* lab_kode - 1 */
			{ visible:    true },
			/* lab_perguruan_tinggi - 2 */
			{ visible:    true },
			/* lab_fakultas - 3 */
			{ visible:    true },
			/* lab_jurusan - 4 */
			{ visible:    true },
			/* lab_program_studi - 5 */
			{ visible:    true },
			/* lab_validasi - 6 */
			{ visible:    true },
			/* lab_log_audit - 7 */
			{ visible:    true },
			/* lab_nama_indonesia - 8 */
			{ visible:    true },
			/* lab_nama_inggris - 9 */
			{ visible:    true },
			/* lab_periode_pelaporan - 10 */
			{ visible:    true },
			/* lab_jumlah_aktifitas - 11 */
			{ visible:    true },
			/* lab_created_at - 12 */
			{ visible:    true },
			/* lab_updated_at - 13 */
			{ visible:    true },
			/* lab_deleted_at - 14 */
			{ visible:    true }
		],
		filters: [],
		orders: [[0, 'desc']],
		validation: {lab_id: {digits: true},
			lab_kode: {maxlength: 255},
			lab_perguruan_tinggi: {maxlength: 255},
			lab_fakultas: {maxlength: 255},
			lab_jurusan: {maxlength: 255},
			lab_program_studi: {maxlength: 255},
			lab_validasi: {maxlength: 255},
			lab_log_audit: {maxlength: 255},
			lab_nama_indonesia: {maxlength: 255},
			lab_nama_inggris: {maxlength: 255},
			lab_periode_pelaporan: {maxlength: 255},
			lab_jumlah_aktifitas: {digits: true},
			lab_created_at: {required: true},
			lab_updated_at: {required: true},
			lab_deleted_at: {required: true}}
	});
});
