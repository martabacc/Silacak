$(document).ready(function(){
	$('.date-picker').datepicker({
		format: "dd-mm-yyyy",
        orientation: "left",
        autoclose: true
    });

	$(document.body).on('change', '#filter_fakultas', function(element) {
		var faknow = $("#filter_fakultas").val();
		$('#filter_jurusan').html('');

		for (i in list_jurusan)
		{
			if (faknow == "" || list_jurusan[i].jur_fakultas == faknow)
			{
				$('#filter_jurusan').append('<option value="' + list_jurusan[i].jur_id + '">' + list_jurusan[i].jur_nama_indonesia + '</option>');		
			}
		}

		$('#filter_jurusan').trigger('change');
	});
	
	$("#filter_fakultas").trigger("change");

	$('#master-page').masterPage({
		primaryKey: 'snk_id',
		detailFocusId: 'snk_id',
		dataUrl: base_url + 'log_sinkron/get_datamaster',
		detailUrl: base_url + 'log_sinkron/detail',
		addUrl: base_url + 'log_sinkron/add',
		editUrl: base_url + 'log_sinkron/edit',
		deleteUrl: base_url + 'log_sinkron/delete',
		showSave: false,
        showCancel: true,
		access: { add: false, edit: true, delete: false, refresh: true},
		cols: [
			/* snk_id - 0*/
			{
				sortable: false,
				className: "text-center",
				width: '30px',
				render: function(data, type, full, meta){
					return meta.row + 1 + meta.settings._iDisplayStart;
				}
		   	},
			/* pub_judul - 1 */
			{ 	
				visible:    true
			},
			/* pub_pengarang - 2 */
			{ 
				visible:    true 
			},
			/* snk_tanggal - 3 */
			{ 
				visible:    true,
				render: function(data, type, full, meta){
					if(data != null && data != "")
						return $.datepicker.formatDate('dd-mm-yy', new Date(data.split(" ")[0]));
					else
						return "";
				} },
			/* snk_action - 4 */
			{ visible:    true },
			/* snk_distance - 5 */
			{ visible:    true },
			/* snk_status - 6 */
			{ 
				visible:    true,
				render: function(data, type, full, meta){
					if(data == 1){
						return 'Update data pdt';
					}
					else if(data == 2)
						return 'Data perlu diverifikasi';
					else
						return 'Insert data ke pdt'
				}
			}
		],
		fnRowCallback: function( nRow, aData ) {
		  var id = aData[6]; // ID is returned by the server as part of the data
		  var $nRow = $(nRow); // cache the row wrapped up in jQuery
		  if (id == 2) { // verify
		    $nRow.css({"background-color":"red", "color":"white"})
		  }
		  // else if (id == 1) { //update
		  //   $nRow.css({"background-color":"yellow", "color":"black"})
		  // }
		  // else if (id == 3) { //insert
		  //   $nRow.css({"background-color":"green", "color":"white"})
		  // }
		  return nRow
		},
		filters: [],
		additionalInput: [{id:'filter_startdate', submittedName:'snk_startdate'},
			{id:'filter_enddate', submittedName:'snk_enddate'},
			{id:'filter_status', submittedName:'snk_status'}],
		orders: [[1, 'desc']],
		validation: {},
		fillFormCallback: function(data, options){
			
			if(data.snk_status == 1){
				$("#snk_status").val("Update data pdt");
				$(".btn-verify").hide();
			}
			else if(data.snk_status == 2){
				$("#snk_status").val("Data perlu diverifikasi");
				$(".btn-verify").show();
			}
			else{
				$("#snk_status").val("Insert data ke pdt");
				$(".btn-verify").hide();
			}

			$(".form-detail .form-control").prop("readonly", true);
		}
		/*selectCallback: function(clicked_data, options){
			window.location = base_url + "publikasi_dosen?pegawai=" + clicked_data[3];
		}*/
	});

	$('#btn_reset').click(function() {
		$('#filter_startdate').datepicker('setDate', null);
		$('#filter_enddate').datepicker('setDate', null);
		$('#filter_status').prop('selectedIndex', 0);
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var masterPage = get_masterpage_obj('#master-page');
		masterPage.refreshData();
	});

	$('#btn_clear').click(function() {
		WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		//var posted_data = serialize_form(".form-detail");
		ajaxExtend({
            url:  base_url + 'pdt/clean_data/' + $('#filter_jurusan').val(), //urlnya ganti dengan url buat tarik data
            data: {},
            success: function(resp){
                WebTemplate.unblockUI("#master-page");
                if(resp.status == 'ok'){
                    show_alert(mp_lang['success'], concat_message(mp_lang['info_edit'], resp.message), false);

                }else if(resp.status == 'expired'){
                    document.location = resp.message;
                }else{
                    show_alert(mp_lang['error'], concat_message(mp_lang['error_edit'], resp.message));
                }
            },
            error: function(resp){
        		show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
            	WebTemplate.unblockUI("#master-page");
            }
        });
	});

	$('#btn_sync').click(function() {
		WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		//var posted_data = serialize_form(".form-detail");
		ajaxExtend({
            url:  base_url + 'pdt/merge_pelacakan/'+ $('#filter_jurusan').val(), //urlnya ganti dengan url buat tarik data
            data: {},
            success: function(resp){
                WebTemplate.unblockUI("#master-page");
                if(resp.status == 'ok'){
                    show_alert(mp_lang['success'], concat_message(mp_lang['info_edit'], resp.message), false);

                }else if(resp.status == 'expired'){
                    document.location = resp.message;
                }else{
                    show_alert(mp_lang['error'], concat_message(mp_lang['error_edit'], resp.message));
                }
            },
            error: function(resp){
        		show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
            	WebTemplate.unblockUI("#master-page");
            }
        });

	});

	
	$('#btn-insert-pdt').click(function() {
		if($("#snk_pdt").val() == ''){
			show_alert(mp_lang['error'], 'Jurnal PDT tidak ditemukan.', true);
			return;
		}
		WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		
		ajaxExtend({
            url:  base_url + 'pdt/insert_data/'+ $('#pub_id').val()+'/'+$("#snk_pdt").val(), //urlnya ganti dengan url buat tarik data
            data: {},
            success: function(resp){
                WebTemplate.unblockUI("#master-page");
                // TODO, response setelah selesai insert data
                // if(resp.status == 'ok'){
                //     show_alert(mp_lang['success'], concat_message(mp_lang['info_edit'], resp.message), false);

                // }else if(resp.status == 'expired'){
                //     document.location = resp.message;
                // }else{
                //     show_alert(mp_lang['error'], concat_message(mp_lang['error_edit'], resp.message));
                // }
            },
            error: function(resp){
        		show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
            	WebTemplate.unblockUI("#master-page");
            }
        });

	});

	$('#btn-update-pdt').click(function() {
		if($("#snk_pdt").val() == ''){
			show_alert(mp_lang['error'], 'Jurnal PDT tidak ditemukan.', true);
			return;
		}
		WebTemplate.blockUI({target:"#master-page", boxed:true, message: mp_lang['info_loading']});
		
		ajaxExtend({
            url:  base_url + 'pdt/update_data/'+ $('#pub_id').val()+'/'+$("#snk_pdt").val(), //urlnya ganti dengan url buat tarik data
            data: {},
            success: function(resp){
                WebTemplate.unblockUI("#master-page");
                // TODO, response setelah selesai insert data
                // if(resp.status == 'ok'){
                //     show_alert(mp_lang['success'], concat_message(mp_lang['info_edit'], resp.message), false);

                // }else if(resp.status == 'expired'){
                //     document.location = resp.message;
                // }else{
                //     show_alert(mp_lang['error'], concat_message(mp_lang['error_edit'], resp.message));
                // }
            },
            error: function(resp){
        		show_alert(mp_lang['error'], "Terjadi kesalahan pada jaringan. Mohon hubungi admin.", true);	
            	WebTemplate.unblockUI("#master-page");
            }
        });

	});

});
