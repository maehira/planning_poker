<div class="span8">
    <div class="progress progress-striped active progress-success">
        <div id="timer-progress" class="bar" style="width: 100%"></div>
    </div>
</div>
<div class="span2">
    <span id="min">1</span>min
    <span id="sec">30</span>sec
</div>
<div class="span2">
	<a href="#" id="planning-start" class="btn btn-primary">Start</a>
</div>





<script type="text/javascript">
	$('#planning-start').click(function(){
	    Start();
		return false;
	});

    var Timer1;

    function Start() {
        Timer1 = setInterval("CountDown()", 1000);
    }

    function CountDown() {
        var min = $("#min").html();
        var sec = $("#sec").html();

		var width = $('#timer-progress').width();
		var parentWidth = $('#timer-progress').parent().width();
		var percent = 100*width/parentWidth -1;
		if (percent < 30) {
			$("#timer-progress").parent().removeClass('progress-warning').addClass('progress-danger');
		} else if (percent < 60) {
			$("#timer-progress").parent().removeClass('progress-success').addClass('progress-warning');
		}
		$("#timer-progress").css('width', percent+'%');

        min = parseInt(min);
        sec = parseInt(sec);

        TMWrite(min*60 + sec-1);
    }

    function TMWrite(time) {
        time = parseInt(time);

        if (time <= 0) {
            ReSet();
            alert("!!!!");
        } else {
            $("#min").html(Math.floor(time/60));
            $("#sec").html(time % 60);
        }
    }

</script>