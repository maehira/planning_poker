$('#_card1').click(function() {
	_jsSentData(1);
});

$('#_card2').click(function() {
	_jsSentData(2);
});

$('#_card3').click(function() {
	_jsSentData(3);
});

$('#_card5').click(function() {
	_jsSentData(5);
});

$('#_card8').click(function() {
	_jsSentData(8);
});

$('#_card13').click(function() {
	_jsSentData(13);
});

function _jsSentData (jsNum) {
	if (confirm (jsNum + '番を選択します。宜しいでしょうか？') == true ) {

		$.ajax({
		    type: 'POST',
		    url: './send_decided_card',
		    data: 'decided_card=' + jsNum,
		    success: function(data){
			$("#select_card_zone1").append(data);
		    }
		});


		$.ajax({
		    type: 'POST',
		    url: './send_decided_card',
		    data: 'decided_card=none',
		    success: function(data){
			$("#select_card_zone2").append(data);
			$("#select_card_zone3").append(data);
			$("#select_card_zone4").append(data);
			$("#select_card_zone5").append(data);
		    }
		});

	}
	$('#poker_area').remove();
}

