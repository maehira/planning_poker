/**
 * ポーカー開始ボタンのクリック時のモーダルウィンドウ
 */
$('#start_poker').bind('click', function(e) {
    e.preventDefault();
    $('#poker_area').bPopup({
        contentContainer: '.content',
        loadUrl: 'poker',
        modalClose: false,
        // onClose: function() { alert('Close'); }
    });
});
