$(document).ready(function () {
     var count = 0;
     $('i.icon-remove').click(function () {
          count++;
          $(this).parent('#remove').fadeOut(300);      // The clicked link is being faded out slowly.
          var  subid = $(this).attr('data-subid'),
               total = $('#total').attr('data-total'),
               cartcount = $('#count').attr('data-count');
          $.ajax({
               url : "buylater.php",
               data : {
                    subid : subid,
                    total : total
               },
               type : "POST",
               dataType : "text",
               success : function (response) {
                    if (response === "0") {
                         window.location = 'cart.php';
                    } else if (response !== '') {
                         $('a.' + subid + '').css("background-color", "white");
                         $('.' + subid + '').animate({ opacity: [ 0.15, "linear" ] }, 300);
                         $('#totalshow').html("Total:&nbsp;&nbsp;<b class=\"ruppeefont\">`</b> " + response + "");
                         var formatted = response.replace(/\,/g, "");
                         $('#total').attr('data-total', formatted);
                    }
                    if ((cartcount-count) ===1 ) {
                         if (count === 1) {
                              $('#count').html('Cart (' + (cartcount-count) + ' item)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"gray\">Buy Later(1 item)</span>');
                         } else if (count > 1) {
                              $('#count').html('Cart (' + (cartcount-count) + ' item)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"gray\">Buy Later(' + count + ' items)</span>');
                         }
                    } else {
                         if (count === 1) {
                              $('#count').html('Cart (' + (cartcount-count) + ' items)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"gray\">Buy Later(1 item)</span>');
                         } else if (count > 1) {
                              $('#count').html('Cart (' + (cartcount-count) + ' items)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=\"gray\">Buy Later(' + count + ' items)</span>');
                         }
                    }
               },
               error : function (xhr, status) {
                    //alert("Sorry, there was a problem!");
               },
               complete : function (xhr, status) {
                    //alert("The request is complete!");
               }
          });
          return false;
     });
     $(".hide").ajaxStart(function () {
          $(this).show();
     }).ajaxStop(function () {
          $(this).hide();
     });
});