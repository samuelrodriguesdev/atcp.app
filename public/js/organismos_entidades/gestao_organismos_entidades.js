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
   	});
   	organimosEntidadesTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    organimosEntidadesTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    organimosEntidadesTable.on( 'click', 'tr', function () {
    	var data = organimosEntidadesTable.row( this ).data();
    	window.location.href = Url+"/Organismos-Entidades/Detalhes/"+data[0]+"/";
    });
});