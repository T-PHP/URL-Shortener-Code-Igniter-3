<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/trucss.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>
<div class="col-12">
    <div class="row">
        <nav>
            <div class="col-4">
                <button class="col-hidden button button-menu">MENU</button>
                <div class="logo">
                    <a href="<?= base_url(); ?>">Url Shortener CI</a>
                </div>
            </div>
            <div class="col-8">
                <ul class="list-inline text-right menu">
                    <div class="menu-body">
                        <button class="button button-close"><i class="fa fa-times"></i> </button>
                        <li><a href="<?= base_url(); ?>">Url Shortener</a> | </li>
                        <li><a href="<?= base_url(); ?>expand-url">Url Expander</a> | </li>
                        <li><a href="<?= base_url(); ?>pages/installation.html">Installation</a> | </li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="contain">
