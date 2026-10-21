<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#09090a">
    <meta name="description" content="The portfolio of Jovic Manalastas, an Information Technology student and aspiring developer.">
    <title>Jovic Manalastas — Portfolio</title>
    <style>
        @property --glow-x { syntax: "<percentage>"; inherits: true; initial-value: 12%; }
        @property --glow-y { syntax: "<percentage>"; inherits: true; initial-value: 10%; }
        @property --glow-color { syntax: "<color>"; inherits: true; initial-value: rgba(132, 12, 28, .27); }

        :root {
            color-scheme: dark;
            --bg: #09090a;
            --panel: #101012;
            --panel-soft: #141416;
            --text: #f6f5f4;
            --muted: #a3a0a0;
            --dim: #727071;
            --line: rgba(255, 255, 255, .105);
            --red: #ed111d;
            --red-light: #ff2935;
            --max-width: 1240px;
            --glow-x: 12%;
            --glow-y: 10%;
            --glow-color: rgba(132, 12, 28, .27);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 88px; }
        body {
            margin: 0;
            background-color: #08090c;
            background-image: radial-gradient(ellipse at var(--glow-x) var(--glow-y), var(--glow-color), transparent 38%), radial-gradient(ellipse at 83% 23%, rgba(61, 79, 116, .13), transparent 31%), radial-gradient(ellipse at 76% 75%, rgba(108, 13, 28, .14), transparent 34%), linear-gradient(rgba(255,255,255,.022) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.022) 1px, transparent 1px);
            background-size: 100% 900px, 100% 1100px, 100% 1400px, 48px 48px, 48px 48px;
            background-repeat: no-repeat, no-repeat, no-repeat, repeat, repeat;
            background-attachment: fixed, fixed, fixed, scroll, scroll;
            color: var(--text);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            -webkit-font-smoothing: antialiased;
            animation: site-load .72s ease-out both;
            transition: --glow-x .9s cubic-bezier(.2,.75,.25,1), --glow-y .9s cubic-bezier(.2,.75,.25,1), --glow-color .9s ease;
        }
        body[data-section="projects"] { --glow-x: 78%; --glow-y: 22%; --glow-color: rgba(105, 14, 31, .24); }
        body[data-section="about"] { --glow-x: 24%; --glow-y: 68%; --glow-color: rgba(58, 73, 112, .19); }
        body[data-section="contact"] { --glow-x: 83%; --glow-y: 78%; --glow-color: rgba(132, 12, 28, .25); }
        @keyframes site-load { from { opacity: 0; } to { opacity: 1; } }
        @keyframes header-arrive { from { opacity: 0; transform: translateY(-18px); backdrop-filter: blur(0); } to { opacity: 1; transform: translateY(0); backdrop-filter: blur(22px); } }
        @keyframes section-arrive { from { opacity: 0; transform: translateY(30px) scale(.986); filter: blur(6px); } 72% { opacity: 1; filter: blur(0); } to { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); } }
        @keyframes content-arrive { from { opacity: 0; transform: translateY(20px); filter: blur(5px); } to { opacity: 1; transform: translateY(0); filter: blur(0); } }
        a { color: inherit; text-decoration: none; }
        button { font: inherit; }
        .visually-hidden { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0; }
        .shell { width: min(var(--max-width), calc(100% - 88px)); margin-inline: auto; }
        .site-header {
            position: sticky;
            z-index: 10;
            top: 0;
            height: 72px;
            border-bottom: 1px solid rgba(255,255,255,.07);
            background: rgba(14,14,17,.62);
            backdrop-filter: blur(22px) saturate(145%);
            -webkit-backdrop-filter: blur(22px) saturate(145%);
            box-shadow: 0 8px 32px rgba(0,0,0,.18);
            animation: header-arrive .8s cubic-bezier(.2,.75,.25,1) both;
        }
        .header-inner { height: 100%; display: flex; align-items: center; justify-content: space-between; }
        .site-header .header-inner { width: calc(100% - 48px); max-width: none; }
        .brand { font-size: 25px; font-weight: 850; letter-spacing: -.08em; }
        .brand span { color: var(--red); }
        .nav { position: relative; display: flex; align-items: center; gap: 36px; height: 100%; --indicator-left: 0px; --indicator-width: 0px; }
        .nav::after { position: absolute; bottom: 17px; left: 0; width: var(--indicator-width); height: 2px; border-radius: 99px; background: var(--red); box-shadow: 0 0 12px rgba(237,17,29,.55); content: ""; pointer-events: none; transform: translateX(var(--indicator-left)); transition: transform .48s cubic-bezier(.2,.8,.2,1), width .36s cubic-bezier(.2,.8,.2,1); }
        .nav a { position: relative; display: grid; align-items: center; height: 100%; color: #c5c2c2; font-size: 14px; transition: color .2s ease; }
        .nav a::after { position: absolute; right: 0; bottom: 17px; left: 0; height: 2px; background: var(--red); content: ""; transform: scaleX(0); transform-origin: left; transition: transform .2s ease; }
        .nav a:hover, .nav a:focus-visible, .nav a[aria-current="page"] { color: #fff; }
        .menu-toggle { display: none; border: 1px solid var(--line); background: transparent; color: white; border-radius: 9px; width: 42px; height: 42px; cursor: pointer; }

        .hero {
            position: relative;
            display: flex;
            align-items: center;
            min-height: min(780px, calc(100svh - 72px));
            padding-block: 58px;
            overflow: hidden;
            isolation: isolate;
        }
        .hero::before, .hero::after { position: absolute; z-index: -1; pointer-events: none; content: ""; }
        .hero::before { inset: 0; width: 100%; background: radial-gradient(ellipse at 18% 32%, rgba(137,12,29,.2), transparent 43%), radial-gradient(ellipse at 75% 54%, rgba(255,255,255,.045), transparent 38%); }
        .hero::after { top: 0; right: -25%; width: 56%; height: 100%; background: radial-gradient(ellipse, rgba(84,8,13,.12), transparent 66%); }
        .hero-grid { display: grid; grid-template-columns: minmax(0, 1.25fr) minmax(380px, .75fr); gap: clamp(40px, 5vw, 72px); align-items: center; }
        .hero-copy { max-width: 720px; margin-left: clamp(0px, 2vw, 30px); }
        .eyebrow { display: inline-block; margin-bottom: 16px; color: var(--red-light); font-size: 11px; font-weight: 800; letter-spacing: .17em; text-transform: uppercase; }
        .hero-copy h1 { max-width: 800px; margin: 0; font-size: clamp(58px, 5.1vw, 98px); font-weight: 780; line-height: .96; letter-spacing: -.075em; }
        .hero-copy h1 span { color: var(--red); }
        .hero-role { margin: 22px 0 0; color: #e4e1e1; font-size: clamp(22px, 1.7vw, 26px); line-height: 1.45; letter-spacing: -.035em; }
        .hero-description { max-width: 620px; margin: 18px 0 0; color: var(--muted); font-size: 15px; line-height: 1.8; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 11px; margin-top: 25px; }
        .button-quiet { background: rgba(255,255,255,.035); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .quick-facts { display: flex; gap: 34px; max-width: 560px; margin-top: 35px; padding-top: 21px; border-top: 1px solid var(--line); }
        .fact { display: grid; gap: 5px; }
        .fact strong { color: #e8e5e5; font-size: 14px; }
        .fact span { color: var(--muted); font-size: 12px; }
        .button { display: inline-flex; align-items: center; justify-content: center; min-height: 50px; padding: 0 22px; border: 1px solid var(--line); border-radius: 12px; font-size: 14px; font-weight: 700; transition: transform .2s ease, border-color .2s ease, background .2s ease; }
        .button:hover { transform: translateY(-2px); }
        .button-primary { border-color: var(--red); background: var(--red); box-shadow: 0 8px 30px rgba(237,17,29,.16); }
        .button-primary:hover { border-color: var(--red-light); background: var(--red-light); }
        .portrait-wrap { position: relative; justify-self: center; width: min(100%, 390px); height: 590px; perspective: 1100px; transform: translateY(clamp(-140px, calc(76px - 22vh), -58px)); --card-x: 0px; --card-y: 0px; --tilt-x: 0deg; --tilt-y: 0deg; --swing: 0deg; --strap-swing: 0deg; --lanyard-length: 148px; }
        .lanyard { position: absolute; z-index: 1; top: 0; left: 50%; display: flex; flex-direction: column; align-items: center; width: 38px; height: var(--lanyard-length, 148px); overflow: hidden; border-right: 1px solid rgba(255,255,255,.13); border-left: 1px solid rgba(255,255,255,.13); border-radius: 0 0 8px 8px; background: linear-gradient(90deg, #080809, #1c1c1e 48%, #09090a); box-shadow: 0 8px 20px rgba(0,0,0,.4); transform: translateX(-50%) rotate(var(--strap-swing)); transform-origin: top center; transition: height .2s ease-out, transform .2s ease-out; }
        .lanyard span { color: rgba(255,255,255,.9); font-size: 8px; font-weight: 850; letter-spacing: .14em; line-height: 1; writing-mode: vertical-rl; transform: rotate(180deg); }
        .lanyard span + span { margin-top: 26px; }
        .badge-hook { position: absolute; z-index: 2; top: 134px; left: 50%; width: 48px; height: 25px; border: 3px solid #a8a9ac; border-bottom: 0; border-radius: 18px 18px 0 0; filter: drop-shadow(0 3px 2px rgba(0,0,0,.4)); transform: translate3d(calc(-50% + var(--card-x)), var(--card-y), 0) rotate(var(--swing)); transform-origin: top center; transition: transform .2s ease-out; }
        .portrait-frame { position: absolute; z-index: 3; top: 148px; left: 50%; width: clamp(240px, 22vw, 290px); height: auto; aspect-ratio: .724; padding: 8px; overflow: hidden; border: 1px solid rgba(255,255,255,.88); border-radius: 14px; background: linear-gradient(145deg, rgba(255,255,255,.94), rgba(216,219,222,.86)); box-shadow: 0 28px 70px rgba(0,0,0,.55), 0 0 40px rgba(255,255,255,.08); transform: translate3d(calc(-50% + var(--card-x)), var(--card-y), 0) rotateX(var(--tilt-y)) rotateY(var(--tilt-x)) rotateZ(var(--swing)); transform-style: preserve-3d; transition: transform .18s cubic-bezier(.2,.8,.2,1); will-change: transform; cursor: grab; touch-action: none; user-select: none; }
        .portrait-wrap.is-dragging .portrait-frame { cursor: grabbing; }
        .portrait-wrap.is-moving .portrait-frame, .portrait-wrap.is-moving .lanyard, .portrait-wrap.is-moving .badge-hook { transition: none; }
        .portrait-art { position: relative; width: 100%; height: 100%; overflow: hidden; border-radius: 7px; background: #161719; }
        .portrait-art::before { position: absolute; z-index: 1; inset: 0; pointer-events: none; background: linear-gradient(145deg, rgba(255,255,255,.12), transparent 30%, rgba(0,0,0,.4)); content: ""; }
        .portrait-photo { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: 5% center; filter: grayscale(1) contrast(1.13) brightness(.92); transform: scale(1.9); pointer-events: none; }

        .section { padding-block: 106px; border-top: 1px solid rgba(255,255,255,.06); }
        .hero.is-entering > .shell, .section.is-entering > .shell { animation: section-arrive 1.08s cubic-bezier(.2,.75,.25,1) both; }
        .hero.is-entering .hero-copy > *, .section.is-entering .section-heading > *, .section.is-entering .about-grid > *, .section.is-entering .contact-panel > * { animation: content-arrive .62s cubic-bezier(.2,.75,.25,1) both; }
        .hero.is-entering .hero-copy > :nth-child(1), .section.is-entering .section-heading > :nth-child(1), .section.is-entering .about-grid > :nth-child(1), .section.is-entering .contact-panel > :nth-child(1) { animation-delay: .08s; }
        .hero.is-entering .hero-copy > :nth-child(2), .section.is-entering .section-heading > :nth-child(2), .section.is-entering .about-grid > :nth-child(2), .section.is-entering .contact-panel > :nth-child(2) { animation-delay: .16s; }
        .hero.is-entering .hero-copy > :nth-child(3) { animation-delay: .23s; }
        .hero.is-entering .hero-copy > :nth-child(4) { animation-delay: .3s; }
        .hero.is-entering .hero-copy > :nth-child(5) { animation-delay: .37s; }
        .hero.is-entering .hero-copy > :nth-child(6) { animation-delay: .44s; }
        .section.is-entering .project-card { animation: content-arrive .66s cubic-bezier(.2,.75,.25,1) both; }
        .section.is-entering .project-card:nth-child(1) { animation-delay: .13s; }
        .section.is-entering .project-card:nth-child(2) { animation-delay: .23s; }
        .section.is-entering .project-card:nth-child(3) { animation-delay: .33s; }
        .section-heading { display: flex; align-items: end; justify-content: space-between; gap: 32px; margin-bottom: 38px; }
        .section-kicker { display: block; margin-bottom: 13px; color: var(--red-light); font-size: 10px; font-weight: 750; letter-spacing: .17em; text-transform: uppercase; }
        h2 { margin: 0; font-size: clamp(34px, 4.4vw, 52px); line-height: 1.04; letter-spacing: -.06em; }
        .section-intro { max-width: 410px; margin: 0; color: var(--muted); font-size: 13px; line-height: 1.8; }
        .project-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        .project-card { min-height: 285px; padding: 22px; border: 1px solid rgba(255,255,255,.13); border-radius: 19px; background: linear-gradient(150deg, rgba(255,255,255,.095), rgba(255,255,255,.035) 58%, rgba(237,17,29,.04)); backdrop-filter: blur(20px) saturate(135%); -webkit-backdrop-filter: blur(20px) saturate(135%); box-shadow: inset 0 1px 0 rgba(255,255,255,.08), 0 18px 45px rgba(0,0,0,.18); transition: transform .25s ease, border-color .25s ease; }
        .project-card:hover { transform: translateY(-5px); border-color: rgba(237,17,29,.42); }
        .project-top { display: flex; align-items: center; justify-content: space-between; color: var(--dim); font-size: 10px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
        .project-mark { display: grid; place-items: center; width: 48px; height: 48px; margin-top: 40px; border: 1px solid rgba(237,17,29,.22); border-radius: 14px; background: rgba(237,17,29,.08); color: var(--red-light); font-size: 15px; font-weight: 800; }
        .project-card h3 { margin: 20px 0 8px; font-size: 20px; letter-spacing: -.04em; }
        .project-card p { max-width: 330px; margin: 0; color: var(--muted); font-size: 12px; line-height: 1.75; }
        .project-link { display: inline-flex; gap: 7px; align-items: center; margin-top: 19px; color: #ddd; font-size: 11px; font-weight: 700; }
        .project-link span { color: var(--red-light); transition: transform .2s ease; }
        .project-link:hover span { transform: translateX(4px); }

        .about-grid { display: grid; grid-template-columns: .8fr 1.2fr; gap: 9%; align-items: start; }
        .about-copy { max-width: 640px; color: var(--muted); font-size: 14px; line-height: 1.9; }
        .about-copy p { margin: 0 0 17px; }
        .focus-list { display: flex; flex-wrap: wrap; gap: 9px; margin-top: 26px; }
        .focus-list span { padding: 9px 12px; border: 1px solid var(--line); border-radius: 999px; background: rgba(255,255,255,.025); color: #d6d3d3; font-size: 11px; }
        .contact-panel { position: relative; display: flex; align-items: center; justify-content: space-between; gap: 32px; padding: clamp(28px, 5vw, 54px); overflow: hidden; border: 1px solid rgba(255,255,255,.15); border-radius: 24px; background: radial-gradient(ellipse at 100% 20%, rgba(237,17,29,.18), transparent 46%), linear-gradient(145deg, rgba(255,255,255,.09), rgba(255,255,255,.035)); backdrop-filter: blur(22px) saturate(135%); -webkit-backdrop-filter: blur(22px) saturate(135%); box-shadow: inset 0 1px 0 rgba(255,255,255,.09), 0 22px 60px rgba(0,0,0,.2); }
        .contact-panel::after { position: absolute; right: 11%; bottom: -96px; width: 190px; height: 190px; border: 1px solid rgba(237,17,29,.22); border-radius: 50%; box-shadow: 0 0 0 22px rgba(237,17,29,.025), 0 0 0 44px rgba(237,17,29,.018); content: ""; }
        .contact-panel h2 { max-width: 580px; }
        .contact-panel p { margin: 15px 0 0; color: var(--muted); font-size: 13px; line-height: 1.75; }
        .contact-panel .button { position: relative; z-index: 1; flex: 0 0 auto; }
        .contact-links { position: relative; z-index: 1; display: grid; gap: 9px; width: min(100%, 340px); flex: 0 0 auto; }
        .contact-link { display: flex; align-items: center; justify-content: space-between; gap: 20px; padding: 12px 15px; border: 1px solid var(--line); border-radius: 12px; background: rgba(10,10,12,.32); color: #eee; font-size: 13px; transition: transform .22s ease, border-color .22s ease, background .22s ease; }
        .contact-link::after { color: var(--red-light); content: "↗"; }
        .contact-link:hover { transform: translateX(4px); border-color: rgba(237,17,29,.42); background: rgba(255,255,255,.055); }
        .contact-link span { color: var(--muted); }
        .contact-link strong { font-size: 13px; font-weight: 650; }
        .site-footer { padding-block: 24px; border-top: 1px solid rgba(255,255,255,.07); color: var(--dim); font-size: 11px; }
        .footer-inner { display: flex; align-items: center; justify-content: space-between; gap: 18px; }
        .footer-brand { color: var(--text); font-size: 16px; font-weight: 850; letter-spacing: -.08em; }
        .footer-brand span { color: var(--red); }

        @media (max-width: 900px) {
            .shell { width: min(100% - 48px, 720px); }
            .site-header .header-inner { width: calc(100% - 48px); }
            .hero { min-height: min(780px, calc(100svh - 72px)); padding-block: 48px; }
            .hero-grid { grid-template-columns: minmax(0, 1fr) minmax(250px, .78fr); gap: 28px; }
            .hero-copy { margin-left: 0; }
            .hero-copy h1 { font-size: clamp(52px, 7.2vw, 68px); }
            .hero-role { font-size: clamp(18px, 2vw, 22px); }
            .portrait-wrap { width: min(100%, 350px); }
            .portrait-wrap { transform: translateY(clamp(-116px, calc(78px - 22vh), -48px)); }
            .portrait-frame { width: clamp(220px, 29vw, 260px); }
            .section { padding-block: 82px; }
            .project-grid { grid-template-columns: 1fr 1fr; }
            .project-card:last-child { grid-column: 1 / -1; min-height: 235px; }
        }
        @media (min-width: 901px) and (max-width: 1100px) {
            .hero-grid { grid-template-columns: minmax(0, 1fr) minmax(300px, .72fr); gap: 32px; }
            .hero-copy { margin-left: 0; }
            .hero-copy h1 { font-size: clamp(54px, 5.5vw, 62px); }
        }
        @media (max-width: 640px) {
            html { scroll-padding-top: 72px; }
            .shell { width: calc(100% - 40px); }
            .site-header .header-inner { width: calc(100% - 40px); }
            .site-header { height: 64px; }
            .menu-toggle { display: grid; place-items: center; }
            .menu-toggle svg { width: 19px; height: 19px; }
            .nav { position: absolute; top: 63px; right: 0; left: 0; display: none; height: auto; padding: 8px 20px 16px; border-bottom: 1px solid rgba(255,255,255,.12); background: rgba(12,12,15,.78); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); }
            .nav::after { display: none; }
            .nav.is-open { display: grid; gap: 0; }
            .nav a { min-height: 45px; }
            .nav a::after { right: auto; bottom: 7px; width: 28px; }
            .nav a[aria-current="page"]::after { transform: scaleX(1); }
            .hero { min-height: auto; padding-block: 58px 46px; }
            .hero-grid { grid-template-columns: 1fr; gap: 28px; }
            .hero-copy { max-width: 560px; }
            .hero-copy h1 { font-size: clamp(52px, 14vw, 72px); }
            .hero-role { margin-top: 17px; }
            .hero-description { margin-top: 14px; }
            .quick-facts { gap: 24px; margin-top: 27px; }
            .portrait-wrap { width: min(100%, 340px); height: 500px; transform: none; }
            .portrait-frame { top: 148px; width: min(70vw, 230px); }
            .badge-hook { top: 134px; }
            .lanyard { height: 148px; }
            .section { padding-block: 72px; }
            .section-heading { display: block; margin-bottom: 27px; }
            .section-intro { margin-top: 16px; }
            .project-grid { grid-template-columns: 1fr; }
            .project-card, .project-card:last-child { grid-column: auto; min-height: 255px; }
            .about-grid { grid-template-columns: 1fr; gap: 25px; }
            .contact-panel { display: block; padding: 30px 24px; }
            .contact-panel .button { margin-top: 24px; }
            .contact-links { width: 100%; margin-top: 24px; }
            .footer-inner { align-items: flex-start; flex-direction: column; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; }
            body { animation: none; transition: none; }
            .site-header { animation: none; }
            .portrait-frame, .lanyard { transform: translateX(-50%); }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="shell header-inner">
            <a class="brand" href="#home" aria-label="Jovic Manalastas home">JOVIC<span>.</span></a>
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="primary-nav">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
            <nav class="nav" id="primary-nav" aria-label="Main navigation">
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="shell hero-grid">
                <div class="hero-copy">
                    <span class="eyebrow">Hello, I'm</span>
                    <h1>Jovic <span>Manalastas</span></h1>
                    <p class="hero-role">Information Technology Student &amp; Aspiring Developer</p>
                    <p class="hero-description">I enjoy learning by building simple, useful projects. I’m also exploring video and photo editing while continuing to grow my skills in web development and software design.</p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="#projects">View My Projects</a>
                        <a class="button button-quiet" href="#contact">Contact Me</a>
                    </div>
                    <div class="quick-facts" aria-label="Areas of focus">
                        <div class="fact"><strong>BSIT</strong><span>Student</span></div>
                        <div class="fact"><strong>Web</strong><span>Development</span></div>
                        <div class="fact"><strong>UI</strong><span>Focused</span></div>
                    </div>
                </div>

                <div class="portrait-wrap">
                    <div class="lanyard" aria-hidden="true"><span>BS CARD</span><span>BS CARD</span></div>
                    <div class="badge-hook" aria-hidden="true"></div>
                    <div class="portrait-frame">
                        <div class="portrait-art">
                            <img class="portrait-photo" src="{{ asset('images/profile.jpg') }}" alt="Portrait of Jovic Manalastas" draggable="false">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="projects">
            <div class="shell">
                <div class="section-heading">
                    <div><span class="section-kicker">Selected work</span><h2>Projects in progress.</h2></div>
                    <p class="section-intro">A space for the projects you’re proud of. Add a short story about the goal, what you built, and the tools you used.</p>
                </div>
                <div class="project-grid">
                    <article class="project-card">
                        <div class="project-top"><span>Project 01</span><span>01 / 03</span></div>
                        <div class="project-mark" aria-hidden="true">01</div>
                        <h3>Your featured project</h3>
                        <p>Replace this with a concise description of a project and the problem it solves.</p>
                        <a class="project-link" href="#contact">Add project details <span aria-hidden="true">↗</span></a>
                    </article>
                    <article class="project-card">
                        <div class="project-top"><span>Project 02</span><span>02 / 03</span></div>
                        <div class="project-mark" aria-hidden="true">02</div>
                        <h3>A system you built</h3>
                        <p>Share what you contributed, the key features, and what you learned along the way.</p>
                        <a class="project-link" href="#contact">Add project details <span aria-hidden="true">↗</span></a>
                    </article>
                    <article class="project-card">
                        <div class="project-top"><span>Project 03</span><span>03 / 03</span></div>
                        <div class="project-mark" aria-hidden="true">03</div>
                        <h3>A design you explored</h3>
                        <p>Showcase a web, software, or UI design project with a link to see more.</p>
                        <a class="project-link" href="#contact">Add project details <span aria-hidden="true">↗</span></a>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="about">
            <div class="shell about-grid">
                <div><span class="section-kicker">A little about me</span><h2>Curious about<br>how things work.</h2></div>
                <div class="about-copy">
                    <p>I’m Jovic Manalastas, an Information Technology student and aspiring developer. I enjoy making technology feel clear and useful, from the way a system works to the way a person moves through its interface.</p>
                    <p>I’m continuing to grow through hands-on practice in programming, web development, and software design, with a focus on building thoughtful experiences.</p>
                    <div class="focus-list" aria-label="Areas of focus"><span>Programming</span><span>Web development</span><span>UI-focused design</span></div>
                </div>
            </div>
        </section>

        <section class="section" id="contact">
            <div class="shell">
                <div class="contact-panel">
                    <div><span class="section-kicker">Contact</span><h2>Have something in mind?<br>Let’s talk.</h2><p>Feel free to reach out about projects, editing, or collaboration.</p></div>
                    <div class="contact-links" aria-label="Contact links">
                        <a class="contact-link" href="https://www.facebook.com/search/top/?q=Jovic%20Manalastas" target="_blank" rel="noopener noreferrer"><span>Facebook</span><strong>Jovic Manalastas</strong></a>
                        <a class="contact-link" href="https://www.instagram.com/cxxjjo/" target="_blank" rel="noopener noreferrer"><span>Instagram</span><strong>@cxxjjo</strong></a>
                        <a class="contact-link" href="mailto:jovicmanalastas24@gmail.com"><span>Email</span><strong>jovicmanalastas24@gmail.com</strong></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="shell footer-inner"><a class="footer-brand" href="#home">JOVIC<span>.</span></a><span>© {{ date('Y') }} Jovic Manalastas. </span><a href="#home">Back to top ↑</a></div>
    </footer>

    <script>
        const menuButton = document.querySelector('.menu-toggle');
        const primaryNav = document.querySelector('#primary-nav');

        function updateNavIndicator() {
            const activeLink = primaryNav.querySelector('a[aria-current="page"]');
            const navRect = primaryNav.getBoundingClientRect();
            if (!activeLink || (window.innerWidth <= 640 && !primaryNav.classList.contains('is-open'))) {
                primaryNav.style.setProperty('--indicator-width', '0px');
                return;
            }

            const linkRect = activeLink.getBoundingClientRect();
            primaryNav.style.setProperty('--indicator-left', `${linkRect.left - navRect.left}px`);
            primaryNav.style.setProperty('--indicator-width', `${linkRect.width}px`);
        }

        menuButton.addEventListener('click', () => {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            menuButton.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
            primaryNav.classList.toggle('is-open', !isOpen);
            window.requestAnimationFrame(updateNavIndicator);
        });

        primaryNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                menuButton.setAttribute('aria-expanded', 'false');
                menuButton.setAttribute('aria-label', 'Open navigation');
                primaryNav.classList.remove('is-open');
            });
        });

        const trackedSections = [...primaryNav.querySelectorAll('a[href^="#"]')]
            .map((link) => ({ link, section: document.querySelector(link.getAttribute('href')) }))
            .filter((item) => item.section);
        const sectionAnimationHandlers = new WeakMap();
        let activeSectionId = null;
        let navUpdateFrame = null;

        function setActiveSection(section) {
            if (!section || section.id === activeSectionId) return;
            activeSectionId = section.id;
            document.body.dataset.section = section.id;

            trackedSections.forEach(({ link, section: target }) => {
                if (target === section) link.setAttribute('aria-current', 'page');
                else link.removeAttribute('aria-current');
            });
            window.requestAnimationFrame(updateNavIndicator);

            const content = section.firstElementChild;
            const previousHandler = sectionAnimationHandlers.get(section);
            if (previousHandler && content) content.removeEventListener('animationend', previousHandler);
            if (!content) return;

            section.classList.remove('is-entering');
            void content.offsetWidth;
            section.classList.add('is-entering');
            const finishTransition = (event) => {
                if (event.target !== content) return;
                section.classList.remove('is-entering');
                content.removeEventListener('animationend', finishTransition);
                sectionAnimationHandlers.delete(section);
            };
            sectionAnimationHandlers.set(section, finishTransition);
            content.addEventListener('animationend', finishTransition);
        }

        function updateActiveSection() {
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const marker = window.scrollY + headerHeight + (window.innerHeight - headerHeight) * .5;
            let activeSection = trackedSections[0]?.section;

            trackedSections.forEach(({ section }) => {
                const top = section.getBoundingClientRect().top + window.scrollY;
                if (top <= marker) activeSection = section;
            });

            if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 2) {
                activeSection = trackedSections.at(-1)?.section ?? activeSection;
            }

            setActiveSection(activeSection);
        }

        function scheduleActiveSectionUpdate() {
            if (navUpdateFrame !== null) return;
            navUpdateFrame = window.requestAnimationFrame(() => {
                navUpdateFrame = null;
                updateActiveSection();
            });
        }

        window.addEventListener('scroll', scheduleActiveSectionUpdate, { passive: true });
        window.addEventListener('resize', scheduleActiveSectionUpdate);
        window.addEventListener('resize', updateNavIndicator);
        window.addEventListener('hashchange', scheduleActiveSectionUpdate);
        window.addEventListener('pageshow', scheduleActiveSectionUpdate);
        updateActiveSection();

        const portraitWrap = document.querySelector('.portrait-wrap');
        const portraitFrame = portraitWrap?.querySelector('.portrait-frame');
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        let dragStart = null;
        let cardOffsetX = 0;
        let cardOffsetY = 0;
        let badgeVelocityX = 0;
        let badgeVelocityY = 0;
        let badgeTargetX = 0;
        let badgeTargetY = 0;
        let springFrame = null;
        let previousFrameTime = 0;

        const clamp = (value, min, max) => Math.max(min, Math.min(max, value));

        function placeBadge(x, y, tiltX = 0, tiltY = 0, swing = 0) {
            cardOffsetX = x;
            cardOffsetY = y;
            portraitWrap.style.setProperty('--card-x', `${x}px`);
            portraitWrap.style.setProperty('--card-y', `${y}px`);
            portraitWrap.style.setProperty('--tilt-x', `${tiltX}deg`);
            portraitWrap.style.setProperty('--tilt-y', `${tiltY}deg`);
            portraitWrap.style.setProperty('--swing', `${swing}deg`);
            const strapRise = 148 + y;
            portraitWrap.style.setProperty('--lanyard-length', `${Math.hypot(x, strapRise)}px`);
            portraitWrap.style.setProperty('--strap-swing', `${-Math.atan2(x, strapRise) * 180 / Math.PI}deg`);
        }

        function animateBadge(timestamp) {
            if (!previousFrameTime) previousFrameTime = timestamp;
            const delta = Math.min((timestamp - previousFrameTime) / 1000, .032);
            previousFrameTime = timestamp;

            const stiffness = 82;
            const damping = 13;
            badgeVelocityX += ((badgeTargetX - cardOffsetX) * stiffness - badgeVelocityX * damping) * delta;
            badgeVelocityY += ((badgeTargetY - cardOffsetY) * stiffness - badgeVelocityY * damping) * delta;

            const x = cardOffsetX + badgeVelocityX * delta;
            const y = cardOffsetY + badgeVelocityY * delta;
            const tiltX = clamp(-badgeVelocityY * .003, -3, 3);
            const tiltY = clamp(badgeVelocityX * .002, -3, 3);
            const swing = clamp(x * .022 + badgeVelocityX * .004, -7, 7);
            placeBadge(x, y, tiltX, tiltY, swing);

            const settled = Math.abs(badgeTargetX - cardOffsetX) < .15
                && Math.abs(badgeTargetY - cardOffsetY) < .15
                && Math.abs(badgeVelocityX) < .2
                && Math.abs(badgeVelocityY) < .2;

            if (settled) {
                placeBadge(badgeTargetX, badgeTargetY);
                badgeVelocityX = 0;
                badgeVelocityY = 0;
                springFrame = null;
                previousFrameTime = 0;
                portraitWrap.classList.remove('is-moving');
                return;
            }

            springFrame = window.requestAnimationFrame(animateBadge);
        }

        function springBadgeTo(x, y) {
            badgeTargetX = x;
            badgeTargetY = y;
            portraitWrap.classList.add('is-moving');
            if (springFrame === null) {
                previousFrameTime = 0;
                springFrame = window.requestAnimationFrame(animateBadge);
            }
        }

        if (portraitWrap && portraitFrame && !reduceMotion) {
            portraitFrame.addEventListener('pointerdown', (event) => {
                if (event.button !== 0 && event.pointerType === 'mouse') return;
                event.preventDefault();
                if (springFrame !== null) window.cancelAnimationFrame(springFrame);
                springFrame = null;
                previousFrameTime = 0;
                badgeTargetX = cardOffsetX;
                badgeTargetY = cardOffsetY;
                badgeVelocityX = 0;
                badgeVelocityY = 0;
                portraitWrap.classList.add('is-dragging', 'is-moving');
                dragStart = {
                    x: event.clientX,
                    y: event.clientY,
                    cardX: cardOffsetX,
                    cardY: cardOffsetY,
                    lastX: cardOffsetX,
                    lastY: cardOffsetY,
                    lastTime: performance.now(),
                };
                portraitFrame.setPointerCapture(event.pointerId);
            });

            portraitWrap.addEventListener('pointermove', (event) => {
                if (dragStart) {
                    const now = performance.now();
                    const x = clamp(dragStart.cardX + event.clientX - dragStart.x, -125, 125);
                    const y = clamp(dragStart.cardY + event.clientY - dragStart.y, -35, 55);
                    const elapsed = Math.max((now - dragStart.lastTime) / 1000, .001);
                    const nextVelocityX = clamp((x - dragStart.lastX) / elapsed, -650, 650);
                    const nextVelocityY = clamp((y - dragStart.lastY) / elapsed, -500, 500);
                    badgeVelocityX = badgeVelocityX * .28 + nextVelocityX * .72;
                    badgeVelocityY = badgeVelocityY * .28 + nextVelocityY * .72;
                    dragStart.lastX = x;
                    dragStart.lastY = y;
                    dragStart.lastTime = now;
                    placeBadge(x, y, clamp(-badgeVelocityY * .003, -3, 3), clamp(badgeVelocityX * .002, -3, 3), clamp(x * .022 + badgeVelocityX * .004, -7, 7));
                    return;
                }

                const bounds = portraitWrap.getBoundingClientRect();
                const x = ((event.clientX - bounds.left) / bounds.width - .5) * 2;
                const y = ((event.clientY - bounds.top) / bounds.height - .5) * 2;
                springBadgeTo(x * 18, y * 9);
            });

            const releaseBadge = () => {
                if (!dragStart) return;
                dragStart = null;
                portraitWrap.classList.remove('is-dragging');
                badgeVelocityX *= .42;
                badgeVelocityY *= .42;
                springBadgeTo(0, 0);
            };

            portraitFrame.addEventListener('pointerup', releaseBadge);
            portraitFrame.addEventListener('pointercancel', releaseBadge);
            portraitFrame.addEventListener('lostpointercapture', releaseBadge);
            portraitWrap.addEventListener('pointerleave', () => {
                if (dragStart) return;
                springBadgeTo(0, 0);
            });
        }
    </script>
</body>
</html>
