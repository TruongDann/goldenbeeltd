<?php

namespace App\components;

use App\Base\Base;
use App\Base\ThemeComponentInterface;
use Reading_Time_WP;
use WP_Query;

class Single implements ThemeComponentInterface
{

	public static function render()
	{
		$args_related = [
			'category__in'   => wp_get_post_categories(get_the_ID()),
			'posts_per_page' => 3,
			'post__not_in'   => [get_the_ID()]
		];

		$list_posts_related = new WP_Query($args_related);
		$categories = get_the_category();
		$author_id = get_the_author_meta('ID');

		// Get reading time from Reading Time WP plugin
		if (class_exists('Reading_Time_WP')) {
			$rt_plugin = new Reading_Time_WP();
			$rt_options = get_option('rt_reading_time_options');
			$reading_time = $rt_plugin->rt_calculate_reading_time(get_the_ID(), $rt_options);
		}

		// Get post views from Post Views Counter plugin
		$post_views = function_exists('pvc_get_post_views') ? pvc_get_post_views(get_the_ID()) : 0;
?>

		<!-- Reading Progress Bar -->
		<div id="reading-progress" class="fixed top-20 left-0 h-1 bg-zinc-800 w-full z-50">
			<div class="h-full bg-brand-500 shadow-[0_0_10px_#EAB308] transition-all duration-150" style="width: 0%;"></div>
		</div>

		<!-- Floating Back Button (Mobile) -->
		<button onclick="window.history.back()" class="fixed bottom-6 left-6 z-40 md:hidden w-12 h-12 bg-zinc-900 border border-zinc-700 text-white rounded-full flex items-center justify-center shadow-2xl hover:bg-zinc-800 hover:border-brand-500 transition-all">
			<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
				<path d="M19 12H5M12 19l-7-7 7-7" />
			</svg>
		</button>

		<div class="pt-20 min-h-screen bg-black relative">
			<div class="container relative z-10 pb-20 pt-8">

				<!-- Breadcrumb & Navigation -->
				<div class="flex items-center gap-2 text-zinc-500 text-xs md:text-sm mb-6 font-mono">
					<span onclick="window.history.back()" class="hover:text-brand-500 cursor-pointer flex items-center gap-1 transition-colors">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M19 12H5M12 19l-7-7 7-7" />
						</svg>
						Quay lại
					</span>
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>

				<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

					<!-- MAIN CONTENT -->
					<article class="lg:col-span-8">

						<!-- Article Header -->
						<header class="mb-10">
							<div class="flex items-center gap-3 mb-4">
								<?php if (!empty($categories)): ?>
									<span class="px-3 py-1 bg-brand-500/10 border border-brand-500/20 text-brand-500 text-xs font-bold uppercase tracking-wider rounded-full">
										<?php echo esc_html($categories[0]->name); ?>
									</span>
								<?php endif; ?>
								<span class="text-zinc-500 text-xs font-mono"><?php echo $reading_time; ?> phút đọc</span>
							</div>

							<h1 class="text-3xl md:text-5xl font-bold text-white leading-[1.15] mb-6">
								<?php the_title(); ?>
							</h1>

							<div class="text-xl text-zinc-400 leading-relaxed mb-8 border-l-4 border-brand-500 pl-6">
								<?php
								// Remove Reading Time WP filter temporarily
								if (class_exists('Reading_Time_WP')) {
									global $rt_reading_time_wp;
									if ($rt_reading_time_wp) {
										remove_filter('get_the_excerpt', array($rt_reading_time_wp, 'rt_add_reading_time_before_excerpt'), 1000);
									}
								}

								$excerpt = get_the_excerpt();
								echo $excerpt ?? esc_html($excerpt);
								?>
							</div> <!-- Author Meta -->
							<div class="flex items-center justify-between py-6 border-y border-zinc-800">
								<div class="flex items-center gap-4">
									<?php echo get_avatar($author_id, 48, '', '', ['class' => 'w-12 h-12 rounded-full border-2 border-zinc-800']); ?>
									<div>
										<h4 class="text-white font-bold text-sm"><?php the_author(); ?></h4>
										<p class="text-zinc-500 text-xs"><?php echo get_the_author_meta('description') ?: 'Tác giả'; ?></p>
									</div>
								</div>
								<div class="text-right">
									<div class="text-zinc-400 text-xs font-mono mb-1">Đăng ngày</div>
									<div class="text-white font-bold text-sm"><?php echo get_the_date('d/m/Y'); ?></div>
								</div>
							</div>
						</header>

						<!-- Featured Image -->
						<?php if (has_post_thumbnail()): ?>
							<div class="rounded-2xl overflow-hidden mb-12 relative group border border-zinc-800 shadow-[0_0_20px_rgba(234,179,8,0.1)]">
								<?php the_post_thumbnail('full', ['class' => 'w-full aspect-video object-cover']); ?>
								<?php
								$caption = get_the_post_thumbnail_caption();
								if ($caption):
								?>
									<div class="absolute bottom-0 left-0 right-0 bg-black/60 backdrop-blur-sm p-3 text-center text-xs text-zinc-400 italic">
										<?php echo esc_html($caption); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<!-- Article Content -->
						<div class="prose prose-invert prose-lg max-w-none text-zinc-300">
							<?php the_content(); ?>
						</div>

						<!-- Tags -->
						<?php
						$tags = get_the_tags();
						if ($tags):
						?>
							<div class="mt-12 flex flex-wrap gap-2">
								<?php foreach ($tags as $tag): ?>
									<a href="<?php echo get_tag_link($tag->term_id); ?>" class="px-3 py-1 bg-zinc-900 border border-zinc-800 rounded-lg text-sm text-zinc-400 hover:text-brand-500 hover:border-brand-500 cursor-pointer transition-colors">
										#<?php echo esc_html($tag->name); ?>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<!-- Reaction / Interaction Bar -->
						<div class="mt-12 p-6 border-t border-zinc-800 flex flex-col md:flex-row gap-4 md:gap-0 items-start md:items-center justify-between">
							<div class="flex gap-4">
								<?php
								// Get like data from WP ULike plugin
								$like_count = goldenbee_get_like_count();
								$is_liked = goldenbee_is_post_liked();
								$like_attrs = goldenbee_get_like_button_attrs();
								?>
								<button
									id="like-button"
									class="flex items-center gap-2 text-zinc-400 hover:text-brand-500 transition-all group <?php echo $is_liked ? 'is-liked text-brand-500' : ''; ?>"
									<?php foreach ($like_attrs as $key => $value): ?>
									<?php echo esc_attr($key); ?>="<?php echo esc_attr($value); ?>"
									<?php endforeach; ?>>
									<svg id="like-icon" width="20" height="20" viewBox="0 0 24 24" fill="<?php echo $is_liked ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="2" class="group-hover:scale-110 transition-transform">
										<path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
									</svg>
									<span id="like-count" class="font-bold"><?php echo $like_count; ?></span>
								</button>
								<div class="flex items-center gap-2 text-zinc-400">
									<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
										<circle cx="12" cy="12" r="3" />
									</svg>
									<span class="font-bold"><?php echo $post_views ? ($post_views > 1000 ? number_format($post_views / 1000, 1) . 'k' : $post_views) : 0; ?></span>
								</div>
							</div>
							<div class="flex gap-3">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-zinc-900 flex items-center justify-center text-zinc-400 hover:bg-[#1877F2] hover:text-white transition-all hover:scale-110" title="Chia sẻ Facebook">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
										<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
									</svg>
								</a>
								<a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-zinc-900 flex items-center justify-center text-zinc-400 hover:bg-[#1DA1F2] hover:text-white transition-all hover:scale-110" title="Chia sẻ Twitter">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
										<path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
									</svg>
								</a>
								<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-zinc-900 flex items-center justify-center text-zinc-400 hover:bg-[#0A66C2] hover:text-white transition-all hover:scale-110" title="Chia sẻ LinkedIn">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
										<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z" />
										<circle cx="4" cy="4" r="2" />
									</svg>
								</a>
								<button onclick="copyLink()" class="w-9 h-9 rounded-full bg-zinc-900 flex items-center justify-center text-zinc-400 hover:bg-brand-500 hover:text-white transition-all hover:scale-110" title="Copy link">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
										<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
										<path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
									</svg>
								</button>
							</div>
						</div>
					</article>

					<!-- SIDEBAR -->
					<aside class="lg:col-span-4 space-y-8">

						<!-- Table of Contents (Sticky) -->
						<div class="sticky top-24">
							<div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 mb-8">
								<div class="flex items-center justify-between mb-4">
									<h4 class="text-white font-bold flex items-center gap-2">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-500">
											<circle cx="12" cy="12" r="1" />
											<circle cx="19" cy="12" r="1" />
											<circle cx="5" cy="12" r="1" />
										</svg>
										Mục lục
									</h4>
									<button id="toc-toggle" class="text-zinc-500 hover:text-brand-500 transition-transform duration-200" title="Thu gọn/Mở rộng">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
											<path d="M19 9l-7 7-7-7" />
										</svg>
									</button>
								</div>
								<ul class="space-y-3 text-sm transition-all duration-300 overflow-hidden" id="article-toc" style="max-height: 500px;">
									<!-- Auto-generated by JavaScript -->
								</ul>
							</div>

							<!-- Related Posts -->
							<?php if ($list_posts_related->have_posts()): ?>
								<div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6">
									<h4 class="text-white font-bold mb-6">Bài viết liên quan</h4>
									<div class="space-y-5">
										<?php while ($list_posts_related->have_posts()): $list_posts_related->the_post();
											$rel_categories = get_the_category();
										?>
											<div class="group cursor-pointer">
												<?php if (!empty($rel_categories)): ?>
													<div class="text-[10px] text-brand-500 font-bold uppercase mb-1"><?php echo esc_html($rel_categories[0]->name); ?></div>
												<?php endif; ?>
												<h5 class="text-white font-bold text-sm leading-snug group-hover:text-brand-400 transition-colors mb-2">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h5>
												<div class="flex items-center gap-2 text-xs text-zinc-500">
													<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
														<rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
														<path d="M16 2v4M8 2v4M3 10h18" />
													</svg>
													<?php echo get_the_date('d/m/Y'); ?>
												</div>
											</div>
										<?php endwhile;
										wp_reset_postdata(); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>

					</aside>
				</div>
			</div>
		</div>

		<script>
			// Reading Progress Bar
			window.addEventListener('scroll', function() {
				const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
				const progress = (window.scrollY / totalHeight) * 100;
				const progressBar = document.querySelector('#reading-progress > div');
				if (progressBar) {
					progressBar.style.width = progress + '%';
				}
			});

			// TOC Toggle Collapse/Expand
			document.addEventListener('DOMContentLoaded', function() {
				const tocToggle = document.getElementById('toc-toggle');
				const tocList = document.getElementById('article-toc');
				const tocHeader = tocToggle?.parentElement;

				if (tocToggle && tocList && tocHeader) {
					let isExpanded = true;

					tocToggle.addEventListener('click', function() {
						isExpanded = !isExpanded;

						if (isExpanded) {
							tocList.style.maxHeight = '500px';
							tocToggle.style.transform = 'rotate(0deg)';
							tocHeader.classList.add('mb-4');
						} else {
							tocList.style.maxHeight = '0';
							tocToggle.style.transform = 'rotate(-90deg)';
							tocHeader.classList.remove('mb-4');
						}
					});
				}
			});

			// Auto-generate Table of Contents
			document.addEventListener('DOMContentLoaded', function() {
				const content = document.querySelector('.prose');
				const tocList = document.getElementById('article-toc');
				if (content && tocList) {
					const headings = content.querySelectorAll('h2, h3');
					headings.forEach((heading, index) => {
						heading.id = 'heading-' + index;
						const li = document.createElement('li');
						const a = document.createElement('a');
						a.href = '#heading-' + index;
						a.textContent = heading.textContent;
						a.className = heading.tagName === 'H2' ?
							'text-brand-500 font-medium pl-2 border-l-2 border-brand-500 block' :
							'text-zinc-400 hover:text-white pl-2 border-l-2 border-transparent hover:border-zinc-600 block transition-colors';
						li.appendChild(a);
						tocList.appendChild(li);

						a.addEventListener('click', function(e) {
							e.preventDefault();
							heading.scrollIntoView({
								behavior: 'smooth',
								block: 'start'
							});
						});
					});
				}

				// Initialize WP ULike for custom button
				initCustomLikeButton();
			});

			// Custom Like functionality using WP ULike AJAX
			function initCustomLikeButton() {
				const likeButton = document.getElementById('like-button');
				if (!likeButton) return;

				likeButton.addEventListener('click', function(e) {
					e.preventDefault();

					const button = this;
					const icon = document.getElementById('like-icon');
					const countEl = document.getElementById('like-count');

					// Get data attributes
					const postId = button.getAttribute('data-ulike-id');
					const nonce = button.getAttribute('data-ulike-nonce');
					const status = button.getAttribute('data-ulike-status');

					// Prevent double clicks
					if (button.classList.contains('processing')) return;
					button.classList.add('processing');

					// Prepare AJAX data
					const formData = new FormData();
					formData.append('action', 'wp_ulike_process');
					formData.append('id', postId);
					formData.append('nonce', nonce);
					formData.append('type', 'post');
					formData.append('status', status);

					// Send AJAX request to WP ULike
					fetch(wp_ulike_params.ajax_url, {
							method: 'POST',
							body: formData
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								// Update UI
								const newStatus = data.data.status;
								const newCount = data.data.data;

								if (newStatus === '3' || newStatus === 3) {
									// Liked
									icon.setAttribute('fill', 'currentColor');
									button.classList.remove('text-zinc-400');
									button.classList.add('text-brand-500', 'is-liked');
									button.setAttribute('data-ulike-status', 'liked');

									// Animation
									icon.style.transform = 'scale(1.3)';
									setTimeout(() => icon.style.transform = 'scale(1)', 200);
								} else {
									// Unliked
									icon.setAttribute('fill', 'none');
									button.classList.remove('text-brand-500', 'is-liked');
									button.classList.add('text-zinc-400');
									button.setAttribute('data-ulike-status', 'unliked');
								}

								// Update count
								if (newCount || newCount === 0) {
									countEl.textContent = newCount;
								}
							}

							button.classList.remove('processing');
						})
						.catch(error => {
							console.error('Like error:', error);
							button.classList.remove('processing');
						});
				});
			}

			function shareArticle() {
				if (navigator.share) {
					navigator.share({
						title: document.title,
						url: window.location.href
					});
				}
			}

			function copyLink() {
				navigator.clipboard.writeText(window.location.href).then(() => {
					// Show toast notification
					const toast = document.createElement('div');
					toast.textContent = '✓ Đã sao chép link!';
					toast.className = 'fixed bottom-6 right-6 bg-brand-500 text-black px-6 py-3 rounded-lg font-bold shadow-lg z-50 animate-fade-in';
					document.body.appendChild(toast);

					setTimeout(() => {
						toast.style.opacity = '0';
						toast.style.transition = 'opacity 0.3s';
						setTimeout(() => toast.remove(), 300);
					}, 2000);
				});
			}
		</script>

		<style>
			@keyframes fade-in {
				from {
					opacity: 0;
					transform: translateY(10px);
				}

				to {
					opacity: 1;
					transform: translateY(0);
				}
			}

			.animate-fade-in {
				animation: fade-in 0.3s ease-out;
			}
		</style><?php
			}
		}
