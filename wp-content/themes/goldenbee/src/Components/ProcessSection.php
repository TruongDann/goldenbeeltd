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
                'image' => 'step.png',
                'description' => 'Tiếp nhận yêu cầu, phân tích nghiệp vụ và tư vấn giải pháp công nghệ tối ưu chi phí.',
            ],
            [
                'id' => '02',
                'title' => 'Thiết kế UI/UX',
                'image' => 'step-2.png',
                'description' => 'Phác thảo Wireframe và thiết kế giao diện chi tiết đảm bảo trải nghiệm người dùng tốt nhất.',
            ],
            [
                'id' => '03',
                'title' => 'Lập trình (Coding)',
                'image' => 'step-3.png',
                'description' => 'Đội ngũ Dev tiến hành lập trình các tính năng Frontend & Backend theo bản thiết kế.',
            ],
            [
                'id' => '04',
                'title' => 'Kiểm thử (QA/QC)',
                'image' => 'step-4.png',
                'description' => 'Chạy thử nghiệm, kiểm tra lỗi bảo mật và hiệu năng trước khi đưa sản phẩm vào hoạt động.',
            ],
            [
                'id' => '05',
                'title' => 'Bàn giao & Hỗ trợ',
                'image' => 'step-5.png',
                'description' => 'Hướng dẫn sử dụng, bàn giao mã nguồn và hỗ trợ kỹ thuật, bảo hành trọn đời.',
            ],
            [
                'id' => '06',
                'title' => 'Nâng cấp & Mở rộng',
                'image' => 'step-6.png',
                'description' => 'Cập nhật tính năng mới, tối ưu hóa hiệu suất và mở rộng hệ thống theo nhu cầu.',
            ]
        ];
?>

        <section id="process" class="py-24 relative border-t border-zinc-800">
            <div class="container">
                <!-- Header -->
                <div class="mb-6" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Quy trình <span class="text-brand-400">Làm việc</span>
                    </h2>
                    <p class="mt-6 text-zinc-400 max-w-2xl text-lg">
                        Chúng tôi áp dụng quy trình chuẩn hóa, đảm bảo chất lượng và tiến độ cho mọi dự án.
                    </p>
                </div>

                <!-- Process Cards Grid - 3 columns -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($steps as $index => $step) : ?>
                        <div 
                            class="group p-6 rounded-2xl border border-zinc-800 bg-zinc-900/50 hover:border-brand-500 transition-all duration-300"
                            data-aos="fade-up" 
                            data-aos-delay="<?php echo $index * 100; ?>">

                            <!-- Workflow Diagram for first card -->
                            <div class="mb-5 h-32 overflow-hidden rounded-lg">
                                <img src="<?php echo home_url('/wp-content/themes/goldenbee/src/assets/images/' . $step['image']); ?>" alt="Quy trình làm việc" class="w-full h-full object-contain">
                            </div>
                        
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-white mb-3">
                                <?php echo esc_html($step['title']); ?>
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-zinc-400 text-sm leading-relaxed">
                                <?php echo esc_html($step['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

<?php
    }
}
?>
