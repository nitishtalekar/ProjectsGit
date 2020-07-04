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
        if(arr[k].size > 5000000){
          valid_size = valid_size + 1;
        }
      }
      if(valid_type > 0){
        $(err_lbl).html("* FILE format is wrong (Only jpeg,png,Pdf)");
      }
      else if(valid_size > 0){
        console.log(valid_size);
        $(err_lbl).html("* Each file must be less than 5 MB");
      }
      else{
        for (k=0;k<arr.length;k++){
          files = files+arr[k].name+" , ";
        }
        files = files.slice(0, -3);
        $(lbl).text(files);
      }
    });

    $("#open").click(function(){
      $("#form-open").slideToggle(1500);
      $("html, body").animate({
          scrollTop: $("#startdiv")[0].scrollHeight
      }, 1500);
    });

    $("#form-submit").click(function(){
      console.log("HELLO");
      $("#main-error").html("");
      var error = 0;
      $(".input-field").each(function(){
        var errid = "#"+$(this).attr("id")+"-err";
        if(!$(this).val()){
          $(errid).slideDown("slow");
          error = error+1;
        }
        else{
          $(errid).slideUp("slow");
        }
      });
      
      if($('#alcohol input[type="radio"]:checked').length == 0){
        $("#alcohol-err").slideDown("slow");
        error = error+1;
      }
      else{
        $("#alcohol-err").slideUp("slow",function(){
        });
      }
      
      if($("#inputGroupSelect01 option:selected").val() == "-"){
        $("#cuisine-err").slideDown("slow");
        error = error+1;
        }
        else{
          $("#cuisine-err").slideUp("slow");
        }
      
      $(".option").each(function(){
        var id = "#"+$(this).attr("id");
        var errid = "#"+$(this).attr("id")+"-err";
        if($(id + " input[type=checkbox]:checked").length == 0){
          $(errid).slideDown("slow");
          error = error+1;
        }
        else{
          $(errid).slideUp("slow");
        }
      });
      $(".uploading").each(function(){
        var id = $(this).attr("id");
        var files = $("#"+id)[0].files;
        var err_lbl = "#"+id+"-error";
        if(files.length == 0){
          error = error + 1;
          var req = id.split("-")[0];
          $(err_lbl).html("* Please Upload a file");
        }
      });

      if(error == 0){
        $("#final-submit").click();
      }
      else{
        $("#main-error").html("Please Fill All field with appropriate values");
      }

    })

});

  