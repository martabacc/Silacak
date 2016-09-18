if(typeof(jQuery.validator) != 'undefined'){
	/* alpha_dash = angka, huruf, - (minus), _ (garis bawah) */
	jQuery.validator.addMethod('alpha_dash', function(value, element){
		return this.optional(element) || /^[a-z0-9_-]+$/i.test(value);
	}, "This field contain only letter, number, dash or underscore");

	/* alpha_numeric_spaces = angka, huruf, spasi */
	jQuery.validator.addMethod('alpha_numeric_spaces', function(value, element){
		return this.optional(element) || /^[a-z0-9 ]+$/i.test(value);
	}, "This field contain only letter, number, or space");

	/* alpha = huruf aja */
	jQuery.validator.addMethod('alpha', function(value, element){
		return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "This field contain only letter");

	/* alpha_numeric = huruf dan angka aja */
	jQuery.validator.addMethod('alpha_numeric', function(value, element){
		return this.optional(element) || /^[a-z0-9]+$/i.test(value);
	}, "This field contain only letter or number");

	/* exact_length = panjang data harus sama dengan x */
	jQuery.validator.addMethod('exact_length', function(value, element, param){
		return this.optional(element) || value.length == param;
	}, $.validator.format("This field must have {0} in length"));

	/* valid_date = isinya harus tanggal yang valid, format iso yyyy-MM-dd */
	jQuery.validator.addMethod('valid_date', function(value, element, param){
		if(this.optional(element)) return true;

		var date_splitted = value.split('-');
		var date_data = [];
		if(date_splitted.length != 3) return false;
		//check all component are digit
		for(var i in date_splitted){
			var current_segment = date_splitted[i];
			if(isNaN(current_segment)) return false;
			date_data.push(parseInt(current_segment));
		}

		var check_date = new Date(date_data[0], date_data[1] - 1, date_data[2]);
		return check_date.getFullYear() == date_data[0] &&
			   check_date.getMonth() + 1 == date_data[1] &&
			   check_date.getDate() == date_data[2];
	}, "This field must contain valid date format (yyyy-MM-dd)");

	/* valid_datetime = isinya harus tanggal dan jam yang valid, format iso yyyy-MM-dd HH:mm:ss*/
	jQuery.validator.addMethod('valid_datetime', function(value, element, param){
		if(this.optional(element)) return true;

		var datetime_splitted = value.split(' ');
		if(datetime_splitted.length != 2) return false;

		var date_splitted = datetime_splitted[0].split('-');
		if(date_splitted.length != 3) return false;
		var date_data = [];

		//check all component are digit
		for(var i in date_splitted){
			var current_segment = date_splitted[i];
			if(isNaN(current_segment)) return false;
			date_data.push(parseInt(current_segment));
		}

		var time_splitted = datetime_splitted[1].split(':');
		if(time_splitted.length != 3) return false;

		//check all component are digit
		for(var i in time_splitted){
			var current_segment = time_splitted[i];
			if(isNaN(current_segment)) return false;
			date_data.push(parseInt(current_segment));
		}

		var check_date = new Date(date_data[0], date_data[1] - 1, date_data[2], date_data[3], date_data[4], date_data[5]);
		return check_date.getFullYear() == date_data[0] &&
			   check_date.getMonth() + 1 == date_data[1] &&
			   check_date.getDate() == date_data[2] &&
			   check_date.getHours() == date_data[3] &&
			   check_date.getMinutes() == date_data[4] &&
			   check_date.getSeconds() == date_data[5];

	}, "This field must contain valid datetime format (yyyy-MM-dd HH:mm:ss)");
}