/**************************************************
	show JqPlot chart
**************************************************/
function showJqPlotChart(data) {
	var plot1 = $.jqplot('chart', [data['points'], data['correctBets']], {
			seriesDefaults: {
				pointLabels: { show: true },
				renderer: $.jqplot.BarRenderer,
				rendererOptions: {
					barMargin: 5,
					barPadding: 1,
					
				},
				shadow: false
			},
			series: [
				{label: 'Punkte'},
				{label: 'richtige Tipps'}
			],
			axes: {
				xaxis: {
					renderer: $.jqplot.CategoryAxisRenderer,
					ticks: data['players'],
					tickRenderer: $.jqplot.CanvasAxisTickRenderer,
					tickOptions: {
						angle: -90,
						fontSize: '9pt'
					}
				},
				yaxis: {
					min: 0,
					tickInterval: 5
				}
			},
			legend: {
				placement: 'ne',
				show: true
			},
			grid: {
				borderWidth: 0.5,
				shadow: false
			},
			animate: true
		});
}