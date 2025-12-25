<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class IndustrySolutions implements ThemeComponentInterface
{
    public static function render()
    {
        $industries = [
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>',
                'name' => 'Mỹ phẩm',
                'image' => 'https://i.pinimg.com/736x/74/70/54/7470542015882408895e828172336b2e.jpg'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path></svg>',
                'name' => 'Giày dép',
                'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"></path></svg>',
                'name' => 'Thời trang',
                'image' => 'https://images.unsplash.com/photo-1445205170230-053b83016050?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                'name' => 'Web Doanh nghiệp',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>',
                'name' => 'Web bán hàng giá rẻ',
                'image' => 'https://i.pinimg.com/736x/2c/09/6b/2c096b032a36d8c6be3ba29d3f57516b.jpg'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                'name' => 'Khách sạn',
                'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                'name' => 'Web TMDT',
                'image' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>',
                'name' => 'Bất động sản',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>',
                'name' => 'Web chuẩn SEO',
                'image' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?q=80&w=1000&auto=format&fit=crop'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>',
                'name' => 'Web trọn gói',
                'image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1000&auto=format&fit=crop'
            ]
        ];
?>

        <section class="py-24 relative border-t border-zinc-800">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Phần trên: 1 text + 4 card -->
                <div class="flex flex-col lg:flex-row gap-4 sm:gap-5 md:gap-6 mb-4 sm:mb-5 md:mb-6" data-aos="fade-up">
                    <div class="w-full lg:w-2/5">
                        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-10 h-full flex flex-col text-white">
                            <p class="text-sm sm:text-base md:text-lg mb-2 sm:mb-3 text-zinc-400">Bạn kinh doanh lĩnh vực nào?</p>
                            <h2 class="text-[24px] sm:text-[28px] md:text-[36px] lg:text-[42px] font-bold leading-[30px] sm:leading-[36px] md:leading-[44px] lg:leading-tight mb-6 sm:mb-7 md:mb-8">
                                <span class="text-brand-500">Golden Bee</span> mang đến giải pháp dành riêng cho bạn
                            </h2>
                            <button class="inline-flex items-center justify-center rounded-full px-6 sm:px-7 md:px-8 py-3 sm:py-3.5 md:py-4 bg-brand-500 hover:bg-brand-400 text-black font-bold text-base sm:text-lg transition-all shadow-[0_0_20px_rgba(34,197,94,0.3)] hover:shadow-[0_0_30px_rgba(34,197,94,0.5)] group w-fit mt-auto">
                                <span>Dùng thử miễn phí</span>
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="w-full lg:w-3/5">
                        <div class="grid grid-cols-2 gap-3 sm:gap-4 h-full">
                            <?php for ($i = 0; $i < 4; $i++) : ?>
                                <div class="group relative flex flex-col items-center justify-center rounded-xl sm:rounded-2xl bg-zinc-900 overflow-hidden border border-zinc-800 hover:border-brand-500/50 transition-all duration-300 cursor-pointer" data-aos="fade-up" data-aos-delay="<?php echo $i * 50; ?>">
                                    <!-- Background Image -->
                                    <div class="absolute inset-0">
                                        <img src="<?php echo esc_url($industries[$i]['image']); ?>" alt="<?php echo esc_attr($industries[$i]['name']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                        <!-- Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30 group-hover:via-black/60 group-hover:to-black/20 transition-all duration-500"></div>
                                    </div>

                                    <!-- Content -->
                                    <div class="relative z-10 flex flex-col items-center transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300 p-6">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white mb-3 sm:mb-4 group-hover:bg-brand-500 group-hover:text-black group-hover:border-brand-500 transition-all duration-300 shadow-lg">
                                            <?php echo $industries[$i]['icon']; ?>
                                        </div>
                                        <h3 class="text-white font-bold text-base sm:text-lg text-center leading-tight group-hover:text-brand-300 transition-colors px-2">
                                            <?php echo esc_html($industries[$i]['name']); ?>
                                        </h3>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>

                <!-- Phần dưới: 6 card nhỏ -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 sm:gap-3">
                    <?php for ($i = 4; $i < 10; $i++) : ?>
                        <div class="group relative flex flex-col items-center justify-center rounded-xl overflow-hidden bg-zinc-900 border border-zinc-800 hover:border-brand-500/50 transition-all duration-300 cursor-pointer h-32 sm:h-36" data-aos="fade-up" data-aos-delay="<?php echo ($i - 4) * 50; ?>">
                            <!-- Background Image -->
                            <div class="absolute inset-0">
                                <img src="<?php echo esc_url($industries[$i]['image']); ?>" alt="<?php echo esc_attr($industries[$i]['name']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-black/30 group-hover:via-black/60 group-hover:to-black/20 transition-all duration-500"></div>
                            </div>

                            <!-- Content -->
                            <div class="relative z-10 flex flex-col items-center transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300 p-3">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white mb-2 sm:mb-3 group-hover:bg-brand-500 group-hover:text-black group-hover:border-brand-500 transition-all duration-300 shadow-lg">
                                    <?php echo $industries[$i]['icon']; ?>
                                </div>
                                <h3 class="text-white font-bold text-xs sm:text-sm text-center leading-tight group-hover:text-brand-300 transition-colors px-1">
                                    <?php echo esc_html($industries[$i]['name']); ?>
                                </h3>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

<?php
    }
}
?>