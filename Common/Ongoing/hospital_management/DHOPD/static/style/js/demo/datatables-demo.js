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
  
  $('#dataTablereport').DataTable({
    ordering:  false ,
    searching: false ,
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
});
