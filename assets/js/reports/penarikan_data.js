$(document).ready(function(){
	$('#btn_reset').click(function() {
		$('.filter-text').val('');
		$('#btn_filter').click();
	});

	$('#btn_filter').click(function(){
		var year = $("#filter_year").val();
		window.location = base_url + "report/penarikan_data/" + year;
	});

	//initialize chart
    var previousPoint2 = null;
    $('#stats-penarikan-data').show();

    

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
                axisLabel: 'Bulan Unduh',
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
            //if (previousPoint2 != item.dataIndex) {
                previousPoint2 = item.dataIndex;
                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1]);
            //}
        }
    });

    $('#stats-penarikan').bind("mouseleave", function() {
        $("#tooltip").remove();
    });

    $("#btn-download").click(function(){
        var year = $("#filter_year").val();
        window.location.href = base_url + "report/penarikan_data/" + year + "/1";
    });
});