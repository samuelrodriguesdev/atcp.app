$(document).ready(function() {
    var consultoresTable = $('#consultores-table').DataTable({
        "initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
        processing: true,
        serverSide: true,
        ajax: config.url+'/consultores/list',
        "sDom": '<"top">rt<"bottom"ip><"clear">',
        "pagingType": "full",
        "columnDefs": [
        {
            "targets": [ 0,2,3 ],
            "className":"text-center",
        },
        {
            "targets": [ 2,3 ],
            "width":"15%",
        },
        {
            "targets": [ 0 ],
            "width":"10%",
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

    var toDeleteId;
    $.contextMenu({
        selector: '#consultores-table tbody tr', 
        callback: function(key, options) {
            var data = consultoresTable.row( this ).data();
                toDeleteId = data[0];

            switch (key) {
                case 'view':
                    window.location.href = config.url+"/Consultores/Detalhes/"+data[0]+"/";   
                break;
                case 'delete':
                    $('#deleteLabel').html(data[1]);
                    $('#confirmationBtn').attr('href', config.url+"/Consultores/Delete/"+data[0]+"/");
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