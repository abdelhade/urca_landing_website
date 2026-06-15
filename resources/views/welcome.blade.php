<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>URCA | برمجيات ERP الذكية للجيل القادم</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom CSS (Premium Deep Ocean Tech Theme - Arabic/RTL optimized) -->
    <style>
        :root {
            --bg-color: #020617; /* slate-950 */
            --text-primary: #f8fafc; /* slate-50 */
            --text-secondary: #94a3b8; /* slate-400 */
            --accent-cyan: #06b6d4; /* cyan-500 */
            --accent-blue: #3b82f6; /* blue-500 */
            --glass-bg: rgba(15, 23, 42, 0.45); /* dark transparent */
            --glass-border: rgba(255, 255, 255, 0.08);
            --glow-cyan: rgba(6, 182, 212, 0.3);
            --glow-blue: rgba(59, 130, 246, 0.2);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            min-height: 100vh;
            overflow: hidden; /* Desktop landing experience is contained */
            position: relative;
        }

        /* Ambient Glowing Background Orbs */
        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(150px);
            z-index: 1;
            pointer-events: none;
        }

        .glow-1 {
            width: 40vw;
            height: 40vw;
            background: radial-gradient(circle, var(--accent-cyan) 0%, transparent 70%);
            top: -10vw;
            right: -10vw;
            opacity: 0.15;
        }

        .glow-2 {
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, var(--accent-blue) 0%, transparent 70%);
            bottom: -15vw;
            left: -10vw;
            opacity: 0.15;
        }

        .glow-center {
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.15) 0%, rgba(59, 130, 246, 0.05) 50%, transparent 100%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.6;
        }

        /* Tech Grid Background */
        .tech-grid {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 2;
            pointer-events: none;
        }

        /* Main Container */
        .app-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: relative;
            z-index: 10;
        }

        /* Glassmorphic Navbar */
        nav.navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 4rem;
            background: rgba(2, 6, 23, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            z-index: 100;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            text-decoration: none;
        }

        .logo-img {
            width: 45px;
            height: 45px;
            filter: drop-shadow(0 0 8px var(--accent-cyan));
            transition: transform 0.3s ease;
            transform: scaleX(-1); /* flip for RTL direction alignment */
        }

        .logo-section:hover .logo-img {
            transform: scaleX(-1) rotate(5deg) scale(1.05);
        }

        .brand-name {
            font-size: 1.75rem;
            font-weight: 900;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #fff 30%, var(--text-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
        }

        .brand-dot {
            color: var(--accent-cyan);
            text-shadow: 0 0 10px var(--accent-cyan);
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.25rem 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue));
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-links a:hover {
            color: var(--text-primary);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .auth-actions {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
        }

        .btn-login {
            color: var(--text-primary);
            background: transparent;
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(4px);
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.03);
            transform: translateY(-1px);
        }

        .btn-register {
            color: #020617;
            background: linear-gradient(135deg, #22d3ee, #06b6d4);
            border: none;
            box-shadow: 0 4px 15px var(--glow-cyan);
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #67e8f9, #0891b2);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.5);
            transform: translateY(-2px);
        }

        /* Hero Content & Layout */
        .hero-section {
            flex: 1;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            padding: 0 4rem;
            position: relative;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            z-index: 20;
            max-width: 620px;
        }

        .badge {
            align-self: flex-start;
            padding: 0.4rem 1rem;
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid rgba(6, 182, 212, 0.2);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #22d3ee;
            letter-spacing: 0.5px;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.05);
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.25;
            background: linear-gradient(135deg, #ffffff 40%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-title span {
            background: linear-gradient(135deg, #22d3ee, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-desc {
            color: var(--text-secondary);
            font-size: 1.15rem;
            line-height: 1.75;
            font-weight: 400;
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-large {
            padding: 0.8rem 2.2rem;
            font-size: 1rem;
            border-radius: 10px;
        }

        /* Floating particles / bubbles */
        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
            z-index: 5;
            pointer-events: none;
        }

        .bubble {
            position: absolute;
            bottom: -50px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: rise 12s infinite ease-in;
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(0.5);
                opacity: 0.1;
            }
            50% {
                opacity: 0.4;
            }
            100% {
                transform: translateY(-110vh) scale(1.2);
                opacity: 0;
            }
        }

        /* Right side: Interactive Orca Area */
        .hero-right {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        /* The Orca Interactive Wrapper (Mouse Movement) */
        #whale-interactive-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            transform-style: preserve-3d;
        }

        /* The Whale animated element (Continuous floating) */
        #whale-animated-element {
            width: 90%;
            height: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: floatWhale 8s ease-in-out infinite;
        }

        /* 70% viewport scale SVG Orca */
        .orca-hero-svg {
            width: 100%;
            height: 70vh; /* Fills 70% of the screen height */
            max-width: 800px;
            filter: drop-shadow(0 20px 50px rgba(2, 6, 23, 0.9)) drop-shadow(0 0 30px rgba(6, 182, 212, 0.15));
            transform: scaleX(-1); /* default facing left/towards text for Arabic */
        }

        /* Continuous Swimming/Floating Animation */
        @keyframes floatWhale {
            0% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }
            25% {
                transform: translateY(-15px) rotate(-1.2deg) scale(0.99);
            }
            50% {
                transform: translateY(-30px) rotate(0.5deg) scale(1.01);
            }
            75% {
                transform: translateY(-15px) rotate(1.5deg) scale(0.995);
            }
            100% {
                transform: translateY(0px) rotate(0deg) scale(1);
            }
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            nav.navbar {
                padding: 1.25rem 2rem;
            }
            .hero-section {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr;
                padding: 2rem 2rem 0;
                overflow-y: auto;
            }
            .hero-left {
                max-width: 100%;
                text-align: center;
                align-items: center;
                margin-top: 1rem;
            }
            .hero-right {
                height: 50vh;
            }
            .orca-hero-svg {
                height: 45vh;
            }
            body {
                overflow: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Background elements -->
    <div class="tech-grid"></div>
    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>
    <div class="ambient-glow glow-center"></div>

    <!-- Bubbles Container -->
    <div class="bubbles" id="bubbles-container"></div>

    <div class="app-container">
        <!-- Glassmorphic Navbar -->
        <nav class="navbar">
            <a href="/" class="logo-section">
                <!-- Inline SVG Logo (Cropped version of our orca whale) -->
                <svg class="logo-img" viewBox="100 80 620 320" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="logoSkin" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#0f172a" />
                            <stop offset="100%" stop-color="#020617" />
                        </linearGradient>
                        <linearGradient id="logoWhite" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#ffffff" />
                            <stop offset="100%" stop-color="#e2e8f0" />
                        </linearGradient>
                    </defs>
                    <path d="M 120,310 C 180,290 280,210 370,190 C 375,190 380,150 382,120 C 383,100 395,95 400,100 C 405,108 402,150 405,192 C 480,195 580,205 660,230 C 700,242 720,255 715,268 C 710,280 680,285 650,285 C 550,285 460,325 360,325 C 280,325 200,320 120,310 Z" fill="url(#logoSkin)" stroke="#1e293b" stroke-width="2" />
                    <path d="M 120,310 C 110,312 90,335 70,345 C 60,350 55,345 60,335 C 70,320 90,312 105,310 C 90,308 70,300 60,285 C 55,275 60,270 70,275 C 90,285 110,308 120,310 Z" fill="url(#logoSkin)" />
                    <path d="M 670,270 C 630,273 570,275 510,290 C 440,310 380,318 350,318 C 320,318 300,312 280,300 C 290,295 305,290 320,292 C 345,295 365,302 390,298 C 420,292 450,275 480,265 C 520,255 570,255 640,265 Z" fill="url(#logoWhite)" />
                    <ellipse cx="610" cy="232" rx="25" ry="10" transform="rotate(-12, 610, 232)" fill="url(#logoWhite)" />
                    <path d="M 500,280 C 490,310 460,360 420,380 C 405,388 395,380 405,365 C 430,330 475,295 500,280 Z" fill="url(#logoSkin)" />
                </svg>
                <div class="brand-name">أوركا<span class="brand-dot">.</span></div>
            </a>
            
            <ul class="nav-links">
                <li><a href="#features">المميزات</a></li>
                <li><a href="#solutions">الحلول</a></li>
                <li><a href="#about">عن الشركة</a></li>
                <li><a href="#contact">اتصل بنا</a></li>
            </ul>

            <div class="auth-actions">
                <a href="{{ route('login') }}" class="btn btn-login">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="btn btn-register">حساب جديد</a>
            </div>
        </nav>

        <!-- Main Hero Section -->
        <main class="hero-section">
            <!-- Right text info -->
            <div class="hero-left">
                <div class="badge">برمجيات ERP الجيل القادم</div>
                <h1 class="hero-title">أبحر بأعمالك نحو الريادة مع <span>أوركا ERP</span></h1>
                <p class="hero-desc">قم بتبسيط عملياتك، وأتمتة سير العمل المهم، وتوحيد ذكاء الأعمال الخاص بك تحت محيط واحد من البيانات الذكية. صُمم خصيصاً للسرعة والاستقرار ومحاكاة التطور المستمر.</p>
                <div class="hero-cta">
                    <a href="{{ route('register') }}" class="btn btn-register btn-large">ابدأ الآن مجاناً</a>
                    <a href="#features" class="btn btn-login btn-large">استكشف الأنظمة</a>
                </div>
            </div>

            <!-- Left Interactive Whale Area -->
            <div class="hero-right">
                <!-- Outer wrapper to receive mouse translation (inverse parallax) -->
                <div id="whale-interactive-wrapper">
                    <!-- Inner wrapper to carry CSS float animation -->
                    <div id="whale-animated-element">
                        <!-- References our SVG file directly as an image -->
                        <img src="{{ asset('images/orca-whale.svg') }}" class="orca-hero-svg" alt="URCA Orca Whale" draggable="false" />
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mouse Movement & Decorative Particle JS -->
    <script>
        $(document).ready(function() {
            // 1. Generate elegant rising bubbles in the background
            const bubbleCount = 15;
            const $container = $('#bubbles-container');
            
            for (let i = 0; i < bubbleCount; i++) {
                createBubble($container);
            }

            function createBubble($parent) {
                const size = Math.random() * 80 + 20;
                const left = Math.random() * 100;
                const delay = Math.random() * 10;
                const duration = Math.random() * 8 + 8;
                
                const $bubble = $('<div class="bubble"></div>').css({
                    'width': `${size}px`,
                    'height': `${size}px`,
                    'left': `${left}%`,
                    'animation-delay': `${delay}s`,
                    'animation-duration': `${duration}s`
                });
                
                $parent.append($bubble);
            }

            // 2. Inverse Mouse Parallax on Orca Whale
            $(document).on('mousemove', function(e) {
                const x = e.clientX;
                const y = e.clientY;
                const w = $(window).width();
                const h = $(window).height();
                
                // Normalized coordinate offsets relative to center (-0.5 to 0.5)
                const dx = (x - w / 2) / (w / 2);
                const dy = (y - h / 2) / (h / 2);
                
                // Opposite direction movement: negative sign
                // We move max 45px horizontally, 30px vertically
                const maxMoveX = -45; 
                const maxMoveY = -30;
                
                const moveX = dx * maxMoveX;
                const moveY = dy * maxMoveY;
                
                // Rotate the whale slightly opposite to cursor direction for fluid aquatic feel
                // In RTL, we inverse the tilt to match the mirrored layout
                const rotateDeg = dx * 3; 
                
                $('#whale-interactive-wrapper').css({
                    'transform': `translate3d(${moveX}px, ${moveY}px, 0) rotate(${rotateDeg}deg)`,
                    'transition': 'transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)'
                });
            });
        });
    </script>
</body>
</html>
