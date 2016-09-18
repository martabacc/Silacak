$(document).ready(function() {
	
	 $('.easy-pie-chart .number.transactions').easyPieChart({
        animate: 1000,
        size: 75,
        lineWidth: 3,
        barColor: "blue"
    });
   	 
   	//initialize chart
    var previousPoint2 = null;
    $('#stats-penarikan-data').show();
    
	var options = {
                    legend: {
                            position:"ne",
                            backgroundOpacity: 0},
                    xaxis: {
                        axisLabel: 'Tahun Publikasi',
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
                    };

	$.plot($("#stats-penarikan"), dataPenarikan, options);

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
        window.location.href = base_url + "dashboard/download";
    });

    if (autosync_pdt == 1) {
        $("#auto_pdt").css("color", "green");
    } else {
        $("#auto_pdt").css("color", "red");
    }
});