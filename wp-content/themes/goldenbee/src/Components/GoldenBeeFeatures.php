<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class GoldenBeeFeatures implements ThemeComponentInterface
{
    public static function render()
    {
        $features = [
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>',
                'title' => 'Quy trình xử lý đơn tinh gọn',
                'description' => 'Golden Bee tối ưu quy trình xử lý đơn hàng khép kín với 4 bước đơn giản: Nhập thông tin > Thanh toán > Gửi đối tác vận chuyển > Hoàn thành.',
                'color' => 'from-blue-400 to-blue-600'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                'title' => 'Sắp xếp ưu tiên địa chỉ nhận',
                'description' => 'Chủ shop có thể sắp xếp thứ tự ưu tiên chi nhánh nhận đơn online bằng thao tác kéo thả và cài đặt chi phí vận chuyển đến từng chi nhánh.',
                'color' => 'from-purple-400 to-purple-600'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
                'title' => 'Theo dõi đơn hàng Realtime',
                'description' => 'Theo dõi hành trình đơn hàng ngay trên trang quản trị Golden Bee để biết đã giao thành công hay chưa mà không cần liên hệ thêm với đơn vị vận chuyển.',
                'color' => 'from-green-400 to-green-600'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>',
                'title' => 'Kết nối vận chuyển & thanh toán',
                'description' => 'Tích hợp sẵn Paypal, Napas, OnePay… và các đơn vị vận chuyển lớn như Golden Bee Express, GHN, Viettel Post, VNPost…',
                'color' => 'from-orange-400 to-orange-600'
            ]
        ];
?>

        <section class="py-24 bg-zinc-950 relative border-t border-zinc-800 overflow-hidden">
            <!-- Background Decor -->
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#8080800a_1px,transparent_1px),linear-gradient(to_bottom,#8080800a_1px,transparent_1px)] bg-[size:40px_40px] opacity-20 pointer-events-none"></div>
            <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-brand-500/5 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="container relative z-10">
                <!-- Header -->
                <div class="text-center max-w-4xl mx-auto mb-16" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        Với công nghệ vượt trội và <br class="hidden md:block" />
                        <span class="text-transparent bg-clip-text bg-linear-to-r from-brand-200 to-brand-500">
                            tính năng khác biệt
                        </span>
                    </h2>

                    <p class="text-zinc-400 text-lg md:text-xl leading-relaxed">
                        Thiết kế website bán hàng <strong class="text-white">Golden Bee</strong> giúp xử lý đơn hàng hiệu quả, tối ưu chi phí và vận hành tự động.
                    </p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12 lg:gap-12 items-start">
                    <!-- Left Column: Grid -->
                    <div class="order-1 lg:order-1">
                        <!-- The 4 Blocks Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($features as $index => $feature) : ?>
                                <div
                                    class="p-6 rounded-2xl bg-zinc-950 border border-zinc-800 hover:border-brand-500/30 transition-all duration-300 hover:bg-zinc-900/80 group"
                                    data-aos="fade-up"
                                    data-aos-delay="<?php echo 300 + ($index * 100); ?>">
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-10 h-10 rounded-lg bg-zinc-900 border border-zinc-700 flex items-center justify-center text-brand-500 group-hover:scale-110 transition-transform">
                                            <?php echo $feature['icon']; ?>
                                        </div>
                                    </div>

                                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-brand-400 transition-colors">
                                        <?php echo esc_html($feature['title']); ?>
                                    </h3>
                                    <p class="text-sm text-zinc-400 leading-relaxed">
                                        <?php echo esc_html($feature['description']); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-10" data-aos="fade-up" data-aos-delay="700">
                            <a href="#contact" class="inline-flex items-center gap-2 text-white font-bold hover:text-brand-500 transition-colors group cursor-pointer">
                                Nhận tư vấn miễn phí ngay
                                <svg class="w-4.5 h-4.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Image -->
                    <div class="relative order-2 lg:order-2 rounded-[2.5rem] overflow-hidden group" data-aos="fade-left">
                        <img
                            src="http://goldenbeeltd.test/wp-content/themes/goldenbee/src/assets/images/goldenbee-features.png"
                            alt="Golden Bee Features Dashboard"
                            class="w-full h-auto" />
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-zinc-900/40 to-transparent opacity-90"></div>
                    </div>
                </div>

                <!-- Bottom Badge/CTA -->
                <div class="mt-16 flex justify-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="inline-flex items-center gap-4 p-2 pr-6 bg-zinc-800/50 border border-zinc-700 rounded-full backdrop-blur-md">
                        <div class="flex -space-x-3">
                            <div class="w-10 h-10 rounded-full bg-zinc-700 border-2 border-zinc-800 flex items-center justify-center text-[10px] text-zinc-300 font-bold">GHN</div>
                            <div class="w-10 h-10 rounded-full bg-zinc-700 border-2 border-zinc-800 flex items-center justify-center text-[10px] text-zinc-300 font-bold">VTP</div>
                            <div class="w-10 h-10 rounded-full bg-zinc-700 border-2 border-zinc-800 flex items-center justify-center text-[10px] text-zinc-300 font-bold">PayPal</div>
                        </div>
                        <span class="text-zinc-400 text-sm">
                            Đã tích hợp sẵn <span class="text-white font-bold">15+</span> đối tác vận chuyển & thanh toán
                        </span>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
?>