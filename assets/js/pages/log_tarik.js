$(document).ready(function(){
	$('.date-picker').datepicker({
		format: "dd-mm-yyyy",
        orientation: "left",
        autoclose: true
    });

	$('#master-page').masterPage({
		primaryKey: 'tar_id',
		detailFocusId: 'tar_id',
		dataUrl: base_url + 'log_tarik/get_datamaster',
		detailUrl: base_url + 'log_tarik/detail',
		addUrl: base_url + 'log_tarik/add',
		editUrl: base_url + 'log_tarik/edit',
		deleteUrl: base_url + 'log_tarik/delete',
		access: { add: false, edit: false, delete: false, refresh: true},
		cols: [
			/* tar_id - 0*/
			{
				sortable: false,
				className: "text-center",
				width: '30px',
				render: function(data, type, full, meta){
					return meta.row + 1 + meta.settings._iDisplayStart;
				}
		   	},
			/* tar_jenis - 1 */
			{ visible:    true },
			/* tar_tanggal - 2 */
			{ 	visible:    true,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* tar_keterangan - 3 */
			{ visible:    true },
			/* tar_status - 4 */
			{ visible:    true }
		],
		filters: [],
		additionalInput: [{id:'filter_startdate', submittedName:'tar_startdate'},
			{id:'filter_enddate', submittedName:'tar_enddate'},
			{id:'filter_keterangan', submittedName:'tar_keterangan'}],
		orders: [[1, 'desc']],
		validation: {},
	});

	$('#btn_reset').click(function() {
		$('#filter_startdate').datepicker('setDate', null);
		$('#filter_enddate').datepicker('setDate', null);
		$('#filter_keterangan').prop('selectedIndex', 0);
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	});
});
