<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<title>Article List</title>
</head>
<body>
    <nav class="navbar navbar-expand-xxl navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <?php  if($this->session->userdata('id')): ?>
            <li class="list-unstyled">
                <a href="<?= base_url('admin/logout'); ?>" class="btn btn-danger ">Logout</a>
            </li>
        <?php endif; ?>
    </nav>