$(document).ready(function(){
	//dataTable
	$('#table').DataTable({
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
	});
	$('#inventoryTable').DataTable( {
		"oLanguage": { "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
		"ajax": $('#inventoryTable').attr('url'),
		"columns": [
			{ "data": "created_at"},
			{ "data": "farm.name"},
			{ "data": "quantity" },
			{ "data": "product.name"}
		],
		"createdRow": function ( row, data, index ) {
			if(data.status ==  parseInt(process.env.MIX_ADD_STOCK)){
				$(row).addClass('bg-success-light');
			}else if(data.status ==  parseInt(process.env.MIX_REMOVE_STOCK)){
				$(row).css('background-color','#e57373');
			}else if(data.status ==  parseInt(process.env.MIX_CHANGE_STOCK)){
				$(row).addClass('bg-info');
			}
		},
	});
});