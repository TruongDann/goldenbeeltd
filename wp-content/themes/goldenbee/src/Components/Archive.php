<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;
use App\components\Sidebar;
use Reading_Time_WP;
use WP_Query;

class Archive implements ThemeComponentInterface
{

	/**
	 * @return mixed
	 */
	public static function render()
	{
		// Check if this is a category archive
		$is_category = is_category();
		$is_tag = is_tag();

		// If it's a category or tag, show the category layout
		if ($is_category || $is_tag) {
			return self::renderCategoryArchive();
		}

		// Otherwise, show the default "all posts" layout
		return self::renderDefaultArchive();
	}

	private static function renderDefaultArchive()
	{
		// Get real data for default "all posts" view
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
			// Use Post Views Counter plugin function if available
			if (function_exists('pvc_get_post_views')) {
				$views = pvc_get_post_views($post_id);
			} else {
				$views = get_post_meta($post_id, 'post_views_count', true) ?: 0;
			}

			return $views > 1000 ? number_format($views / 1000, 1) . 'k' : $views;
		}

		function get_reading_time_display($post_id)
		{
			// Use Reading Time WP plugin if available
			if (class_exists('Reading_Time_WP')) {
				$rt_plugin = new Reading_Time_WP();
				$rt_options = get_option('rt_reading_time_options');
				$time = $rt_plugin->rt_calculate_reading_time($post_id, $rt_options);
				return $time . ' min';
			}

			// Fallback calculation if plugin not available
			$content = get_post_field('post_content', $post_id);
			$word_count = str_word_count(strip_tags($content));
			return max(1, ceil($word_count / 200)) . ' min';
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
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>

				<!-- HERO MAGAZINE GRID -->
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-16">
					<?php if (!empty($hero_posts_query[0])):
						$main_hero = $hero_posts_query[0];
					?>
						<!-- Main Hero Article -->
						<a href="<?php echo get_permalink($main_hero->ID); ?>" class="lg:col-span-8 group relative rounded-2xl overflow-hidden border border-zinc-800 hover:border-brand-500/50 transition-all cursor-pointer">
							<img
								src="<?php echo esc_url(get_post_image_url($main_hero->ID)); ?>"
								alt="<?php echo esc_attr($main_hero->post_title); ?>"
								class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" />
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

	private static function renderCategoryArchive()
	{
		// Get current category/tag info
		$current_obj = get_queried_object();
		$is_category = is_category();
		$is_tag = is_tag();

		$archive_title = $current_obj->name;
		$archive_description = $is_category ? category_description($current_obj->term_id) : tag_description($current_obj->term_id);

		// Use global query (posts_per_page is set via pre_get_posts hook)
		global $wp_query;
		$archive_query = $wp_query;
		$paged = max(1, get_query_var('paged'));

		// Get trending posts in this category
		$trending_args = [
			'post_type' => 'post',
			'posts_per_page' => 4,
			'meta_key' => 'post_views_count',
			'orderby' => 'meta_value_num',
			'order' => 'DESC'
		];

		if ($is_category) {
			$trending_args['cat'] = $current_obj->term_id;
		} elseif ($is_tag) {
			$trending_args['tag_id'] = $current_obj->term_id;
		}

		$trending_posts = get_posts($trending_args);

		// Helper function
		function get_category_post_image($post_id)
		{
			if (has_post_thumbnail($post_id)) {
				return get_the_post_thumbnail_url($post_id, 'large');
			}
			return 'https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?q=80&w=1000&auto=format&fit=crop';
		}
	?>

		<div class="pt-20 min-h-screen bg-black text-zinc-100">

			<!-- Category Header (Hero) -->
			<div class="relative bg-zinc-900 border-b border-zinc-800 overflow-hidden">
				<!-- Abstract Background -->
				<div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/5 rounded-full blur-[100px] pointer-events-none"></div>
				<div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/5 rounded-full blur-[100px] pointer-events-none"></div>

				<div class="container py-16 relative z-10">
					<!-- Breadcrumb -->
					<div class="flex items-center gap-2 text-zinc-500 text-sm mb-6 font-mono">
						<?php if (function_exists('bcn_display')): ?>
							<?php bcn_display(); ?>
						<?php else: ?>
							<a href="<?php echo home_url(); ?>" class="hover:text-brand-500 cursor-pointer flex items-center gap-1">
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<polyline points="15 18 9 12 15 6"></polyline>
								</svg> Blog
							</a>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
							<span class="text-zinc-300 font-bold">Danh mục</span>
							<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
							<span class="text-brand-500 font-bold"><?php echo esc_html($archive_title); ?></span>
						<?php endif; ?>
					</div>

					<h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
						<?php echo esc_html($archive_title); ?>
					</h1>
					<?php if ($archive_description): ?>
						<p class="text-xl text-zinc-400 max-w-2xl leading-relaxed">
							<?php echo wp_kses_post($archive_description); ?>
						</p>
					<?php else: ?>
						<p class="text-xl text-zinc-400 max-w-2xl leading-relaxed">
							Tổng hợp các bài viết, tin tức và phân tích chuyên sâu về chủ đề <strong class="text-white"><?php echo esc_html($archive_title); ?></strong>. Cập nhật liên tục hàng ngày.
						</p>
					<?php endif; ?>
				</div>
			</div>

			<div class="container py-12">
				<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

					<!-- LEFT CONTENT: ARTICLE LIST -->
					<div class="lg:col-span-8">

						<!-- Toolbar -->
						<div class="flex flex-wrap items-center justify-between mb-8 gap-4 pb-4 border-b border-zinc-800">
							<div class="text-zinc-400 text-sm">
								Hiển thị <strong class="text-white"><?php echo $archive_query->found_posts; ?></strong> bài viết
							</div>

							<div class="flex items-center gap-3">
								<div class="relative group">
									<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-900 border border-zinc-800 text-sm hover:border-brand-500/50 transition-colors">
										<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
										</svg>
										Mới nhất
										<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="rotate-90">
											<polyline points="9 18 15 12 9 6"></polyline>
										</svg>
									</button>
								</div>
								<div class="flex bg-zinc-900 rounded-lg p-1 border border-zinc-800">
									<button class="p-2 rounded transition-colors bg-zinc-800 text-white" id="grid-view">
										<div class="grid grid-cols-2 gap-0.5 w-4 h-4">
											<div class="bg-current rounded-[1px]"></div>
											<div class="bg-current rounded-[1px]"></div>
											<div class="bg-current rounded-[1px]"></div>
											<div class="bg-current rounded-[1px]"></div>
										</div>
									</button>
									<button class="p-2 rounded transition-colors text-zinc-500 hover:text-white" id="list-view">
										<div class="flex flex-col gap-1 w-4 h-4 justify-center">
											<div class="w-full h-[2px] bg-current rounded-full"></div>
											<div class="w-full h-[2px] bg-current rounded-full"></div>
											<div class="w-full h-[2px] bg-current rounded-full"></div>
										</div>
									</button>
								</div>
							</div>
						</div>

						<!-- Grid Layout -->
						<div class="grid gap-8 grid-cols-1 md:grid-cols-2" id="posts-grid">
							<?php
							if ($archive_query->have_posts()):
								while ($archive_query->have_posts()): $archive_query->the_post();
									$post_id = get_the_ID();
									$views = get_post_meta($post_id, 'post_views_count', true);
									if (!$views) $views = rand(1000, 5000);
									$is_hot = $views > 2000;
							?>
									<div class="group bg-zinc-900/50 border border-zinc-800 hover:border-brand-500/50 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-xl post-card">
										<!-- Image -->
										<a href="<?php the_permalink(); ?>" class="relative overflow-hidden block aspect-video w-full">
											<?php if (has_post_thumbnail()): ?>
												<?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105']); ?>
											<?php else: ?>
												<img src="<?php echo esc_url(get_category_post_image($post_id)); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="<?php the_title_attribute(); ?>" />
											<?php endif; ?>
											<?php if ($is_hot): ?>
												<div class="absolute top-3 left-3 px-2 py-1 bg-red-600 text-white text-[10px] font-bold rounded flex items-center gap-1 shadow-lg">
													<svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" class="fill-white">
														<path d="M8.5 14.5L10 12L11.5 14.5L13 11L14.5 14.5L16 11L17.5 14.5L19 11L20.5 14.5M12 2C9.24 2 7 4.24 7 7C7 9 8 10.5 10 12L12 14L14 12C16 10.5 17 9 17 7C17 4.24 14.76 2 12 2Z" />
													</svg> HOT
												</div>
											<?php endif; ?>
										</a>

										<!-- Content -->
										<div class="p-6 flex flex-col flex-1">
											<div class="flex items-center gap-2 mb-3">
												<span class="text-[10px] font-bold uppercase text-brand-500 tracking-wide bg-brand-500/10 px-2 py-0.5 rounded border border-brand-500/20">
													<?php echo esc_html($archive_title); ?>
												</span>
												<span class="text-[10px] text-zinc-500 font-mono flex items-center gap-1">
													<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
														<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
														<line x1="16" y1="2" x2="16" y2="6"></line>
														<line x1="8" y1="2" x2="8" y2="6"></line>
														<line x1="3" y1="10" x2="21" y2="10"></line>
													</svg>
													<?php echo get_the_date('d/m/Y'); ?>
												</span>
											</div>

											<a href="<?php the_permalink(); ?>">
												<h3 class="text-xl font-bold text-white mb-3 group-hover:text-brand-400 transition-colors line-clamp-2">
													<?php the_title(); ?>
												</h3>
											</a>

											<p class="text-zinc-400 text-sm leading-relaxed mb-6 line-clamp-3 flex-1">
												<?php echo esc_html(wp_trim_words(get_the_excerpt() ?: get_the_content(), 25)); ?>
											</p>

											<div class="flex items-center justify-between pt-4 border-t border-zinc-800/50 mt-auto">
												<div class="flex items-center gap-2">
													<div class="w-6 h-6 rounded-full bg-zinc-800 flex items-center justify-center text-zinc-400 border border-zinc-700">
														<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
															<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
															<circle cx="12" cy="7" r="4"></circle>
														</svg>
													</div>
													<span class="text-xs font-bold text-zinc-300"><?php the_author(); ?></span>
												</div>
												<div class="flex items-center gap-4 text-xs text-zinc-500">
													<span class="flex items-center gap-1">
														<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
															<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
															<circle cx="12" cy="12" r="3"></circle>
														</svg>
														<?php echo $views > 1000 ? number_format($views / 1000, 1) . 'k' : $views; ?>
													</span>
													<span class="flex items-center gap-1">
														<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
															<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
														</svg>
														<?php echo get_comments_number(); ?>
													</span>
												</div>
											</div>
										</div>
									</div>
								<?php
								endwhile;
								wp_reset_postdata();
							else:
								?>
								<div class="col-span-2 text-center py-16">
									<p class="text-zinc-500 text-lg">Không tìm thấy bài viết nào.</p>
								</div>
							<?php endif; ?>
						</div>

						<!-- Pagination with WP-PageNavi -->
						<?php if ($archive_query->max_num_pages > 1): ?>
							<div class="mt-16 wp-pagenavi-wrapper">
								<?php
								if (function_exists('wp_pagenavi')) {
									wp_pagenavi(array('query' => $archive_query));
								}
								?>
							</div>
						<?php endif; ?>
					</div>

					<!-- RIGHT SIDEBAR (4 cols) -->
					<aside class="lg:col-span-4 space-y-8">

						<!-- Search -->
						<div class="bg-zinc-900 p-1 rounded-xl border border-zinc-800 flex items-center">
							<input type="text" placeholder="Tìm kiếm trong mục này..." class="bg-transparent border-none text-white text-sm px-4 py-3 w-full focus:outline-none placeholder-zinc-600" />
							<button class="p-2 bg-zinc-800 rounded-lg text-zinc-400 hover:text-white">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
									<circle cx="11" cy="11" r="8"></circle>
									<path d="m21 21-4.35-4.35"></path>
								</svg>
							</button>
						</div>

						<!-- Top Viewed in Category -->
						<div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
							<h4 class="text-white font-bold mb-6 flex items-center gap-2 border-b border-zinc-800 pb-3">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
									<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
									<polyline points="17 6 23 6 23 12"></polyline>
								</svg> Xem nhiều nhất
							</h4>
							<div class="space-y-5">
								<?php foreach ($trending_posts as $idx => $trend):
									$trend_views = get_post_meta($trend->ID, 'post_views_count', true);
									if (!$trend_views) $trend_views = rand(5000, 20000);
									$trend_views_display = $trend_views > 1000 ? number_format($trend_views / 1000, 1) . 'k' : $trend_views;
								?>
									<a href="<?php echo get_permalink($trend->ID); ?>" class="group cursor-pointer flex gap-4 items-start">
										<span class="text-2xl font-black font-mono leading-none mt-1 <?php echo $idx === 0 ? 'text-brand-500' : 'text-zinc-700 group-hover:text-zinc-500'; ?>">
											0<?php echo $idx + 1; ?>
										</span>
										<div>
											<h5 class="text-zinc-200 font-bold text-sm leading-snug group-hover:text-brand-400 transition-colors line-clamp-2 mb-1">
												<?php echo esc_html($trend->post_title); ?>
											</h5>
											<span class="text-[10px] text-zinc-500 font-mono"><?php echo $trend_views_display; ?> views</span>
										</div>
									</a>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Related Tags -->
						<div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
							<h4 class="text-white font-bold mb-4 flex items-center gap-2">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
									<line x1="4" y1="9" x2="20" y2="9"></line>
									<line x1="4" y1="15" x2="20" y2="15"></line>
									<line x1="10" y1="3" x2="8" y2="21"></line>
									<line x1="16" y1="3" x2="14" y2="21"></line>
								</svg> Chủ đề liên quan
							</h4>
							<div class="flex flex-wrap gap-2">
								<?php
								$tags = get_tags(['number' => 6, 'orderby' => 'count', 'order' => 'DESC']);
								foreach ($tags as $tag):
								?>
									<a href="<?php echo get_tag_link($tag->term_id); ?>" class="px-3 py-1.5 bg-zinc-950 border border-zinc-800 rounded-lg text-xs text-zinc-400 hover:border-brand-500 hover:text-brand-500 cursor-pointer transition-colors">
										#<?php echo esc_html($tag->name); ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>

						<!-- Ad / Promo -->
						<div class="relative rounded-2xl overflow-hidden aspect-[4/5] group cursor-pointer border border-zinc-800">
							<img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000&auto=format&fit=crop" alt="Promo" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
							<div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
							<div class="absolute bottom-6 left-6 right-6">
								<span class="bg-brand-500 text-black text-[10px] font-bold px-2 py-0.5 rounded mb-2 inline-block">WEBINAR</span>
								<h4 class="text-white font-bold text-lg mb-2">Hội thảo: Tương lai của <?php echo esc_html($archive_title); ?></h4>
								<button class="flex items-center gap-2 text-brand-500 text-xs font-bold hover:underline">
									Đăng ký ngay
									<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<line x1="7" y1="17" x2="17" y2="7"></line>
										<polyline points="7 7 17 7 17 17"></polyline>
									</svg>
								</button>
							</div>
						</div>

					</aside>

				</div>
			</div>

			<!-- View Mode Toggle Script -->
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					const gridView = document.getElementById('grid-view');
					const listView = document.getElementById('list-view');
					const postsGrid = document.getElementById('posts-grid');
					const postCards = document.querySelectorAll('.post-card');

					if (!gridView || !listView) return;

					gridView.addEventListener('click', function() {
						postsGrid.className = 'grid gap-8 grid-cols-1 md:grid-cols-2';
						gridView.className = 'p-2 rounded transition-colors bg-zinc-800 text-white';
						listView.className = 'p-2 rounded transition-colors text-zinc-500 hover:text-white';

						postCards.forEach(card => {
							card.className = 'group bg-zinc-900/50 border border-zinc-800 hover:border-brand-500/50 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-xl post-card';
							const img = card.querySelector('a');
							if (img) img.className = 'relative overflow-hidden block aspect-video w-full';
						});
					});

					listView.addEventListener('click', function() {
						postsGrid.className = 'grid gap-8 grid-cols-1';
						listView.className = 'p-2 rounded transition-colors bg-zinc-800 text-white';
						gridView.className = 'p-2 rounded transition-colors text-zinc-500 hover:text-white';

						postCards.forEach(card => {
							card.className = 'group bg-zinc-900/50 border border-zinc-800 hover:border-brand-500/50 rounded-2xl overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-xl post-card flex flex-col md:flex-row';
							const img = card.querySelector('a');
							if (img) img.className = 'relative overflow-hidden block w-full md:w-1/3 aspect-video md:aspect-auto';
						});
					});
				});
			</script>
		</div>

<?php
	}
}
