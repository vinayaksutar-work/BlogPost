<?php include 'header.php'; ?>

<div class="container py-5 ">
    <h1 class="text-center">Dashboard</h1>
    <div class="row col-sm-12 justify-content-end my-3">
        <a href="<?= base_url('admin/adduser'); ?>" class="btn btn-primary ">Add Articles</a>
    </div>

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

    <div class="table-responsive">
        <table class="table table-light table-bordered text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Article Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php if(count($articles)): ?>
                <?php foreach($articles as $art): ?>
                    <tr>
                        <td><?= $art->id;?></td>
                        <td><?= $art->article_title; ?></td>
                        <td>
                            <?=
                                form_open('admin/editArticle/'.$art->id),
                                form_submit(['class'=>'btn btn-success','value'=>'Edit/Update','name'=>'submit']),
                                form_close();
                            ?>
                        </td>
                        <td>
                            <?=
                                form_open('admin/deleteArticle'),
                                form_hidden('id',$art->id),
                                form_submit(['class'=>'btn btn-danger','value'=>'Delete','name'=>'submit']),
                                form_close();
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">NO DATA FOUND</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>

<?php include 'footer.php'; ?>