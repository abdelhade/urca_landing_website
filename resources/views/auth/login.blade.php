<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>أوركا | تسجيل الدخول</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --bg-color: #020617; /* slate-950 */
            --text-primary: #f8fafc; /* slate-50 */
            --text-secondary: #94a3b8; /* slate-400 */
            --accent-cyan: #06b6d4; /* cyan-500 */
            --accent-blue: #3b82f6; /* blue-500 */
            --glass-bg: rgba(15, 23, 42, 0.45); /* dark transparent */
            --glass-border: rgba(255, 255, 255, 0.08);
            --glow-cyan: rgba(6, 182, 212, 0.25);
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
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        /* Ambient Glowing Background Orbs */
        .ambient-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(130px);
            z-index: 1;
            pointer-events: none;
        }

        .glow-1 {
            width: 35vw;
            height: 35vw;
            background: radial-gradient(circle, var(--accent-cyan) 0%, transparent 70%);
            top: -10vw;
            left: -10vw;
            opacity: 0.12;
        }

        .glow-2 {
            width: 40vw;
            height: 40vw;
            background: radial-gradient(circle, var(--accent-blue) 0%, transparent 70%);
            bottom: -15vw;
            right: -10vw;
            opacity: 0.12;
        }

        /* Tech Grid Background */
        .tech-grid {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.012) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.012) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 2;
            pointer-events: none;
        }

        .auth-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 430px;
            padding: 2.5rem;
            background: rgba(15, 23, 42, 0.45);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            animation: formFadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes formFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo Link */
        .logo-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            margin-bottom: 2rem;
        }

        .logo-img {
            width: 35px;
            height: 35px;
            filter: drop-shadow(0 0 6px var(--accent-cyan));
            transform: scaleX(-1);
        }

        .brand-name {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #fff 30%, var(--text-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-dot {
            color: var(--accent-cyan);
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #fff 50%, var(--text-secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .subtitle a {
            color: var(--accent-cyan);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .subtitle a:hover {
            color: #67e8f9;
        }

        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #cbd5e1;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 0.85rem 1rem;
            background: rgba(2, 6, 23, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            text-align: right;
        }

        input:focus {
            border-color: var(--accent-cyan);
            background: rgba(2, 6, 23, 0.7);
            box-shadow: 0 0 12px rgba(6, 182, 212, 0.25);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            margin-bottom: 1.75rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: var(--text-secondary);
        }

        .checkbox-label input {
            width: auto;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--accent-cyan);
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #67e8f9;
        }

        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #22d3ee, #06b6d4);
            border: none;
            border-radius: 10px;
            color: #020617;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px var(--glow-cyan);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #67e8f9, #0891b2);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.45);
            transform: translateY(-2px);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .back-home {
            position: absolute;
            top: 2rem;
            right: 2rem; /* aligned right for RTL */
            z-index: 100;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.2s;
            padding: 0.5rem 1rem;
            background: rgba(15, 23, 42, 0.3);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            backdrop-filter: blur(8px);
        }

        .back-home:hover {
            color: var(--text-primary);
            border-color: rgba(255, 255, 255, 0.15);
            background: rgba(15, 23, 42, 0.5);
            transform: translateX(3px); /* moves right on hover for RTL arrow feel */
        }

        .back-home svg {
            transition: transform 0.2s;
            transform: rotate(180deg); /* points right for RTL */
        }

        .back-home:hover svg {
            transform: rotate(180deg) translateX(-2px);
        }
    </style>
</head>
<body>
    <div class="tech-grid"></div>
    <div class="ambient-glow glow-1"></div>
    <div class="ambient-glow glow-2"></div>

    <!-- Back to Welcome Page -->
    <a href="/" class="back-home">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        العودة للرئيسية
    </a>

    <div class="auth-container">
        <!-- Logo Section -->
        <a href="/" class="logo-link">
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

        <h2>مرحباً بك مجدداً</h2>
        <div class="subtitle">ليس لديك حساب؟ <a href="{{ route('register') }}">سجل حساباً جديداً من هنا</a></div>

        <form action="#" method="POST" id="loginForm">
            <!-- Email -->
            <div class="form-group">
                <label for="email">البريد الإلكتروني للشركة</label>
                <input type="email" id="email" placeholder="name@company.com" required autocomplete="email">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" placeholder="••••••••" required autocomplete="current-password">
            </div>

            <div class="remember-forgot">
                <label class="checkbox-label">
                    <input type="checkbox" id="remember">
                    تذكر هذا الجهاز
                </label>
                <a href="#" class="forgot-link">نسيت كلمة المرور؟</a>
            </div>

            <button type="submit" class="btn-submit">تسجيل الدخول للوحة التحكم</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Elegant Ajax/jQuery Form visual handling
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                const $btn = $('.btn-submit');
                const originalText = $btn.text();
                
                // Show loading state
                $btn.prop('disabled', true).css('opacity', '0.75').text('جاري الاتصال الآمن...');
                
                setTimeout(function() {
                    $btn.text('جاري التحقق من الخزنة الرقمية للمؤسسة...');
                    setTimeout(function() {
                        alert('تم تسجيل الدخول التجريبي بنجاح! (تم تعطيل إعادة التوجيه لغرض المعاينة)');
                        $btn.prop('disabled', false).css('opacity', '1').text(originalText);
                    }, 1200);
                }, 1000);
            });
        });
    </script>
</body>
</html>
