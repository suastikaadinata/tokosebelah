    function commentIklan(user_id, iklan_id, isi, index){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        //e.preventDefault();
        
        // var commentData = {
        //     user_id: $('#user-comment-foto').val(),
        //     iklan_id: id,
        //     isi: $('#comment').val(),
        // }

        var commentData = {
            user_id: user_id,
            iklan_id: iklan_id,
            isi: isi,
        }

        console.log(commentData);
        $.ajax({
            type: "POST",
            url: "/iklan/detail/komentar",
            data: commentData,
            success: function () {
                var comment = '<div class="row row-user-comment">';
                comment += '<div class="col-xs-1 user-comment-foto">';
                comment += '<div class="picture-user-comment" style="background-image:url('+ $('#comment_user_picture').val() +');">';
                comment += '</div>';
                comment += '</div>'; 
                comment += '<div class="col-xs-11">';
                comment += '<div class="user-comment-list">';
                comment += '<h4 style="margin-top: 20px;">'+ $('#comment_username').val() +'</h4>';
                comment += '<p>'+ commentData.isi +'</p>';
                comment +=' </div>';
                comment += '</div>';
                comment += '</div>';

                $('#comment-list'+index).append(comment);
                $('#formComment'+index).trigger("reset");
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus, errorThrown);
            }
        });
    }

