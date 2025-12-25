<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class TemplateGallery implements ThemeComponentInterface
{
    public static function render()
    {
        $categories = ["Tất cả", "E-commerce", "Doanh nghiệp", "Landing Page", "Blog/Tin tức", "Bất động sản"];

        $templates = [
            [
                'id' => 1,
                'title' => 'TechGear Store',
                'category' => 'E-commerce',
                'image' => 'https://i.pinimg.com/736x/20/db/2c/20db2c34c1d0045954aae1f5d24a6ed1.jpg',
                'price' => 'Free'
            ],
            [
                'id' => 2,
                'title' => 'Modern Agency',
                'category' => 'Doanh nghiệp',
                'image' => 'https://i.pinimg.com/736x/fe/b1/4e/feb14e75d775327f94dd1dec96550f61.jpg',
                'price' => 'Pro'
            ],
            [
                'id' => 3,
                'title' => 'Luxury Villa',
                'category' => 'Bất động sản',
                'image' => 'https://i.pinimg.com/736x/b7/b9/bb/b7b9bb65a904b8a43fdfa80a4b2b2f4d.jpg',
                'price' => 'Pro'
            ],
            [
                'id' => 4,
                'title' => 'Healthy Food',
                'category' => 'Landing Page',
                'image' => 'https://i.pinimg.com/736x/61/fb/c5/61fbc5cd4c1ab68cf62e438ae8118fc1.jpg',
                'price' => 'Free'
            ],
            [
                'id' => 5,
                'title' => 'Crypto Dashboard',
                'category' => 'Doanh nghiệp',
                'image' => 'https://images.unsplash.com/photo-1642104704074-907c0698cbd9?q=80&w=1632&auto=format&fit=crop',
                'price' => 'Pro'
            ],
            [
                'id' => 6,
                'title' => 'Fashion Week',
                'category' => 'E-commerce',
                'image' => 'https://i.pinimg.com/736x/d4/46/8b/d4468b3a42cc69b3e8a1535f423080c7.jpg',
                'price' => 'Free'
            ]
        ];
?>

        <section class="py-24 relative border-t border-zinc-800 overflow-hidden">
            <div class="container relative z-10">
                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Khám phá kho <span class="text-brand-500">Giao diện mẫu</span>
                    </h2>

                    <p class="text-zinc-400 text-lg leading-relaxed mb-8">
                        Hơn <span class="text-white font-bold">400+ giao diện</span> theo ngành hàng, tương thích đa thiết bị và tùy chỉnh linh hoạt chỉ với vài thao tác kéo thả.
                    </p>
                </div>

                <!-- Categories -->
                <div class="flex flex-wrap justify-center gap-2 mb-12" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($categories as $index => $cat) : ?>
                        <button
                            class="category-btn px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 border bg-zinc-900 text-zinc-400 border-zinc-800 hover:border-zinc-600 hover:text-white <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-category="<?php echo esc_attr($cat); ?>">
                            <?php echo esc_html($cat); ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Single Row Slider - Vertical Cards -->
                <div class="flex overflow-x-auto pb-12 gap-6 md:gap-8 snap-x snap-mandatory no-scrollbar px-4 md:px-0 -mx-4 md:mx-0" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($templates as $template) : ?>
                        <div
                            class="template-card flex-shrink-0 w-[280px] md:w-[340px] snap-center group relative bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-800 hover:border-brand-500/50 transition-all duration-500 hover:shadow-2xl hover:shadow-brand-900/20"
                            data-category="<?php echo esc_attr($template['category']); ?>">
                            <!-- Image Area - Long Vertical Screenshot Style -->
                            <div class="relative aspect-[9/16] overflow-hidden bg-zinc-800">
                                <img
                                    src="<?php echo esc_url($template['image']); ?>"
                                    alt="<?php echo esc_attr($template['title']); ?>"
                                    class="w-full h-full object-cover object-top transition-all duration-[2s] ease-linear group-hover:object-bottom" />

                                <!-- Floating Badge -->
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="px-3 py-1 bg-black/60 backdrop-blur-md rounded-full text-xs font-medium text-white border border-white/10">
                                        <?php echo esc_html($template['category']); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Spacer for end of scroll -->
                    <div class="w-2 md:w-8 flex-shrink-0"></div>
                </div>

                <!-- Footer CTA -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <button class="px-8 py-4 bg-zinc-900 border border-zinc-700 hover:border-brand-500 text-white rounded-full font-bold transition-all hover:shadow-[0_0_30px_rgba(34,197,94,0.15)] inline-flex items-center gap-2 group">
                        Xem kho giao diện đầy đủ
                        <svg class="w-4.5 h-4.5 group-hover:translate-x-1 transition-transform text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
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

                .category-btn.active {
                    background-color: rgb(234 179 8);
                    color: black;
                    border-color: rgb(234 179 8);
                    box-shadow: 0 0 20px rgba(234, 179, 8, 0.3);
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const categoryBtns = document.querySelectorAll('.category-btn');
                    const templateCards = document.querySelectorAll('.template-card');

                    categoryBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            const selectedCategory = this.dataset.category;

                            // Update active button
                            categoryBtns.forEach(b => b.classList.remove('active'));
                            this.classList.add('active');

                            // Filter templates
                            templateCards.forEach(card => {
                                if (selectedCategory === 'Tất cả' || card.dataset.category === selectedCategory) {
                                    card.style.display = 'block';
                                } else {
                                    card.style.display = 'none';
                                }
                            });
                        });
                    });
                });
            </script>
        </section>

<?php
    }
}
?>