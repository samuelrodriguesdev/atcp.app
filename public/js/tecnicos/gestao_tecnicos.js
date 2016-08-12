$(document).ready(function() {
    var tecnicosTable = $('#tecnicos-table').DataTable({
        "initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
        processing: true,
        serverSide: true,
        ajax: config.url+'/tecnicos/list',
        "pagingType": "full",

        oLanguage: {
            sProcessing: ''
        },
        "columnDefs": [
        {
            "targets": [ 3 ],
            "visible": false,
        },
        {
            "targets": [ 0,2 ],
            "className":"text-center",
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
    var toDeleteId;
    $.contextMenu({
        selector: '#tecnicos-table tbody tr', 
        callback: function(key, options) {
            var data = tecnicosTable.row( this ).data();
                toDeleteId = data[0];

            switch (key) {
                case 'view':
                    window.location.href = config.url+"/Tecnicos/Detalhes/"+data[0]+"/";   
                break;
                case 'delete':
                    $('#deleteLabel').html(data[1]);
                    $('#confirmationBtn').attr('href', config.url+"/Tecnicos/Delete/"+data[0]+"/");
                    $('.modal').modal();
                break;
            }
        },
        items: {
            "view": {name: "Ver", icon: "edit"},
            "delete": {name: "Apagar", icon: "delete"},
            "sep1": "---------",
            "quit": {name: "Sair", icon: function(){
                return 'context-menu-icon context-menu-icon-quit';
            }}
        }
    });

}); 