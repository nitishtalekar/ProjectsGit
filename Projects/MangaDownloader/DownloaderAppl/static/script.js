$(document).ready(function(){
  console.log("Ready");
  $("#downloadModal").modal("hide");
  if($(".dwnld").html() == "true"){
    $("#downloadModal").modal("show");
    $(".dwnld").html('false');
  }
});

$(document).on('click', '.manga-container', function() { 
  var m_id = $(this).attr("id"); 
  $("#manga-name").val($(this).find(".manga-title").html());
  $("#manga-cover").val($(this).find(".manga-cover").html());
  $("#manga-val").val(m_id);
  $("#manga-submit").click();
});

$(document).on('click', '.manga-chapter', function() { 
  $(this).addClass("manga-chapter-selected");
  $(this).removeClass("manga-chapter");
  $(this).find(".manga-title").addClass("manga-title-selected");
  $(this).find(".manga-title").removeClass("manga-title");
  $("#create-manga").slideDown();
});

$(document).on('click', '.manga-chapter-selected', function() { 
  $(this).addClass("manga-chapter");
  $(this).removeClass("manga-chapter-selected");
  $(this).find(".manga-title-selected").addClass("manga-title");
  $(this).find(".manga-title-selected").removeClass("manga-title-selected");
  if($('.manga-chapter-selected').length == 0){
    $("#create-manga").slideUp();
  }
});

$(document).on('click', '#create', function() { 
  var chp_nos = "";
  var links = "";
  $(".manga-chapter-selected").each(function(){
    chp_nos = chp_nos + $(this).find(".chp-no").html() + ",";
    links = links + $(this).attr("id") + ",";
  });
  links = links.slice(0, -1);
  $("#chapter-val").val(links);
  $("#chp_nos").val(chp_nos.slice(0, -1));
  $("#chp-numbers").html(chp_nos.slice(0, -1));
  $("#confirmModal").modal("show");
});

$(document).on('click', '#create-pdf', function() { 
  $("#confirmModal").modal("hide");
  $("#loadingModal").modal("show");
  $("#chapter-submit").click();
});




