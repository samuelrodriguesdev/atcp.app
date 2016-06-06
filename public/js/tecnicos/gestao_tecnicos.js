$(document).ready(function() {
    var tecnicosTable = $('#tecnicos-table').DataTable({
        "initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
        processing: true,
        serverSide: true,
        ajax: config.url+'/tecnicos/list',
        "sDom": '<"top">rt<"bottom"ip><"clear">',
        "pagingType": "full",
        oLanguage: {
            sProcessing: ''
        },
        "columnDefs": [
        {
            "targets": [ 0,3 ],
            "visible": false,
        }
        ]
    });
    tecnicosTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    tecnicosTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    tecnicosTable.on( 'click', 'tr', function () {
        var data = tecnicosTable.row( this ).data();
        window.location.href = config.url+"/Tecnicos/Detalhes/"+data[0]+"/";
    });
});