$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'dkp_id',
		detailFocusId: 'dkp_id',
		dataUrl: base_url + 'detil_kode_publikasi/get_datamaster',
		detailUrl: base_url + 'detil_kode_publikasi/detail',
		addUrl: base_url + 'detil_kode_publikasi/add',
		editUrl: base_url + 'detil_kode_publikasi/edit',
		deleteUrl: base_url + 'detil_kode_publikasi/delete',
		cols: [
				/* dkp_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="dkp_id[]" value="'+ data +'"/>';
					}
			   },
			/* dkp_kode - 1 */
			{ visible:    true },
			/* dkp_keterangan - 2 */
			{ visible:    true }
		],
		filters: [],
		orders: [[0, 'desc']],
		validation: {dkp_id: {digits: true},
			dkp_kode: {maxlength: 2},
			dkp_keterangan: {maxlength: 255}}
	});
});
