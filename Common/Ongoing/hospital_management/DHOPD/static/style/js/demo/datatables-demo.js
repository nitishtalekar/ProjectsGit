// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    ordering:  false
  });
  $('#dataTable2').DataTable({
    ordering:  false
  });

  $('#dataTablesearch').DataTable({
    ordering:  true ,
    "columns": [
    { "width": "2%" },
    { "width": "18%" },
    null,
    null,
    { "width": "25%" },
    null,
    { "width": "8%" },
    { "width": "10%" }
  ]
  });

  $('#dataTablereport_preview').DataTable({
    ordering:  false ,
    "columns": [  
      { "width": "8%" },
      { "width": "2%" },
      { "width": "18%" },
      null,
      null,
      null,
      { "width": "25%" },
      { "width": "10%" }
  ]
  });

  $('#dataTablereport').DataTable({
    ordering:  false ,
    searching: false ,
    "bPaginate": false,
    "paging": false,
    "bInfo" : false,
    "bAutoWidth": false,
    "aoColumns": [  
      { "width": "10%" },
      { "width": "5%" },
      { "width": "15%" },
      { "width": "15%" },
      { "width": "10%" },
      { "width": "13%" },
      { "width": "22%" },
      { "width": "10%" },
  ],
  fixedColumns: true
  });

});
