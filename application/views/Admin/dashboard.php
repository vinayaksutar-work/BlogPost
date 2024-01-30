<?php include 'header.php'; ?>

<div class="container py-5 ">
    <h1 class="text-center">Dashboard</h1>
    <div class="row justify-content-end ">
        <a href="<?= base_url('admin/adduser'); ?>" class="btn btn-primary ">Add Articles</a>
    </div>
    <div class="table-responsive m-5">
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
                        <td>1</td>
                        <td><?php echo $art->article_title; ?></td>
                        <td><a href="" class="btn btn-success ">Edit</a></td>
                        <td><a href="" class="btn btn-danger ">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">NO DATA FOUND</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>