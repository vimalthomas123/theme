$("input#keyword").keyup(function() {
      if ($(this).val().length > 1) {
        $("#datafetch").show();
      } 
      if ($(this).val().length > -1) {
            $("#datafetch").show();
      }
});