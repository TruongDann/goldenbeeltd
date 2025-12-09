<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;

class Footer implements ThemeComponentInterface
{
	public static function render()
	{
		$services = [
			'Thiết kế Website cao cấp',
			'Phát triển Mobile App (iOS/Android)',
			'Phần mềm quản lý (ERP/CRM)',
			'Dịch vụ SEO tổng thể',
			'Chạy quảng cáo đa nền tảng',
			'Blockchain & AI Solutions',
			'Đăng ký tên miền & Hosting'
		];

		$policies = [
			['text' => 'Quy định chung', 'badge' => ''],
			['text' => 'Chính sách bảo mật', 'badge' => ''],
			['text' => 'Chính sách bảo hành', 'badge' => ''],
			['text' => 'Hình thức thanh toán', 'badge' => ''],
			['text' => 'Câu hỏi thường gặp (FAQ)', 'badge' => ''],
			['text' => 'Tuyển dụng nhân tài', 'badge' => 'Hot'],
			['text' => 'Liên hệ hợp tác', 'badge' => '']
		];

		$branches = [
			[
				'city' => 'TP. Hồ Chí Minh (HQ)',
				'color' => 'brand',
				'address' => 'Tầng 12, Bitexco Financial Tower, Số 2 Hải Triều, Bến Nghé, Q.1',
				'hotline' => '0909 888 999',
				'email' => 'hcm@goldenbee.com'
			],
			[
				'city' => 'TP. Hà Nội',
				'color' => 'white',
				'address' => 'Tầng 8, Tòa nhà Leadvisors, 643 Phạm Văn Đồng, Cổ Nhuế 1, Bắc Từ Liêm',
				'hotline' => '0901 234 567',
				'email' => 'hanoi@goldenbee.com'
			],
			[
				'city' => 'TP. Đà Nẵng',
				'color' => 'white',
				'address' => 'Tầng 3, Tòa nhà Indochina Riverside, 74 Bạch Đằng, Hải Châu 1, Hải Châu',
				'hotline' => '0905 555 666',
				'email' => 'danang@goldenbee.com'
			],
			[
				'city' => 'TP. Cần Thơ',
				'color' => 'white',
				'address' => 'Tầng 5, Tòa nhà STS, 11B Hòa Bình, Tân An, Ninh Kiều',
				'hotline' => '0939 123 456',
				'email' => 'cantho@goldenbee.com'
			]
		];
?>

		<footer class="bg-black border-t border-zinc-900 pt-20 pb-10 text-sm">
			<div class="container">

				<!-- TOP SECTION: Brand, About, Services, Policies -->
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16 border-b border-zinc-900 pb-16">

					<!-- Col 1: Brand & Intro (4 cols) -->
					<div class="lg:col-span-4">
						<div class="text-3xl font-bold font-mono tracking-tighter text-white mb-6">
							GOLDEN<span class="text-brand-500">BEE</span>
						</div>
						<p class="text-zinc-400 leading-relaxed mb-8 pr-4 text-justify">
							Golden Bee là công ty công nghệ hàng đầu chuyên cung cấp giải pháp chuyển đổi số toàn diện.
							Với đội ngũ 150+ kỹ sư tài năng, chúng tôi cam kết mang lại sản phẩm chất lượng quốc tế,
							giúp doanh nghiệp bứt phá doanh thu trong kỷ nguyên số.
						</p>

						<div class="flex gap-4 mb-8">
							<a href="#" class="w-10 h-10 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all">
								<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
									<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
								</svg>
							</a>
							<a href="#" class="w-10 h-10 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-blue-700 hover:text-white hover:border-blue-700 transition-all">
								<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
									<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
								</svg>
							</a>
							<a href="#" class="w-10 h-10 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-pink-600 hover:text-white hover:border-pink-600 transition-all">
								<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
									<path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
								</svg>
							</a>
							<a href="#" class="w-10 h-10 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:bg-sky-500 hover:text-white hover:border-sky-500 transition-all">
								<svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
									<path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
								</svg>
							</a>
						</div>
					</div>

					<!-- Col 2: Services (3 cols) -->
					<div class="lg:col-span-3">
						<h4 class="text-white font-bold text-lg mb-6 relative inline-block">
							Dịch vụ & Giải pháp
							<span class="absolute -bottom-2 left-0 w-10 h-1 bg-brand-500 rounded-full"></span>
						</h4>
						<ul class="space-y-3">
							<?php foreach ($services as $service) : ?>
								<li><a href="#" class="text-zinc-400 hover:text-brand-500 transition-colors block py-1"><?php echo esc_html($service); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Col 3: Support & Policy (2 cols) -->
					<div class="lg:col-span-2">
						<h4 class="text-white font-bold text-lg mb-6 relative inline-block">
							Hỗ trợ & Chính sách
							<span class="absolute -bottom-2 left-0 w-10 h-1 bg-brand-500 rounded-full"></span>
						</h4>
						<ul class="space-y-3">
							<?php foreach ($policies as $policy) : ?>
								<li>
									<a href="#" class="text-zinc-400 hover:text-brand-500 transition-colors block py-1">
										<?php echo esc_html($policy['text']); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Col 4: Newsletter (3 cols) -->
					<div class="lg:col-span-3">
						<h4 class="text-white font-bold text-lg mb-6 relative inline-block">
							Đăng ký nhận tin
							<span class="absolute -bottom-2 left-0 w-10 h-1 bg-brand-500 rounded-full"></span>
						</h4>
						<p class="text-zinc-400 mb-6 text-sm leading-relaxed">
							Nhận thông tin về xu hướng công nghệ mới nhất và các ưu đãi đặc biệt từ Golden Bee.
						</p>
						<div class="flex flex-col gap-3">
							<input type="email" placeholder="Nhập email của bạn..." class="bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-3 text-white w-full focus:outline-none focus:border-brand-500 text-sm transition-colors" />
							<button class="bg-brand-500 hover:bg-brand-400 text-black font-bold py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
								Đăng ký ngay
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
								</svg>
							</button>
						</div>

						<div class="mt-8 pt-6 border-t border-zinc-900">
							<p class="text-zinc-500 text-xs mb-3 font-bold uppercase">Chấp nhận thanh toán:</p>
							<div class="flex gap-3 text-zinc-600">
								<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
								</svg>
								<div class="font-mono text-xs border border-zinc-800 px-2 py-1 rounded bg-zinc-900">VISA</div>
								<div class="font-mono text-xs border border-zinc-800 px-2 py-1 rounded bg-zinc-900">MOMO</div>
								<div class="font-mono text-xs border border-zinc-800 px-2 py-1 rounded bg-zinc-900">BANK</div>
							</div>
						</div>
					</div>
				</div>

				<!-- MIDDLE SECTION: Branch Network -->
				<div class="mb-16">
					<h4 class="text-white font-bold text-xl mb-8 text-center uppercase tracking-wider">
						<span class="text-brand-500">Hệ thống</span> văn phòng & chi nhánh
					</h4>

					<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
						<?php foreach ($branches as $branch) : ?>
							<div class="p-6 rounded-2xl bg-zinc-900/50 border border-zinc-800 hover:border-brand-500/30 transition-colors">
								<h5 class="<?php echo $branch['color'] === 'brand' ? 'text-brand-400' : 'text-white'; ?> font-bold mb-4 flex items-center gap-2 uppercase">
									<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
									</svg>
									<?php echo esc_html($branch['city']); ?>
								</h5>
								<ul class="space-y-3 text-zinc-400 text-xs leading-relaxed">
									<li><strong>Đ/c:</strong> <?php echo esc_html($branch['address']); ?></li>
									<li><strong>Hotline:</strong> <?php echo esc_html($branch['hotline']); ?></li>
									<li><strong>Email:</strong> <?php echo esc_html($branch['email']); ?></li>
								</ul>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<!-- BOTTOM SECTION: Copyright & Links -->
				<div class="pt-8 border-t border-zinc-900 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-zinc-500">
					<p>&copy; 2015 - <?php echo date('Y'); ?> <span class="text-zinc-300 font-bold">Golden Bee Technology Co., Ltd</span>. All rights reserved.</p>
					<div class="flex gap-6">
						<span>Mã số thuế: 0312345678</span>
						<span class="hidden md:inline">|</span>
						<a href="#" class="hover:text-white transition-colors">Sitemap</a>
						<span class="hidden md:inline">|</span>
						<a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
					</div>
				</div>
			</div>
		</footer>

<?php
	}
}
