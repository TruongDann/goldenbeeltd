<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class ProcessSection implements ThemeComponentInterface
{
    public static function render()
    {
        $steps = [
            [
                'id' => '01',
                'title' => 'Khảo sát & Tư vấn',
                'description' => 'Tiếp nhận yêu cầu, phân tích nghiệp vụ và tư vấn giải pháp công nghệ tối ưu chi phí.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>'
            ],
            [
                'id' => '02',
                'title' => 'Thiết kế UI/UX',
                'description' => 'Phác thảo Wireframe và thiết kế giao diện chi tiết (UI) đảm bảo trải nghiệm người dùng (UX) tốt nhất.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>'
            ],
            [
                'id' => '03',
                'title' => 'Lập trình (Coding)',
                'description' => 'Đội ngũ Dev tiến hành lập trình các tính năng (Frontend & Backend) theo bản thiết kế đã chốt.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>'
            ],
            [
                'id' => '04',
                'title' => 'Kiểm thử (QA/QC)',
                'description' => 'Chạy thử nghiệm (Test), kiểm tra lỗi bảo mật và hiệu năng trước khi đưa sản phẩm vào hoạt động.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
            ],
            [
                'id' => '05',
                'title' => 'Bàn giao & Hỗ trợ',
                'description' => 'Hướng dẫn sử dụng, bàn giao mã nguồn và hỗ trợ kỹ thuật, bảo hành trọn đời.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>'
            ]
        ];
?>

        <section class="py-24 relative border-t border-zinc-800 overflow-hidden">
            <div class="container relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
                        Quy trình <span class="text-brand-500">Làm việc</span>
                    </h2>
                    <p class="text-zinc-400 text-lg">
                        Quy trình chuẩn hóa 5 bước giúp dự án vận hành trơn tru, đúng tiến độ và đảm bảo chất lượng đầu ra tốt nhất.
                    </p>
                </div>

                <div class="relative">
                    <!-- Connecting Circuit Line (Desktop) -->
                    <div class="hidden lg:block absolute top-12 left-0 right-0 h-0.5 bg-gradient-to-r from-zinc-800 via-brand-500 to-zinc-800 -z-10 opacity-50">
                        <!-- Moving dot animation -->
                        <div class="absolute top-1/2 -translate-y-1/2 left-0 w-20 h-1 bg-gradient-to-r from-transparent via-brand-400 to-transparent animate-shimmer"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-4">
                        <?php foreach ($steps as $index => $step) : ?>
                            <div class="group relative flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">

                                <!-- Step Number & Icon -->
                                <div class="relative mb-8 transition-transform duration-500 group-hover:-translate-y-2">
                                    <!-- Outer Glow Ring -->
                                    <div class="absolute inset-0 rounded-full bg-brand-500/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                    <!-- Shape Background -->
                                    <div class="w-24 h-24 flex items-center justify-center bg-zinc-900 border border-zinc-800 rounded-2xl rotate-45 group-hover:rotate-0 group-hover:border-brand-500/50 group-hover:shadow-[0_0_30px_rgba(34,197,94,0.2)] transition-all duration-500 z-10 relative">
                                        <span class="text-zinc-400 -rotate-45 group-hover:rotate-0 group-hover:text-brand-500 transition-all duration-500">
                                            <?php echo $step['icon']; ?>
                                        </span>
                                    </div>

                                    <!-- Floating Number Badge -->
                                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 px-3 py-1 bg-zinc-950 text-brand-500 font-bold font-mono text-sm border border-zinc-800 rounded-full z-20 group-hover:border-brand-500/50 transition-colors">
                                        <?php echo $step['id']; ?>
                                    </div>
                                </div>

                                <!-- Content Card -->
                                <div class="p-6 rounded-2xl bg-zinc-900/30 border border-zinc-800/50 hover:bg-zinc-900 hover:border-brand-500/30 transition-all duration-500 h-full w-full relative group-hover:-translate-y-2 hover:shadow-xl">
                                    <!-- Connector Line Vertical (Mobile only) -->
                                    <?php if ($index !== count($steps) - 1) : ?>
                                        <div class="lg:hidden absolute bottom-[-32px] left-1/2 -translate-x-1/2 w-0.5 h-8 bg-zinc-800"></div>
                                    <?php endif; ?>

                                    <h3 class="text-lg font-bold text-white mb-3 group-hover:text-brand-400 transition-colors">
                                        <?php echo esc_html($step['title']); ?>
                                    </h3>
                                    <p class="text-sm text-zinc-400 leading-relaxed group-hover:text-zinc-300 transition-colors">
                                        <?php echo esc_html($step['description']); ?>
                                    </p>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Bottom CTA -->
                <div class="mt-20 text-center" data-aos="fade-up" data-aos-delay="500">
                    <div class="inline-flex items-center justify-center p-1 rounded-full bg-zinc-900 border border-zinc-800 hover:border-brand-500/50 transition-colors cursor-pointer group">
                        <span class="px-6 py-2 rounded-full bg-zinc-800 text-sm font-medium text-zinc-300 group-hover:bg-brand-500 group-hover:text-black transition-all">
                            Bắt đầu dự án ngay
                        </span>
                        <span class="px-4 flex items-center gap-2 text-sm font-medium text-white group-hover:text-brand-500 transition-colors">
                            Liên hệ tư vấn
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </span>
                    </div>
                </div>

            </div>
        </section>

<?php
    }
}
?>