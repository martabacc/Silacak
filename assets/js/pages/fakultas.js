$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'fak_id',
		detailFocusId: 'fak_id',
		dataUrl: base_url + 'fakultas/get_datamaster',
		detailUrl: base_url + 'fakultas/detail',
		addUrl: base_url + 'fakultas/add',
		editUrl: base_url + 'fakultas/edit',
		deleteUrl: base_url + 'fakultas/delete',
		cols: [
				/* fak_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="fak_id[]" value="'+ data +'"/>';
					}
			   },
			/* fak_perguruan_tinggi - 1 */
			{ visible:    true },
			/* fak_status_validasi - 2 */
			{ visible:    true },
			/* fak_log_audit - 3 */
			{ visible:    true },
			/* fak_singkatan - 4 */
			{ visible:    true },
			/* fak_nama_indonesia - 5 */
			{ visible:    true },
			/* fak_nama_inggris - 6 */
			{ visible:    true },
			/* fak_dosen_kepala - 7 */
			{ visible:    true },
			/* fak_tanggal_mulai_efektif - 8 */
			{ visible:    true },
			/* fak_tanggal_akhir_efektif - 9 */
			{ visible:    true },
			/* fak_deleted_at - 10 */
			{ visible:    true },
			/* fak_created_at - 11 */
			{ visible:    true },
			/* fak_updated_at - 12 */
			{ visible:    true }
		],
		filters: [],
		orders: [[0, 'desc']],
		validation: {fak_id: {maxlength: 3},
			fak_perguruan_tinggi: {maxlength: 6},
			fak_status_validasi: {maxlength: 2},
			fak_log_audit: {maxlength: 2},
			fak_singkatan: {maxlength: 10},
			fak_nama_indonesia: {maxlength: 100},
			fak_nama_inggris: {maxlength: 100},
			fak_dosen_kepala: {maxlength: 18},
			fak_tanggal_mulai_efektif: {maxlength: 255},
			fak_tanggal_akhir_efektif: {maxlength: 255},
			fak_deleted_at: {valid_datetime: true},
			fak_created_at: {valid_datetime: true},
			fak_updated_at: {valid_datetime: true}}
	});
});
