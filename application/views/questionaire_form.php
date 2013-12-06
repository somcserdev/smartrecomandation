<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8"/>
        <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <title>Questionaire Form</title>
    </head>
    <body class="container">
        <div>
            <h1>Questionaire Form</h1>
            <?php echo form_open('questionaire/record') ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">Gender</div>
                    <div class="panel-body">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="male" value="male" checked>
                                male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="female" value="female">
                                female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Age</div>
                    <div class="panel-body">
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="age" id="young" value="10" checked>
                                ~10
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="age" id="mid" value="30">
                                11~30
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="age" id="middle_age" value="50">
                                31~50
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="age" id="old" value="70">
                                50~
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Hobby</div>
                    <div class="panel-body">
                        <div class="checkbox">
                            <label>
                                <input name="hobby[]" type="checkbox" value="Reading"> Reading
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="hobby[]" type="checkbox" value="Shopping"> Shopping
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="hobby[]" type="checkbox" value="Eating"> Eating
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="hobby[]" type="checkbox" value="Game"> Game
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="hobby[]" type="checkbox" value="Entertainment"> Entertainment
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <script src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    </body>
</html>
