$(document).ready(function(){

    $(".button").click(function(e){
        e.preventDefault();
        var id_article = $(this).attr("id_article");
        
    
        $.ajax({
            method: "GET",
            url: "popup.php",
            data: "id_article="+id_article,
            success: function(data) {
                $("#popup1 .content").html(data);
                $(".overlay").css({
                    "visibility": "visible",
                    "opacity": 1
                });
            }
        })
    });
    
    
   $("#popup1 .close").click(function(e) {
       e.preventDefault();
       
       $(".overlay").css({
                    "visibility": "hidden",
                    "opacity": 0
                });
   });
});

