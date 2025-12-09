<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;
use App\Components\Hero;
use App\Components\Service;
use App\Components\Technology;
use App\Components\WhyChooseUs;
use App\Components\TemplateGallery;
use App\Components\SupportSection;
use App\Components\IndustrySolutions;
use App\Components\Portfolio;
use App\Components\ProcessSection;
use App\Components\NewsSection;
use App\Components\ContactFormSection;


class HomeComponent implements ThemeComponentInterface
{

    public static function render()
    {
        Hero::render();
        Technology::render();
        Service::render();
        WhyChooseUs::render();
        TemplateGallery::render();
        SupportSection::render();
        IndustrySolutions::render();
        ProcessSection::render();
        GoldenBeeFeatures::render();
        Portfolio::render();
        NewsSection::render();
        ContactFormSection::render();
    }
}
