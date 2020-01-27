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
    <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <title>Neochem | <?php echo $title?></title>
</head>
<body class="font-pt-sans">
    <div class="container-fluid h-auto">
        <div class="row h-auto min-height-100vh">
            <div class="col-sm-2 h-auto neochem-primary-bg-color navbar-dark" id="sideBar">
                <h6 class="text-light mt-5 mb-5">N E O  C H E M I C A L S</h6>
                <ul class="navbar-nav font-weight-bold">
                    <?php foreach($nav_items as $nav_item): ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url().$nav_item->item_link ?>" class="nav-link"><i class="<?php echo $nav_item->font_awesome_class?>"></i> &nbsp; &nbsp;<?php echo $nav_item->item_text ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
