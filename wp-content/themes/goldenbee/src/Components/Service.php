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
        <section id="services" class="pb-24 pt-14 md:pt-0 relative">

            <div id="laser" class="hidden md:block"></div>
            <div id="controls" class="h-[153.6px] hidden md:block"></div>

            <div class="container z-40 relative">
                <div class="mb-16" data-aos="fade-right">
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
        <style>
            #laser {
                width: 100%;
                height: 107vh;
                position: absolute !important;
                z-index: 0;
                left: 0;
            }

            .presets {
                position: absolute;
            }

            .preset {
                width: 48px;
                height: 48px;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
        <script>
            class LaserFlow {
                constructor(container, options = {}) {
                    this.container = typeof container === 'string' ? document.querySelector(container) : container;
                    if (!this.container) throw new Error("LaserFlow: Container not found!");

                    this.isVisible = true; 

                    this.options = {
                        color: "#FFB86C",
                        wispDensity: 1.75,
                        flowSpeed: 0.12,
                        fogIntensity: 0.18,
                        horizontalSizing: 0.95,
                        mouseTiltStrength: 0.012,
                        ...options
                    };


                    this.fade = 0;
                    this.init();
                }

                hexToRGB(hex) {
                    let c = hex.replace('#', '');
                    if (c.length === 3) c = c.split('').map(x => x + x).join('');
                    const n = parseInt(c, 16);
                    return {
                        r: ((n >> 16) & 255) / 255,
                        g: ((n >> 8) & 255) / 255,
                        b: (n & 255) / 255
                    };
                }

                init() {
                    const renderer = new THREE.WebGLRenderer({
                        antialias: false,
                        alpha: true,
                        powerPreference: "high-performance",
                        stencil: false,
                        depth: false
                    });

                    renderer.setClearColor(0x000000, 0);

                    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.0));
                    renderer.setSize(this.container.clientWidth, this.container.clientHeight);
                    this.container.style.position = 'relative';
                    this.container.appendChild(renderer.domElement);
                    this.renderer = renderer;

                    this.isVisible = true;
                    this.observer = new IntersectionObserver(
                        ([entry]) => {
                            this.isVisible = entry.isIntersecting;
                        },
                        {
                            threshold: 0.05
                        }
                    );

                    this.observer.observe(this.container);

                    const scene = new THREE.Scene();
                    const camera = new THREE.OrthographicCamera(-1, 1, 1, -1, 0, 1);

                    const geo = new THREE.BufferGeometry();
                    geo.setAttribute('position', new THREE.BufferAttribute(new Float32Array([-1, -1, 0, 3, -1, 0, -1, 3, 0]), 3));

                    this.uniforms = {
                        iTime: {
                            value: 0
                        },
                        iResolution: {
                            value: new THREE.Vector3()
                        },
                        iMouse: {
                            value: new THREE.Vector4()
                        },
                        uWispDensity: {
                            value: this.options.wispDensity
                        },
                        uTiltScale: {
                            value: this.options.mouseTiltStrength
                        },
                        uFlowTime: {
                            value: 0
                        },
                        uFogTime: {
                            value: 0
                        },
                        uBeamXFrac: {
                            value: 0.1
                        },
                        uBeamYFrac: {
                            value: 0.0
                        },
                        uFlowSpeed: {
                            value: this.options.flowSpeed
                        },
                        uVLenFactor: {
                            value: 2.0
                        },
                        uHLenFactor: {
                            value: this.options.horizontalSizing
                        },
                        uFogIntensity: {
                            value: this.options.fogIntensity
                        },
                        uFogScale: {
                            value: 0.3
                        },
                        uWSpeed: {
                            value: 15.0
                        },
                        uWIntensity: {
                            value: 5.0
                        },
                        uFlowStrength: {
                            value: 0.25
                        },
                        uDecay: {
                            value: 1.1
                        },
                        uFalloffStart: {
                            value: 1.2
                        },
                        uFogFallSpeed: {
                            value: 0.6
                        },
                        uColor: {
                            value: new THREE.Vector3()
                        },
                        uFade: {
                            value: 0
                        }
                    };

                    const {
                        r,
                        g,
                        b
                    } = this.hexToRGB(this.options.color);
                    this.uniforms.uColor.value.set(r, g, b);

                    const mat = new THREE.RawShaderMaterial({
                        vertexShader: VERT,
                        fragmentShader: FRAG,
                        uniforms: this.uniforms,
                        transparent: true,
                        blending: THREE.NormalBlending
                    });

                    scene.add(new THREE.Mesh(geo, mat));

                    let resizeTimer;
                    const resize = () => {
                        clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(() => {
                            const w = this.container.clientWidth;
                            const h = this.container.clientHeight;
                            renderer.setSize(w, h);
                            this.uniforms.iResolution.value.set(w, h, 1);
                        }, 100);
                    };
                    window.addEventListener('resize', resize);
                    resize();

                    let mouseTimer;
                    const useMouseTilt = false;
                    this.container.addEventListener('pointermove', e => {
                        if (mouseTimer) return;
                        mouseTimer = setTimeout(() => mouseTimer = null, 16); // ~60fps

                        if (useMouseTilt) {
                            const rect = this.container.getBoundingClientRect();
                            this.uniforms.iMouse.value.set(
                                e.clientX - rect.left,
                                this.container.clientHeight - (e.clientY - rect.top),
                                0, 0
                            );
                        }
                    });

                    this.container.addEventListener('pointerleave', () => {
                        this.uniforms.iMouse.value.set(0, 0, 0, 0);
                    });

                    // Animation loop
                    const clock = new THREE.Clock();
                    const animate = () => {
                        requestAnimationFrame(animate);
                        if (!this.isVisible) {
                            clock.getDelta();
                            return;
                        }
                        const delta = clock.getDelta();
                        const elapsed = clock.getElapsedTime();

                        this.uniforms.iTime.value = elapsed;
                        this.uniforms.uFlowTime.value += delta;
                        this.uniforms.uFogTime.value += delta;

                        if (this.fade < 1) {
                            this.fade = Math.min(1, this.fade + delta * 1.5);
                            this.uniforms.uFade.value = this.fade;
                        }

                        renderer.render(scene, camera);
                    };
                    animate();
                }

                // Public API
                setColor(hex) {
                    const {
                        r,
                        g,
                        b
                    } = this.hexToRGB(hex);
                    this.uniforms.uColor.value.set(r, g, b);
                }
                setWispDensity(v) {
                    this.uniforms.uWispDensity.value = v;
                }
                setFlowSpeed(v) {
                    this.uniforms.uFlowSpeed.value = v;
                }
                setFogIntensity(v) {
                    this.uniforms.uFogIntensity.value = v;
                }
                setHorizontalSizing(v) {
                    this.uniforms.uHLenFactor.value = v;
                }
            }

            const VERT = `precision mediump float;
attribute vec3 position;
void main(){
  gl_Position = vec4(position, 1.0);
}
`;

            const FRAG = `
precision mediump float;
precision mediump int;

uniform float iTime;
uniform vec3 iResolution;
uniform vec4 iMouse;
uniform float uWispDensity;
uniform float uTiltScale;
uniform float uFlowTime;
uniform float uFogTime;
uniform float uBeamXFrac;
uniform float uBeamYFrac;
uniform float uFlowSpeed;
uniform float uVLenFactor;
uniform float uHLenFactor;
uniform float uFogIntensity;
uniform float uFogScale;
uniform float uWSpeed;
uniform float uWIntensity;
uniform float uFlowStrength;
uniform float uDecay;
uniform float uFalloffStart;
uniform float uFogFallSpeed;
uniform vec3 uColor;
uniform float uFade;

#define PI 3.14159265359
#define TWO_PI 6.28318530718
#define EPS 1e-6
#define EDGE_SOFT 0.015
#define DT_LOCAL 0.0038
#define TAP_RADIUS 3
#define R_H 150.0
#define R_V 150.0
#define FLARE_HEIGHT 16.0
#define FLARE_AMOUNT 8.0
#define FLARE_EXP 2.0
#define TOP_FADE_START 0.1
#define TOP_FADE_EXP 1.0
#define FLOW_PERIOD 0.5
#define FLOW_SHARPNESS 1.5

#define W_BASE_X 1.5
#define W_LAYER_GAP 0.25
#define W_LANES 5
#define W_SIDE_DECAY 0.5
#define W_HALF 0.01
#define W_AA 0.15
#define W_CELL 20.0
#define W_SEG_MIN 0.01
#define W_SEG_MAX 0.55
#define W_CURVE_AMOUNT 15.0
#define W_CURVE_RANGE 13.0
#define W_BOTTOM_EXP 10.0

#define FOG_CONTRAST 1.2
#define FOG_OCTAVES 1
#define FOG_BOTTOM_BIAS 0.8
#define FOG_BEAM_MIN 0.0
#define FOG_BEAM_MAX 0.75
#define FOG_MASK_GAMMA 0.5
#define FOG_EXPAND_SHAPE 12.2
#define FOG_EDGE_MIX 0.5

#define HFOG_EDGE_START 0.20
#define HFOG_EDGE_END 0.98
#define HFOG_EDGE_GAMMA 1.4
#define HFOG_Y_RADIUS 25.0
#define HFOG_Y_SOFT 60.0

#define EDGE_X0 0.22
#define EDGE_X1 0.995
#define EDGE_X_GAMMA 1.25
#define EDGE_LUMA_T0 0.0
#define EDGE_LUMA_T1 2.0
#define DITHER_STRENGTH 1.0

float g(float x){return x<=0.00031308?12.92*x:1.055*pow(x,1.0/2.4)-0.055;}
float bs(vec2 p,vec2 q,float powr){
    float d=distance(p,q),f=powr*uFalloffStart,r=(f*f)/(d*d+EPS);
    return powr*min(1.0,r);
}
float bsa(vec2 p,vec2 q,float powr,vec2 s){
    vec2 d=p-q; float dd=(d.x*d.x)/(s.x*s.x)+(d.y*d.y)/(s.y*s.y),f=powr*uFalloffStart,r=(f*f)/(dd+EPS);
    return powr*min(1.0,r);
}
float tri01(float x){float f=fract(x);return 1.0-abs(f*2.0-1.0);}
float tauWf(float t,float tmin,float tmax){float a=smoothstep(tmin,tmin+EDGE_SOFT,t),b=1.0-smoothstep(tmax-EDGE_SOFT,tmax,t);return max(0.0,a*b);} 
float h21(vec2 p){p=fract(p*vec2(123.34,456.21));p+=dot(p,p+34.123);return fract(p.x*p.y);}
float vnoise(vec2 p){
    vec2 i=floor(p),f=fract(p);
    float a=h21(i),b=h21(i+vec2(1,0)),c=h21(i+vec2(0,1)),d=h21(i+vec2(1,1));
    vec2 u=f*f*(3.0-2.0*f);
    return mix(mix(a,b,u.x),mix(c,d,u.x),u.y);
}
float fbm2(vec2 p){
    float v=0.0,amp=0.6; mat2 m=mat2(0.86,0.5,-0.5,0.86);
    for(int i=0;i<FOG_OCTAVES;++i){v+=amp*vnoise(p); p=m*p*2.03+17.1; amp*=0.52;}
    return v;
}
float rGate(float x,float l){float a=smoothstep(0.0,W_AA,x),b=1.0-smoothstep(l,l+W_AA,x);return max(0.0,a*b);}
float flareY(float y){float t=clamp(1.0-(clamp(y,0.0,FLARE_HEIGHT)/max(FLARE_HEIGHT,EPS)),0.0,1.0);return pow(t,FLARE_EXP);}

float vWisps(vec2 uv,float topF){
    float y=uv.y,yf=(y+uFlowTime*uWSpeed)/W_CELL;
    float dRaw=clamp(uWispDensity,0.0,2.0),d=dRaw<=0.0?1.0:dRaw;
    float lanesF=floor(float(W_LANES)*min(d,1.0)+0.5);
    int lanes=int(max(1.0,lanesF));
    float sp=min(d,1.0),ep=max(d-1.0,0.0);
    float fm=flareY(max(y,0.0)),rm=clamp(1.0-(y/max(W_CURVE_RANGE,EPS)),0.0,1.0),cm=fm*rm;
    float xS=1.0+(FLARE_AMOUNT*W_CURVE_AMOUNT*0.05)*cm;
    float sPix=clamp(y/R_V,0.0,1.0),bGain=pow(1.0-sPix,W_BOTTOM_EXP),sum=0.0;
    for(int s=0;s<2;++s){
        float sgn=s==0?-1.0:1.0;
        for(int i=0;i<W_LANES;++i){
            if(i>=lanes) break;
            float off=W_BASE_X+float(i)*W_LAYER_GAP,xc=sgn*(off*xS);
            float dx=abs(uv.x-xc),lat=1.0-smoothstep(W_HALF,W_HALF+W_AA,dx),amp=exp(-off*W_SIDE_DECAY);
            float seed=h21(vec2(off,sgn*17.0)),yf2=yf+seed*7.0,ci=floor(yf2),fy=fract(yf2);
            float seg=mix(W_SEG_MIN,W_SEG_MAX,h21(vec2(ci,off*2.3)));
            float spR=h21(vec2(ci,off+sgn*31.0)),seg1=rGate(fy,seg)*step(spR,sp);
            if(ep>0.0){float spR2=h21(vec2(ci*3.1+7.0,off*5.3+sgn*13.0)); float f2=fract(fy+0.5); seg1+=rGate(f2,seg*0.9)*step(spR2,ep);}
            sum+=amp*lat*seg1;
        }
    }
    float span=smoothstep(-3.0,0.0,y)*(1.0-smoothstep(R_V-6.0,R_V,y));
    return uWIntensity*sum*topF*bGain*span;
}

void main(){
    vec2 C=iResolution.xy*.5; float invW=1.0/max(C.x,1.0);
    float sc=512.0/iResolution.x*.4;
    vec2 uv=(gl_FragCoord.xy-C)*sc,off=vec2(uBeamXFrac*iResolution.x*sc,uBeamYFrac*iResolution.y*sc);
    vec2 uvc = uv - off;
    float a=0.0,b=0.0;
    float basePhase=1.5*PI+uDecay*.5; float tauMin=basePhase-uDecay; float tauMax=basePhase;
    float cx=clamp(uvc.x/(R_H*uHLenFactor),-1.0,1.0),tH=clamp(TWO_PI-acos(cx),tauMin,tauMax);
    for(int k=-TAP_RADIUS;k<=TAP_RADIUS;++k){
        float tu=tH+float(k)*DT_LOCAL,wt=tauWf(tu,tauMin,tauMax); if(wt<=0.0) continue;
        float spd=max(abs(sin(tu)),0.02),u=clamp((basePhase-tu)/max(uDecay,EPS),0.0,1.0),env=pow(1.0-abs(u*2.0-1.0),0.8);
        vec2 p=vec2((R_H*uHLenFactor)*cos(tu),0.0);
        a+=wt*bs(uvc,p,env*spd);
    }
    float yPix=uvc.y,cy=clamp(-yPix/(R_V*uVLenFactor),-1.0,1.0),tV=clamp(TWO_PI-acos(cy),tauMin,tauMax);
    for(int k=-TAP_RADIUS;k<=TAP_RADIUS;++k){
        float tu=tV+float(k)*DT_LOCAL,wt=tauWf(tu,tauMin,tauMax); if(wt<=0.0) continue;
        float yb=(-R_V)*cos(tu),s=clamp(yb/R_V,0.0,1.0),spd=max(abs(sin(tu)),0.02);
        float env=pow(1.0-s,0.6)*spd;
        float cap=1.0-smoothstep(TOP_FADE_START,1.0,s); cap=pow(cap,TOP_FADE_EXP); env*=cap;
        float ph=s/max(FLOW_PERIOD,EPS)+uFlowTime*uFlowSpeed;
        float fl=pow(tri01(ph),FLOW_SHARPNESS);
        env*=mix(1.0-uFlowStrength,1.0,fl);
        float yp=(-R_V*uVLenFactor)*cos(tu),m=pow(smoothstep(FLARE_HEIGHT,0.0,yp),FLARE_EXP),wx=1.0+FLARE_AMOUNT*m;
        vec2 sig=vec2(wx,1.0),p=vec2(0.0,yp);
        float mask=step(0.0,yp);
        b+=wt*bsa(uvc,p,mask*env,sig);
    }
    float sPix=clamp(yPix/R_V,0.0,1.0),topA=pow(1.0-smoothstep(TOP_FADE_START,1.0,sPix),TOP_FADE_EXP);
    float L=a+b*topA;
    float w=vWisps(vec2(uvc.x,yPix),topA);
    
    // Fog tối ưu
    vec2 fuv=uvc*uFogScale;
    float mAct=step(1.0,length(iMouse.xy)),nx=((iMouse.x-C.x)*invW)*mAct;
    float ax = abs(nx);
    float stMag = mix(ax, pow(ax, 1.5), 0.35);
    float st = sign(nx) * stMag * uTiltScale;
    st = clamp(st, -0.35, 0.35);
    vec2 dir=normalize(vec2(st,1.0));
    fuv+=uFogTime*uFogFallSpeed*dir;
    vec2 prp=vec2(-dir.y,dir.x);
    fuv+=prp*(0.08*sin(dot(uvc,prp)*0.08+uFogTime*0.9));
    float n=fbm2(fuv+vec2(fbm2(fuv+vec2(7.3,2.1)),fbm2(fuv+vec2(-3.7,5.9)))*0.6);
    n=pow(clamp(n,0.0,1.0),FOG_CONTRAST);
    
    float m0=pow(smoothstep(FOG_BEAM_MIN,FOG_BEAM_MAX,L),FOG_MASK_GAMMA);
    float bm=1.0-pow(1.0-m0,FOG_EXPAND_SHAPE); bm=mix(bm*m0,bm,FOG_EDGE_MIX);
    float yP=1.0-smoothstep(HFOG_Y_RADIUS,HFOG_Y_RADIUS+HFOG_Y_SOFT,abs(yPix));
    float nxF=abs((gl_FragCoord.x-C.x)*invW),hE=1.0-smoothstep(HFOG_EDGE_START,HFOG_EDGE_END,nxF); 
    hE=pow(clamp(hE,0.0,1.0),HFOG_EDGE_GAMMA);
    float hW=mix(1.0,hE,clamp(yP,0.0,1.0));
    float bBias=mix(1.0,1.0-sPix,FOG_BOTTOM_BIAS);
    float browserFogIntensity = uFogIntensity * 1.8;
    float radialFade = 1.0 - smoothstep(0.0, 0.7, length(uvc) / 120.0);
    float fog = n * browserFogIntensity * bBias * bm * hW * radialFade;
    
    float LF=L+fog;
    float dith=(h21(gl_FragCoord.xy)-0.5)*(DITHER_STRENGTH/255.0);
    float tone=g(LF+w);
    vec3 col=tone*uColor+dith;
    float alpha=clamp(tone+g(w*0.6)+dith*0.6,0.0,1.0);
    float xF=pow(clamp(1.0-smoothstep(EDGE_X0,EDGE_X1,nxF),0.0,1.0),EDGE_X_GAMMA);
    float scene=LF+max(0.0,w)*0.5,hi=smoothstep(EDGE_LUMA_T0,EDGE_LUMA_T1,scene);
    float eM=mix(xF,1.0,hi);
    col*=eM; alpha*=eM;
    col*=uFade; alpha*=uFade;
    gl_FragColor=vec4(col,alpha);
}
`;

            // Initialize
            document.addEventListener("DOMContentLoaded", () => {
                const laser = new LaserFlow("#laser", {
                    color: "#FFB86C",
                    wispDensity: 1.0,
                    flowSpeed: 0.26,
                    fogIntensity: 0.30,
                    horizontalSizing: 0.95
                });

                document.querySelectorAll('.preset').forEach(btn => {
                    btn.onclick = () => {
                        const col = btn.dataset.color;
                        laser.setColor(col);
                        document.querySelectorAll('.preset').forEach(b => b.classList.toggle('active', b === btn));
                    };
                });

                document.getElementById('wisp').oninput = e => {
                    const v = parseFloat(e.target.value);
                    laser.setWispDensity(v);
                    document.getElementById('wispVal').textContent = v.toFixed(2);
                };

                document.getElementById('flow').oninput = e => {
                    const v = parseFloat(e.target.value);
                    laser.setFlowSpeed(v);
                    document.getElementById('flowVal').textContent = v.toFixed(2);
                };

                document.getElementById('fog').oninput = e => {
                    const v = parseFloat(e.target.value);
                    laser.setFogIntensity(v);
                    document.getElementById('fogVal').textContent = v.toFixed(2);
                };

                document.getElementById('horiz').oninput = e => {
                    const v = parseFloat(e.target.value);
                    laser.setHorizontalSizing(v);
                    document.getElementById('horizVal').textContent = v.toFixed(2);
                };

                document.getElementById('toggle').onclick = () => {
                    const p = document.getElementById('controls');
                    p.style.opacity = p.style.opacity === '0' ? '1' : '0';
                };
            });
        </script>
<?php
    }
}
?>