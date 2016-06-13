var Url = config.url;

$('#grafico1_input1, #grafico2_input1').select2({
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

$('#grafico1_input2, #grafico2_input2').select2({
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
    var config = {
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
    window.myDoughnut = new Chart(doughnut, config);

    $('#grafico2_input2, #grafico2_input1').change(function() {
        var ppCe = $('#grafico2_input2').val(),
        ppYear         = $('#grafico2_input1').val();
        $.ajax({
            url: Url+'/estatistica/grafico2',
            dataType: 'json',
            type: "get",
            data: { "ppYear": ppYear, "ppCe": ppCe },
        }).done(function (result) {

            $.each(config.data.datasets, function(i, dataset) {
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

$.ajax({
    url: Url+'/estatistica/grafico3',
    dataType: 'json',
    type: "get",
}).done(function (result) {

    var barChartData = {
        labels: ['1º', '2º', '3º', '4º'],
        datasets: [{
            label: 'NºHoras Consultoria',
            backgroundColor: "rgba(0,255,0,0.3)",
            data: [200,100,150,125]
        }, {
            label: 'Total Consultoria',
            backgroundColor: "rgba(255,0,0,0.3)",
            data: [1000,2000,3000,4000]
        },{
            label: 'NºHoras Formação',
            backgroundColor: "rgba(255,0,0,0.3)",
            data: [125,150,100,200]
        },{
            label: 'Total Formação',
            backgroundColor: "rgba(255,0,0,0.3)",
            data: [4000,3000,2000,1000]
        }]
    };

    var bar = document.getElementById("grafico3").getContext("2d");
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
