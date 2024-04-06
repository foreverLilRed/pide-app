$(document).ready(function() {
    $("#buscar").on("keyup", function() {
      var valor = $(this).val();
      $.ajax({
        url: "/usuarios/buscar",
        method: "GET",
        data: {
          valor: valor
        },
        success: function(data) {
          $("#users").html(data);
        }
      });
    });
  });