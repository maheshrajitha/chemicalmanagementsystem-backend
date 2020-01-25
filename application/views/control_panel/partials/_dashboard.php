<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap-->
	<link rel='stylesheet' href="<?php echo base_url(); ?>node_modules/bootstrap/dist/css/bootstrap.min.css"/>
	<!--site css-->
    <link rel='stylesheet' href='<?php echo base_url(); ?>assets/neochem.css'/>
     <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid h-auto">
        <div class="row h-auto min-height-100vh">
            <div class="col-sm-2 h-auto neochem-primary-bg-color navbar-dark">
                <ul class="navbar-nav font-weight-bold">
                    <?php foreach($nav_items as $nav_item): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url().'admin/'.$nav_item->item_link ?>" class="nav-link"><i class="<?php echo $nav_item->font_awesome_class?>"></i> &nbsp; &nbsp;<?php echo $nav_item->item_text ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
