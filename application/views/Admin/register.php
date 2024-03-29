<?php include 'header.php'; ?>

<div class="container-fluid">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-8 col-md-6 col-xl-4 card my-2 px-4 py-3 ">
        <h2 class="text-center">User Registration</h2>

        <?php 
            if($msg=$this->session->flashdata('msg')):
            $msg_class=$this->session->flashdata('msg_class') 
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert <?= $msg_class ?>">
                    <?= $msg; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php echo form_open('admin/registerUser'); ?>
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
                <?php echo form_error('email'); ?>
            </div>
            <div class="row d-flex">
                <?php echo form_submit(['class'=>'btn btn-primary ml-3','value'=>'Submit','name'=>'submit']); ?>
                <?php echo form_reset(['class'=>'btn btn-danger ml-3','value'=>'Reset','name'=>'reset']); ?>
                <?php echo anchor('admin/','Login Page?', 'class="link-class ml-auto px-3"') ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>