<?php include ('header.php'); ?>

<div class="container-fluid">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-6 card my-5 px-4 py-4 ">
        <h2 class="">Admin Form</h2>
        <?php echo form_open('Admin/index'); ?>
            <div class="form-group">
                <label for="">Username:</label>
                <!-- <input type="text" class="form-control" placeholder="Enter Your Username" name="name"> -->
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Your Username',
                'name'=>'username','value'=>set_value('username')]); ?>
                <?php echo form_error('username');?>
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <!-- <input type="password" class="form-control" placeholder="Enter Password" name="password"> -->
                <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter Your Password',
                'name'=>'password','value'=>set_value('password')]); ?>
                <?php echo form_error('password'); ?>
            </div>
            <!-- <button type="submit" class="btn btn-dark my-2 " name="submit">Submit</button> -->
            <?php echo form_submit(['class'=>'btn btn-dark my-2','value'=>'Submit','name'=>'submit']); ?>
            <!-- <button type="reset" class="btn btn-danger my-2" name="reset">Reset</button> -->
            <?php echo form_reset(['class'=>'btn btn-danger my-2','value'=>'Reset','name'=>'reset']) ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>