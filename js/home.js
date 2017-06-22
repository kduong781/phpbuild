var main = function() {
        $('#add').click(
          function(){
            if($('.remove').is(":visible")) {
                $('.remove').toggle();
            }
          //  var filterName = $("#filterName").val();
            var filterDesc = $("#filterDesc").val();
            $("#filterList").append("<div class='item'><span class='itemDesc'>"+filterDesc+"</span><button type='button' class='btn-xs btn-danger right remove'>Remove</button></div>");
            $("#filterForm").modal("hide");
            $("#filterName").val("");
            $("#filterDesc").val("");
          }
        );

        $('#edit').click(
          function(){
              $('.remove').toggle();
          }
        );

        /* Deleting Item from List*/
        $('#filterList').on('click','.remove',
          function() {
            $(this).closest(".item").remove();
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
