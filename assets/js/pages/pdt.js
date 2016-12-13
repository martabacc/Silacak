$(document).ready(function(){
    $('#master-page').masterPage({
        primaryKey: 'kode',
        detailFocusId: 'kode',
        dataUrl: base_url + 'pdt/get_datamaster',
        access: { add: false, edit: false, delete: false, refresh: true},
        cols: [
                /* kode publikasi - 0*/
                {
                    className: "text-center",
                    width: '30px',
                    render: function(data, type, full, meta){
                        return '<input type="checkbox" name="fak_id[]" value="'+ data +'"/>';
                    }
               },
            /*  - 1 */
            { visible:    true },
            /*  - 2 */
            { visible:    true },
            /* - 3 */
            { visible:    true },
            /* - 4 */
            { visible:    true },
            /* - 5 */
            { visible:    true },
            /* - 6 */
            { visible:    true,
              render: function(data, type, full, meta) {
                if (data == 1)
                    return '<p style="text-align:center"><i class="fa fa-check"></i></p>';
                else
                    return '';
              }
            }
            
        ],
        filters: [],
        orders: [[0, 'desc']],
        validation: {}
    });
});