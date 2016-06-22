$(document).ready(function() {
    var consultoresTable = $('#consultores-table').DataTable({
        "initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
        processing: true,
        serverSide: true,
        ajax: config.url+'/consultores/contratos',
        "sDom": '<"top">rt<"bottom"ip><"clear">',
        "pagingType": "full",
        "columnDefs": [
        {
            "targets": [ 2,3 ],
            "className":"text-center",
        },
        {
            "targets": [ 0 ],
            "visible": false,
        },
        {
            "targets": [ 2,3 ],
            "width":"25%",
        }
        ],
        oLanguage: {
            sProcessing: ''
        },
    });
    consultoresTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    consultoresTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    consultoresTable.on( 'click', 'tr', function () {
        var data = consultoresTable.row( this ).data();
        window.location.href = config.url+"/Consultores/Detalhes/"+data[0]+"/";
    });
});