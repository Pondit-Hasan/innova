$(document).ready(function(){

// this script will show password by onclick
  $("#eye").click(function () {
      if ($("#exampleInputPassword1").attr("type") === "password") {
          $("#exampleInputPassword1").attr("type", "text");
          $(".eye").removeClass("mdi-eye-off");
          $(".eye").addClass("mdi-eye");
      } else {
          $("#exampleInputPassword1").attr("type", "password");
          $(".eye").removeClass("mdi-eye");
          $(".eye").addClass("mdi-eye-off");
      }
  });

  })
