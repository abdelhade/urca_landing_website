<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'URCA | برمجيات ERP الذكية للجيل القادم') }}</title>

        <!-- Fonts (match landing page) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <style>
            :root {
                --white: #ffffff;
                --black: rgb(48, 93, 128);
                --gray: #f7f6f4;
                --mid: #9a9690;
                --accent: #988047;
                --font: 'Cairo', sans-serif;
            }

            * { box-sizing: border-box; }

            html, body {
                height: 100%;
                background: var(--white);
                color: var(--black);
                font-family: var(--font);
                -webkit-font-smoothing: antialiased;
                overflow: hidden;
            }

            /* Landing-like background */
            #bgCanvas {
                position: fixed;
                inset: 0;
                z-index: 0;
                pointer-events: none;
            }

            .auth-wrap {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
                background: linear-gradient(180deg, #ffffff 0%, var(--gray) 100%);
                position: relative;
                z-index: 10;
            }

            /* Make Breeze form controls fit landing look */
            .auth-card { --ring: rgba(48, 93, 128, 0.25); }

            .auth-card input[type="text"],
            .auth-card input[type="email"],
            .auth-card input[type="password"],
            .auth-card input[type="checkbox"] {
                font-family: var(--font) !important;
            }

            .auth-card input[type="checkbox"] { accent-color: var(--black); }

            .auth-card .text-sm,
            .auth-card .underline,
            .auth-card a {
                font-family: var(--font) !important;
            }

            .auth-card input[required] {
                background: rgba(255,255,255,0.96);
            }

            /* Active state / focus to match landing */
            .auth-card :is(input:focus-visible) {
                outline: none !important;
                box-shadow: 0 0 0 3px var(--ring) !important;
                border-color: rgba(48, 93, 128, 0.55) !important;
            }

            .auth-card {
                width: 100%;
                max-width: 420px;
                background: rgba(255,255,255,0.92);
                border: 1px solid rgba(0,0,0,0.08);
                box-shadow: 0 12px 30px rgba(0,0,0,0.06);
                border-radius: 14px;
                padding: 1.75rem 1.5rem;
            }

            .auth-brand {
                display: flex;
                align-items: center;
                gap: .9rem;
                justify-content: center;
                margin-bottom: 1.25rem;
            }

            .auth-title {
                text-align: center;
                font-weight: 900;
                letter-spacing: 1px;
                text-transform: uppercase;
                color: var(--black);
                font-size: .95rem;
                margin-bottom: 1rem;
            }

            .auth-subtle {
                text-align: center;
                color: var(--mid);
                font-size: .9rem;
                line-height: 1.6;
                margin-bottom: 1.2rem;
            }

            /* override Breeze button to match landing */
            .auth-card .bg-indigo-600 { background: var(--black) !important; }
            .auth-card .hover\:bg-indigo-700:hover { background: #2a5b85 !important; }
            .auth-card .text-indigo-600 { color: var(--accent) !important; }

            /* Landing canvas animation (mini orcas) */
            @keyframes fadeDown {
                from { opacity: 0; transform: translateY(-14px); }
                to   { opacity: 1; transform: translateY(0); }
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <canvas id="bgCanvas"></canvas>
        <div class="auth-wrap">
            <div class="auth-card">
                <div class="auth-brand">
                    <a href="/" aria-label="Home">
                        <x-application-logo class="w-16 h-16 fill-current" />
                    </a>
                </div>

                <div class="auth-title">URCA</div>
                <div class="auth-subtle">ادخل لحسابك أو أنشئ حساباً جديداً</div>

                {{ $slot }}
            </div>
        </div>

        <script>
            /* ═══════════════════════════════════════════
               CANVAS — mini orcas swimming in bg
            ═══════════════════════════════════════════ */
            (function () {
                const canvas = document.getElementById('bgCanvas');
                const ctx = canvas.getContext('2d');
                if (!canvas || !ctx) return;

                let W = 0, H = 0;

                function resize() {
                    W = canvas.width = window.innerWidth;
                    H = canvas.height = window.innerHeight;
                }
                resize();
                window.addEventListener('resize', resize);

                const DOTS = 40;
                const dots = Array.from({ length: DOTS }, () => ({
                    x: Math.random() * 1,
                    y: Math.random() * 1,
                    r: 0.8 + Math.random() * 2.2,
                    spd: 0.15 + Math.random() * 0.4,
                    opc: 0.06 + Math.random() * 0.5,
                }));

                function drawOrca(size, opacity, flip) {
                    const s = size / 100;
                    ctx.save();
                    if (flip) ctx.scale(-1, 1);
                    ctx.globalAlpha = opacity;

                    // body
                    ctx.beginPath();
                    ctx.moveTo(-50 * s, 5 * s);
                    ctx.bezierCurveTo(-30 * s, -20 * s, 10 * s, -22 * s, 40 * s, 0);
                    ctx.bezierCurveTo(50 * s, 8 * s, 45 * s, 18 * s, 30 * s, 16 * s);
                    ctx.bezierCurveTo(10 * s, 14 * s, -20 * s, 20 * s, -50 * s, 8 * s);
                    ctx.closePath();
                    ctx.fillStyle = 'rgba(10,10,10,1)';
                    ctx.fill();

                    // white belly
                    ctx.beginPath();
                    ctx.moveTo(30 * s, 14 * s);
                    ctx.bezierCurveTo(15 * s, 10 * s, -5 * s, 12 * s, -20 * s, 8 * s);
                    ctx.bezierCurveTo(-5 * s, 16 * s, 15 * s, 19 * s, 30 * s, 16 * s);
                    ctx.closePath();
                    ctx.fillStyle = 'rgba(235,232,226,1)';
                    ctx.fill();

                    // white eye patch
                    ctx.beginPath();
                    ctx.ellipse(22 * s, -5 * s, 7 * s, 4 * s, -0.28, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(235,232,226,1)';
                    ctx.fill();

                    // dorsal fin
                    ctx.beginPath();
                    ctx.moveTo(5 * s, -20 * s);
                    ctx.bezierCurveTo(8 * s, -40 * s, 16 * s, -40 * s, 18 * s, -20 * s);
                    ctx.bezierCurveTo(12 * s, -18 * s, 8 * s, -18 * s, 5 * s, -20 * s);
                    ctx.fillStyle = 'rgba(10,10,10,1)';
                    ctx.fill();

                    // tail fluke top
                    ctx.beginPath();
                    ctx.moveTo(-50 * s, 5 * s);
                    ctx.bezierCurveTo(-58 * s, -2 * s, -68 * s, -8 * s, -60 * s, -16 * s);
                    ctx.bezierCurveTo(-52 * s, -22 * s, -46 * s, -12 * s, -50 * s, 5 * s);
                    ctx.fillStyle = 'rgba(10,10,10,1)';
                    ctx.fill();

                    // tail fluke bottom
                    ctx.beginPath();
                    ctx.moveTo(-50 * s, 8 * s);
                    ctx.bezierCurveTo(-58 * s, 14 * s, -68 * s, 20 * s, -60 * s, 28 * s);
                    ctx.bezierCurveTo(-52 * s, 34 * s, -46 * s, 22 * s, -50 * s, 8 * s);
                    ctx.fillStyle = 'rgba(10,10,10,1)';
                    ctx.fill();

                    ctx.restore();
                }

                function makeWhale(goRight) {
                    const size = 55 + Math.random() * 40;
                    return {
                        x: goRight ? -140 : W + 140,
                        y: H * (0.2 + Math.random() * 0.6),
                        size,
                        goRight,
                        flip: !goRight,
                        vx: (goRight ? 1 : -1) * (0.28 + Math.random() * 0.42),
                        wAmp: 20 + Math.random() * 35,
                        wSpd: 0.018 + Math.random() * 0.022,
                        wOff: Math.random() * Math.PI * 2,
                        tiltMax: 0.14 + Math.random() * 0.1,
                        opc: 0.07 + Math.random() * 0.1,
                        t: 0,
                    };
                }

                const whales = [makeWhale(true), makeWhale(false)];
                whales[0].x = W * 0.05;
                whales[1].x = W * 0.75;

                function draw() {
                    ctx.clearRect(0, 0, W, H);

                    dots.forEach(d => {
                        d.y -= d.spd / H;
                        if (d.y < 0) { d.y = 1; d.x = Math.random(); }
                        ctx.beginPath();
                        ctx.arc(d.x * W, d.y * H, d.r, 0, Math.PI * 2);
                        ctx.fillStyle = `rgba(123, 102, 54,${d.opc})`;
                        ctx.fill();
                    });

                    whales.forEach(w => {
                        w.t += 1;
                        w.x += w.vx;

                        const yWave = Math.sin(w.t * w.wSpd + w.wOff) * w.wAmp;
                        const pitch = Math.cos(w.t * w.wSpd + w.wOff) * w.tiltMax;
                        const wobble = Math.sin(w.t * w.wSpd * 2.3 + w.wOff) * (w.tiltMax * 0.4);

                        ctx.save();
                        ctx.translate(w.x, w.y + yWave);
                        ctx.rotate(pitch + wobble);
                        drawOrca(w.size, w.opc, w.flip);
                        ctx.restore();

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
        </script>
    </body>
</html>

