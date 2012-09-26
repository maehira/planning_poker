<form action="index2" method="post">

<input type="hidden" id="result" name="result" />
<button id="submit" class="btn btn-large" style="width: 150px;">次へ</button>

<div class="row">

<div class="span8" style="margin-top: 10px">
    <table class="table table-striped table-bordered" style="width: 560px;">
        <thead>
            <tr>
                <th class="priorityNumber">優先順位</th>
                <th class="backLog">プロダクトバックログ</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <tr>
                <td class="priorityNumber rank">1</td>
                <th class="backLog">
                  <textarea id="backLogText" name="1000" style="resize: vertical; width: 400px"></textarea>
                </th>
            </tr>
            <tr>
                <td class="priorityNumber rank">2</td>
                <th class="backLog">
                  <textarea id="backLogText" name="1001" style="resize: vertical; width: 400px"></textarea>
                </th>
            </tr>
            <tr>
                <td class="priorityNumber rank">3</td>
                <th class="backLog">
                  <textarea id="backLogText" name="1002" style="resize: vertical; width: 400px"></textarea>
                </th>
            </tr>
            <tr>
                <td class="priorityNumber rank">4</td>
                <th class="backLog">
                  <textarea id="backLogText" name="1003" style="resize: vertical; width: 400px"></textarea>
                </th>
            </tr>
        </tbody>
    </table>
</div>
</form>

<div class="span4 chat-container">
    <div class="chat-messages">チャット</div>
    <div class="chat-input"></div>
</div>

</div>

<script type="text/javascript">
    $('#sortable').sortable();
    $('#sortable').disableSelection();
        
    $('#sortable').bind('sortstop', function (e, ui) {
        // ソートが完了したら実行される。
        var rows = $('#sortable .rank');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            $($('.rank')[i]).text(i + 1);
        }
    })
    
    $("#submit").click(function() {
        var result = [];
        var rows = $('#sortable #backLogText');
        for (var i = 0, rowTotal = rows.length; i < rowTotal; i += 1) {
            result.push(rows[i].name);
        }
        $("#result").val(result);
        $("form").submit();
    });
</script>

