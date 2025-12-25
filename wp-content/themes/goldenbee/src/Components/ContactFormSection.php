<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class ContactFormSection implements ThemeComponentInterface
{
    public static function render()
    {
        $benefits = [
            'Tư vấn chiến lược công nghệ miễn phí 1:1',
            'Cam kết bảo mật ý tưởng (Ký NDA)',
            'Báo giá minh bạch, không chi phí ẩn'
        ];

        $services = ['Website', 'Mobile App', 'Phần mềm', 'SEO/Ads'];
?>

        <section id="contact" class="py-24 relative border-t border-zinc-800 overflow-hidden">
            <!-- Simple Background Ambience -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/5 rounded-full blur-[100px] pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[100px] pointer-events-none"></div>

            <div class="container relative z-10">
                <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">

                    <!-- Left Column: Sales Copy & Info (5 cols) -->
                    <div class="lg:col-span-5 flex flex-col h-full" data-aos="fade-right">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-brand-500/30 bg-brand-500/10 backdrop-blur-sm mb-8 w-fit">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                            </span>
                            <span class="text-brand-400 text-xs font-bold uppercase tracking-wider">Hỗ trợ 24/7</span>
                        </div>

                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                            Đừng để ý tưởng <br />
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-amber-500">
                                Mãi là ý tưởng
                            </span>
                        </h2>

                        <p class="text-zinc-400 text-lg mb-8 leading-relaxed">
                            Hãy chia sẻ với Golden Bee về kế hoạch của bạn. Chúng tôi sẽ lắng nghe, phân tích và gửi lại <strong>bản kế hoạch sơ bộ + báo giá</strong> trong vòng 30 phút.
                        </p>

                        <!-- Benefits List -->
                        <div class="space-y-4 mb-10">
                            <?php foreach ($benefits as $item) : ?>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-brand-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-zinc-300 font-medium"><?php echo esc_html($item); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-auto space-y-6 pt-8 border-t border-zinc-800">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-lg bg-zinc-900 border border-zinc-700 flex items-center justify-center text-zinc-400 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold">Văn phòng</h4>
                                    <p class="text-zinc-500 text-sm mt-1">Tầng 12, Tòa nhà Bitexco Financial Tower,<br />Số 2 Hải Triều, Q.1, TP. HCM</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-lg bg-zinc-900 border border-zinc-700 flex items-center justify-center text-zinc-400 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold">Email</h4>
                                    <a href="mailto:contact@goldenbee.com" class="text-zinc-500 text-sm mt-1 hover:text-brand-500 transition-colors">contact@goldenbee.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Form (7 cols) -->
                    <div class="lg:col-span-7" data-aos="fade-left">
                        <div class="bg-zinc-900/90 backdrop-blur-xl border border-zinc-800 p-8 md:p-10 rounded-[2rem]">

                            <!-- Form Header -->
                            <div class="mb-8 pb-8 border-b border-zinc-800">
                                <h3 class="text-2xl font-bold text-white mb-1">Gửi yêu cầu tư vấn</h3>
                                <p class="text-zinc-400 text-sm">Điền thông tin bên dưới, chúng tôi sẽ gọi lại ngay.</p>
                            </div>

                            <form class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-zinc-500 uppercase tracking-wider ml-1">Họ tên *</label>
                                        <input
                                            type="text"
                                            name="fullname"
                                            class="w-full bg-zinc-950/50 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-zinc-700 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all hover:border-zinc-700" />
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-xs font-bold text-zinc-500 uppercase tracking-wider ml-1">Số điện thoại / Zalo *</label>
                                        <input
                                            type="tel"
                                            name="phone"
                                            class="w-full bg-zinc-950/50 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-zinc-700 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all hover:border-zinc-700" />
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-zinc-500 uppercase tracking-wider ml-1">Dịch vụ quan tâm</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <?php foreach ($services as $service) : ?>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="services[]" value="<?php echo esc_attr($service); ?>" class="peer sr-only" />
                                                <div class="px-4 py-3 rounded-xl bg-zinc-950/50 border border-zinc-800 text-zinc-400 text-sm text-center transition-all peer-checked:bg-brand-500 peer-checked:text-black peer-checked:border-brand-500 hover:border-zinc-600">
                                                    <?php echo esc_html($service); ?>
                                                </div>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-zinc-500 uppercase tracking-wider ml-1">Nội dung chi tiết</label>
                                    <textarea
                                        rows="3"
                                        name="message"
                                        placeholder="Ví dụ: Tôi cần làm website bán giày, ngân sách khoảng 20 triệu..."
                                        class="w-full bg-zinc-950/50 border border-zinc-800 rounded-xl px-4 py-3 text-white placeholder-zinc-700 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500 transition-all resize-none hover:border-zinc-700"></textarea>
                                </div>

                                <button
                                    type="submit"
                                    class="w-full py-4 bg-brand-500 hover:bg-brand-400 text-black font-bold text-lg rounded-xl transition-all flex items-center justify-center gap-2 group mt-4 transform active:scale-[0.98]">
                                    <svg class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Gửi yêu cầu ngay
                                </button>

                                <div class="flex items-center justify-center gap-6 mt-6 pt-6 border-t border-zinc-800/50">
                                    <span class="text-zinc-500 text-sm">Hoặc liên hệ nhanh qua:</span>
                                    <div class="flex gap-4">
                                        <a href="#" class="p-2 rounded-full bg-blue-600 text-white hover:opacity-80 transition-opacity">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </a>
                                        <a href="#" class="p-2 rounded-full bg-blue-500 text-white hover:opacity-80 transition-opacity font-bold text-xs flex items-center justify-center w-9 h-9">Zalo</a>
                                        <a href="#" class="p-2 rounded-full bg-blue-700 text-white hover:opacity-80 transition-opacity">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php
    }
}
?>