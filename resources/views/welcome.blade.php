<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>URCA | برمجيات ERP الذكية للجيل القادم</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    {{-- <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --white:  #ffffff;
            --black:  rgb(48, 93, 128);
            --gray:   #f7f6f4;
            --mid:    #9a9690;
            --accent: #988047;
            --font:   'Cairo', sans-serif;
        }

        html, body {
            height: 100%; width: 100%;
            overflow: hidden;
            background: var(--white);
            color: var(--black);
            font-family: var(--font);
            -webkit-font-smoothing: antialiased;
        }

        /* ── CANVAS ── */
        #bgCanvas {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        /* ── NAVBAR ── */
        .nav {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.5rem 3.5rem;
            opacity: 0;
            animation: fadeDown .7s cubic-bezier(.22,1,.36,1) .1s forwards;
        }
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .nav-brand { display: flex; align-items: center; gap: .6rem; text-decoration: none; }
        .nav-logo  { width: 32px; height: 32px; }
        .nav-name  {
            font-size: 1.3rem; font-weight: 900;
            letter-spacing: 4px; text-transform: uppercase;
            color: var(--black);
        }

        .nav-links { display: flex; gap: 2.4rem; list-style: none; }
        .nav-links a {
            color: var(--mid); text-decoration: none;
            font-size: .72rem; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--black); }

        .nav-btns { display: flex; gap: .8rem; }

        .btn-ghost {
            padding: .44rem 1.2rem;
            border: 1px solid rgba(0,0,0,.18); border-radius: 2px;
            background: transparent; color: var(--black);
            font-family: var(--font); font-size: .7rem; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase; text-decoration: none;
            transition: background .2s, border-color .2s;
        }
        .btn-ghost:hover { background: rgba(0,0,0,.05); border-color: rgba(0,0,0,.35); }

        .btn-fill {
            padding: .44rem 1.2rem;
            border: 1px solid var(--black); border-radius: 2px;
            background: var(--black); color: var(--white);
            font-family: var(--font); font-size: .7rem; font-weight: 800;
            letter-spacing: 2px; text-transform: uppercase; text-decoration: none;
            transition: background .2s;
        }
        .btn-fill:hover { background: #2a2a2a; }

        /* ════════════════════════════
           HERO — full screen centered
        ════════════════════════════ */
        .hero {
            position: relative; z-index: 10;
            width: 100vw; height: 100vh;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            overflow: hidden;
            text-align: center;
        }

        /* ── label ── */
        .hero-label {
            display: inline-flex; align-items: center; gap: .55rem;
            font-size: .68rem; font-weight: 700;
            letter-spacing: 3px; text-transform: uppercase;
            color: var(--accent); margin-bottom: 1.6rem;
            opacity: 0;
            animation: fadeUp .6s ease .55s forwards;
        }
        .hero-label::before,
        .hero-label::after {
            content: ''; width: 20px; height: 1px;
            background: var(--accent); flex-shrink: 0;
        }

        /* ── typewriter headline ── */
        .hero-title {
            font-size: clamp(3rem, 6vw, 6.5rem);
            font-weight: 900; line-height: 1.04;
            letter-spacing: -2px; color: var(--black);
            margin-bottom: 1.4rem;
            min-height: 2.3em;
        }

        .cursor {
            display: inline-block;
            width: 3px; height: .85em;
            background: var(--accent);
            vertical-align: middle;
            margin-right: 3px;
            animation: blink .7s step-end infinite;
        }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

        /* ── desc ── */
        .hero-desc {
            font-size: 1rem; font-weight: 400; line-height: 1.85;
            color: var(--mid); max-width: 500px;
            margin: 0 auto 2.2rem;
            opacity: 0; transform: translateY(14px);
        }

        /* ── CTA ── */
        .hero-cta {
            display: flex; align-items: center;
            justify-content: center; gap: 1rem;
            opacity: 0; transform: translateY(14px);
            margin-bottom: 2rem;
        }

        .btn-cta {
            padding: .8rem 2.2rem;
            border: 1px solid var(--black); border-radius: 2px;
            background: var(--black); color: var(--white);
            font-family: var(--font); font-size: .8rem; font-weight: 800;
            letter-spacing: 2.5px; text-transform: uppercase; text-decoration: none;
            position: relative; overflow: hidden;
            transition: color .3s;
        }
        .btn-cta::before {
            content: ''; position: absolute; inset: 0;
            background: var(--accent);
            transform: translateX(101%);
            transition: transform .38s cubic-bezier(.22,1,.36,1);
        }
        .btn-cta:hover::before { transform: translateX(0); }
        .btn-cta span { position: relative; z-index: 1; }
        .btn-cta:hover { color: var(--black); }

        .link-ghost {
            display: flex; align-items: center; gap: .45rem;
            font-size: .75rem; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            color: var(--mid); text-decoration: none;
            transition: color .2s;
        }
        .link-ghost:hover { color: var(--black); }
        .link-ghost .circ {
            width: 26px; height: 26px;
            border: 1px solid rgba(0,0,0,.15); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            transition: border-color .2s, transform .25s;
        }
        .link-ghost:hover .circ { border-color: rgba(0,0,0,.5); transform: translateX(-4px); }

        /* ── BIG URCA BEHIND BUTTONS ── */
        /* .bg-wordmark {
            position: absolute;
            bottom: 2.5rem;
            left: 50%; transform: translateX(-50%);
            font-size: clamp(8rem, 22vw, 22rem);
            font-weight: 900; letter-spacing: -8px;
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(0,0,0,.07);
            user-select: none; pointer-events: none;
            white-space: nowrap;
            opacity: 0;
            animation: fadeIn 1s ease 1.6s forwards;
            z-index: 5;
        } */

        /* ── TICKER ── */
        .ticker {
            position: absolute; bottom: 0; left: 0; right: 0;
            height: 40px; z-index: 50; overflow: hidden;
            background: var(--black);
            display: flex; align-items: center;
            opacity: 0; animation: fadeIn .5s ease 1.8s forwards;
        }
        .ticker-track {
            display: flex; white-space: nowrap;
            animation: tickerScroll 24s linear infinite;
        }
        .ticker-item {
            display: inline-flex; align-items: center;
            gap: 1.2rem; padding: 0 1.8rem;
            font-size: .66rem; font-weight: 800;
            letter-spacing: 3px; text-transform: uppercase;
            color: var(--white);
        }
        .ticker-dot {
            width: 4px; height: 4px; border-radius: 50%;
            background: var(--accent); display: inline-block;
        }
        @keyframes tickerScroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        @keyframes fadeUp  { from { opacity:0; transform:translateY(14px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeIn  { to   { opacity: 1; } }

        /* mobile */
        @media (max-width: 640px) {
            .nav { padding: 1.2rem 1.5rem; }
            .nav-links { display: none; }
            .hero-title { font-size: 2.8rem; }
            .bg-wordmark { font-size: 25vw; letter-spacing: -3px; }
        }
    </style> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<canvas id="bgCanvas"></canvas>

<!-- NAVBAR -->
<nav class="nav">
    <a href="/" class="nav-brand">
        <svg class="nav-logo" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 58C24 52 40 36 56 30C58 30 59 22 59.5 16C59.8 13 62 12 62.5 14C63 18 62 26 62.5 30.5C72 32 80 36 78 42C76 47 68 48 58 46C44 48 30 56 20 56Z" fill="#0a0a0a"/>
            <path d="M78 42C70 43 58 46 50 50C44 53 36 55 28 54C22 53 18 50 14 46C17 45 21 44 24 45C30 47 36 50 44 48C52 46 60 40 66 36Z" fill="#f7f6f4"/>
            <ellipse cx="66" cy="28" rx="6" ry="2.5" transform="rotate(-15,66,28)" fill="#f7f6f4"/>
            <path d="M44 46C42 54 36 66 28 72C24 75 20 72 24 66C30 58 40 50 44 46Z" fill="#0a0a0a"/>
            <path d="M12 58C8 59 2 65 0 70C-1 73 2 74 5 71C9 67 11 60 12 58Z" fill="#0a0a0a"/>
            <path d="M12 58C9 57 3 53 0 46C-1 43 2 42 5 46C9 51 11 57 12 58Z" fill="#0a0a0a"/>
        </svg>
        <span class="nav-name">URCA</span>
    </a>
    <ul class="nav-links">
        <li><a href="#features">الأنظمة</a></li>
        <li><a href="#solutions">الحلول</a></li>
        <li><a href="#about">عن الشركة</a></li>
        <li><a href="#contact">تواصل</a></li>
    </ul>
    <div class="nav-btns">
        <a href="{{ route('login') }}"    class="btn-ghost">دخول</a>
        <a href="{{ route('register') }}" class="btn-fill">ابدأ الآن</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero">

    <!-- big URCA wordmark behind content -->
    {{-- <div class="bg-wordmark">URCA</div> --}}

    <!-- centered content -->
    <div class="hero-label">الجيل القادم من ERP</div>

    <h1 class="hero-title" id="heroTitle">
        <span id="typedText"></span><span class="cursor"></span>
    </h1>

    <p class="hero-desc" id="heroDesc">
        منصة ERP ذكية مصممة لتبسيط العمليات، وتوحيد البيانات، وتسريع قرارات الأعمال — كل شيء في مكان واحد.
    </p>

    <div class="hero-cta" id="heroCta">
        <a href="{{ route('register') }}" class="btn-cta"><span>ابدأ مجاناً</span></a>
        <a href="#features" class="link-ghost">
            <span class="circ">
                <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </span>
            استكشف
        </a>
    </div>

    <!-- ticker -->
    <div class="ticker">
        <div class="ticker-track">
            <span class="ticker-item">نظام المحاسبة<span class="ticker-dot"></span></span>
            <span class="ticker-item">إدارة الموارد البشرية<span class="ticker-dot"></span></span>
            <span class="ticker-item">سلسلة التوريد<span class="ticker-dot"></span></span>
            <span class="ticker-item">لوحة التحكم الذكية<span class="ticker-dot"></span></span>
            <span class="ticker-item">إدارة المخزون<span class="ticker-dot"></span></span>
            <span class="ticker-item">تقارير فورية<span class="ticker-dot"></span></span>
            <span class="ticker-item">نقاط البيع<span class="ticker-dot"></span></span>
            <span class="ticker-item">متوافق مع ZATCA<span class="ticker-dot"></span></span>
            <span class="ticker-item">نظام المحاسبة<span class="ticker-dot"></span></span>
            <span class="ticker-item">إدارة الموارد البشرية<span class="ticker-dot"></span></span>
            <span class="ticker-item">سلسلة التوريد<span class="ticker-dot"></span></span>
            <span class="ticker-item">لوحة التحكم الذكية<span class="ticker-dot"></span></span>
            <span class="ticker-item">إدارة المخزون<span class="ticker-dot"></span></span>
            <span class="ticker-item">تقارير فورية<span class="ticker-dot"></span></span>
            <span class="ticker-item">نقاط البيع<span class="ticker-dot"></span></span>
            <span class="ticker-item">متوافق مع ZATCA<span class="ticker-dot"></span></span>
        </div>
    </div>

</section>

<script>
/* ═══════════════════════════════════════════
   CANVAS — 2 mini whales swimming in bg
═══════════════════════════════════════════ */
(function () {
    const canvas = document.getElementById('bgCanvas');
    const ctx    = canvas.getContext('2d');
    let W, H;

    function resize() {
        W = canvas.width  = window.innerWidth;
        H = canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    const DOTS = 40;
    const dots = Array.from({ length: DOTS }, () => ({
        x:   Math.random() * 1,   // fraction of W
        y:   Math.random() * 1,
        r:   .8 + Math.random() * 2.2,
        spd: .15 + Math.random() * .4,
        opc: .06 + Math.random() * .5,
    }));

    /* ── draw one orca at origin (facing right by default) ──
       s = scale where 100 = reference body length            */
    function drawOrca(size, opacity, flip) {
        const s = size / 100;
        ctx.save();
        if (flip) ctx.scale(-1, 1);
        ctx.globalAlpha = opacity;

        // body
        ctx.beginPath();
        ctx.moveTo(-50*s, 5*s);
        ctx.bezierCurveTo(-30*s,-20*s,  10*s,-22*s,  40*s, 0);
        ctx.bezierCurveTo( 50*s,  8*s,  45*s, 18*s,  30*s, 16*s);
        ctx.bezierCurveTo( 10*s, 14*s, -20*s, 20*s, -50*s, 8*s);
        ctx.closePath();
        ctx.fillStyle = 'rgba(10,10,10,1)';
        ctx.fill();

        // white belly
        ctx.beginPath();
        ctx.moveTo(30*s, 14*s);
        ctx.bezierCurveTo(15*s,10*s, -5*s,12*s, -20*s,8*s);
        ctx.bezierCurveTo(-5*s,16*s, 15*s,19*s,  30*s,16*s);
        ctx.closePath();
        ctx.fillStyle = 'rgba(235,232,226,1)';
        ctx.fill();

        // white eye patch
        ctx.beginPath();
        ctx.ellipse(22*s,-5*s, 7*s,4*s, -0.28, 0, Math.PI*2);
        ctx.fillStyle = 'rgba(235,232,226,1)';
        ctx.fill();

        // dorsal fin
        ctx.beginPath();
        ctx.moveTo(5*s,-20*s);
        ctx.bezierCurveTo(8*s,-40*s, 16*s,-40*s, 18*s,-20*s);
        ctx.bezierCurveTo(12*s,-18*s, 8*s,-18*s, 5*s,-20*s);
        ctx.fillStyle = 'rgba(10,10,10,1)';
        ctx.fill();

        // tail fluke top
        ctx.beginPath();
        ctx.moveTo(-50*s, 5*s);
        ctx.bezierCurveTo(-58*s,-2*s, -68*s,-8*s, -60*s,-16*s);
        ctx.bezierCurveTo(-52*s,-22*s, -46*s,-12*s, -50*s, 5*s);
        ctx.fillStyle = 'rgba(10,10,10,1)';
        ctx.fill();

        // tail fluke bottom
        ctx.beginPath();
        ctx.moveTo(-50*s, 8*s);
        ctx.bezierCurveTo(-58*s,14*s, -68*s,20*s, -60*s,28*s);
        ctx.bezierCurveTo(-52*s,34*s, -46*s,22*s, -50*s, 8*s);
        ctx.fillStyle = 'rgba(10,10,10,1)';
        ctx.fill();

        ctx.restore();
    }

    /* ── whale factory ── */
    function makeWhale(goRight) {
        const size = 55 + Math.random() * 40; // 55–95px
        return {
            x:        goRight ? -140 : W + 140,
            y:        H * (.2 + Math.random() * .6),
            size,
            goRight,                              // travel direction
            flip:     !goRight,                   // mirror when going left
            vx:       (goRight ? 1 : -1) * (.28 + Math.random() * .42),
            // vertical wave
            wAmp:     20 + Math.random() * 35,    // px up/down
            wSpd:     .018 + Math.random() * .022,// radians per frame
            wOff:     Math.random() * Math.PI * 2,
            // body pitch (follows vertical velocity)
            tiltMax:  0.14 + Math.random() * .1,
            // opacity — ghost-like, stays in bg
            opc:      .07 + Math.random() * .1,
            t:        0,
        };
    }

    // two whales going in opposite directions
    const whales = [makeWhale(true), makeWhale(false)];
    // stagger horizontal start so they're not on top of each other
    whales[0].x = W * .05;
    whales[1].x = W * .75;

    /* ── render loop ── */
    function draw() {
        ctx.clearRect(0, 0, W, H);

        dots.forEach(d => {
            d.y -= d.spd / H;
            if (d.y < 0) { d.y = 1; d.x = Math.random(); }
            ctx.beginPath();
            ctx.arc(d.x * W, d.y * H, d.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(123, 102, 54,${d.opc})`;
            ctx.fill();
            // rgba(123, 102, 54, 0.892)
        });

        whales.forEach(w => {
            w.t += 1;
            w.x += w.vx;

            // sinusoidal vertical wave
            const yWave = Math.sin(w.t * w.wSpd + w.wOff) * w.wAmp;
            // pitch = derivative of wave (cosine) → tilts into the movement
            const pitch = Math.cos(w.t * w.wSpd + w.wOff) * w.tiltMax;
            // small secondary wobble for organic feel
            const wobble = Math.sin(w.t * w.wSpd * 2.3 + w.wOff) * (w.tiltMax * .4);

            ctx.save();
            ctx.translate(w.x, w.y + yWave);
            ctx.rotate(pitch + wobble);
            drawOrca(w.size, w.opc, w.flip);
            ctx.restore();

            // recycle when off-screen
            const offscreen = w.goRight ? w.x > W + 180 : w.x < -180;
            if (offscreen) {
                const newW = makeWhale(w.goRight);
                Object.assign(w, newW);
            }
        });

        requestAnimationFrame(draw);
    }
    draw();
})();

/* ═══════════════════════════════════════════
   TYPEWRITER
═══════════════════════════════════════════ */
(function () {
    const phrases = [
        'أدِر أعمالك\nبلا حدود',
        'بيانات أذكى\nقرارات أسرع',
        'نظام ERP\nللجيل القادم',
    ];
    const el   = document.getElementById('typedText');
    const desc = document.getElementById('heroDesc');
    const cta  = document.getElementById('heroCta');

    let pi = 0, ci = 0, deleting = false, revealed = false;

    function render(str) {
        el.innerHTML = str.replace(/\n/g, '<br>');
    }

    function revealBelow() {
        if (revealed) return;
        revealed = true;
        [desc, cta].forEach((el, i) => {
            el.style.transition = `opacity .75s ease ${i * .25}s, transform .75s ease ${i * .25}s`;
            el.style.opacity    = '1';
            el.style.transform  = 'translateY(0)';
        });
    }

    function step() {
        const phrase = phrases[pi];
        if (!deleting) {
            ci++;
            render(phrase.slice(0, ci));
            if (ci === phrase.length) {
                revealBelow();
                setTimeout(startDelete, 3000);
                return;
            }
            setTimeout(step, phrase[ci - 1] === '\n' ? 280 : 72);
        } else {
            ci--;
            render(phrase.slice(0, ci));
            if (ci === 0) {
                deleting = false;
                pi = (pi + 1) % phrases.length;
                setTimeout(step, 380);
                return;
            }
            setTimeout(step, 36);
        }
    }

    function startDelete() { deleting = true; setTimeout(step, 60); }

    desc.style.opacity   = '0';
    desc.style.transform = 'translateY(14px)';
    cta.style.opacity    = '0';
    cta.style.transform  = 'translateY(14px)';

    setTimeout(step, 1000);
})();
</script>
</body>
</html>
