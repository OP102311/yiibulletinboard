var votes = new Array();

function v(cid, votetype, uid) {
    if (votes[cid] >= 1) {
        //already voted
    } else if (votes[cid] == -1) {
        return false;
    } else {
        votes[cid] = -1;
        $.ajax({
            type: 'POST',
            url: '/index.php/comment/rating',
            data: 'comment_id=' + cid + '&user=' + uid + '&vote_type=' + votetype,
            success: function () {
                var vId = $('#v' + cid);
                var rating = parseInt(vId.text());        //get current comment rating
                switch (votetype) {
                    case 0:                                         //increase current comment rating on page
                        rating++;
                        vId.animate(
                            {top: -22}, 250, 'easeIn',
                            function () {
                                vId.text(rating);
                                vId.css({top: 22});
                                vId.animate({top: 0}, 250, 'easeOut',
                                    function () {
                                        votes[cid] = 1;
                                    });
                            });
                        break;
                    case 1:                                         //decrease current comment rating on page
                        rating--;
                        vId.animate({top: 22}, 250, 'easeIn', function () {
                            vId.text(rating);
                            vId.css({top: -22});
                            vId.animate({top: 0}, 250, 'easeOut', function () {
                                votes[cid] = 1;
                            });
                        });
                        break;
                    default:
                        break;
                }
            }
        });
    }
    return false;
}
