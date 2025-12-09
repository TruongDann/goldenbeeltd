<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class SupportSection implements ThemeComponentInterface
{
    public static function render()
    {
        $features = [
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>',
                'title' => '400+ giao diện Responsive đẹp mắt',
                'description' => 'Giao diện website được đầu tư thiết kế tỉ mỉ và đa dạng, đáp ứng nhu cầu làm trang web bán hàng cho hơn 30 ngành nghề kinh doanh khác nhau. Đặc biệt, giao diện được tối ưu hiển thị trên mọi thiết bị, từ máy tính đến điện thoại.',
                'image' => 'https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/function/sellatwebsite/giao-dien-responsive.png?v=5'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
                'title' => 'Bảo mật tuyệt đối website với chứng chỉ SSL',
                'description' => 'Golden Bee đảm bảo website của bạn được bảo mật tối đa với HTTPS và SSL tiêu chuẩn quốc tế. Thông tin khách hàng luôn được bảo vệ khỏi các nguy cơ tấn công.',
                'image' => 'https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/function/sellatwebsite/bao-mat-website.png?v=6'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>',
                'title' => 'Viết content tự động bằng trí tuệ nhân tạo (AI)',
                'description' => 'Ứng dụng AI cho phép bạn tạo mô tả sản phẩm chỉ trong vài giây, tuỳ chỉnh giọng văn theo từng nhóm khách hàng. Điều này giúp tiết kiệm chi phí nhân sự và tăng hiệu quả chuyển đổi.',
                'image' => 'https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/function/sellatwebsite/viet-content-tu-dong-voi-ai.png?v=5'
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
                'title' => 'Quản trị website dễ dàng',
                'description' => 'Giao diện quản trị thân thiện giúp bạn cập nhật sản phẩm, xử lý đơn hàng và theo dõi báo cáo dễ dàng mà không cần kỹ năng kỹ thuật phức tạp.',
                'image' => 'https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/function/sellatwebsite/quan-tri-web-de-dang.png?v=5'
            ]
        ];
?>

        <section class="py-24 bg-zinc-950 relative overflow-hidden border-t border-zinc-800">
            <div class="container relative z-10">

                <!-- Header Section - Moved above the grid -->
                <div class="max-w-3xl mb-12" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        Hỗ trợ thiết kế website bán hàng <span class="text-brand-500">chuyên nghiệp từ A-Z</span>
                    </h2>

                    <p class="text-zinc-400 text-lg leading-relaxed max-w-2xl">
                        Không cần biết thiết kế hay code bạn vẫn có thể thiết kế website bán hàng với nhiều tiện ích hiện đại.
                    </p>
                </div>

                <!-- Content Grid - Now strictly aligns List and Image -->
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-stretch">

                    <!-- Column 1: Feature List -->
                    <div class="space-y-4" data-aos="fade-right">
                        <?php foreach ($features as $idx => $feature) : ?>
                            <div
                                class="feature-accordion flex flex-col p-5 rounded-2xl transition-all duration-300 border cursor-pointer group bg-transparent border-transparent hover:bg-zinc-800/50 hover:border-zinc-800 <?php echo $idx === 0 ? 'active' : ''; ?>"
                                data-index="<?php echo $idx; ?>">
                                <div class="flex items-center gap-4">
                                    <div class="feature-icon w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 transition-colors duration-300 bg-zinc-800 text-brand-500 group-hover:text-brand-400">
                                        <?php echo $feature['icon']; ?>
                                    </div>

                                    <h3 class="feature-title font-bold text-lg flex-1 transition-colors duration-300 text-white group-hover:text-brand-100">
                                        <?php echo esc_html($feature['title']); ?>
                                    </h3>

                                    <svg class="feature-chevron w-5 h-5 text-zinc-500 transition-transform duration-300 group-hover:text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>

                                <div class="feature-content overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                                    <p class="text-zinc-400 text-sm leading-relaxed pl-[4rem] pr-4 mt-4">
                                        <?php echo esc_html($feature['description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Column 2: Visual Image - Aligned with the list -->
                    <div class="relative mt-8 lg:mt-0" data-aos="fade-left">
                        <!-- Main Dashboard Image Container -->
                        <div class="relative w-full">
                            <?php foreach ($features as $idx => $feature) : ?>
                                <img
                                    src="<?php echo esc_url($feature['image']); ?>"
                                    alt="<?php echo esc_attr($feature['title']); ?>"
                                    class="feature-image w-full transition-opacity duration-500 <?php echo $idx === 0 ? 'opacity-100' : 'opacity-0 absolute top-0 left-0'; ?>"
                                    data-index="<?php echo $idx; ?>" />
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const accordions = document.querySelectorAll('.feature-accordion');
                    const featureImages = document.querySelectorAll('.feature-image');

                    accordions.forEach(accordion => {
                        accordion.addEventListener('click', function() {
                            const clickedIndex = this.dataset.index;

                            // Close all accordions
                            accordions.forEach(acc => {
                                acc.classList.remove('active');
                                acc.classList.remove('bg-zinc-800/80', 'border-brand-500/30', 'shadow-[0_0_30px_rgba(34,197,94,0.05)]');
                                acc.classList.add('bg-transparent', 'border-transparent');

                                const icon = acc.querySelector('.feature-icon');
                                icon.classList.remove('bg-brand-500', 'text-black');
                                icon.classList.add('bg-zinc-800', 'text-brand-500');

                                const title = acc.querySelector('.feature-title');
                                title.classList.remove('text-brand-100');
                                title.classList.add('text-white');

                                const chevron = acc.querySelector('.feature-chevron');
                                chevron.classList.remove('rotate-180', 'text-brand-500');

                                const content = acc.querySelector('.feature-content');
                                content.classList.remove('max-h-48', 'opacity-100');
                                content.classList.add('max-h-0', 'opacity-0');
                            });

                            // Hide all images
                            featureImages.forEach(img => {
                                img.classList.remove('opacity-100');
                                img.classList.add('opacity-0');
                            });

                            // Always open clicked accordion
                            this.classList.add('active');
                            this.classList.remove('bg-transparent', 'border-transparent');
                            this.classList.add('bg-zinc-800/80', 'border-brand-500/30', 'shadow-[0_0_30px_rgba(34,197,94,0.05)]');

                            const icon = this.querySelector('.feature-icon');
                            icon.classList.remove('bg-zinc-800', 'text-brand-500');
                            icon.classList.add('bg-brand-500', 'text-black');

                            const title = this.querySelector('.feature-title');
                            title.classList.remove('text-white');
                            title.classList.add('text-brand-100');

                            const chevron = this.querySelector('.feature-chevron');
                            chevron.classList.add('rotate-180', 'text-brand-500');

                            const content = this.querySelector('.feature-content');
                            content.classList.remove('max-h-0', 'opacity-0');
                            content.classList.add('max-h-48', 'opacity-100');

                            // Show corresponding image
                            const activeImage = document.querySelector(`.feature-image[data-index="${clickedIndex}"]`);
                            if (activeImage) {
                                activeImage.classList.remove('opacity-0');
                                activeImage.classList.add('opacity-100');
                            }
                        });
                    });

                    // Open first accordion by default
                    if (accordions.length > 0) {
                        accordions[0].click();
                    }
                });
            </script>
        </section>

<?php
    }
}
?>