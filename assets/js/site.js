var __alert_guid = '';
function show_alert(title, message, error, selector, callback_show, callback_hide){
	if(typeof(error) == 'undefined')
		error = true;
	if(typeof(selector) == 'undefined')
		selector = '#main-alert';
	var main_message = $(selector);
	main_message.removeClass('alert-danger alert-success');
	main_message.addClass(error ? 'alert-danger' : 'alert-success');

	$('.alert-wrapper .alert-title', main_message).html(title);
	$('.alert-wrapper .alert-content', main_message).html(message);

	main_message.show();
	if(typeof(callback_show) != 'undefined'){
		callback_show();
	}
	var __current_alert_guid = Date.now();
	__alert_guid = __current_alert_guid;

	setTimeout(function(){
		if(__current_alert_guid == __alert_guid){
			main_message.hide();
			if(typeof(callback_hide) != 'undefined'){
				callback_hide();
			}
		}
	}, 4000);
	WebTemplate.scrollTo(main_message, -200);
}

/* extend jquery standard ajax dengan memasukkan csrf token pada setiap requestnya */
function ajaxExtend(options){
	options.data[csrf_name] = Cookies.get(csrf_name);
	if(typeof(options.data[csrf_name]) == 'undefined'){
		//refresh if csrf token is not found
		document.location = document.location;
		return;
	}
	$.ajax({
        url: options.url,
        type: 'post',
        data: options.data,
        success: options.success,
        error: options.error,
        dataType : 'json'
    });
}

function convertFromMysqlDate(date){
	// Split timestamp into [ Y, M, D, h, m, s ]
	var t = date.split(/[- :]/);

	// Apply each element to the Date function
	var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);

	return d;
}


function showChartTooltip(x, y, xValue, yValue) {
    $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x -10,
        border: '0px solid #ccc',
        padding: '2px 6px',
        'background-color': '#fff'
    }).appendTo("body").fadeIn(200);
}