<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8"/>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <title>Preference List</title>
    </head>
    <body class="container">
        <div>
            <h1>Preference List <small>Total : <?php echo count($user_preference) ?></small></h1>
            <table class="table table-condensed">
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
        <a class="btn btn-default" href="questionaire">Create new preference</a>
        <script src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $("button").click(function() {
                    //  alert($('#imei').val());
                });
            });
        </script>

    </body>
</html>
