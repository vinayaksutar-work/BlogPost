<?php include ('header.php'); ?>

<div class="container-fluid">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 card my-5 px-4 py-4 ">
        <h2 class="text-center">Add Articles</h2>
        <?php echo form_hidden('user_id','$this->session->userdata("id")'); ?>
        <?php echo form_open('admin/userValidation'); ?>
            <div class="form-group">
                <label for="">Title:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter the Title',
                'name'=>'article_title','value'=>set_value('article_title')]); ?>
                <?php echo form_error('article_title');?>
            </div>
            <div class="form-group">
                <label for="">Body:</label>
                <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter the description',
                'name'=>'article_body','value'=>set_value('article_body')]); ?>
                <?php echo form_error('article_body'); ?>
            </div>
            <div class="row d-flex">
                <?php echo form_submit(['class'=>'btn btn-primary ml-3','value'=>'Submit','name'=>'submit']); ?>
                <?php echo form_reset(['class'=>'btn btn-danger ml-3','value'=>'Reset','name'=>'reset']); ?>
                <?php echo anchor('admin/welcome','<i class="fa fa-arrow-left"></i>', 'class="btn btn-secondary ml-auto mx-3"') ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>