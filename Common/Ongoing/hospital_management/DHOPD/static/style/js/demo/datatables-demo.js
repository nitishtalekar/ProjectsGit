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
    null,
    { "width": "15%" },
    null,
    null,
    { "width": "25%" },
    null,
    null,
    { "width": "10%" }
  ]
  });
  $('#dataTablereport').DataTable({
    ordering:  false ,
    searching: false ,
    "columns": [
    null,
    { "width": "15%" },
    null,
    null,
    { "width": "25%" },
    null,
    null,
    { "width": "10%" }
  ]
  });
});
