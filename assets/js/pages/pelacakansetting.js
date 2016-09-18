$(document).ready(function() {

	for (pst in pst_all) {
		if (pst_all[pst].pst_name.endsWith('_cb')) {
			var id = pst_all[pst].pst_id;
			var value = pst_all[pst].pst_value;
			$('#pst_value_' + id).prop("checked", value == 1 ? 1 : 0);
		}
	}
	
	$.uniform.update();
});