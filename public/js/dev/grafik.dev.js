function grafik()
{
	$('title').text('Grafik Peminjaman');

	link('#link-grafik');
			
	$.get(url_grafik, function(r)
	{
		if (r.bulan != '' && r.data != '') {
			chart(r.bulan, r.data);
		} else {
			$('.konten').html('<div class="alert kosong text-center"><strong>Peringatan!</strong> Grafik data peminjaman belum dapat dihasilkan.</div>');
		};
	});
}

function chart(bulan, data)
{
	Highcharts.setOptions({
		lang: {
			months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			shortMonths: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
			weekdays: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
			thousandsSep: '.',
			decimalPoint: ','
		}
	});
	
	$('.konten').highcharts({
		chart: {
			zoomType: 'x',
			spacingRight: 5
		},
		title: {
			text: 'Grafik Peminjaman'
		},
		subtitle: {
			text: document.ontouchstart === undefined ? 'Klik dan tarik di area plot untuk memperbesar' : 'Tarik jari Anda di atas plot untuk memperbesar'
		},
		xAxis: {
			type: 'datetime',
			maxZoom: 14 * 24 * 3600000, 
			title: {
				text: 'Tanggal Peminjaman'
			}
		},
		yAxis: {
			title: {
				text: 'Jumlah Peminjaman'
			}
		},
		tooltip: {
			shared: true
		},
		legend: {
			enabled: false
		},
		plotOptions: {
			area: {
				fillColor: {
					linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
					stops: [
						[0, Highcharts.getOptions().colors[0]],
						[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
					]
				},
				lineWidth: 1,
				marker: {
					enabled: false
				},
				shadow: false,
				states: {
					hover: {
						lineWidth: 2
					}
				},
				threshold: null
			}
		},
		series: [{
			type: 'area',
			name: 'Jumlah',
			pointInterval: 24 * 3600 * 1000,
			pointStart: Date.parse(bulan),
			data: data
		}],
		credits : {
			enabled : false
		}
	});
}