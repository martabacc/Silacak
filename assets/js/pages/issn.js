$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'issn_id',
		detailFocusId: 'issn_id',
		dataUrl: base_url + 'issn/getdatamaster',
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
			/* issn-title - 1 */
			{ visible:    true },
			/* issn-number - 2 */
			{ visible:    true },
		],
		filters: [{id:'filter_fakultas', submittedName:'jur_fakultas'}],
		orders: [[0, 'desc']],
		validation: {jur_id: {maxlength: 3},
			issn_title: {maxlength: 6},
			issn_number: {maxlength: 3}
		}
	});
});
