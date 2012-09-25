<div>
    <table class="table table-striped table-bordered" style="width: 540px;">
        <thead>
            <tr>
                <th class="priorityNumber">優先順位</th>
                <th class="backLog">プロダクトバックログ</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <tr>
                <td class="priorityNumber">1</td>
                <th class="backLog"><textarea name="1" style="resize: vertical; width: 400px"></textarea></th>
            </tr>
            <tr>
                <td class="priorityNumber">2</td>
                <th class="backLog"><textarea name="2" style="resize: vertical; width: 400px"></textarea></th>
            </tr>
            <tr>
                <td class="priorityNumber">3</td>
                <th class="backLog"><textarea name="3" style="resize: vertical; width: 400px"></textarea></th>
            </tr>
            <tr>
                <td class="priorityNumber">4</td>
                <th class="backLog"><textarea name="4" style="resize: vertical; width: 400px"></textarea></th>
            </tr>
        </tbody>
    </table>
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
</script>

