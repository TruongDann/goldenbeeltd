<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;

class PageNotFound implements ThemeComponentInterface{

    /**
     * @return mixed
     */
    public static function render(){ ?>
		<div class="page-not-found" style="background-image: url(<?= parent::$template_directory_uri . '/images/404.jpg' ?>)">

		</div>
    <?php }
}