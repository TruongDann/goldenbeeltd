<?php

namespace App\Components;

use App\Base\ThemeComponentInterface;

class Hero implements ThemeComponentInterface
{
    public static function render()
    {
?>
        <section class="relative min-h-screen flex flex-col justify-center overflow-hidden pt-20">
            <svg class="animate-spotlight pointer-events-none absolute z-[1] h-[160%] w-[138%] lg:w-[164%] opacity-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3787 2842" fill="none">
                <g filter="url(#filter)">
                    <ellipse cx="1924.71" cy="273.501" rx="1924.71" ry="273.501" transform="matrix(-0.822377 -0.568943 -0.568943 0.822377 3631.88 2291.09)" fill="white" fill-opacity="0.21"></ellipse>
                </g>
                <defs>
                    <filter id="filter" x="0.860352" y="0.838989" width="3785.16" height="2840.26" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                        <feGaussianBlur stdDeviation="151" result="effect1_foregroundBlur_1065_8"></feGaussianBlur>
                    </filter>
                </defs>
            </svg>

            <div class="container z-10 py-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-zinc-800 bg-zinc-900/50 backdrop-blur-sm mb-8" data-aos="fade-down">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                    </span>
                    <span class="text-zinc-300 text-xs md:text-sm font-mono tracking-wide">CÓ SẴN CHO CÁC DỰ ÁN MỚI</span>
                </div>

                <h1 class="drop-shadow-glowWhite text-5xl leading-none md:text-7xl lg:text-8xl font-bold tracking-tighter text-white mb-4" data-aos="fade-up" data-aos-delay="150">
                    XÂY DỰNG <br />
                </h1>
                <span class="mb-8 text-transparent tracking-wide text-5xl bg-clip-text bg-gradient-to-r from-brand-400 to-amber-600 md:text-7xl lg:text-8xl font-bold leading-none" data-aos="fade-up" data-aos-delay="100">
                    TƯƠNG LAI SỐ
                </span>

                <p class="text-zinc-300 text-lg md:text-xl max-w-2xl leading-relaxed mb-10 font-thin" data-aos="fade-up" data-aos-delay="200">
                    Biến ý tưởng thành hiện thực với công nghệ Web, Mobile App và AI tiên tiến nhất.
                    Không chỉ là Code, chúng tôi kiến tạo và trải nghiệm mang đến số độc bản cho doanh nghiệp của bạn.
                </p>

                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="#contact" class="group px-8 py-4 bg-brand-500 hover:bg-brand-400 text-black font-bold text-lg rounded-full transition-all flex items-center justify-center gap-2">
                        Bắt đầu dự án
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    <a href="#services" class="px-8 py-4 border border-zinc-700 hover:border-zinc-500 text-white rounded-full transition-all flex items-center justify-center hover:bg-zinc-900">
                        Xem dịch vụ
                    </a>
                </div>
            </div>

            <!-- Global -->
            <div class="absolute z-0 lg:z-20 top-2 md:top-24 md:right-0 right-[calc(var(--spacing)*-29)] block">
                <canvas id="globeCanvas" width="700" height="600"></canvas>
            </div>

            <!-- Scroll indicator -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50" data-aos="fade-up" data-aos-delay="1000">
                <span class="text-xs font-mono uppercase tracking-widest text-zinc-500">Scroll</span>
                <div class="w-[1px] h-12 bg-gradient-to-b from-brand-500 to-transparent"></div>
            </div>
        </section>

        <style>
            .animate-spotlight {
                animation: spotlight 2s ease .75s 1 forwards
            }

            .drop-shadow-glowWhite {
                --tw-drop-shadow: drop-shadow(0 0px 20px hsla(0, 0%, 100%, .85)) drop-shadow(0 0px 65px hsla(0, 0%, 100%, .2));
            }

            .drop-shadow-glowWhite {
                filter: var(--tw-drop-shadow)
            }

            @keyframes spotlight {
                0% {
                    opacity: 0;
                    transform: translate(-72%, -62%) scale(.5);
                }

                100% {
                    opacity: 1;
                    transform: translate(-50%, -40%) scale(1);
                }
            }

            #globeCanvas {
                display: block;
                margin: 0 auto;
                cursor: grab;
                max-width: 100%;
                height: auto;
            }

            @media (max-width: 768px) {
                #globeCanvas {
                    width: 90vw;
                    height: auto;
                    left: 25%;
                }
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('globeCanvas');
                const ctx = canvas.getContext('2d');

                // Tự động điều chỉnh kích thước canvas theo màn hình
                function resizeCanvas() {
                    const isMobile = window.innerWidth <= 768;
                    const size = isMobile ? Math.min(window.innerWidth * 0.9, 500) : 700;

                    canvas.width = size;
                    canvas.height = size;

                    // Tính toán radius dựa trên kích thước canvas
                    radius = (size / 2) - 50;

                    // Vẽ lại quả cầu sau khi resize
                    if (mapPoints.length > 0) {
                        needsRedraw = true;
                    }
                }

                // Các thông số
                const radius = 270;
                const dotSize = 1.5;

                // URL JSON chứa các điểm
                const jsonUrl = 'https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard-pro/assets/js/points.json';

                // Mảng chứa các điểm (sẽ được tải từ JSON)
                let mapPoints = [];

                // Vị trí xoay ban đầu (góc 45 độ từ trên nhìn xuống)
                let rotation = {
                    x: -Math.PI / 4, // -45 độ (nghiêng từ trên xuống)
                    y: 0
                };

                // Biến cho việc kéo thả
                let isDragging = false;
                let previousMousePosition = {
                    x: 0,
                    y: 0
                };

                // Biến cho animation mượt mà
                let targetRotation = {
                    x: -Math.PI / -8,
                    y: 0
                };
                let currentRotation = {
                    x: -Math.PI / -8,
                    y: 0
                };
                let needsRedraw = true;

                // Chuyển đổi từ tọa độ địa lý sang tọa độ 3D
                function geoTo3d(lat, lon) {
                    // Chuyển đổi từ degrees sang radians
                    const phi = (90 - lat) * (Math.PI / 180);
                    const theta = (lon + 180) * (Math.PI / 180);

                    // Chuyển đổi từ tọa độ cầu sang tọa độ Descartes
                    let x = -radius * Math.sin(phi) * Math.cos(theta);
                    let y = radius * Math.cos(phi);
                    let z = radius * Math.sin(phi) * Math.sin(theta);

                    return {
                        x,
                        y,
                        z
                    };
                }

                function rotatePoint(point) {
                    const cosY = Math.cos(currentRotation.y);
                    const sinY = Math.sin(currentRotation.y);
                    const x1 = point.x * cosY - point.z * sinY;
                    const z1 = point.z * cosY + point.x * sinY;

                    const cosX = Math.cos(currentRotation.x);
                    const sinX = Math.sin(currentRotation.x);
                    const y2 = point.y * cosX - z1 * sinX;
                    const z2 = z1 * cosX + point.y * sinX;

                    return {
                        x: x1,
                        y: y2,
                        z: z2
                    };
                }

                function drawDot(x, y, size, alpha) {
                    ctx.beginPath();
                    ctx.arc(x, y, size, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(255, 255, 255, ${alpha})`;
                    ctx.fill();
                }

                async function loadPointsData() {
                    try {
                        const response = await fetch(jsonUrl);
                        const data = await response.json();
                        mapPoints = data.points;

                        prepareMapPoints();
                        drawGlobe();
                        animate();
                    } catch (error) {
                        console.error('Lỗi khi tải dữ liệu JSON:', error);
                    }
                }

                function prepareMapPoints() {
                    // Tìm giá trị min/max để chuẩn hóa
                    let minX = Infinity,
                        maxX = -Infinity;
                    let minY = Infinity,
                        maxY = -Infinity;

                    for (const point of mapPoints) {
                        minX = Math.min(minX, point.x);
                        maxX = Math.max(maxX, point.x);
                        minY = Math.min(minY, point.y);
                        maxY = Math.max(maxY, point.y);
                    }

                    // Chuyển đổi tọa độ phẳng thành vĩ độ/kinh độ
                    for (const point of mapPoints) {
                        // Chuẩn hóa tọa độ x thành kinh độ (-180 đến 180)
                        // Json của points.json có vẻ như là bản đồ phẳng với x tăng từ trái sang phải
                        point.lon = ((point.x - minX) / (maxX - minX)) * 360 - 180;

                        // Chuẩn hóa tọa độ y thành vĩ độ (-90 đến 90)
                        // Đảo dấu để sửa lỗi bản đồ bị ngược
                        point.lat = -90 + ((point.y - minY) / (maxY - minY)) * 180;
                    }
                }

                // Vẽ quả địa cầu
                function drawGlobe() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    const points = [];

                    for (const point of mapPoints) {
                        const point3d = geoTo3d(point.lat, point.lon);
                        const rotatedPoint = rotatePoint(point3d);

                        const isBack = rotatedPoint.z > 0;
                        const baseAlpha = isBack ? 0.15 : 0.6;
                        const depthAlpha = Math.abs(rotatedPoint.z) / (radius * 0.8);

                        points.push({
                            x: rotatedPoint.x + canvas.width / 2,
                            y: rotatedPoint.y + canvas.height / 2,
                            z: rotatedPoint.z,
                            size: dotSize,
                            alpha: Math.min(0.9, baseAlpha + depthAlpha * 0.3)
                        });
                    }

                    // Sắp xếp các điểm theo độ sâu z để vẽ từ sau ra trước
                    points.sort((a, b) => a.z - b.z);

                    // Vẽ các điểm
                    for (const point of points) {
                        drawDot(point.x, point.y, point.size, point.alpha);
                    }

                    // Vẽ đường viền mờ cho quả cầu (tùy chọn)
                    ctx.beginPath();
                    ctx.arc(canvas.width / 2, canvas.height / 2, radius, 0, Math.PI * 2);
                    // ctx.strokeStyle = "rgba(34, 197, 94, 0.15)"; // Màu xanh lá cây nhạt
                }

                // Xử lý sự kiện chuột
                canvas.addEventListener('mousedown', function(event) {
                    isDragging = true;
                    previousMousePosition = {
                        x: event.clientX,
                        y: event.clientY
                    };
                });

                canvas.addEventListener('mousemove', function(event) {
                    if (isDragging) {
                        const deltaMove = {
                            x: event.clientX - previousMousePosition.x,
                            y: event.clientY - previousMousePosition.y
                        };

                        // Cập nhật góc xoay mục tiêu (tăng tốc độ lên 3 lần)
                        targetRotation.y += deltaMove.x * 0.015;
                        targetRotation.x += deltaMove.y * 0.015;

                        // Giới hạn góc xoay trục X
                        targetRotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, targetRotation.x));

                        previousMousePosition = {
                            x: event.clientX,
                            y: event.clientY
                        };

                        needsRedraw = true;
                    }
                });

                canvas.addEventListener('mouseup', function() {
                    isDragging = false;
                });

                canvas.addEventListener('mouseleave', function() {
                    isDragging = false;
                });

                canvas.addEventListener('touchstart', function(event) {
                    event.preventDefault();
                    isDragging = true;
                    previousMousePosition = {
                        x: event.touches[0].clientX,
                        y: event.touches[0].clientY
                    };
                });

                canvas.addEventListener('touchmove', function(event) {
                    event.preventDefault();
                    if (isDragging) {
                        const deltaMove = {
                            x: event.touches[0].clientX - previousMousePosition.x,
                            y: event.touches[0].clientY - previousMousePosition.y
                        };

                        targetRotation.y += deltaMove.x * 0.015;
                        targetRotation.x += deltaMove.y * 0.015;
                        targetRotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, targetRotation.x));

                        previousMousePosition = {
                            x: event.touches[0].clientX,
                            y: event.touches[0].clientY
                        };

                        needsRedraw = true;
                    }
                });

                canvas.addEventListener('touchend', function(event) {
                    event.preventDefault();
                    isDragging = false;
                });

                // Tạo hiệu ứng tự động xoay khi tải trang
                let autoRotate = true;
                const autoRotateSpeed = 0.01; // Tăng tốc độ tự động xoay

                function animate() {
                    // Cập nhật rotation hiện tại để tiến dần về target (smoothing)
                    const smoothing = 0.15; // Độ mượt mà
                    currentRotation.x += (targetRotation.x - currentRotation.x) * smoothing;
                    currentRotation.y += (targetRotation.y - currentRotation.y) * smoothing;

                    // Tự động xoay
                    if (autoRotate) {
                        targetRotation.y += autoRotateSpeed;
                        needsRedraw = true;
                    }

                    // Chỉ vẽ lại khi cần thiết
                    if (needsRedraw || autoRotate) {
                        drawGlobe();
                        needsRedraw = false;
                    }

                    requestAnimationFrame(animate);
                }

                // Dừng xoay tự động khi người dùng tương tác
                // canvas.addEventListener('mousedown', function() {
                //     autoRotate = false;
                // });

                // canvas.addEventListener('touchstart', function() {
                //     autoRotate = false;
                // });

                loadPointsData();
            });
        </script>
<?php
    }
}
?>