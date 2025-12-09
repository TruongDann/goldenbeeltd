<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;
use WP_Query;

class Slider implements ThemeComponentInterface{

    /**
     * @return mixed|void
     */
    public static function render(){
        $slider = get_field('slider', 'option');
        ?>
		<div class="slider">
			<div class="d-flex flex-wrap">
				<div class="slide-left border-top border-primary">
                    <?= do_shortcode($slider['slide']) ?>
				</div>
			
			</div>
		</div>
    <?php }
}