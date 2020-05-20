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
    { "width": "20%" },
    { "width": "30%" },
    null,
    null,
    null
  ]
  });
});
