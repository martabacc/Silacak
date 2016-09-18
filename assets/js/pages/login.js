$(document).ready(function(){
	$('#username').focus();
    $('#login-form').validate(
        {
            ignoreTitle: true,
            focusInvalid: false,
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            invalidHandler: function (event, validator) {
                show_alert('Error', 'Masukkan data dengan benar..!');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-placement').append(error);
            },
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            success: function (label, element) {
                label.closest('.form-group').removeClass('has-error');
            },
            rules: {
            	username : {
            		maxlength: 50,
            		required: true
            	},
            	password : {
            		maxlength: 30,
            		required: true
            	},
            	remember : {
            		digits: true
            	}
            },
            submitHandler: function(form){
            	$('#main-alert').hide();
            	WebTemplate.blockUI({target:'#login-container', boxed:true, message:'Login...'});

                var submitted_data = {
                    username: $('#username').val(),
                    password: $('#password').val(),
                    remember: $('#remember').is(':checked') ? $('#remember').val() : ''
                };

            	ajaxExtend({
	                url: base_url + 'login/authenticate',
	                data: submitted_data,
	                success: function(resp){
	                	WebTemplate.unblockUI('#login-container');
	                    if(resp.status == 'ok'){
	                    	//redirect ke dashboard / index
	                    	document.location = base_url + "dashboard";
	                    }else{
	                        show_alert('Error', resp.message);
	                    }
	                },
	                error: function(evt){
			            WebTemplate.unblockUI('#login-container');
			            show_alert('Error', 'Error koneksi dengan server');
			        }
	            });

				return false;
            }
        }
    );

    $('#login-form input').keyup(function (e) {
        if (e.which == 13) {
            if ($('.login-form').validate().form()) {
                $('.login-form').submit();
            }
            return false;
        }
    });

    if(typeof(error_message) != 'undefined'){
        show_alert('Error', error_message);
    }
});