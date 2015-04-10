//Flot Line Chart
$(document).ready( $(function() {
    var ticksHari = [[0, "Senin"], [1, "Selasa"], [2, "Rabu"], [3, "Kamis"],[4, "Jumat"]];
 
    var barOptions = {
        series: {
            bars: {
                align:"center",
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "Hari: %x, y: %y"
        },
        xaxis: {
            axisLabel: "Hari",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticksHari
        }
    };
    var barData = {
        label: "bar",
        data: [
            [0, 100],
            [1, 25],
            [2, 120],
            [3, 300],
            [4, 400]
        ]
    };
    $.plot($("#flot-bar-chart-hari"), [barData], barOptions);


    var dataShelter = [{
        label: "Januari",
        data: 100
    }, {
        label: "Februari",
        data: 100
    }, {
        label: "Maret",
        data: 80
    }, {
        label: "April",
        data: 20
    }, {
        label: "Mei",
        data: 60
    }, {
        label: "Juni",
        data: 40
    }, {
        label: "Juli",
        data: 15
    }, {
        label: "Agustus",
        data: 10
    }, {
        label: "September",
        data: 10
    }, {
        label: "Oktober",
        data: 10
    }, {
        label: "November",
        data: 10
    }, {
        label: "Desember",
        data: 10
    }];

    var plotObj = $.plot($("#flot-bar-chart-bulan"), dataShelter, {
        series: {
            pie: {
                show: true,
                radius:150
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });
    var ticksTahun = [[0, "2013"]];
 
    var barOptions = {
        series: {
            bars: {
                align:"center",
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: "Tahun: %x, y: %y"
        },
        xaxis: {
            axisLabel: "Tahun",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            ticks: ticksTahun
        }
    };
    var barData = {
        label: "bar",
        data: [
            [0, 100]
        ]
    };
    $.plot($("#flot-bar-chart-tahun"), [barData], barOptions);

    var dataShelter = [{
        label: "Pocin",
        data: 100
    }, {
        label: "Stasiun UI",
        data: 100
    }, {
        label: "Teknik",
        data: 80
    }, {
        label: "Ekonomi",
        data: 20
    }, {
        label: "Perpusat",
        data: 60
    }, {
        label: "FISIP",
        data: 40
    }, {
        label: "FIB",
        data: 15
    }, {
        label: "Pusgiwa",
        data: 10
    }];

    var plotObj = $.plot($("#flot-pie-chart-shelter"), dataShelter, {
        series: {
            pie: {
                show: true,
                radius:150
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });
}));