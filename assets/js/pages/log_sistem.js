$(document).ready(function(){
	$('.date-picker').datepicker({
		format: "dd-mm-yyyy",
        orientation: "left",
        autoclose: true
    });

	$('#master-page').masterPage({
		primaryKey: 'log_id',
		detailFocusId: 'log_id',
		dataUrl: base_url + 'log_sistem/get_datamaster',
		detailUrl: base_url + 'log_sistem/detail',
		addUrl: base_url + 'log_sistem/add',
		editUrl: base_url + 'log_sistem/edit',
		deleteUrl: base_url + 'log_sistem/delete',
		access: { add: false, edit: false, delete: false, refresh: true},
		cols: [
			/* log_id - 0*/
			{
				sortable: false,
				className: "text-center",
				width: '30px',
				render: function(data, type, full, meta){
					return meta.row + 1 + meta.settings._iDisplayStart;
				}
		   	},
			/* log_tanggal - 1 */
			{ 	visible:    true,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				}
			},
			/* log_aktivitas - 2 */
			{ visible:    true },
			/* log_pegawai - 3 */
			{ visible:    false },
			/* peg_name - 4 */
			{ visible:    true },
			/* peg_google_scholar - 5 */
			{ visible:    true },
			/* log_data - 6 */
			{ visible:    true },
			/* log_keterangan - 7 */
			{ visible:    true }
		],
		filters: [],
		additionalInput: [{id:'filter_startdate', submittedName:'log_startdate'},
			{id:'filter_enddate', submittedName:'log_enddate'},
			{id:'filter_keterangan', submittedName:'log_keterangan'}],
		orders: [[1, 'desc']],
		validation: {log_id: {digits: true},
			log_tanggal: {required: true,valid_datetime: true},
			log_aktivitas: {required: true,maxlength: 255},
			log_data: {digits: true},
			log_keterangan: {maxlength: 1000}},
		selectCallback: function(clicked_data, options){
			if(clicked_data[7].indexOf("Gagal") == -1)
				window.location = base_url + "publikasi_dosen?pegawai=" + clicked_data[3];
			else
				window.location = base_url + "pegawai?pegawai=" + clicked_data[3];
		},
		fnRowCallback: function( nRow, aData ) {
		  var id = aData[7]; // ID is returned by the server as part of the data
		  var $nRow = $(nRow); // cache the row wrapped up in jQuery
		  if (id.indexOf('Gagal') === 0) { // verify
		    $nRow.css({"background-color":"red", "color":"white"})
		  }
		  return nRow
		},
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

    $("#btn-download-sukses").click(function(){
        window.location.href = base_url + "log_sistem/download_sukses/"+$("#filter-periode").val();
    });
    $("#btn-download").click(function(){
        window.location.href = base_url + "log_sistem/download_gagal_tarik/"+$("#filter-periode").val();
    });
    $("#btn-download-kosong").click(function(){
        window.location.href = base_url + "log_sistem/download_kosong/"+$("#filter-periode").val();
    });
    $("#btn-download-url-kosong").click(function(){
        window.location.href = base_url + "log_sistem/download_url_kosong";
    });
});
