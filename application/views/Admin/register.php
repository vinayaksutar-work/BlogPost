<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-6 card my-3 px-4 py-4 ">
        <h2 class="text-center">Register Form</h2>
        <?php echo form_open('admin/sendmail'); ?>
            <div class="form-group">
                <label for="">Username:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Your Username',
                'name'=>'username','value'=>set_value('username')]); ?>
                <?php echo form_error('username');?>
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter Your Password',
                'name'=>'password','value'=>set_value('password')]); ?>
                <?php echo form_error('password'); ?>
            </div>
            <div class="form-group">
                <label for="">Firstname:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Your Firstname',
                'name'=>'firstname','value'=>set_value('firstname')]); ?>
                <?php echo form_error('firstname');?>
            </div>
            <div class="form-group">
                <label for="">Lastname:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Your Lastname',
                'name'=>'lastname','value'=>set_value('lastname')]); ?>
                <?php echo form_error('lastname');?>
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <?php echo form_input(['type'=>'email','class'=>'form-control','placeholder'=>'Enter Your Email',
                'name'=>'email','value'=>set_value('email')]); ?>
                <?php echo form_error('email');?>
            </div>
            <?php echo form_submit(['class'=>'btn btn-primary','value'=>'Submit','name'=>'submit']); ?>
            <?php echo form_reset(['class'=>'btn btn-danger','value'=>'Reset','name'=>'reset']); ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>