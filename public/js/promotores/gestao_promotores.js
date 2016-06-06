$(document).ready(function() {
	var Url = config.url,
	promotoresTable = $('#promotores-table').DataTable({
		"initComplete": function(settings, json) {
            $('div.overlay').css('visibility', 'hidden');
        },
      	processing: true,
      	serverSide: true,
      	ajax: Url+'/promotores/data-table',
      	"sDom": '<"top">rt<"bottom"ip><"clear">',
   	});
   	promotoresTable.on( 'preXhr.dt', function () {
        $('div.overlay').css('visibility', 'visible');
    });
    promotoresTable.on( 'xhr.dt', function () {
        $('div.overlay').css('visibility', 'hidden');
    });
    promotoresTable.on( 'click', 'tr', function () {
    	var data = promotoresTable.row( this ).data();
    	window.location.href = Url+"/Promotores/Detalhes/"+data[0]+"/";
    });
});