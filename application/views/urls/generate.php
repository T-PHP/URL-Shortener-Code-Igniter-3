<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row ">
    <div class="col-12">
        <h1><?= $url_shortener_msg; ?></h1>
    </div>

    <div class="col-12">
        <?= validation_errors(); ?>
    </div>

    <?= form_open('generate-url'); ?>
        <div class="col-12 form-shorten">
            <input class="input-shorten" type="text" name="urlAddress" id="urlAddress" placeholder="<?= $placeholder_msg; ?>" />
            <button name="submit" type="submit" class="button btn-shorten"><?= $shorten_msg; ?></button>
        </div>
    </form>

    <?php if(isset($urlAddress) AND !empty($urlAddress) AND isset($shortCode) AND !empty($shortCode)): ?>
    <div class="col-12 bloc text-center">
        <p>
            <a class="tag-secondary" href="<?= $urlAddress;?>"><?= $urlAddress;?></a>
        </p>
        <p>
            <i class="fa fa-angle-double-down fa-2x"></i>
        </p>
        <p>
            <a class="tag-success url_redirected" href="<?= base_url().$shortCode; ?>" title="Go to <?= $urlAddress;?>" target="_blank">
                <?= base_url().$shortCode; ?>
            </a>
            <a class="tag-danger copy-btn" data-attr-name="data-clipboard-text" data-clipboard-text="<?= base_url().$shortCode; ?>">
                <i class="fa fa-copy"></i> <?= $copy_msg; ?>
            </a>
        </p>
        <p class="alert-success copy-message" style="display: none"><?= $url_copied_msg; ?></p>
    </div>
    <?php endif; ?>

    <?php if(isset($lastUrls) AND !empty($lastUrls)): ?>
    <div class="col-12 bloc-home">
        <h2 class="text-center"><i class="fa fa-link"></i> <?= $last_urls_msg; ?></h2>
        <div class="table-responsive">
            <table class="table bounce">
                <thead>
                    <th><?= $long_url_msg; ?></th>
                    <th><?= $short_url_msg; ?></th>
                </thead>
                <tbody>
                <?php foreach ($lastUrls as $lastUrl): ?>
                    <tr>
                        <td><?= $lastUrl->url; ?></td>
                        <td>
                            <a href="<?= base_url(); ?><?= $lastUrl->short_code; ?>">
                                <?= base_url(); ?><?= $lastUrl->short_code; ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

</div>
