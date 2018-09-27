var tipe, iklan_id;
  
function likeIklan(id){
    tipe = 1;
    ajax_update(tipe, id);
}

function dislikeIklan(id){
    tipe = 0;
    ajax_update(tipe, id);
}

function ajax_update(tipe, iklan_id){
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        }
    });

    var dataIklan = {
        iklan_id: iklan_id,
        tipe: tipe
    }

    $.ajax({
        type: "POST",
        url: "/iklan/detail/like-dislike",
        data: dataIklan,
        success: function(data){
            location.reload(); 
            sessionStorage.setItem("scroll", 1);  
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(textStatus, errorThrown);
        }           
    });
}
