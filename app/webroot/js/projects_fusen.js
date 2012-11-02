var fusen_number = 1;

$(function() {
    $('#new_fusen').click(function() {
        make();
        fusen_number = fusen_number + 1; 
    });
})

function make() {
    var sticky = $('<div draggable="true" ondragstart="f_dragstart(event)" ondrag="f_drag(event, this)" id="stickies1_' + fusen_number + '"><div class="stittl">' +
                   'maehira<div class="sticlose">×</div></div>' +
                   '<textarea class="stimain" id="" name="1000"></textarea></div>'
                 );
    sticky.appendTo('body');
    var id = '#stickies1_' + fusen_number;
    set_fusen(id ,850 , 80, 200, 75, '#666', '#fff', '1px solid #ccc', 12, '#ddeedd');
  }


/**
 * 付箋設定
 */
function set_fusen(stID, wx, wy, ww, wh, co, bc, lc, zi, tc){
    $(stID).css({
        position: 'absolute', 
        top: wy, 
        left: wx, 
        width: ww, 
        height: wh, 
        color: co,
        //'background-color': bc,
        //'border': lc,
        'z-index': zi
    }).fadeIn('slow');
    $(stID + ' .stittl').css({
        'background-color': tc
    }).fadeIn('slow');
    $(stID + ' .stittl .sticlose').click(function(){
        $(stID).fadeOut('slow');
    });
//    $(stID + ' .stittl').mousedown(function(e){
//        var mx = e.pageX;
//        var my = e.pageY;
//        $(document).on('mousemove', function(e) {
//            wx += e.pageX - mx;
//            wy += e.pageY - my;
//            $(stID).css({
//                top: wy, 
//                left: wx
//            });
//            mx = e.pageX;
//            my = e.pageY;
//            return false;
//        }).one('mouseup', function(e){
//            $(document).off('mousemove');
//        });
//        return false;
//    });
}

