<?php

namespace App\Components;

use App\Base\ThemeComponentInterface;

class Service implements ThemeComponentInterface
{
    public static function render()
    {
        $services = [
            [
                'title' => 'Thiết kế & Lập trình Website',
                'description' => 'Website doanh nghiệp, Landing page, E-commerce với hiệu năng cao, chuẩn SEO và tương thích mọi thiết bị. Sử dụng Next.js, React.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                'tags' => ['React', 'NextJS', 'Tailwind', 'High Performance'],
                'class' => 'md:col-span-2',
                'image' => 'https://picsum.photos/seed/web/800/600?grayscale'
            ],
            [
                'title' => 'Phát triển Mobile App',
                'description' => 'Xây dựng ứng dụng đa nền tảng (iOS, Android) với Flutter hoặc React Native. Trải nghiệm mượt mà, giao diện hiện đại.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                'tags' => ['iOS', 'Android', 'Flutter', 'React Native'],
                'class' => 'md:col-span-1 bg-zinc-900',
                'image' => null
            ],
            [
                'title' => 'SEO & Marketing',
                'description' => 'Tối ưu hóa công cụ tìm kiếm, đưa từ khóa lên Top Google bền vững. Chiến lược Content Marketing hiệu quả.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>',
                'tags' => ['SEO Entity', 'Keyword Audit', 'Traffic Growth'],
                'class' => 'md:col-span-1',
                'image' => null
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Thiết kế giao diện người dùng tập trung vào trải nghiệm. Wireframe, Prototype và Design System chuyên nghiệp.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>',
                'tags' => ['Figma', 'User Flow', 'Prototyping'],
                'class' => 'md:col-span-1',
                'image' => null
            ],
            [
                'title' => 'Phần mềm theo yêu cầu',
                'description' => 'Phát triển hệ thống quản lý (CRM, ERP), API integration và các giải pháp phần mềm phức tạp cho doanh nghiệp.',
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>',
                'tags' => ['NodeJS', 'Python', 'Cloud Architecture'],
                'class' => 'md:col-span-1',
                'image' => 'https://picsum.photos/seed/code/800/600?grayscale'
            ]
        ];
?>
        <section id="services" class="py-24 relative">
            <div class="container">
                <div class="mb-16" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Dịch vụ của <span class="text-brand-400">Chúng tôi</span>
                    </h2>
                    <div class="h-1 w-20 bg-brand-500 rounded-full"></div>
                    <p class="mt-6 text-zinc-400 max-w-2xl text-lg">
                        Giải pháp toàn diện từ thiết kế giao diện đến vận hành hệ thống. Chúng tôi không sử dụng template có sẵn, mọi sản phẩm đều được may đo riêng biệt.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[minmax(250px,auto)]">
                    <?php foreach ($services as $index => $service) : ?>
                        <div
                            class="group relative overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/50 backdrop-blur-sm p-6 hover:border-brand-500 transition-all duration-300 <?php echo esc_attr($service['class']); ?>"
                            data-aos="fade-up"
                            data-aos-delay="<?php echo $index * 100; ?>">
                            <?php if ($service['image']) : ?>
                                <div class="absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity">
                                    <img src="<?php echo esc_url($service['image']); ?>" alt="<?php echo esc_attr($service['title']); ?>" class="w-full h-full object-cover">
                                </div>
                            <?php endif; ?>

                            <div class="relative z-10">
                                <div class="w-12 h-12 rounded-lg bg-brand-500/10 flex items-center justify-center text-brand-500 mb-4 group-hover:bg-brand-500/20 transition-colors">
                                    <?php echo $service['icon']; ?>
                                </div>

                                <h3 class="text-xl font-bold text-white mb-3"><?php echo esc_html($service['title']); ?></h3>
                                <p class="text-zinc-400 mb-4 leading-relaxed"><?php echo esc_html($service['description']); ?></p>

                                <div class="flex flex-wrap gap-2">
                                    <?php foreach ($service['tags'] as $tag) : ?>
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-zinc-800 text-zinc-300 border border-zinc-700">
                                            <?php echo esc_html($tag); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
<?php
    }
}
?>