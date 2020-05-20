// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    ordering:  false
  });
  $('#dataTable2').DataTable({
    ordering:  false
  });
  $('#dataTablesearch').DataTable({
    ordering:  true
  });
});
