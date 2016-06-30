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

    $.contextMenu({
        selector: '#tecnicos-table tbody tr', 
        callback: function(key, options) {
            var data = tecnicosTable.row( this ).data();
   
            switch (key) {
                case 'view':
                    window.location.href = config.url+"/Tecnicos/Detalhes/"+data[0]+"/";   
                break;
                case 'delete':
                    confirm("Press a button! to delete"+data[1]);
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

    $('.context-menu-one').on('click', function(e){
        console.log('clicked', this);
    }); 

});