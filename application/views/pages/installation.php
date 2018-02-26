<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row ">

    <div class="col-12">
        <h1><?= $installation_msg; ?></h1>
    </div>

    <div class="col-12 bloc-home">
        <h2 class="text-center"><i class="fa fa-question-circle"></i> <?= $what_is_it_msg; ?></h2>
        <p><?= $description_msg; ?></p>
        <p class="alert-title"><?= $download_msg; ?> :</p>
        <p class="text-center">
            <a href="https://github.com/T-PHP/URL-Shortener-Code-Igniter-3/archive/master.zip" class="button-success">
                <i class="fas fa-download"></i> <?= $download_url_shortener_msg; ?>
            </a>
        </p>
        <p class="alert-title"><?= $installation_msg; ?> :</p>
        <p>1. <?= $step_1_msg; ?></p>
        <p>2. <?= $step_2_msg; ?></p>
        <pre>
            <code>
                $config['base_url'] = 'http://your-website.com';</code>
        </pre>
        <p>3. <?= $step_3_msg; ?></p>
        <pre>
            <code>
                'hostname' => 'your-host',
                'username' => 'your-username',
                'password' => 'your-password',
                'database' => 'your-database',</code>
        </pre>
        <p>4. <?= $step_4_msg; ?></p>
        <p><?= $step_4_description_msg; ?></p>
        <pre>
            <code>
            CREATE TABLE `url_ci_expander` (
              `id_url` int(11) NOT NULL,
              `short_url` varchar(255) NOT NULL,
              `long_url` varchar(255) NOT NULL,
              `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            CREATE TABLE `url_ci_shortener` (
              `id_url` int(11) NOT NULL,
              `short_code` varchar(10) NOT NULL,
              `url` text NOT NULL,
              `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            ALTER TABLE `url_ci_expander`
              ADD PRIMARY KEY (`id_url`);

            ALTER TABLE `url_ci_shortener`
              ADD PRIMARY KEY (`id_url`);

            ALTER TABLE `url_ci_expander`
              MODIFY `id_url` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

            ALTER TABLE `url_ci_shortener`
              MODIFY `id_url` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;</code>
        </pre>
    </div>

</div>
