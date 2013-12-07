<div class='container'>
    <?php echo validation_errors('<div class="text-danger">', '</div>'); ?>
    <?php echo form_open('questionaire/create', array('class' => 'form-horizontal')) ?>
    <div class="panel panel-primary">
        <div class="panel-heading">IMEI</div>
        <div class="panel-body">
            <input type="text" class="form-control" name="imei" id="imei" value="<?php echo set_value('imei'); ?>" placeholder="IMEI">
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Gender</div>
        <div class="panel-body">
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="male" value="male" checked>
                    Male
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="female" value="female">
                    Female
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
                    10-
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
                    51+
                </label>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Hobby</div>
        <div class="panel-body">
            <div class="checkbox col-md-1">
                <label>
                    <input name="hobby[]" type="checkbox" value="Reading"> Reading
                </label>
            </div>
            <div class="checkbox col-md-1">
                <label>
                    <input name="hobby[]" type="checkbox" value="Shopping"> Shopping
                </label>
            </div>
            <div class="checkbox col-md-1">
                <label>
                    <input name="hobby[]" type="checkbox" value="Eating"> Eating
                </label>
            </div>
            <div class="checkbox col-md-1">
                <label>
                    <input name="hobby[]" type="checkbox" value="Game"> Game
                </label>
            </div>
            <div class="checkbox col-md-1">
                <label>
                    <input name="hobby[]" type="checkbox" value="Entertainment"> Entertainment
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            // alert($('#imei').val());
        });
    });
</script>
