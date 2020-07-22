$(document).ready(function() {
      $('.uploading').change(function() {
      var i = $(this).prev('label').clone();
      var id = $(this).attr("id");
      var lbl = "#"+id+"-label";
      var err_lbl = "#"+id+"-error";
      var arr = $("#"+id)[0].files
      var files = "";
      var valid_type = 0;
      for (k=0;k<arr.length;k++){
        if(arr[k].type != 'image/jpeg' && arr[k].type != 'image/png' && arr[k].type != 'application/pdf' && arr[k].type != 'image/jpg'){
          valid_type = valid_type + 1;
        }
      }
      var valid_size = 0;
      for (k=0;k<arr.length;k++){
        if(arr[k].size > 5000){
          valid_size = valid_size + 1;
        }
      }
      // if(valid_type > 0){
      //   $(err_lbl).html("* FILE format is wrong (Only jpeg,png,Pdf)");
      // }
      // else if(valid_size > 0){
      //   $(err_lbl).html("* Each file must be less than 5 MB");
      // }
      // else{
        for (k=0;k<arr.length;k++){
          files = files+arr[k].name+" , ";
        }
        files = files.slice(0, -3);
        $(lbl).text(files);
      // }
    });

    $("#open").click(function(){
      $("#form-open").slideToggle(1500);
      $("html, body").animate({
          scrollTop: $("#startdiv")[0].scrollHeight
      }, 1500);
    });

    $("#form-submit").click(function(){
      $("#error").html("");
      var error = 0;
      if($("#paydiv input[type=checkbox]:checked").length == 0){

        error = error + 1;
        $("#error").append("* select payment method</br>");
      }
      if($("#servicediv input[type=checkbox]:checked").length == 0){

        error = error + 1;
        $("#error").append("* select Services</br>");
      }
      if($("#offerdiv input[type=checkbox]:checked").length == 0){

        error = error + 1;
        $("#error").append("* select Offers available</br>");
      }
      if($("#alcoholdiv input[type=radio]:checked").length == 0){

        error = error + 1;
        $("#error").append("* select Alcohol serving</br>");
      }
      $(".uploading").each(function(){
        var id = $(this).attr("id");
        var files = $("#"+id)[0].files;
        if(files.length == 0){
          error = error + 1;
          var req = id.split("-")[0];
          $("#error").append("* upload "+ req +" </br>");
        }
      });

      if(error == 0){
        $("#final-submit").click();
      }

    })

});
