var Url = config.url;
var randomColorFactor = function() {
    return Math.round(Math.random() * 255);
};
var randomColor = function(opacity) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '1') + ')';
};

var randomHexColor = function() {
    return '#'+Math.floor(Math.random()*16777215).toString(16);
}
var randomValue = function() {
    return Math.round(Math.random() * 100);
}
$('input').iCheck({
    checkboxClass : 'icheckbox_flat-green',
    radioClass    : 'iradio_flat-green',
    increaseArea  : '20%' 
});

$('#grafico1_input1, #grafico2_input1, #grafico3_input3').select2({
    placeholder: '',
    allowClear: true,
    ajax: {
        url: config.url+'/select/pp_years',
        dataType: 'json',
        data: function (params) {
            return {
                term : params.term || '',
                page : params.page || 1
            }
        },
        cache: true
    },
});
$('#grafico1_input2, #grafico2_input2, #grafico3_input2').select2({
    placeholder: '',
    allowClear: true,
    ajax: {
        url: config.url+'/select/lista_organismos',
        dataType: 'json',
        data: function (params) {
            return {
                term : params.term || '',
                page : params.page || 1
            }
        },
        cache: true
    },
});
$.ajax({
    url: Url+'/estatistica/grafico2',
    dataType: 'json',
    type: "get",
}).done(function (result) {
    var doughnutConfig = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: $.map(result[0], function(el) { return el }),
                backgroundColor: [
                "#9933ff",
                "#F7464A",
                "#46BFBD",
                ],
                label: 'Dataset 1'
            }],
            labels: [
            "Total",
            "Não Liquidado",
            "Liquidado",
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
    var doughnut = document.getElementById("doughnut").getContext("2d");
    window.myDoughnut = new Chart(doughnut, doughnutConfig);
    $('#grafico2_input2, #grafico2_input1').change(function() {
        var ppCe = $('#grafico2_input2').val(),
        ppYear         = $('#grafico2_input1').val();
        $.ajax({
            url: Url+'/estatistica/grafico2',
            dataType: 'json',
            type: "get",
            data: { "ppYear": ppYear, "ppCe": ppCe },
        }).done(function (result) {
            $.each(doughnutConfig.data.datasets, function(i, dataset) {
                dataset.data = $.map(result[0], function(el) { return el });
            });
            window.myDoughnut.update();
        });
    });
});
$.ajax({
    url: Url+'/estatistica/grafico1',
    dataType: 'json',
    type: "get",
}).done(function (result) {
    var barChartData = {
        labels: ['1º', '2º', '3º', '4º'],
        datasets: [{
            label: 'P.P Valor Pedido',
            backgroundColor: "rgba(0,255,0,0.3)",
            data: result[0]
        }, {
            label: 'P.P Valor em Dívida',
            backgroundColor: "rgba(255,0,0,0.3)",
            data: result[1]
        }]
    };
    var bar = document.getElementById("bar").getContext("2d");
    window.myBar = new Chart(bar, {
        type: 'bar',
        data: barChartData,
        options: {
            title:{
                display:true,
                text:"Pedidos de Pagamento"
            },
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
    $('#grafico1_input2, #grafico1_input1').change(function() {
        var ppCe = $('#grafico1_input2').val(),
        ppYear         = $('#grafico1_input1').val();
        $.ajax({
            url: Url+'/estatistica/grafico1',
            dataType: 'json',
            type: "get",
            data: { "ppYear": ppYear, "ppCe": ppCe },
        }).done(function (result) {
            $.each(barChartData.datasets, function(i, dataset) {
                dataset.data = result[i];
            });
            window.myBar.update();
        });
    });
});
$('#grafico3_input1').select2();
$.ajax({
    url: Url+'/estatistica/grafico3',
    dataType: 'json',
    type: "get",
}).done(function (result) {
    var grafico3Data = {
        labels: ['1º', '2º', '3º', '4º'],
        datasets: [{
            label: 'Total Elaboração de Candidatura',
            backgroundColor: "rgba(250,50,40,0.7)",
            data: result[0].data
        },
        {
            label: 'Total Consultoria',
            backgroundColor: "rgba(61,57,253,0.7)",
            data: result[1].data
        }, {
            label: 'Total Formação',
            backgroundColor: "rgba(243,235,41,0.7)",
            data: result[2].data
        }]
    };
    var grafico3Config = {
        type: 'bar',
        data: grafico3Data,
        options: { 
            title:{
                display:true,
                text:"Total por Tipo de Apoio Técnico"
            },
            tooltips: {
                mode: 'label'
            },
            responsive: true,
            scales: {
                xAxes: [{

                    barPercentage:1,

                }],
                yAxes: [{

                    ticks: {
                        min: 0,
                    },
                }]
            },
        }
    };
    var grafico3 = document.getElementById("grafico3").getContext("2d");
    window.grafico3 = new Chart(grafico3, grafico3Config);
    var $search              = {};
    $search['contrato_tipo'] = 1;
    $('#grafico3_input1').change(function() {
        var contrato_tipo = this.value;
        $search['contrato_tipo'] = contrato_tipo;
        $.ajax({
            url: Url+'/estatistica/grafico3',
            dataType: 'json',
            type: "get",
            data: { "contrato_tipo": contrato_tipo },
        }).done(function (result) {
            grafico3Config.data.datasets=[];
            $.each(result, function(key, value) {
                var newDataset = {
                    label: result[key].label,
                    borderColor: randomColor(0.4),
                    backgroundColor: randomColor(0.5),
                    pointBorderColor: randomColor(0.7),
                    pointBackgroundColor: randomColor(0.5),
                    pointBorderWidth: 1,
                    data: result[key].data,
                };
                grafico3Config.data.datasets.push(newDataset);
            });
            window.grafico3.update();
            contrato_tipo == 2 ? $('#apoio_tipo').show() : $('#apoio_tipo').hide()
        });
    });

    $search['consultoria']   = false;
    $search['formacao']      = false;
    $('.chk_search').on('ifToggled', function(e) {
        e.preventDefault();
        $search[this.id] = this.checked;
        $.ajax({
            url: Url+'/estatistica/grafico3',
            dataType: 'json',
            type: "get",
            data: $search,
        }).done(function (result) {
            grafico3Config.data.datasets=[];
            $.each(result, function(key, value) {
                var newDataset = {
                    label: result[key].label,
                    borderColor: randomColor(0.4),
                    backgroundColor: randomColor(0.5),
                    pointBorderColor: randomColor(0.7),
                    pointBackgroundColor: randomColor(0.5),
                    pointBorderWidth: 1,
                    data: result[key].data,
                };
                grafico3Config.data.datasets.push(newDataset);
            });
            window.grafico3.update();
        }); 
    });

    $('#grafico3_input2, #grafico3_input3').change(function() {

        $search['ppYear'] = $('#grafico3_input3').val();
        $search['ppCe']   = $('#grafico3_input2').val();

        $.ajax({
            url: Url+'/estatistica/grafico3',
            dataType: 'json',
            type: "get",
            data: $search,
        }).done(function (result) {
            grafico3Config.data.datasets=[];
            $.each(result, function(key, value) {
                var newDataset = {
                    label: result[key].label,
                    borderColor: randomColor(0.4),
                    backgroundColor: randomColor(0.5),
                    pointBorderColor: randomColor(0.7),
                    pointBackgroundColor: randomColor(0.5),
                    pointBorderWidth: 1,
                    data: result[key].data,
                };
                grafico3Config.data.datasets.push(newDataset);
            });
            window.grafico3.update();
        });
    });
});



$.ajax({
    url: Url+'/estatistica/grafico4',
    dataType: 'json',
    type: "get",
}).done(function (results) {

    var grafico4Data = {
        labels: results.labels,
        datasets:[]
    };
    
    grafico4Data.datasets=[];
    console.log(results['data']);
    for (var i = 0; i < results['data'].length; i++) {
        var newDataset = {
            label: 'zz',
            borderColor: randomColor(0.4),
            backgroundColor: randomColor(0.5),
            pointBorderColor: randomColor(0.7),
            pointBackgroundColor: randomColor(0.5),
            pointBorderWidth: 1,
            data: results.data[i],
        };
        grafico4Data.datasets.push(newDataset);
       
    }
    

    var grafico4Config = {
        type: 'horizontalBar',
        data: grafico4Data,
        options: {
           tooltips: {
            mode: 'label'
        },
        responsive: true,
        legend: {
            display:false,
        },
        title: {
            display: true,
            text: 'Chart.js Horizontal Bar Chart'
        },
        scales: {
            yAxes: [{
                stacked: true
            }]
        }
    }
};
var grafico4 = document.getElementById("grafico4").getContext("2d");
window.grafico4 = new Chart(grafico4, grafico4Config);

    /*$('#grafico4_input1, #grafico4_input2, #grafico4_input3').change(function() {
        var ppCe   = $('#grafico4_input2').val(),
        ppYear     = $('#grafico4_input1').val(),
        ppPrograma = $('#grafico4_input3').val();
        $.ajax({
            url: Url+'/estatistica/grafico4',
            dataType: 'json',
            type: "get",
            data: { "ppYear": ppYear, "ppCe": ppCe, "ppPrograma": ppPrograma},
        }).done(function (result) {

            grafico4Config.data.labels = result.labels;
            dataset.data = result.data;
            dataset.backgroundColor = result.data;
            $.each(result.labels, function(index, val) {
                colorArray.push(randomHexColor());
            });
            dataset.backgroundColor = colorArray;
            window.grafico4.update();
        })
    });*/
});
