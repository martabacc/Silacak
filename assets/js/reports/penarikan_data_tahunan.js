$(document).ready(function(){
    //change combobox jurusan ketika mengubah combobox fakultas
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
		$('.filter-combobox').val('');
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
        var fak = $("#filter_fakultas").val();
        if(fak == '') fak = 0;
        var jur = $("#filter_jurusan").val();
        if(jur == '') jur = 0;
        window.location = base_url + "report/penarikan_data_tahunan/" + fak + "/" + jur;
    });

	//initialize chart
    var previousPoint2 = null;
    $('#stats-penarikan-data').show();

    //set fakultas/jurusan filter
    $("#filter_fakultas").val(fakultas);
    $("#filter_fakultas").trigger("change");
    $("#filter_jurusan").val(jurusan);

    //hide/show caption fakultas and jurusan 
    if(fakultas == '' && jurusan == ''){
        $("#fakultas-caption").hide();
        $("#jurusan-caption").hide();
    }
    else{
        if(jurusan == ''){
            $("#fakultas-caption").show();
            $("#caption-helper-fakultas").text($("#filter_fakultas option:selected").text());
            $("#jurusan-caption").hide();
        }else{
            $("#jurusan-caption").show();
            $("#caption-helper-jurusan").text("Jurusan " + $("#filter_jurusan option:selected").text());
            $("#fakultas-caption").hide();
        }
    }

    
    $(".report-table-row").click(function(){
        //alert($(this).children(".report-year").text());
    });

    var plot_statistics = $.plot($("#stats-penarikan"),

        [{
            data: dataPenarikan,
            lines: {
                fill: 0.2,
                lineWidth: 0,
            },
            color: ['#BAD9F5']
        }, {
            data: dataPenarikan,
            label: "  Jumlah Data Diunduh",
            points: {
                show: true,
                fill: true,
                radius: 4,
                fillColor: "#9ACAE6",
                lineWidth: 2
            },
            color: '#9ACAE6',
            shadowSize: 1
        }, {
            data: dataPenarikan,
            lines: {
                show: true,
                fill: false,
                lineWidth: 3
            },
            color: '#9ACAE6',
            shadowSize: 0
        }],

        {

            xaxis: {
                axisLabel: 'Tahun Unduh',
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 14,
                axisLabelFontFamily: "Maven Pro",
                tickLength: 0,
                tickDecimals: 0,
                mode: "categories",
                min: 0,
                font: {
                    size: 12,
                    family: "Maven Pro",
                    color: "black"
                }
            },
            yaxis: {
                axisLabel: 'Jumlah Publikasi',
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 14,
                axisLabelFontFamily: "Maven Pro",
                ticks: 5,
                tickDecimals: 0,
                tickColor: "#ddd",
                font: {
                    size: 12,
                    family: "Maven Pro",
                    color: "black"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#aaa",
                borderColor: "#aaa",
                borderWidth: 1
            }
        });

    $("#stats-penarikan").bind("plothover", function(event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
        if (item) {
            if (previousPoint2 != item.dataIndex) {
                previousPoint2 = item.dataIndex;
                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
            }
        }
    });

    $('#stats-penarikan').bind("mouseleave", function() {
        $("#tooltip").remove();
    });

    $("#btn-download").click(function(){
        var fak = $("#filter_fakultas").val();
        if(fak == '') fak = 0;
        var jur = $("#filter_jurusan").val();
        if(jur == '') jur = 0;
        window.location = base_url + "report/penarikan_data_tahunan/" + fak + "/" + jur + "/1";
    });
});