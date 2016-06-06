$(document).ready(function() {
	var Url = config.url,
	programasTable = $('#programas-table').DataTable({
		"initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
      	processing: true,
      	serverSide: true,
      	ajax: Url+'/programas/data-table',
      	"sDom": '<"top">rt<"bottom"ip><"clear">',
   	});
   	programasTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    programasTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    programasTable.on( 'click', 'tr', function () {
    	var data = programasTable.row( this ).data();
    	window.location.href = Url+"/Programas/Detalhes/"+data[0]+"/";
    });
});