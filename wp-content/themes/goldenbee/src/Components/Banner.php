<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;

class Banner implements ThemeComponentInterface{

    public static function render(){
        $booking = get_field('booking', 'option');
        ?>

		<div class="banner text-white" style="background-image: url('<?= $booking['background'] ?>')">
			<div class="text-center">
				<h3 class="title-1"><?= $booking['title_1'] ?></h3>
				<h2 class="title-2"><?= $booking['title_2'] ?></h2>
				<p><?= $booking['title_3'] ?></p>
				<a href="<?= $booking['url']['url'] ?>" class="btn btn-primary rounded-pill">
                    <?= $booking['url']['title'] ?>
				</a>
			</div>


		</div>

        <?php
    }
}