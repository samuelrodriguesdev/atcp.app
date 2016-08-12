$(document).ready(function() {
	var Url = config.url,
	organimosEntidadesTable = $('#organismosEntidades-table').DataTable({
		"initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
      	processing: true,
      	serverSide: true,
      	ajax: Url+'/organismos_entidades/data-table',
      	"sDom": '<"top">rt<"bottom"ip><"clear">',
        "columnDefs": [
        {
            "targets": [ 0 ],
            "className":"text-center",
        }
        ]
   	});
   	organimosEntidadesTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    organimosEntidadesTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    organimosEntidadesTable.on( 'click', 'tr', function () {
    	var data = organimosEntidadesTable.row( this ).data();
    	window.location.href = Url+"/Instituicoes/Detalhes/"+data[0]+"/";
    });
    
    var toDeleteId;
    $.contextMenu({
        selector: '#organismosEntidades-table tbody tr', 
        callback: function(key, options) {
            var data = organimosEntidadesTable.row( this ).data();
                toDeleteId = data[0];

            switch (key) {
                case 'view':
                    window.location.href = config.url+"/Instituicoes/Detalhes/"+data[0]+"/";   
                break;
                case 'delete':
                    $('#deleteLabel').html(data[1]);
                    $('#confirmationBtn').attr('href', config.url+"/OrganismosEntidades/Delete/"+data[0]+"/");
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