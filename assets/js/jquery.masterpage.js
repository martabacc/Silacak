function get_masterpage_default_option(){
    return {
        /* Selector
         * app tidak perlu didefinisikan,
         * diambil langsung dari elementnya  */
        appSelector: '#master-page',
        detailFocusId: '',
        primaryKey: '',
        /* end of selector */

        /* callback */
        /* preAddCallback: function(options){} */
        preAddCallback: undefined,
        /* addAfterResetCallback: function(options){} */
        addAfterResetCallback: undefined,
        /* selectCallback: function(clicked_data, options){} */
        selectCallback: undefined,
        /* fillFormCallback: function(data, options){} */
        fillFormCallback: undefined,
        /* preEditCallback: function(selected, options){} */
        preEditCallback: undefined,
        /* preSaveCallback: function(options){} */
        preSaveCallback: undefined,
        /* afterSaveCallback: function(posted_data, options){} */
        afterSaveCallback: undefined,
        /* overrideSave: function(options, url, is_add --> boolean){} */
        overrideSave: undefined,
        /* preDeleteCallback: function(options){} */
        preDeleteCallback: undefined,
        /* afterDeleteCallback: function(options){} */
        afterDeleteCallback: undefined,
        /* cancelCallback : function(){} */
        cancelCallback: undefined,
        /* end of callback */

        /*
            access untuk pengaturan akses
            format access harus :
            access : {
                add: true,
                edit: true,
                delete: true,
                refresh: true
            }
         */
        access: {},

        searchMin: 3,
        pkIndex: 0,
        deleteDisplayIndex: 1,

        /* url */
        dataUrl: '',
        detailUrl: '',
        addUrl: '',
        editUrl: '',
        deleteUrl: '',
        /* end of url */

        /* standard alert adalah main alert dibawah judul content halaman
         * jika standard alert bernilai false, maka dilihat override alertnya
         * jika override alert undefined, maka menampilkan bootbox message
         * format override alert adalah sebagai berikut :
         * overrideAlert: function(title, message, is_error)
         */
        standardAlert: true,
        overrideAlert: undefined,

        /*
         * Cols
         * pengaturan kolom, otomatis dari generate
         */
        cols: [],

        /* Filter
         * digunakan untuk otomatisasi melakukan filter pada data yang diload
         * contoh :
         * filters: [{id:'contoh', submittedName: 'halo'}]
         */
        filters: [],

        /*
         * Column Order
         * mengatur pengurutan pada saat data di load, kolom mana yang mau diurutkan
         * jenis pengurutan : asc, desc
         * contoh :
         * orders: [[2, 'desc']]
         */
        orders: [],

        /* pengaturan input tambahan diluar form detail, misal dari filter di atas tabel master
         * contoh : [{id: 'abc_id', submittedName: 'halo'}]
         */
        additionalInput: [],

        /*
         * default value
         * contoh : [{id:'contoh', value:'oke'}]
         *
         * value dapat diisi dengan function contoh :
         * [{id: 'contoh', value: function(){ return 'hehe'; }}]
         *
         * atau javascript ada di fungsi terpisah
         * [{id: 'contoh', value: fungsi_lain_di_js }]
         *
         * terus di js fungsinya
         * function fungsi_lain_di_js(){ return "hore"; }
         */
        defaultValue: [],

        /* pengaturan detail controls */
        showSave: true,
        showCancel: true,
        /* end of pengaturan controls */

        /* length menu pada masterpage */
        lengthMenu: [[10, 20], [10, 20]],

        /* ## NOT YET IMPLEMENTED ##
         * memformat input dengan format tertentu
         * Contoh : [{selector: '.inp1', format: 'number'}, {selector: '#inp2', format: function(){}}]
         */
        formatInput: [],

        /* masterpage obj */
        dataTablesObj: null,

        /*
         * set rule untuk validasi form detail
         * diisi otomatis oleh generator
         * contoh pengisian :
         * {
         *   abc_id: {required:true, maxlength:50},
         *   abc_name: {maxlength: 100}
         * }
         */
        validation: undefined,
        validatorObj: undefined,

        /*
        * set rule for fnRowCallback
        */
        fnRowCallback: function(){}
    };
}
var masterpage_obj = [];
function get_masterpage_obj(app_selector){
    for(var c_mp in masterpage_obj){
        if(masterpage_obj[c_mp].options.appSelector == app_selector)
            return masterpage_obj[c_mp];
    }
    return null;
}

function set_masterpage_obj(mp_obj){
    var mp_found = false;
    for(var c_mp in masterpage_obj){
        if(masterpage_obj[c_mp].options.appSelector == mp_obj.options.appSelector){
            masterpage_obj[c_mp] = mp_obj;
            mp_found = true;
        }
    }

    if(!mp_found)
        masterpage_obj.push(mp_obj);
}

/* required function for masterdata */
function set_value(wrapper_selector, id_or_name, value){
    var c_set = $('#' + id_or_name, wrapper_selector);
    if(c_set.length == 0)
        c_set = $('[name="' + id_or_name + '"]', wrapper_selector);
    if(c_set.length == 0) return;
    for(var c_sel = 0; c_sel < c_set.length; c_sel++){
        var c_elem = c_set[c_sel];
        var c_tag = c_elem.tagName.toLowerCase();
        var c_type = c_elem.type.toLowerCase();

        if(c_tag == 'input' && c_type == 'checkbox'){
            $(c_elem).prop('checked', value == '1' ? true : false);
        }else if(c_tag == 'input' && c_type == 'radio'){
            $('[name="' + id_or_name + '"][value="' + value + '"]', wrapper_selector).prop('checked', true);
        }else if(c_tag == 'input' || c_tag == 'select' || c_tag == 'textarea'){
            if(c_type != 'file'){
                $(c_elem).val(value);
            }
        }else{
            $(c_elem).html(value);
        }
    }
}

function get_value(id_or_name){
    var c_set = null;

    if(typeof(id_or_name) == 'string'){
        c_set = $('#' + id_or_name);
        if(c_set.length == 0)
            c_set = $('[name="' + id_or_name + '"]');
        if(c_set.length == 0) return '';
    }else{
        c_set = $(id_or_name);
    }

    var c_elem = c_set[0];
    var c_tag = c_elem.tagName.toLowerCase();

    if(c_tag == 'input' || c_tag == 'select' || c_tag == 'textarea'){
        return $(c_elem).val();
    }else{
        return $(c_elem).html();
    }
}

function fill_to_form(wrapper_selector, data){
    for(var c_data in data){
        set_value(wrapper_selector, c_data, data[c_data]);
    }
    if(typeof($.uniform) != 'undefined')
        $.uniform.update();
}

function reset_form(wrapper_selector, default_value){
    /* reset value for input */
    $(wrapper_selector).find('input[type="text"], input[type="hidden"], input[type="password"], input[type="file"], select, textarea').val('');
    $(wrapper_selector).find('input[type="radio"], input[type="checkbox"]').removeAttr('checked').removeAttr('selected');

    /* new set value and get value can handle old not_input parameter */

    if(typeof(default_value) != 'undefined' && Array.isArray(default_value)){
        for(var c_def in default_value){
            set_value(wrapper_selector, default_value[c_def].id, default_value[c_def].value);
        }
    }
    if(typeof($.uniform) != 'undefined')
        $.uniform.update();
}

function serialize_form(wrapper_selector){
    var form_params = {};
    $(":input:not(button,input[type='submit'])", wrapper_selector).each(function(){
        var c_input = $(this);
        if(c_input.is(':checkbox') && !c_input.is(':checked')) return;
        if(typeof(c_input.attr('name')) != 'undefined'){
            var type_name = typeof(form_params[c_input.attr('name')]);
            if(type_name != 'undefined'){
                if(type_name == 'string'){
                    var _temp = form_params[c_input.attr('name')];
                    form_params[c_input.attr('name')] = [];
                    form_params[c_input.attr('name')].push(_temp);
                }
                form_params[c_input.attr('name')].push(get_value(c_input));
            }else{
                form_params[c_input.attr('name')] = get_value(c_input);
            }
        }
    })
    return form_params;
}

function concat_message(first_message, second_message, delimiter){
    if(typeof(delimiter) == 'undefined') delimiter = '. ';
    var result = first_message;
    if(second_message != '')
        result += delimiter + second_message;
    return result;
}
/* end of required function */

(function($){
    $.masterPage = function(el, options){
        var defaultSelector = {
            tablePage: '.table-page',
            detailPage: '.detail-page',
            tableMaster: '.table-master',
            masterForm: '.form-master',
            formDetail: '.form-detail',
            mainControl: '.main-control',
            searchInput: '.dataTables_filter input',
            detailControl: '.detail-control',
            addClass: '.on-add',
            editClass: '.on-edit',
            columnFilter: '.column-filter'
        };

        var is_add = false;

        /* To avoid scope issues, use 'base' instead of 'this'
         * to reference this class from internal events and functions. */
        var base = this;

        /* Access to jQuery and DOM versions of element */
        base.$el = $(el);
        base.el = el;

        /* Add a reverse reference to the DOM object */
        base.$el.data("masterPage", base);

        base.init = function(){
            if(typeof(mp_lang) == 'undefined'){
                bootbox.alert('file language tidak ditemukan..!');
                return false;
            }
            base.options = $.extend({}, $.masterPage.defaultOptions, options);
            base.options.access = $.extend({}, { add: true, edit: true, delete: true, refresh: true }, base.options.access);

            /* Put your initialization code here */
            base.options.appSelector = '#' + base.el.id;
            if(base.options.appSelector == ''){
                bootbox.alert(mp_lang['error_master_no_id']);
                return false;
            }

            if($(base.options.appSelector).attr('masterpage') == 'true'){ return base; }

            /* init selector for simplify purpose */
            defaultSelector.tablePage = base.options.appSelector + ' ' + defaultSelector.tablePage;
            defaultSelector.detailPage = base.options.appSelector + ' ' + defaultSelector.detailPage;
            defaultSelector.masterForm = defaultSelector.tablePage + ' ' + defaultSelector.masterForm;
            defaultSelector.formDetail = defaultSelector.detailPage + ' ' + defaultSelector.formDetail;

            /* enable delete button */
            if(base.options.access.delete){
                if(base.options.deleteUrl == '')
                    bootbox.alert('Isi url untuk delete');
                $(defaultSelector.mainControl, defaultSelector.tablePage).append('<button type="button" class="btn red-thunderbird mp-delete-button"><i class="fa fa-trash-o"></i> ' + mp_lang['delete'] + '</button>');
                $('.mp-delete-button', defaultSelector.tablePage).click(base.deleteData);
            }

            /* enable refresh button */
            if(base.options.access.refresh){
                $(defaultSelector.mainControl, defaultSelector.tablePage).append('<button type="button" class="btn yellow mp-refresh-button"><i class="fa fa-refresh"></i> ' + mp_lang['refresh'] + '</button>');
                $('.mp-refresh-button', defaultSelector.tablePage).click(base.refreshData);
            }

            /* enable add button */
            if(base.options.access.add){
                if(base.options.addUrl == '')
                    bootbox.alert('Isi url untuk add');
                $(defaultSelector.mainControl, defaultSelector.tablePage).append('<button type="button" class="btn green-seagreen mp-add-button"><i class="fa fa-plus-circle"></i> ' + mp_lang['add'] + '</button>');
                $('.mp-add-button', defaultSelector.tablePage).click(base.showAdd);
            }

            /* enable cancel button */
            if($(defaultSelector.detailControl, defaultSelector.detailPage).length > 0){
                $(defaultSelector.detailControl, defaultSelector.detailPage).append('<button type="button" class="btn red-thunderbird mp-cancel-button"><i class="fa fa-times"></i> ' + mp_lang['cancel'] + '</button>');
                $('.mp-cancel-button', defaultSelector.detailPage).click(function(){
                    base.changeVisibility(true);
                    if(typeof(base.options.cancelCallback) != 'undefined'){
                        base.options.cancelCallback();
                    }
                });

                if(base.options.access.edit && base.options.editUrl == '')
                    bootbox.alert('Isi url untuk edit');
                $(defaultSelector.detailControl, defaultSelector.detailPage).append('<button type="button" class="btn green-seagreen mp-save-button"><i class="fa fa-floppy-o"></i> <span>' + mp_lang['save'] + '</span></button>');
                $('.mp-save-button', defaultSelector.detailPage).click(base.saveData);
            }

            base.blockMasterPage();

            base.options.dataTablesObj = $(defaultSelector.tableMaster, defaultSelector.tablePage).DataTable({
                                                //stateSave: true, /* enable this in production mode */
                                                pagingType: 'full_numbers',
                                                columns: base.options.cols,
                                                order: base.options.orders,
                                                ajax: {
                                                            url: base.options.dataUrl,
                                                            type: "POST",
                                                            data: function(data){
                                                                /* modify post data for simplification */
                                                                data['columns'] = data.columns.length;
                                                                data['search'] = data.search.value;
                                                                data['order'] = { column: data.order[0].column, dir: data.order[0].dir };
                                                                data[csrf_name] = Cookies.get(csrf_name);
                                                                /* add filter to datatables request */
                                                                if(typeof(base.options.filters) != 'undefined' && Array.isArray(base.options.filters)){
                                                                    for(var filter in base.options.filters){
                                                                        var c_filter = base.options.filters[filter];
                                                                        data[c_filter.submittedName] = $('#' + c_filter.id).val();
                                                                    }
                                                                }
                                                                if(typeof(base.options.additionalInput) != 'undefined' && Array.isArray(base.options.additionalInput)){
                                                                    for(var filter in base.options.additionalInput){
                                                                        var c_filter = base.options.additionalInput[filter];
                                                                        data[c_filter.submittedName] = $('#' + c_filter.id).val();
                                                                    }
                                                                }
                                                            }
                                                        },
                                                processing: false,
                                                serverSide: true,
                                                retrieve:true,
                                                autoWidth: false,
                                                lengthMenu: base.options.lengthMenu,
                                                language: mp_lang['masterpage_language'],
                                                fnRowCallback: base.options.fnRowCallback
                                            });
            /* override processing */
            base.options.dataTablesObj.on('processing.dt', function ( e, settings, processing ) {
                if(processing){
                    base.blockMasterPage();
                }else{
                    base.unblockMasterPage();
                }
            });

            base.options.dataTablesObj.on( 'draw.dt', function (evt, setting){
                if(typeof($.uniform) != 'undefined')
                    $('input[name="' + base.options.primaryKey + '[]"]', defaultSelector.masterForm).uniform();
                /* hide pagination while only 1 page */
                var page_info = base.options.dataTablesObj.page.info();
                if(page_info.pages <= 1){
                    $('.dataTables_paginate', defaultSelector.tablePage).hide();
                    $('.filter-control .goto-page', defaultSelector.tablePage).hide();
                }else{
                    $('.dataTables_paginate', defaultSelector.tablePage).show();
                    $('.filter-control .goto-page', defaultSelector.tablePage).show();
                }

                /* unbind pagination button disabled and active page */
                $('.dataTables_paginate .pagination .paginate_button.disabled, .dataTables_paginate .pagination .paginate_button.active', defaultSelector.masterForm).unbind('click');
                $('.dataTables_paginate .pagination .paginate_button.disabled a, .dataTables_paginate .pagination .paginate_button.active a', defaultSelector.masterForm).attr('href', 'javascript:void(0);')
            });

            /* remove default search filter */
            /* add reset search button */
            $('.dataTables_filter', defaultSelector.tablePage).prepend('<button class="btn btn-circle btn-icon-only purple-studio reset_search pull-right margin-left-5" title="' + mp_lang['reset_search'] + '"><i class="fa fa-history"></i></button>');
            $('.dataTables_filter .reset_search', defaultSelector.tablePage).click(function(){
                base.options.dataTablesObj.search('').draw();
            });
            $(defaultSelector.searchInput, defaultSelector.tablePage).attr('placeholder', mp_lang['info_search_minimal']);
            $(defaultSelector.searchInput, defaultSelector.tablePage).unbind().bind('keyup', function(evt){
                var currentInput = $(this).val().trim();
                if(evt.keyCode == 13 && currentInput.length >= base.options.searchMin){
                    base.options.dataTablesObj.search(currentInput).draw();
                }
            });

            /* set event while data clicked */
            $(defaultSelector.tableMaster, defaultSelector.tablePage).on('click', 'tr', function(evt){
                if(evt.target.tagName.toLowerCase() == 'td'){
                    var clicked_data = base.options.dataTablesObj.row( this ).data();
                    /* check if empty row has been clicked */
                    if(typeof(clicked_data) == 'undefined') return;

                    /* otherwise call clicked event */
                    if(typeof(base.options.selectCallback) != 'undefined'){
                        base.options.selectCallback(clicked_data, base.options);
                    }
                    if(base.options.access.edit){
                        base.showEdit(clicked_data);
                    }
                }
            });

            /* change column visibility state */
            $('.column-visibility input[type="checkbox"]', defaultSelector.tablePage).change(function(){
                var index =  $(this).attr('data-column');
                var dt_column = base.options.dataTablesObj.column(index);
                dt_column.visible(!dt_column.visible());
            });

            /* set form detail validation */
            base.options.validatorObj = $(defaultSelector.formDetail).validate(
                                        {
                                            ignore: '',
                                            ignoreTitle: true,
                                            errorElement: 'span',
                                            errorClass: 'help-block help-block-error masterpage-error',
                                            invalidHandler: function (event, validator) {
                                                base.showMessage(mp_lang['error'], mp_lang['error_form']);
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
                                            rules: base.options.validation
                                        }
                                    );

            /* show filter if exist */
            $('.filter-control', defaultSelector.tablePage).prepend('<button type="button" class="btn grey-gallery show-filter hide"><i class="fa fa-filter"></i> <span class="btn-content">' + mp_lang['filter'] + '</span></button>');
            if($('.masterpage-filter .filter-part', defaultSelector.tablePage).length > 0){
                $('.show-filter', defaultSelector.tablePage).removeClass('hide');
            }

            $('.show-filter', defaultSelector.tablePage).click(function(){
                $('.masterpage-filter', defaultSelector.tablePage).toggle(500);
            });

            $('.filter-control', defaultSelector.tablePage).prepend('<button type="button" class="btn blue goto-page margin-right-10"><i class="fa fa-forward"></i> <span class="btn-content">' + mp_lang['goto_page'] + '</span></button>');
            $('.filter-control .goto-page', defaultSelector.tablePage).click(function(){
                var page_info = base.options.dataTablesObj.page.info();
                bootbox.prompt(mp_lang['goto_page_question'] + page_info.pages, function(result) {
                    if (result !== null && result != ''){
                        var page_number = parseInt(result);
                        if(isNaN(page_number) || page_number <= 0 || page_number > page_info.pages){
                            bootbox.alert(mp_lang['error_goto_page'] + page_info.pages);
                        }else{
                            base.options.dataTablesObj.page(page_number-1).draw(false);
                        }
                    }
                });
            });

            /* activate filter change */
            if(typeof(base.options.filters) != 'undefined'){
                for(var c_filter in base.options.filters){
                    $('#' + base.options.filters[c_filter].id).change(function(){
                        base.refreshData();
                    });
                }
            }

            /* flag already defined as masterpage */
            $(base.options.appSelector).attr('masterpage', true);
            return base;
        };

        base.showAdd = function(){
            /* set to add mode */
            is_add = true;

            /* call pre add callback */
            if(typeof(base.options.preAddCallback) != 'undefined')
                base.options.preAddCallback(base.options);

            /* change state to add */
            base.changeViewState();

            /* reset form */
            reset_form(defaultSelector.formDetail, base.options.defaultValue);

            /* change visibility states */
            base.changeVisibility();

            /* call after reset callback */
            if(typeof(base.options.addAfterResetCallback) != 'undefined')
                base.options.addAfterResetCallback(base.options);

            /* input focus */
            $('#' + base.options.detailFocusId).focus();
        };

        base.showEdit = function(selected){
            /* set to edit mode */
            is_add = false;

            /* call pre edit callback */
            if(typeof(base.options.preEditCallback) != 'undefined')
                base.options.preEditCallback(selected, base.options);

            base.blockMasterPage();

            /* change state to edit */
            base.changeViewState();

            /* ajax request ke server */
            var submitted_data = {};
            submitted_data[base.options.primaryKey] = selected[0];
            ajaxExtend({
                url: base.options.detailUrl,
                data: submitted_data,
                success: function(resp){
                    base.unblockMasterPage();
                    if(resp.status == 'ok'){
                        /* reset form */
                        reset_form(defaultSelector.formDetail, base.options.defaultValue);

                        /* change visibility states
                         * visible first than fill form, to avoid ui crash or bug while
                         * change map, ckeditor, etc, which need element visibility,
                         * usually for measuring its size */
                        base.changeVisibility();

                        /* fill to form */
                        fill_to_form(defaultSelector.formDetail, resp.data);

                        $('#' + base.options.detailFocusId).focus();

                        if(typeof(base.options.fillFormCallback) != 'undefined')
                            base.options.fillFormCallback(resp.data, base.options);
                    }else if(resp.status == 'expired'){
                        document.location = resp.message;
                    }else{
                        base.showMessage(mp_lang['error'], concat_message(mp_lang['error_get_detail'], resp.message));
                    }
                },
                error: base.handleError
            });
        };

        base.saveData = function(){
            /* add additional input to datatables request */
            //if(typeof(base.options.additionalInput) != 'undefined' && Array.isArray(base.options.additionalInput)){}
            if(typeof(base.options.preSaveCallback) != 'undefined')
                base.options.preSaveCallback(base.options);

            if(base.options.validatorObj.form()){
                if(typeof(base.options.overrideSave) != 'undefined'){
                    base.options.overrideSave(base.options, is_add ? base.options.addUrl : base.options.editUrl, is_add);
                    return;
                }

                base.blockMasterPage();

                var posted_data = base.buildParameter(defaultSelector.formDetail);

                ajaxExtend({
                    url: is_add ? base.options.addUrl : base.options.editUrl,
                    data: posted_data,
                    success: function(resp){
                        base.unblockMasterPage();
                        if(resp.status == 'ok'){
                            base.refreshData(is_add ? true : false);
                            base.changeVisibility(true);
                            base.showMessage(mp_lang['success'], concat_message(mp_lang[is_add ? 'info_add' : 'info_edit'], resp.message), false);

                            if(typeof(base.options.afterSaveCallback) != 'undefined')
                                base.options.afterSaveCallback(posted_data, base.options);
                        }else if(resp.status == 'expired'){
                            document.location = resp.message;
                        }else{
                            base.showMessage(mp_lang['error'], concat_message(mp_lang[is_add ? 'error_add' : 'error_edit'], resp.message));
                        }
                    },
                    error: base.handleError
                });
            }
        };

        base.deleteData = function(){
            var deleted_ids = $('input[name="' + base.options.primaryKey + '[]"]:checked', defaultSelector.masterForm);
            if(deleted_ids.length == 0){
                bootbox.dialog({
                    title: mp_lang['error'],
                    message: mp_lang['error_no_data_selected'],
                    buttons: {
                        ok: {
                            label: mp_lang['ok'],
                            className: 'green'
                        }
                    }
                });
                return;
            }
            var deleted_data = [];
            var all_row_data = base.options.dataTablesObj.rows().data();
            $(deleted_ids).each(function(){
                deleted_data.push($(this).val());
            });
            var display_deleted = [];
            for(var r_data in all_row_data){
                var c_row = all_row_data[r_data];
                if(deleted_data.indexOf(c_row[base.options.pkIndex]+"") >= 0){
                    display_deleted.push('&ldquo;<b>' + c_row[base.options.deleteDisplayIndex] + '</b>&rdquo;');
                }
            }

            if(typeof(base.options.preDeleteCallback) != 'undefined')
                base.options.preDeleteCallback(base.options);

            bootbox.dialog({
                title: mp_lang['confirm_delete_title'],
                message: mp_lang['confirm_delete_message'] + display_deleted.join(","),
                buttons: {
                    cancel: {
                        label: mp_lang['cancel'],
                        className: 'red'
                    },
                    ok: {
                        label: mp_lang['ok'],
                        className: 'green',
                        callback: function(){
                            base.blockMasterPage();
                            ajaxExtend({
                                url: base.options.deleteUrl,
                                data: base.buildParameter(defaultSelector.masterForm),
                                success: function(resp){
                                    base.unblockMasterPage();
                                    if(resp.status == 'ok'){
                                        base.refreshData(false);
                                        base.showMessage(mp_lang['success'], concat_message(mp_lang['info_delete'], resp.message), false);
                                        if(typeof(base.options.afterDeleteCallback) != 'undefined')
                                            base.options.afterDeleteCallback(base.options);
                                    }else if(resp.status == 'expired'){
                                        document.location = resp.message;
                                    }else{
                                        base.showMessage(mp_lang['error'], concat_message(mp_lang['error_delete'], resp.message));
                                    }
                                },
                                error: base.handleError
                            });
                        }
                    }
                }
            });
        };

        base.showMessage = function(title, message, is_error){
            console.log('is error' + is_error);
            if(typeof(is_error) == 'undefined')
                is_error = true;

            if(base.options.standardAlert){
                show_alert(title, message, is_error);
            }else{
                if(typeof(base.options.overrideAlert) == 'undefined'){
                    bootbox.dialog({
                        title: title,
                        message: message,
                        buttons: {
                            main: {
                              label: mp_lang['ok']
                            }
                        }
                    });
                }else{
                    base.options.overrideAlert(title, message, is_error);
                }
            }
        }

        base.refreshData = function(reset_paging){
            if(typeof(reset_paging) == 'undefined')
                reset_paging = true;
            base.options.dataTablesObj.ajax.reload(null, reset_paging);
        };

        base.blockMasterPage = function(){
            WebTemplate.blockUI({target:base.options.appSelector, boxed:true, message: mp_lang['info_loading']});
        }

        base.unblockMasterPage = function(){
            WebTemplate.unblockUI(base.options.appSelector);
        }

        base.changeViewState = function(){
            $('.mp-save-button span', defaultSelector.detailPage).html(mp_lang[is_add ? 'add' : 'save']);
            if(is_add){
                $(defaultSelector.editClass, base.options.appSelector).hide();
                $(defaultSelector.addClass, base.options.appSelector).show();

                if(base.options.access.add && base.options.showSave){
                    $('.mp-save-button', defaultSelector.detailPage).show();
                }else{
                    $('.mp-save-button', defaultSelector.detailPage).hide();
                }
            }else{
                $(defaultSelector.addClass, base.options.appSelector).hide();
                $(defaultSelector.editClass, base.options.appSelector).show();

                if(base.options.access.edit && base.options.showSave){
                    $('.mp-save-button', defaultSelector.detailPage).show();
                }else{
                    $('.mp-save-button', defaultSelector.detailPage).hide();
                }
            }
        };

        base.resetValidationError = function(){
            base.options.validatorObj.resetForm();
            $(defaultSelector.formDetail).find('.form-group').removeClass('has-error');
            $('.masterpage-error', defaultSelector.formDetail).remove();
        }

        base.changeVisibility = function(master_visibility){
            if(typeof(master_visibility) == 'undefined') master_visibility = false;

            if(master_visibility){
                $(defaultSelector.tablePage).show();
                $(defaultSelector.detailPage).hide();
                base.resetValidationError();
            }else{
                $(defaultSelector.tablePage).hide();
                $(defaultSelector.detailPage).show();
            }
        }

        base.buildParameter = function(form_selector){
            var params = {};

            for(var i_addInput in base.options.additionalInput){
                var c_addInput = base.options.additionalInput[i_addInput];
                params[c_addInput.submittedName] = get_value(c_addInput.id);
            }

            $.extend(params, serialize_form(form_selector));

            return params;
        };

        base.handleError = function(evt){
            base.unblockMasterPage();
            base.showMessage(mp_lang['error'], mp_lang['error_request_data']);
        };

        /* Run initializer */
        base.init();

        set_masterpage_obj(base);
    };

    $.masterPage.defaultOptions = get_masterpage_default_option();

    $.fn.masterPage = function(options){
        return this.each(function(){
            (new $.masterPage(this, options));
        });
    };
})(jQuery);