<?php

namespace App\Components;

use App\Base\ThemeComponentInterface;

/**
 * Class Header
 * Renders the header section with Tailwind CSS for the Golden Bee theme.
 */
class Header implements ThemeComponentInterface
{
    /**
     * Render the header section
     * @return void
     */
    public static function render()
    {
?>
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 bg-black/50 backdrop-blur-md border-b border-white/5">
            <div class="container h-20 flex items-center justify-between">
                <div class="text-2xl font-bold font-mono tracking-tighter text-white">
                    GOLDEN<span class="text-brand-500">BEE</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex gap-8 text-sm font-medium text-zinc-400">
                    <a href="#" class="hover:text-white transition-colors">Trang chủ</a>
                    <a href="#services" class="hover:text-white transition-colors">Dịch vụ</a>
                    <a href="#portfolio" class="hover:text-white transition-colors">Dự án</a>
                    <a href="#contact" class="hover:text-white transition-colors">Về chúng tôi</a>
                </div>

                <button class="bg-brand-500 text-black">Liên hệ
                    <div class="star-1">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="star-2">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="star-3">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="star-4">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="star-5">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="star-6">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 784.11 815.53"
                            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                                <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                <path
                                    d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z"
                                    class="fil0"></path>
                            </g>
                        </svg>
                    </div>
                </button>

                <!-- Mobile Toggle -->
                <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile Menu Overlay -->
        <div id="mobileMenu" class="hidden fixed inset-0 z-30 bg-black pt-24 px-6 md:hidden flex-col gap-6 text-xl font-bold">
            <a href="#" onclick="toggleMobileMenu()" class="text-zinc-300 hover:text-brand-500">Trang chủ</a>
            <a href="#services" onclick="toggleMobileMenu()" class="text-zinc-300 hover:text-brand-500">Dịch vụ</a>
            <a href="#portfolio" onclick="toggleMobileMenu()" class="text-zinc-300 hover:text-brand-500">Dự án</a>
            <a href="#contact" onclick="toggleMobileMenu()" class="text-zinc-300 hover:text-brand-500">Liên hệ</a>
        </div>

        <style>
            button {
                position: relative;
                padding: 6px 16px;
                font-size: 17px;
                font-weight: 500;
                border-radius: calc(infinity * 1px);
                box-shadow: 0 0 0 #fec1958c;
                transition: all .3s ease-in-out;
                cursor: pointer;
            }

            .star-1 {
                position: absolute;
                top: 20%;
                left: 20%;
                width: 25px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
            }

            .star-2 {
                position: absolute;
                top: 45%;
                left: 45%;
                width: 15px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
            }

            .star-3 {
                position: absolute;
                top: 40%;
                left: 40%;
                width: 5px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
            }

            .star-4 {
                position: absolute;
                top: 20%;
                left: 40%;
                width: 8px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all .8s cubic-bezier(0, 0.4, 0, 1.01);
            }

            .star-5 {
                position: absolute;
                top: 25%;
                left: 45%;
                width: 15px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all .6s cubic-bezier(0, 0.4, 0, 1.01);
            }

            .star-6 {
                position: absolute;
                top: 5%;
                left: 50%;
                width: 5px;
                height: auto;
                filter: drop-shadow(0 0 0 #fffdef);
                z-index: -5;
                transition: all .8s ease;
            }

            button:hover {
                background: transparent;
                color: #fff;
                box-shadow: 0 0 25px #fec1958c;
            }

            button:hover .star-1 {
                position: absolute;
                top: -20%;
                left: -30%;
                width: 25px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            button:hover .star-2 {
                position: absolute;
                top: -25%;
                left: 10%;
                width: 15px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            button:hover .star-3 {
                position: absolute;
                top: 55%;
                left: 25%;
                width: 5px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            button:hover .stars {
                display: block;
                filter: drop-shadow(0 0 10px #fffdef);
            }

            button:hover .star-4 {
                position: absolute;
                top: 30%;
                left: 80%;
                width: 8px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            button:hover .star-5 {
                position: absolute;
                top: 25%;
                left: 115%;
                width: 15px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            button:hover .star-6 {
                position: absolute;
                top: 5%;
                left: 60%;
                width: 5px;
                height: auto;
                filter: drop-shadow(0 0 10px #fffdef);
                z-index: 2;
            }

            .fil0 {
                fill: #FFFDEF
            }

            /* -- External Social Link CSS Styles -- */

            #source-link {
                top: 120px;
            }

            #source-link>i {
                color: rgb(94, 106, 210);
            }

            #yt-link {
                top: 65px;
            }

            #yt-link>i {
                color: rgb(219, 31, 106);

            }

            #Fund-link {
                top: 10px;
            }

            #Fund-link>i {
                color: rgb(255, 251, 0);

            }

            .meta-link {
                align-items: center;
                backdrop-filter: blur(3px);
                background-color: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                border-radius: 6px;
                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                display: inline-flex;
                gap: 5px;
                left: 10px;
                padding: 10px 20px;
                position: fixed;
                text-decoration: none;
                transition: background-color 600ms, border-color 600ms;
                z-index: 10000;
            }

            .meta-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .meta-link>i,
            .meta-link>span {
                height: 20px;
                line-height: 20px;
            }

            .meta-link>span {
                color: white;
                font-family: "Rubik", sans-serif;
                transition: color 600ms;
            }
        </style>
<?php
    }
}
?>