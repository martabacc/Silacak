$(document).ready(function() {

	$('#master-page').masterPage({
		primaryKey: 'ang_pegawai',
		detailFocusId: 'ang_pegawai',
		dataUrl: base_url + 'report/get_datamaster_peneliti',
		detailUrl: base_url + 'pegawai/detail',
		addUrl: base_url + 'pegawai/add',
		editUrl: base_url + 'pegawai/edit',
		deleteUrl: base_url + 'anggota/delete',
		access: { add: false, edit: false, delete: false, refresh: true },
		lengthMenu: [10],
		cols: [
			/* peg_id - 0*/
			{
				sortable: false,
				className: "text-center",
				width: '30px',
				render: function(data, type, full, meta){
					return meta.row + 1 + meta.settings._iDisplayStart;//'<input type="checkbox" name="ang_id[]" value="'+ data +'"/>';
				}
		   	},
			/* peg_name - 1 */
			{ 	visible:    true },
			/* fak_nama_indonesia - 2 */
			{	visible:    true },
			/* jur_nama_indonesia - 3 */
			{ visible:    true },
			/* peg_status_tarik - 4 */
			{ visible:    true,
			  render: function(data, type, full, meta) {
			  	if (data == 1)
			  		return '<p style="text-align:center"><i class="fa fa-check"></i></p>';
			  	else
			  		return '';
			  }
			},
			/* pub_tarik_done - 5 */
			{ 	visible:    true,
				render: function(data, type, full, meta) {
					var done = (data == null) ? 0 : data;
					return done + "/" + full[6];
				} 
			},
			/* pub_tarik_all - 6 */
			{ visible:    false },
			/* peg_fakultas - 7 */
			{ visible:    false },
			/* peg_jurusan - 8 */
			{ visible:    false }
		],
		filters: [],
		additionalInput : [
			{id:'filter_fakultas', submittedName:'peg_fakultas'},
			{id:'filter_jurusan', submittedName:'peg_jurusan'}
		],
		orders: [[5, 'desc']],
		validation: {},
		selectCallback: function(clicked_data, options){
			window.location = base_url + "publikasi_dosen?pegawai=" + clicked_data[0];
		}
	});
	
	$(document.body).on('change', '#filter_fakultas', function(element) {
		var faknow = $("#filter_fakultas").val();
		$('#filter_jurusan').html('');

		$('#filter_jurusan').append('<option value="">Semua</option>');	

		for (i in list_jurusan)
		{
			if (faknow == "" || list_jurusan[i].jur_fakultas == faknow)
			{
				$('#filter_jurusan').append('<option value="' + list_jurusan[i].jur_id + '">' + list_jurusan[i].jur_nama_indonesia + '</option>');		
			}
		}

		$('#filter_jurusan').trigger('change');
	});

	$('#btn_reset').click(function() {
		$('#filter_fakultas').prop('selectedIndex', 0);
		$('#filter_fakultas').trigger('change');

		$('#filter_jurusan').prop('selectedIndex', 0);
		$('#filter_jurusan').trigger('change');
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	});

    $("#btn-download").click(function(){
        var fak = $("#filter_fakultas").val();
        if(fak == '') fak = 0;
        var jur = $("#filter_jurusan").val();
        if(jur == '') jur = 0;
        window.location = base_url + "report/download_peneliti/" + fak + "/" + jur + "/1";
    });
});