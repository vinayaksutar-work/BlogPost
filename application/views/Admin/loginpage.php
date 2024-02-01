<?php include ('header.php'); ?>

<div class="container-fluid mt-5 ">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-8 col-md-6 col-xl-4 card my-5 px-4 py-4 ">
        <h2 class="text-center">Login</h2>

        <?php if($error = $this->session->flashdata('Login_failed')): ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <?= $error; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo form_open('admin/index'); ?>
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
            <?php echo form_submit(['class'=>'btn btn-primary','value'=>'Submit','name'=>'submit']); ?>
            <?php echo form_reset(['class'=>'btn btn-danger','value'=>'Reset','name'=>'reset']); ?>
            <?php echo anchor('admin/register/','Sign Up?', 'class="link-class"') ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>