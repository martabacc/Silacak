$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'adm_id',
		detailFocusId: 'adm_id',
		dataUrl: base_url + 'log_admin/get_datamaster',
		detailUrl: base_url + 'log_admin/detail',
		addUrl: base_url + 'log_admin/add',
		editUrl: base_url + 'log_admin/edit',
		deleteUrl: base_url + 'log_admin/delete',
		access: {add: false, edit: false, delete: false, refresh: false},
		cols: [
				/* adm_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="adm_id[]" value="'+ data +'"/>';
					}
			   },
			/* usr_username - 1 */
			{ visible:    true },
			/* adm_tanggal - 2 */
			{ visible:    true },
			/* adm_aktivitas - 3 */
			{ visible:    true },
			/* adm_keterangan - 4 */
			{ visible:    true }
		],
		filters: [{id:'filter_pengguna', submittedName:'adm_pengguna'}],
		orders: [[0, 'desc']],
		validation: {adm_id: {digits: true},
			adm_pengguna: {digits: true},
			adm_tanggal: {valid_datetime: true},
			adm_aktivitas: {maxlength: 100},
			adm_keterangan: {}}
	});
});
