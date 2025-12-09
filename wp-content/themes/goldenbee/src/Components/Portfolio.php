<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class Portfolio implements ThemeComponentInterface
{
    public static function render()
    {
        $projects = [
            [
                'id' => 1,
                'title' => 'Neon Banking App',
                'category' => 'Fintech Mobile App',
                'description' => 'Ứng dụng ngân hàng số thế hệ mới với giao diện Dark Mode, tích hợp AI phân tích chi tiêu cá nhân.',
                'image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?q=80&w=1470&auto=format&fit=crop',
                'tags' => ['React Native', 'Node.js', 'AI Analysis']
            ],
            [
                'id' => 2,
                'title' => 'Luxe Estate VR',
                'category' => 'Real Estate Platform',
                'description' => 'Nền tảng bất động sản cao cấp, trải nghiệm xem nhà 3D Virtual Tour trực tiếp trên trình duyệt.',
                'image' => 'https://images.unsplash.com/photo-1613545325278-f24b0cae1224?q=80&w=1470&auto=format&fit=crop',
                'tags' => ['Next.js', 'WebGL', 'Three.js']
            ],
            [
                'id' => 3,
                'title' => 'Cyber Commerce',
                'category' => 'E-commerce System',
                'description' => 'Hệ thống thương mại điện tử hiệu năng cao, chịu tải hàng triệu request cho các đợt Flash Sale.',
                'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1470&auto=format&fit=crop',
                'tags' => ['Microservices', 'Go', 'Docker']
            ],
            [
                'id' => 4,
                'title' => 'Health AI Dashboard',
                'category' => 'Medical SaaS',
                'description' => 'Dashboard quản lý hồ sơ bệnh án và chẩn đoán sơ bộ bằng AI cho hệ thống bệnh viện tư nhân.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1470&auto=format&fit=crop',
                'tags' => ['React', 'Python', 'TensorFlow']
            ]
        ];
?>

        <section id="portfolio" class="py-24 bg-zinc-950 relative border-t border-zinc-800 overflow-hidden">
            <div class="container">
                <!-- Section Header -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6" data-aos="fade-up">
                    <div>
                        <h2 class="text-4xl md:text-6xl font-bold text-white tracking-tight mb-4">
                            Dự án <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-amber-600">Tiêu biểu</span>
                        </h2>
                        <div class="h-1 w-24 bg-brand-500 rounded-full mb-6"></div>
                        <p class="text-zinc-400 text-lg max-w-xl leading-relaxed">
                            Những sản phẩm số được chế tác tinh xảo, kết hợp giữa nghệ thuật thị giác và công nghệ tiên phong.
                        </p>
                    </div>

                    <div class="hidden md:flex gap-4">
                        <button class="portfolio-prev w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">
                            <svg class="w-5 h-5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                        <button class="portfolio-next w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Slide Scroll -->
                <div class="portfolio-scroll w-full overflow-x-auto pb-12 snap-x snap-mandatory flex gap-6 no-scrollbar" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($projects as $index => $project) : ?>
                        <div
                            class="group relative shrink-0 w-[85vw] md:w-[400px] aspect-[16/9] rounded-3xl overflow-hidden bg-zinc-900 border border-zinc-800 hover:border-brand-500/50 transition-all duration-500 snap-center cursor-pointer">
                            <!-- Image Layer -->
                            <div class="absolute inset-0 w-full h-full overflow-hidden">
                                <img
                                    src="<?php echo esc_url($project['image']); ?>"
                                    alt="<?php echo esc_attr($project['title']); ?>"
                                    class="w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-110 group-hover:rotate-1 opacity-80 group-hover:opacity-60" />
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                            </div>

                            <!-- Top Icon -->
                            <div class="absolute top-6 right-6 z-20 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-xl rounded-full border border-white/20 hover:bg-brand-500/20 hover:border-brand-400/40 transition-all">
                                    <span class="text-xs font-medium text-white">View</span>
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Project Number -->
                            <div class="absolute top-8 left-8 z-20">
                                <div class="text-8xl md:text-9xl font-black text-white/5 group-hover:text-brand-500/10 transition-colors leading-none">
                                    <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                </div>
                            </div>

                            <!-- Bottom Content Info -->
                            <div class="absolute bottom-0 left-0 right-0 p-8 md:p-10 z-20">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="relative">
                                        <div class="w-1 h-8 bg-gradient-to-b from-brand-400 to-amber-500 rounded-full"></div>
                                        <div class="absolute inset-0 w-1 h-8 bg-gradient-to-b from-brand-400 to-amber-500 rounded-full blur-sm opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <span class="text-xs font-medium tracking-wider text-zinc-300 uppercase">
                                        <?php echo esc_html($project['category']); ?>
                                    </span>
                                </div>

                                <h3 class="text-2xl md:text-3xl font-bold text-white group-hover:text-brand-100 transition-colors leading-tight">
                                    <?php echo esc_html($project['title']); ?>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Padding-right spacer to allow last card to be fully seen with padding -->
                    <div class="w-6 md:w-20 flex-shrink-0"></div>
                </div>
            </div>

            <style>
                .no-scrollbar::-webkit-scrollbar {
                    display: none;
                }

                .no-scrollbar {
                    -ms-overflow-style: none;
                    scrollbar-width: none;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const scrollContainer = document.querySelector('.portfolio-scroll');
                    const prevBtn = document.querySelector('.portfolio-prev');
                    const nextBtn = document.querySelector('.portfolio-next');

                    if (scrollContainer && prevBtn && nextBtn) {
                        const scrollAmount = 424; // 400px card width + 24px gap

                        prevBtn.addEventListener('click', function() {
                            scrollContainer.scrollBy({
                                left: -scrollAmount,
                                behavior: 'smooth'
                            });
                        });

                        nextBtn.addEventListener('click', function() {
                            scrollContainer.scrollBy({
                                left: scrollAmount,
                                behavior: 'smooth'
                            });
                        });
                    }
                });
            </script>
        </section>

<?php
    }
}
?>