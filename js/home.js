var main = function() {
      /*Remove toggle*/
        $('#edit').click(
          function(){
              $('.remove').toggle();
          }
        );

        /*Selected CSS*/
        $('#filterList').on('mouseenter', '.item',
          function( event ) {
            $(this).addClass("selectable");
          }).on('mouseleave', '.item', function( event ) {
            $(this).removeClass("selectable");
          }
        );



        /*Block Checker */
        $('#openUrl').click(
          function() {
            var urlArray = $(".itemDesc");
            var currentUrl = $("#currentUrl").val();
            var blocked = "http://www.kevinduong.me/phpbuild/blocked.php";
            for(var i = 0; i < urlArray.length; i++) {
              if(urlArray.get(i).innerHTML == currentUrl) {
                currentUrl = blocked;
                break;
              }
            }
            $("iframe").attr('src', currentUrl);
          }
        );


}

$(document).ready(main);
