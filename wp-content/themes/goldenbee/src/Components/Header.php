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
        <nav class="fixed top-0 left-0 right-0 z-40 bg-black/50 backdrop-blur-md border-b border-white/5">
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

                <a href="#contact" class="hidden md:block px-5 py-2 text-sm font-bold bg-white text-black rounded-full hover:bg-zinc-200 transition-colors">
                    Liên hệ
                </a>

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
<?php
    }
}
?>