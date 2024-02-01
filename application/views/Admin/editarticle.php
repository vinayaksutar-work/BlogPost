<?php include ('header.php'); ?>

<div class="container-fluid">
    <div class="row col-sm-12 justify-content-center">
        <div class="col-sm-8 col-md-8 col-xl-6 card my-5 px-4 py-4 ">
        <h2 class="text-center">Edit Article</h2>
        <?php echo form_open('admin/editarticle'); ?>
            <div class="form-group">
                <label for="">Title:</label>
                <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter the Title',
                'name'=>'article_title','value'=>set_value('article_title',$article->article_title)]); ?>
                <?php echo form_error('article_title');?>
            </div>
            <div class="form-group">
                <label for="">Body:</label>
                <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter the description',
                'name'=>'article_body','value'=>set_value('article_body',$article->article_body)]); ?>
                <?php echo form_error('article_body'); ?>
            </div>
            <?php echo form_submit(['class'=>'btn btn-primary','value'=>'Submit','name'=>'submit']); ?>
            <?php echo form_reset(['class'=>'btn btn-danger','value'=>'Reset','name'=>'reset']); ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>