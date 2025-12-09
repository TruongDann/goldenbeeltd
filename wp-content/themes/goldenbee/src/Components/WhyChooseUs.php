<?php

namespace App\components;

use App\Base\ThemeComponentInterface;

class WhyChooseUs implements ThemeComponentInterface
{

	public static function render()
	{
		$reasons = [
			[
				'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
				'title' => 'Tăng uy tín thương hiệu',
				'description' => 'Giao diện chuyên nghiệp, UX tối ưu giúp khách hàng tin tưởng và mua sắm.',
				'highlight' => 'Premium UI'
			],
			[
				'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
				'title' => 'Mở rộng tiếp cận',
				'description' => 'Tiếp cận khách hàng toàn cầu 24/7, không giới hạn địa lý hay thời gian.',
				'highlight' => 'Global Reach'
			],
			[
				'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
				'title' => 'Tiết kiệm chi phí',
				'description' => 'Chỉ ~16k/ngày cho một cỗ máy bán hàng tự động, không tốn tiền thuê mặt bằng.',
				'highlight' => 'Cost Effective'
			],
			[
				'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
				'title' => 'Tăng tỷ lệ chuyển đổi',
				'description' => 'Tốc độ nhanh, thanh toán tiện lợi giúp tối ưu hành trình mua hàng.',
				'highlight' => 'High Conversion'
			]
		];
?>

		<section class="py-24 bg-zinc-950 relative border-t border-zinc-800 overflow-hidden">
			<div class="container relative z-10">
				<!-- Header Content -->
				<div class="text-center mb-16">
					<h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-[1.1]" data-aos="fade-up" data-aos-delay="100">
						Tại sao <span class="text-brand-500">230,000+</span> doanh nghiệp chọn Golden Bee?
					</h2>

					<p class="text-zinc-400 text-lg max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
						Chúng tôi không chỉ xây dựng website, chúng tôi kiến tạo lợi thế cạnh tranh số.
						Giải pháp toàn diện giúp bạn tối ưu chi phí vận hành và bùng nổ doanh số bán hàng.
					</p>
				</div>

				<div class="grid lg:grid-cols-2 gap-12 lg:gap-12 items-start">
					<!-- Left Column: Image -->
					<div class="relative order-2 lg:order-1 rounded-[2.5rem] overflow-hidden group" data-aos="fade-right">
						<img
							src="http://goldenbeeltd.test/wp-content/themes/goldenbee/src/assets/images/why-choose-us.png"
							alt="Analytics Dashboard"
							class="w-full h-auto" />
						<div class="absolute inset-0 bg-linear-to-t from-zinc-950 via-zinc-950/40 to-transparent opacity-90"></div>
					</div>

					<!-- Right Column: Grid -->
					<div class="order-1 lg:order-2">
						<!-- The 4 Blocks Grid -->
						<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
							<?php foreach ($reasons as $index => $item) : ?>
								<div
									class="p-6 rounded-2xl bg-zinc-900 border border-zinc-800 hover:border-brand-500/30 transition-all duration-300 hover:bg-zinc-800/80 group"
									data-aos="fade-up"
									data-aos-delay="<?php echo 300 + ($index * 100); ?>">
									<div class="flex justify-between items-start mb-4">
										<div class="w-10 h-10 rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center text-brand-500 group-hover:scale-110 transition-transform">
											<?php echo $item['icon']; ?>
										</div>
										<span class="text-[10px] font-bold uppercase tracking-wider text-zinc-500 bg-zinc-800 px-2 py-1 rounded border border-zinc-700/50 group-hover:text-brand-400 group-hover:border-brand-500/20 transition-colors">
											<?php echo esc_html($item['highlight']); ?>
										</span>
									</div>

									<h3 class="text-lg font-bold text-white mb-2 group-hover:text-brand-400 transition-colors">
										<?php echo esc_html($item['title']); ?>
									</h3>
									<p class="text-sm text-zinc-400 leading-relaxed">
										<?php echo esc_html($item['description']); ?>
									</p>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="mt-10" data-aos="fade-up" data-aos-delay="700">
							<a href="#contact" class="inline-flex items-center gap-2 text-white font-bold hover:text-brand-500 transition-colors group cursor-pointer">
								Nhận tư vấn chiến lược miễn phí
								<svg class="w-4.5 h-4.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php
	}
}
?>