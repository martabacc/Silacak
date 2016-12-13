$(document).ready(function(){
	$('#master-page').masterPage({
		primaryKey: 'usr_id',
		detailFocusId: 'usr_id',
		dataUrl: base_url + 'pengguna/get_datamaster',
		detailUrl: base_url + 'pengguna/detail',
		addUrl: base_url + 'pengguna/add',
		editUrl: base_url + 'pengguna/edit',
		deleteUrl: base_url + 'pengguna/delete',
		cols: [
				/* usr_id - 0*/
				{
					className: "text-center",
					width: '30px',
					render: function(data, type, full, meta){
						return '<input type="checkbox" name="usr_id[]" value="'+ data +'"/>';
					}
			   },
			/* usr_username - 1 */
			{ visible:    true },
			/* usr_email - 2 */
			{ visible:    true },
			/* usr_name - 3 */
			{ visible:    true },
			/* usr_fullname - 4 */
			{ visible:    true },
			/* usr_issa - 4 */
			{ 
				visible:    true,
				render: function(data, type, full, meta){
					if (data == 1)
				  		return '<p style="text-align:center"><i class="fa fa-check"></i></p>';
				  	else
				  		return '';
				} 
			}
		],
		filters: [],
		orders: [[0, 'desc']],
		validation: {usr_id: {digits: true},
			usr_username: {maxlength: 60, minlength: 4},
			usr_password: {maxlength: 255, minlength: 6},
			usr_email: {maxlength: 255},
			usr_name: {maxlength: 255},
			usr_fullname: {maxlength: 255}},
		preAddCallback: function(options){
			$("#password-help").hide();
		},
		fillFormCallback: function(data, options){
			$("#password-help").show();
			$("#usr_password").val("");
		}
	});
});
