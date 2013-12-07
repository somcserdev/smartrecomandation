<div class='container'>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>IMEI</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Hobby</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user_preference as $item): ?>
                    <tr>
                        <td><?php echo $item['imei'] ?></td>
                        <td><?php echo $item['gender'] ?></td>
                        <td><?php echo $item['age'] ?></td>
                        <td><?php echo $item['hobby'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            //  alert($('#imei').val());
        });
    });
</script>