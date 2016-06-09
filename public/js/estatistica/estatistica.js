var Url = config.url;

var doughnutScalingFactor = function() {
    return Math.round(Math.random() * 100);
};
var doughnutColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var doughnutColor = function(opacity) {
    return 'rgba(' + doughnutColorFactor() + ',' + doughnutColorFactor() + ',' + doughnutColorFactor() + ',' + (opacity || '.3') + ')';
};
var config = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            ],
            backgroundColor: [
            "#F7464A",
            "#46BFBD",
            "#FDB45C",
            "#949FB1",
            "#4D5360",
            ],
            label: 'Dataset 1'
        }, {
            hidden: true,
            data: [
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            ],
            backgroundColor: [
            "#F7464A",
            "#46BFBD",
            "#FDB45C",
            "#949FB1",
            "#4D5360",
            ],
            label: 'Dataset 2'
        }, {
            data: [
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            doughnutScalingFactor(),
            ],
            backgroundColor: [
            "#F7464A",
            "#46BFBD",
            "#FDB45C",
            "#949FB1",
            "#4D5360",
            ],
            label: 'Dataset 3'
        }],
        labels: [
        "Red",
        "Green",
        "Yellow",
        "Grey",
        "Dark Grey"
        ]
    },
    options: {
        responsive: true,
        legend: {
            position: 'top',
        },

        animation: {
            animateScale: true,
            animateRotate: true
        }
    }
};
$('#randomizeDoughnut').click(function() {
    $.each(config.data.datasets, function(i, dataset) {
        dataset.data = dataset.data.map(function() {
            return doughnutScalingFactor();
        });
        dataset.backgroundColor = dataset.backgroundColor.map(function() {
            return doughnutColor(0.7);
        });
    });
    window.myDoughnut.update();
});
$.ajax({
    url: Url+'/estatistica/grafico1',
    dataType: 'json',
    type: "get",
}).done(function (result) {
    var array = $.map(result[1][0], function(el) { return el });
    var i, j=0, sum = 0, new_array = [];
    for (i=0;i<array.length; i++) {
        j++;
        sum+=array[i];
        if (j == 3) {
            new_array.push(sum.toFixed(2));
            sum=0;
            j=1;
        }
    }
    console.log(new_array);
    var barScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
    };
    var barColorFactor = function() {
        return Math.round(Math.random() * 255);
    };
    var barChartData = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro",],
        datasets: [{
            label: 'P.P Liquidados',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: $.map(result[0][0], function(el) { return el })
        }, {
            label: 'P.P Não Liquidados',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: $.map(result[1][0], function(el) { return el })
        }]
    };

    var bar = document.getElementById("bar").getContext("2d");
    window.myBar = new Chart(bar, {
        type: 'bar',
        data: barChartData,
        options: {
            tooltips: {
                mode: 'label'
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
    var doughnut = document.getElementById("doughnut").getContext("2d");
    window.myDoughnut = new Chart(doughnut, config);
    $('#randomizeBar').click(function() {
        $.each(barChartData.datasets, function(i, dataset) {
            dataset.backgroundColor = 'rgba(' + barColorFactor() + ',' + barColorFactor() + ',' + barColorFactor() + ',.7)';
            dataset.data = result;
        });
        window.myBar.update();
    });
});
