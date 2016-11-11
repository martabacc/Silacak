$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'issn_id',
		detailFocusId: 'issn_id',
		dataUrl: base_url + 'issn/getdatamaster',
		// detailUrl: base_url + 'jurusan/detail',
		addUrl: base_url + 'issn/add_data',
		editUrl: base_url + 'issn/edit',
		deleteUrl: base_url + 'issn/delete',
		cols: [
				/* jur_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="issn_id[]" value="'+ data +'"/>';
					}
			   },
			/* issn-title - 1 */
			{ visible:    true }
		],
		filters: [{id:'filter_fakultas', submittedName:'jur_fakultas'}],
		orders: [[0, 'desc']],
		validation: {
			issn_title: {maxlength: 255}
		}
	});
});
