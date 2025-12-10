<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;
use App\components\Sidebar;

class Archive implements ThemeComponentInterface
{

	/**
	 * @return mixed
	 */
	public static function render()
	{
		// Get real data from WordPress
		$categories = get_categories([
			'orderby' => 'count',
			'order' => 'DESC',
			'hide_empty' => false,
			'number' => 5
		]);

		// Get trending posts (most viewed)
		$trending_posts = get_posts([
			'post_type' => 'post',
			'posts_per_page' => 5,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order' => 'DESC'
		]);

		// Get hero posts (latest 3 posts)
		$hero_posts_query = get_posts([
			'post_type' => 'post',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC'
		]);

		// Get latest posts for main feed
		$latest_posts_query = get_posts([
			'post_type' => 'post',
			'posts_per_page' => 10,
			'orderby' => 'date',
			'order' => 'DESC'
		]);

		// Get Editor's Choice and Promo (top 2 most viewed posts)
		$featured_posts = get_posts([
			'post_type' => 'post',
			'posts_per_page' => 2,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order' => 'DESC'
		]);
		$editors_choice = isset($featured_posts[0]) ? $featured_posts[0] : null;
		$promo_post = isset($featured_posts[1]) ? $featured_posts[1] : null;

		// Helper functions
		function get_post_image_url($post_id)
		{
			if (has_post_thumbnail($post_id)) {
				return get_the_post_thumbnail_url($post_id, 'large');
			}
			$thumbnail_url = get_post_meta($post_id, '_thumbnail_url', true);
			if ($thumbnail_url) return $thumbnail_url;
			return 'https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?q=80&w=1000&auto=format&fit=crop';
		}

		function get_view_count($post_id)
		{
			$views = get_post_meta($post_id, 'post_views_count', true);
			if (!$views) $views = rand(100, 5000);
			return $views > 1000 ? number_format($views / 1000, 1) . 'k' : $views;
		}

		function get_reading_time_display($post_id)
		{
			$time = get_post_meta($post_id, '_reading_time', true);
			if ($time) return $time . ' min';
			$content = get_post_field('post_content', $post_id);
			$word_count = str_word_count(strip_tags($content));
			return ceil($word_count / 200) . ' min';
		}

		function get_post_category_name($post_id)
		{
			$categories = get_the_category($post_id);
			return !empty($categories) ? $categories[0]->name : 'Uncategorized';
		}
?>

		<div class="pt-20 min-h-screen bg-black relative">
			<div class="container relative z-10 pb-20 pt-8">
				<!-- Breadcrumb -->
				<div class="flex items-center gap-2 text-zinc-500 text-xs md:text-sm mb-6 font-mono">
					<span class="hover:text-brand-500 cursor-pointer">Home</span>
					<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
					<span class="hover:text-brand-500 cursor-pointer">Blog</span>
					<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<polyline points="9 18 15 12 9 6"></polyline>
					</svg>
					<span class="text-zinc-300 font-bold">Latest News</span>
				</div>

				<!-- HERO MAGAZINE GRID -->
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-16">
					<?php if (!empty($hero_posts_query[0])):
						$main_hero = $hero_posts_query[0];
					?>
						<!-- Main Hero Article -->
						<a href="<?php echo get_permalink($main_hero->ID); ?>" class="lg:col-span-8 group relative rounded-2xl overflow-hidden border border-zinc-800 hover:border-brand-500/50 transition-colors cursor-pointer">
							<img
								src="<?php echo esc_url(get_post_image_url($main_hero->ID)); ?>"
								alt="<?php echo esc_attr($main_hero->post_title); ?>"
								class="w-full h-full object-cover transition-opacity duration-700 group-hover:scale-105 group-hover:opacity-90 transition-opacity duration-500" />
							<div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-90"></div>
							<div class="absolute bottom-0 left-0 p-6 md:p-8 w-full">
								<span class="px-3 py-1 bg-brand-500 text-black text-xs font-bold rounded mb-3 inline-block">
									<?php echo esc_html(get_post_category_name($main_hero->ID)); ?>
								</span>
								<h2 class="text-2xl md:text-4xl font-bold text-white mb-3 leading-tight group-hover:text-brand-300 transition-colors">
									<?php echo esc_html($main_hero->post_title); ?>
								</h2>
								<p class="text-zinc-300 text-sm md:text-base line-clamp-2 max-w-2xl mb-4 hidden md:block">
									<?php echo esc_html(wp_trim_words($main_hero->post_excerpt ?: $main_hero->post_content, 20)); ?>
								</p>
								<div class="flex items-center gap-3 text-xs text-zinc-400 font-mono">
									<span class="text-white font-bold"><?php echo get_the_author_meta('display_name', $main_hero->post_author); ?></span>
									<span>•</span>
									<span><?php echo get_the_date('d/m/Y', $main_hero->ID); ?></span>
								</div>
							</div>
						</a>
					<?php endif; ?>

					<!-- Sub Hero Articles -->
					<div class="lg:col-span-4 flex flex-col gap-6">
						<?php for ($i = 1; $i < 3 && isset($hero_posts_query[$i]); $i++):
							$hero = $hero_posts_query[$i];
						?>
							<a href="<?php echo get_permalink($hero->ID); ?>" class="relative flex-1 rounded-2xl overflow-hidden border border-zinc-800 group cursor-pointer h-[200px] lg:h-[217px]">
								<img
									src="<?php echo esc_url(get_post_image_url($hero->ID)); ?>"
									alt="<?php echo esc_attr($hero->post_title); ?>"
									class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 group-hover:opacity-90 transition-opacity duration-500" />
								<div class="absolute inset-0 bg-linear-to-t from-black via-black/40 to-transparent"></div>
								<div class="absolute bottom-0 left-0 p-5">
									<span class="text-[10px] font-bold text-brand-400 uppercase tracking-wider mb-1 block">
										<?php echo esc_html(get_post_category_name($hero->ID)); ?>
									</span>
									<h3 class="text-lg font-bold text-white leading-snug group-hover:text-brand-300 transition-colors line-clamp-2">
										<?php echo esc_html($hero->post_title); ?>
									</h3>
									<span class="text-[10px] text-zinc-400 mt-2 block font-mono"><?php echo get_the_date('d/m/Y', $hero->ID); ?></span>
								</div>
							</a>
						<?php endfor; ?>
					</div>
				</div>

				<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
					<!-- LEFT COLUMN: MAIN CONTENT (8 cols) -->
					<div class="lg:col-span-8">
						<!-- Section Header -->
						<div class="flex items-center justify-between mb-8 pb-4 border-b border-zinc-800">
							<h3 class="text-2xl font-bold text-white flex items-center gap-2">
								<span class="w-2 h-8 bg-brand-500 rounded-sm"></span>
								Mới cập nhật
							</h3>
							<div class="hidden md:flex gap-2">
								<?php foreach (['Tất cả', 'Công nghệ', 'Kinh doanh'] as $cat): ?>
									<button
										class="px-3 py-1 rounded-full text-xs font-bold transition-all text-zinc-500 hover:text-white"
										onclick="this.classList.toggle('bg-zinc-800'); this.classList.toggle('text-white');">
										<?php echo esc_html($cat); ?>
									</button>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Posts Feed -->
						<div class="space-y-8">
							<?php foreach ($latest_posts_query as $index => $post):
								$post_id = $post->ID;
								$is_hot = get_view_count($post_id) > 2000;
							?>

								<?php if ($index === 2 && $editors_choice): ?>
									<!-- Editor's Choice Block -->
									<div class="bg-gradient-to-r from-zinc-900 to-zinc-950 border border-zinc-800 p-6 md:p-8 rounded-2xl mb-8 relative overflow-hidden group">
										<div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/10 rounded-full blur-[60px] pointer-events-none"></div>
										<div class="relative z-10 flex flex-col md:flex-row gap-6 items-center">
											<div class="flex-1">
												<div class="flex items-center gap-2 mb-3">
													<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-brand-500">
														<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
													</svg>
													<span class="text-xs font-bold text-brand-500 uppercase">Editor's Choice</span>
												</div>
												<h3 class="text-xl md:text-2xl font-bold text-white mb-3 leading-tight">
													<?php echo esc_html($editors_choice->post_title); ?>
												</h3>
												<p class="text-zinc-400 text-sm mb-4 line-clamp-2">
													<?php echo esc_html(wp_trim_words($editors_choice->post_excerpt ?: $editors_choice->post_content, 20)); ?>
												</p>
												<a href="<?php echo get_permalink($editors_choice->ID); ?>" class="inline-block px-5 py-2 bg-white text-black font-bold text-sm rounded-full hover:bg-brand-500 transition-colors">
													Đọc ngay
												</a>
											</div>
											<div class="w-full md:w-1/3 aspect-video rounded-xl overflow-hidden border border-zinc-700">
												<img src="<?php echo esc_url(get_post_image_url($editors_choice->ID)); ?>" class="w-full h-full object-cover group-hover:opacity-90 transition-opacity duration-500" alt="<?php echo esc_attr($editors_choice->post_title); ?>" />
											</div>
										</div>
									</div>
								<?php endif; ?> <!-- Standard Post Card -->
								<article class="group flex flex-col md:flex-row gap-6 items-start pb-8 border-b border-zinc-900 last:border-0 last:pb-0">
									<a href="<?php echo get_permalink($post_id); ?>" class="w-full md:w-[280px] aspect-[16/10] flex-shrink-0 rounded-xl overflow-hidden border border-zinc-800 relative cursor-pointer">
										<img
											src="<?php echo esc_url(get_post_image_url($post_id)); ?>"
											alt="<?php echo esc_attr($post->post_title); ?>"
											class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:opacity-90 transition-opacity duration-500" />
										<?php if ($is_hot): ?>
											<span class="absolute top-2 left-2 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded flex items-center gap-1 shadow-md">
												<svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor">
													<path d="M8.5 14.5L10 12L11.5 14.5L13 11L14.5 14.5L16 11L17.5 14.5L19 11L20.5 14.5M12 2C9.24 2 7 4.24 7 7C7 9 8 10.5 10 12L12 14L14 12C16 10.5 17 9 17 7C17 4.24 14.76 2 12 2Z" />
												</svg> HOT
											</span>
										<?php endif; ?>
									</a>

									<div class="flex-1 min-w-0">
										<div class="flex items-center gap-2 mb-2">
											<span class="text-[10px] font-bold uppercase text-brand-500 tracking-wide hover:underline cursor-pointer">
												<?php echo esc_html(get_post_category_name($post_id)); ?>
											</span>
										</div>

										<a href="<?php echo get_permalink($post_id); ?>">
											<h3 class="text-lg md:text-xl font-bold text-white mb-3 leading-snug group-hover:text-brand-400 transition-colors cursor-pointer line-clamp-2">
												<?php echo esc_html($post->post_title); ?>
											</h3>
										</a>

										<p class="text-zinc-400 text-sm leading-relaxed line-clamp-2 mb-4">
											<?php echo esc_html(wp_trim_words($post->post_excerpt ?: $post->post_content, 25)); ?>
										</p>

										<div class="flex items-center justify-between mt-auto">
											<div class="flex items-center gap-3">
												<img src="<?php echo get_avatar_url($post->post_author, ['size' => 32]); ?>" alt="Author" class="w-6 h-6 rounded-full border border-zinc-700" />
												<span class="text-xs font-bold text-zinc-300"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
												<span class="text-zinc-600 text-xs">•</span>
												<span class="text-xs text-zinc-500 font-mono"><?php echo get_the_date('d/m/Y', $post_id); ?></span>
											</div>

											<div class="flex items-center gap-4 text-zinc-500 text-xs">
												<span class="flex items-center gap-1">
													<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
														<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
														<circle cx="12" cy="12" r="3"></circle>
													</svg> <?php echo get_view_count($post_id); ?>
												</span>
												<span class="flex items-center gap-1 hover:text-brand-500 cursor-pointer transition-colors">
													<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
														<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
													</svg> <?php echo get_comments_number($post_id); ?>
												</span>
											</div>
										</div>
									</div>
								</article>
							<?php endforeach; ?>
						</div>

						<!-- Load More -->
						<div class="mt-12 text-center">
							<button class="px-8 py-3 bg-zinc-900 border border-zinc-800 text-zinc-300 rounded-full font-bold hover:bg-zinc-800 hover:text-white hover:border-zinc-700 transition-all text-sm flex items-center gap-2 mx-auto">
								Xem thêm bài viết
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<polyline points="9 18 15 12 9 6"></polyline>
								</svg>
							</button>
						</div>
					</div>

					<!-- RIGHT COLUMN: STICKY SIDEBAR (4 cols) -->
					<div class="lg:col-span-4 space-y-8 relative">
						<div class="sticky top-24 space-y-8">

							<!-- Search Widget -->
							<div class="bg-zinc-900/50 backdrop-blur border border-zinc-800 p-1 rounded-xl flex items-center">
								<input
									type="text"
									placeholder="Tìm kiếm..."
									class="w-full bg-transparent border-none rounded-lg pl-4 pr-2 py-3 text-sm text-white focus:outline-none placeholder:text-zinc-600" />
								<button class="p-2 bg-zinc-800 rounded-lg text-zinc-400 hover:text-white transition-colors">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<circle cx="11" cy="11" r="8"></circle>
										<path d="m21 21-4.35-4.35"></path>
									</svg>
								</button>
							</div>

							<!-- Trending Widget -->
							<div class="bg-zinc-900 border border-zinc-800 p-6 rounded-2xl">
								<h4 class="text-white font-bold mb-6 flex items-center gap-2 border-b border-zinc-800 pb-3">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
										<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
										<polyline points="17 6 23 6 23 12"></polyline>
									</svg> Xu hướng tuần này
								</h4>
								<div class="space-y-6">
									<?php foreach ($trending_posts as $idx => $trend): ?>
										<a href="<?php echo get_permalink($trend->ID); ?>" class="flex gap-4 group cursor-pointer relative">
											<span class="text-4xl font-black font-mono leading-none flex-shrink-0 select-none <?php
																																echo $idx === 0 ? 'text-brand-500' : ($idx === 1 ? 'text-zinc-400' : ($idx === 2 ? 'text-zinc-600' : 'text-zinc-800'));
																																?>">
												<?php echo $idx + 1; ?>
											</span>
											<div class="relative top-1">
												<h5 class="text-zinc-200 font-bold text-sm leading-snug mb-1 group-hover:text-brand-400 transition-colors line-clamp-2">
													<?php echo esc_html($trend->post_title); ?>
												</h5>
												<span class="text-[10px] text-zinc-500 flex items-center gap-1 font-mono">
													<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
														<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
														<circle cx="12" cy="12" r="3"></circle>
													</svg> <?php echo get_view_count($trend->ID); ?>
												</span>
											</div>
										</a>
									<?php endforeach; ?>
								</div>
							</div>

							<!-- Categories Widget -->
							<div class="bg-zinc-900 border border-zinc-800 p-6 rounded-2xl">
								<h4 class="text-white font-bold mb-4 flex items-center gap-2">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
										<rect x="3" y="3" width="7" height="7"></rect>
										<rect x="14" y="3" width="7" height="7"></rect>
										<rect x="14" y="14" width="7" height="7"></rect>
										<rect x="3" y="14" width="7" height="7"></rect>
									</svg> Chuyên mục
								</h4>
								<ul class="space-y-1">
									<?php foreach ($categories as $cat): ?>
										<li>
											<a href="<?php echo get_category_link($cat->term_id); ?>" class="flex justify-between items-center py-2.5 text-zinc-400 hover:text-brand-500 hover:pl-2 transition-all border-b border-zinc-800/50 last:border-0 text-sm group">
												<span class="group-hover:text-white transition-colors"><?php echo esc_html($cat->name); ?></span>
												<span class="bg-zinc-950 border border-zinc-800 text-zinc-500 px-2 py-0.5 rounded text-[10px] font-mono group-hover:border-brand-500/50 group-hover:text-brand-500 transition-colors"><?php echo esc_html($cat->count); ?></span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>

							<!-- Promo Widget -->
							<?php if ($promo_post): ?>
								<a href="<?php echo get_permalink($promo_post->ID); ?>" class="relative rounded-2xl overflow-hidden aspect-[4/5] group cursor-pointer border border-zinc-800 block">
									<img
										src="<?php echo esc_url(get_post_image_url($promo_post->ID)); ?>"
										alt="<?php echo esc_attr($promo_post->post_title); ?>"
										class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 group-hover:opacity-90 transition-opacity duration-500" />
									<div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent"></div>
									<div class="absolute bottom-0 left-0 right-0 p-6 text-center">
										<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-black mx-auto mb-4 shadow-lg">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
												<path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
											</svg>
										</div>
										<div class="inline-block px-3 py-1 bg-brand-500/20 border border-brand-500/50 rounded-full text-brand-400 text-[10px] font-bold uppercase mb-3">
											⭐ Bài Viết Nổi Bật
										</div>
										<h4 class="text-white font-bold text-lg mb-2 line-clamp-2"><?php echo esc_html($promo_post->post_title); ?></h4>
										<p class="text-zinc-300 text-xs mb-4 leading-relaxed px-2 line-clamp-2"><?php echo esc_html(wp_trim_words($promo_post->post_excerpt ?: $promo_post->post_content, 15)); ?></p>
										<div class="flex items-center justify-center gap-2 text-zinc-400 text-[10px]">
											<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
												<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
												<circle cx="12" cy="12" r="3"></circle>
											</svg> <?php echo get_view_count($promo_post->ID); ?>
											<span>•</span>
											<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
												<circle cx="12" cy="12" r="10"></circle>
												<polyline points="12 6 12 12 16 14"></polyline>
											</svg> <?php echo get_reading_time_display($promo_post->ID); ?>
										</div>
									</div>
								</a>
							<?php endif; ?>

							<!-- Tags Cloud -->
							<div class="bg-zinc-900 border border-zinc-800 p-6 rounded-2xl">
								<h4 class="text-white font-bold mb-4 flex items-center gap-2">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
										<line x1="4" y1="9" x2="20" y2="9"></line>
										<line x1="4" y1="15" x2="20" y2="15"></line>
										<line x1="10" y1="3" x2="8" y2="21"></line>
										<line x1="16" y1="3" x2="14" y2="21"></line>
									</svg> Tags
								</h4>
								<div class="flex flex-wrap gap-2">
									<?php
									$tags = get_tags(['number' => 10, 'orderby' => 'count', 'order' => 'DESC']);
									foreach ($tags as $tag):
									?>
										<a href="<?php echo get_tag_link($tag->term_id); ?>" class="px-3 py-1.5 bg-zinc-950 border border-zinc-800 rounded-lg text-xs text-zinc-400 hover:border-brand-500 hover:text-brand-500 cursor-pointer transition-colors">
											#<?php echo esc_html($tag->name); ?>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

<?php
	}
}
