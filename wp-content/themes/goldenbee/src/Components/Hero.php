<?php

namespace App\Components;

use App\Base\ThemeComponentInterface;

class Hero implements ThemeComponentInterface
{
    public static function render()
    {
?>
        <section class="relative min-h-screen flex flex-col justify-center overflow-hidden pt-20">
            <!-- Background Abstract Elements -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[100px] animate-pulse pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="container z-10 py-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-zinc-800 bg-zinc-900/50 backdrop-blur-sm mb-8" data-aos="fade-down">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                    </span>
                    <span class="text-zinc-300 text-xs md:text-sm font-mono tracking-wide">CÓ SẴN CHO CÁC DỰ ÁN MỚI</span>
                </div>

                <h1 class="text-5xl md:text-7xl lg:text-9xl font-bold tracking-tighter text-white leading-[0.9] mb-8" data-aos="fade-up" data-aos-delay="100">
                    XÂY DỰNG <br />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-amber-600">
                        TƯƠNG LAI SỐ
                    </span>
                </h1>

                <p class="text-zinc-400 text-lg md:text-xl max-w-2xl leading-relaxed mb-10 font-light" data-aos="fade-up" data-aos-delay="200">
                    Biến ý tưởng thành hiện thực với công nghệ Web, Mobile App và AI tiên tiến nhất.
                    Không chỉ là Code, chúng tôi kiến tạo trải nghiệm số độc bản cho doanh nghiệp của bạn.
                </p>

                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#contact" class="group px-8 py-4 bg-brand-500 hover:bg-brand-400 text-black font-bold text-lg rounded-full transition-all flex items-center justify-center gap-2">
                        Bắt đầu dự án
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    <a href="#services" class="px-8 py-4 border border-zinc-700 hover:border-zinc-500 text-white rounded-full transition-all flex items-center justify-center hover:bg-zinc-900">
                        Xem dịch vụ
                    </a>
                </div>
            </div>

            <!-- Floating Icons decoration -->
            <div class="hidden lg:block absolute top-1/3 right-20 animate-float text-zinc-700" data-aos="fade-left" data-aos-delay="400">
                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </div>
            <div class="hidden lg:block absolute bottom-1/4 right-40 animate-float text-zinc-700" data-aos="fade-left" data-aos-delay="600">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                </svg>
            </div>
            <div class="hidden lg:block absolute top-1/4 right-1/4 animate-float text-zinc-700" data-aos="fade-left" data-aos-delay="800">
                <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <!-- Scroll indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50" data-aos="fade-up" data-aos-delay="1000">
                <span class="text-xs font-mono uppercase tracking-widest text-zinc-500">Scroll</span>
                <div class="w-[1px] h-12 bg-gradient-to-b from-brand-500 to-transparent"></div>
            </div>
        </section>
<?php
    }
}
?>