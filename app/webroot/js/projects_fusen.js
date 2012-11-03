var fusen_number = 1;

$(function() {
    $('#new_fusen').click(function() {
        make();
        fusen_number = fusen_number + 1; 
    });
})

function make(add_area_id) {
    if(typeof(add_area_id) == 'undefined'){
        var fusen = $('<div id="stickies1_' + fusen_number + '" class="fusen fusen_free" style="top: 80px; left: 850px;">' +
            '<div class="stittl" style="background-color: rgb(221, 238, 221);">maehira' +
            '<div class="sticlose">×</div></div>' +
            '<textarea id="" class="stimain" name="1000"></textarea>' +
            '</div>');
        fusen.appendTo('body');
    } else {
        var fusen = $('<div id="stickies1_' + fusen_number + '" class="fusen fusen_fix">' +
            '<div class="stittl" style="background-color: rgb(221, 238, 221);">maehira' +
            '<div class="sticlose">×</div></div>' +
            '<textarea id="" class="stimain" name="1000"></textarea>' +
            '</div>');
        fusen.appendTo("#"+add_area_id);
    }
    
    $('#stickies1_' + fusen_number).draggable({});
    var id = '#stickies1_' + fusen_number;
    set_fusen(id ,850 , 80, 200, 75, '#666', '#fff', '1px solid #ccc', 12, '#ddeedd');
  }


/**
 * 付箋設定
 */
function set_fusen(stID, wx, wy, ww, wh, co, bc, lc, zi, tc){
    $(stID + ' .stittl .sticlose').click(function(){
        $(stID).fadeOut('slow');
    });
//    $(stID).css({
//        position: 'absolute', 
//        top: wy, 
//        left: wx, 
//        width: ww, 
//        height: wh, 
//        color: co,
//        //'background-color': bc,
//        //'border': lc,
//        'z-index': zi
//    }).fadeIn('slow');
//    $(stID + ' .stittl').css({
//        'background-color': tc
//    }).fadeIn('slow');
//    
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

