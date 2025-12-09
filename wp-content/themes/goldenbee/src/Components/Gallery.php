<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;

class Gallery implements ThemeComponentInterface{

    public static function render(){
		$brick_factory = get_field('brick_factory', 'option');
		$ships = get_field('ships', 'option');
		?>
		<div class="gallery">
			<div class="container">
                <div class="row">
	                <div class="col-lg-6">

	                </div>
	                <div class="col-lg-6">

	                </div>
                </div>
			</div>
		</div>
    <?php }
}