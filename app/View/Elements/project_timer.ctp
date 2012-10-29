
<h1>
    <span id="min">1</span>min
    <span id="sec">30</span>sec
</h1>


<script type="text/javascript">
    var Timer1;

    function Start() {
        Timer1 = setInterval("CountDown()", 1000);
    }

    function CountDown() {
        var min = $("#min").html();
        var sec = $("#sec").html();

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

    Start();
</script>