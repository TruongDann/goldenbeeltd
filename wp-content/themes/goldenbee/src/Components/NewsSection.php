<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class NewsSection implements ThemeComponentInterface
{
    public static function render()
    {
        $news_data = [
            [
                'id' => 1,
                'tag' => 'Thông tư 99',
                'title' => 'THÔNG TƯ 99/2025/TT-BTC thay thế TT 200/2014/TT-BTC về chế độ kế toán doanh nghiệp',
                'description' => 'Ngày 27/10/2025, Bộ trưởng Bộ Tài chính ban hành Thông tư 99/2025/TT-BTC thay thế thông tư 200/2014/TT-BTC hướng dẫn Chế độ kế toán doanh nghiệp. Những điểm mới quan trọng cần lưu ý...',
                'author' => 'Nguyễn Minh Anh',
                'readTime' => '5 phút',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=2026&auto=format&fit=crop',
                'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
                'isFeatured' => true
            ],
            [
                'id' => 2,
                'tag' => 'Hướng dẫn VAT',
                'title' => 'Hướng dẫn kê khai thuế VAT theo Nghị định 123/2020/NĐ-CP - Cập nhật 2025',
                'description' => 'Nghị định 123/2020/NĐ-CP quy định chi tiết Luật Quản lý thuế về thủ tục thuế, gồm đăng ký thuế, kê khai thuế...',
                'date' => '15/11/2025',
                'readTime' => '8 phút',
                'image' => 'https://images.unsplash.com/photo-1554224154-260327c00c40?q=80&w=2069&auto=format&fit=crop',
                'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'
            ],
            [
                'id' => 3,
                'tag' => 'HTKK',
                'title' => '[Tải hoặc Nâng cấp] HTKK mới nhất phiên bản 5.4.7',
                'description' => 'Ngày 27/10/2025, Cục Thuế thông báo nâng cấp ứng dụng Hỗ trợ kê khai (HTKK) lên phiên bản 5.4.7...',
                'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>'
            ],
            [
                'id' => 4,
                'tag' => 'Tính thuế TNDN',
                'title' => 'Cách tính thuế TNDN tạm tính theo quy định mới năm 2025',
                'description' => 'Hướng dẫn chi tiết cách tính thuế thu nhập doanh nghiệp tạm tính theo quy định mới nhất...',
                'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>'
            ],
            [
                'id' => 5,
                'tag' => 'Luật thuế',
                'title' => 'Luật thuế TNDN số 66/2025/QH15 - Những thay đổi từ 1/1/2026',
                'description' => 'Tại Kỳ họp thứ 9, Quốc hội khóa XV, ngày 14/6/2025, Luật Thuế TNDN số 66/2025/QH15 đã được thông qua...',
                'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>'
            ]
        ];

        $featured_articles = array_slice($news_data, 0, 2);
        $side_articles = array_slice($news_data, 2, 3);
?>

        <section class="py-24 border-t border-zinc-800 relative">
            <div class="container relative z-10">

                <!-- Section Header -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4" data-aos="fade-up">
                    <div>
                        <h2 class="text-3xl md:text-5xl font-bold text-white mb-2">
                            Tin tức & <span class="text-brand-500">Hướng dẫn</span>
                        </h2>
                        <p class="text-zinc-400">Cập nhật tin tức mới nhất về thuế, kế toán và công nghệ.</p>
                    </div>

                    <button class="hidden md:flex items-center gap-2 text-white font-bold hover:text-brand-500 transition-colors group">
                        Xem tất cả bài viết
                        <svg class="w-4.5 h-4.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Main Column (2 Featured Articles) -->
                    <div class="lg:col-span-7 grid md:grid-cols-2 gap-6" data-aos="fade-right">
                        <?php foreach ($featured_articles as $index => $article) : ?>
                            <div class="group cursor-pointer h-full">
                                <div class="relative h-full rounded-3xl overflow-hidden bg-zinc-900 border border-zinc-800 hover:border-brand-500/50 transition-all duration-300 flex flex-col">

                                    <!-- Image -->
                                    <div class="relative aspect-video overflow-hidden">
                                        <img
                                            src="<?php echo esc_url($article['image']); ?>"
                                            alt="<?php echo esc_attr($article['title']); ?>"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
                                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent opacity-90"></div>

                                        <div class="absolute top-4 left-4">
                                            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-brand-500 text-black font-bold rounded-full text-xs shadow-lg shadow-brand-500/20">
                                                <?php echo $article['icon']; ?>
                                                <?php echo esc_html($article['tag']); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-5 flex-1 flex flex-col">
                                        <h3 class="text-lg md:text-xl font-bold text-white mb-3 leading-tight group-hover:text-brand-300 transition-colors line-clamp-2">
                                            <?php echo esc_html($article['title']); ?>
                                        </h3>
                                        <p class="text-zinc-400 mb-4 line-clamp-2 text-sm leading-relaxed flex-1">
                                            <?php echo esc_html($article['description']); ?>
                                        </p>

                                        <div class="flex items-center gap-4 text-xs text-zinc-500 border-t border-zinc-800 pt-4 mt-auto">
                                            <?php if (!empty($article['author'])) : ?>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-3.5 h-3.5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                    <span><?php echo esc_html($article['author']); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span><?php echo esc_html($article['readTime']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Side Column (List) -->
                    <div class="lg:col-span-5 flex flex-col gap-4" data-aos="fade-left">
                        <?php foreach ($side_articles as $index => $item) : ?>
                            <div
                                class="group flex gap-4 p-4 rounded-2xl bg-zinc-900/50 border border-zinc-800 hover:bg-zinc-900 hover:border-brand-500/30 transition-all duration-300 cursor-pointer"
                                data-aos="fade-up"
                                data-aos-delay="<?php echo $index * 100; ?>">
                                <!-- Icon -->
                                <div class="flex-shrink-0 w-16 h-16 rounded-xl bg-zinc-800 flex items-center justify-center text-zinc-400 border border-zinc-700 group-hover:text-brand-500 group-hover:border-brand-500/50 transition-colors">
                                    <?php echo $item['icon']; ?>
                                </div>

                                <div class="flex flex-col justify-center">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-500">
                                            <?php echo esc_html($item['tag']); ?>
                                        </span>
                                        <?php if (!empty($item['date'])) : ?>
                                            <span class="text-[10px] text-zinc-600">• <?php echo esc_html($item['date']); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <h4 class="text-white font-bold leading-snug group-hover:text-brand-300 transition-colors line-clamp-2 mb-1">
                                        <?php echo esc_html($item['title']); ?>
                                    </h4>

                                    <p class="text-xs text-zinc-500 line-clamp-1 hidden md:block">
                                        <?php echo esc_html($item['description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <!-- Newsletter Signup -->
                <div class="mt-12 p-6 md:p-8 rounded-2xl bg-gradient-to-br from-brand-900/20 to-zinc-900 border border-brand-500/20 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
                        <div class="flex-1">
                            <h4 class="text-white font-bold text-xl mb-2">Đăng ký nhận tin</h4>
                            <p class="text-sm text-zinc-400">Nhận cập nhật mới nhất về Thuế & Kế toán hàng tuần.</p>
                        </div>
                        <div class="flex gap-2 w-full md:w-auto md:min-w-[320px]">
                            <input type="email" placeholder="Email của bạn..." class="bg-black/50 border border-zinc-700 rounded-lg px-4 py-3 text-sm text-white w-full focus:outline-none focus:border-brand-500" />
                            <button class="bg-brand-500 hover:bg-brand-400 text-black px-6 py-3 rounded-lg transition-colors font-bold whitespace-nowrap">
                                Đăng ký
                            </button>
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 w-32 h-32 bg-brand-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-brand-500/20 transition-colors"></div>
                </div>
            </div>
        </section>

<?php
    }
}
?>