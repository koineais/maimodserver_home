<?php
declare(strict_types=1);

$serverAddress = 'maimodserver.aternos.me';
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101b16">
    <meta name="description" content="maimodserver (nomod) で、仲間とサバイバルやミニゲームへ。Java・統合版対応、MOD不要。">
    <title>maimodserver | 次の冒険は、ここから。</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;800;900&family=Press+Start+2P&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            --forest: #09130f;
            --forest-light: #13221b;
            --leaf: #a5e65a;
            --mint: #c7f4da;
            --ice: #b9e9f2;
            --paper: #edf0df;
            --ink: #17221b;
            --muted: #a7b2a7;
            --line: rgba(237, 240, 223, .18);
            --glass: rgba(219, 255, 235, .075);
            --glass-strong: rgba(219, 255, 235, .13);
            --glass-edge: rgba(232, 255, 242, .23);
            --pixel: 'Press Start 2P', monospace;
            --display: 'Outfit', 'Noto Sans JP', sans-serif;
            --body: 'Noto Sans JP', sans-serif;
        }
        * { box-sizing: border-box; letter-spacing: 0; }
        html { scroll-behavior: smooth; }
        body { margin: 0; background: radial-gradient(ellipse at 78% 12%, rgba(97, 186, 177, .12), transparent 34%), radial-gradient(ellipse at 12% 42%, rgba(165, 230, 90, .08), transparent 32%), var(--forest); background-attachment: fixed; color: var(--paper); font-family: var(--body); }
        a { color: inherit; }
        button { font: inherit; }
        .pixel { font-family: var(--pixel); font-size: 9px; line-height: 1.8; }
        .wrap { width: min(1160px, calc(100% - 48px)); margin-inline: auto; }
        .topline { min-height: 38px; padding: 9px 24px; background: linear-gradient(90deg, #d8ffac, #c7f4da 52%, #b9e9f2); color: var(--ink); text-align: center; font-size: 11px; font-weight: 800; }
        .nav { position: absolute; z-index: 3; top: 38px; width: 100%; border-bottom: 1px solid rgba(255,255,255,.2); background: rgba(7, 17, 12, .46); box-shadow: 0 12px 36px rgba(0,0,0,.12); backdrop-filter: blur(24px) saturate(165%); -webkit-backdrop-filter: blur(24px) saturate(165%); }
        .nav-inner { min-height: 72px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .brand { display: inline-flex; align-items: center; gap: 11px; text-decoration: none; font-family: var(--display); font-size: 18px; font-weight: 800; }
        .brand-mark { display: grid; width: 35px; aspect-ratio: 1; place-items: center; border: 1px solid rgba(255,255,255,.55); background: linear-gradient(145deg, rgba(216,255,172,.95), rgba(185,233,242,.78)); color: var(--ink); font-family: var(--pixel); font-size: 12px; box-shadow: 0 5px 18px rgba(165,230,90,.18), inset 0 1px 0 white; }
        .nav-links { display: flex; align-items: center; gap: 28px; color: #e2e9df; font-size: 12px; font-weight: 700; }
        .nav-links a { text-decoration: none; }
        .nav-links a:hover { color: var(--leaf); }
        .nav-join { padding: 10px 15px; border: 1px solid rgba(255,255,255,.55); border-radius: 999px; background: linear-gradient(135deg, rgba(216,255,172,.94), rgba(185,233,242,.9)); color: var(--ink) !important; box-shadow: 0 5px 20px rgba(165,230,90,.16), inset 0 1px 0 rgba(255,255,255,.9); }
        .hero { position: relative; min-height: 710px; display: flex; align-items: center; overflow: hidden; background: #18261c; }
        .hero::before { position: absolute; inset: 0; content: ''; background: linear-gradient(90deg, rgba(7,17,12,.88) 0%, rgba(7,17,12,.62) 43%, rgba(7,17,12,.12) 100%), linear-gradient(0deg, var(--forest) 0%, transparent 24%), radial-gradient(ellipse at 75% 38%, rgba(155,235,223,.13), transparent 36%), url('https://images.unsplash.com/photo-1697479670670-d2a299df749c?auto=format&fit=crop&w=2200&q=85') center 48% / cover; }
        .hero::after { position: absolute; inset: 0; content: ''; pointer-events: none; opacity: .13; background-image: linear-gradient(rgba(255,255,255,.12) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.12) 1px, transparent 1px); background-size: 48px 48px; mask-image: linear-gradient(90deg, #000, transparent 78%); }
        .hero-content { position: relative; z-index: 1; width: 100%; padding-top: 100px; padding-bottom: 72px; }
        .hero-copy { position: relative; isolation: isolate; max-width: 690px; padding: 34px 36px 30px; border: 1px solid var(--glass-edge); background: linear-gradient(135deg, rgba(235,255,241,.14), rgba(214,246,238,.045) 54%, rgba(5,15,11,.24)); box-shadow: 0 24px 70px rgba(0,0,0,.25), inset 0 1px 0 rgba(255,255,255,.24); backdrop-filter: blur(24px) saturate(145%); -webkit-backdrop-filter: blur(24px) saturate(145%); animation: rise-in .8s both; }
        .hero-copy::after { position: absolute; z-index: -1; top: 0; left: 10%; width: 52%; height: 1px; content: ''; background: linear-gradient(90deg, transparent, rgba(255,255,255,.78), transparent); }
        .eyebrow { display: flex; align-items: center; gap: 10px; margin: 0 0 22px; color: var(--leaf); text-transform: uppercase; }
        .eyebrow::before { width: 28px; height: 2px; content: ''; background: currentColor; }
        h1 { max-width: 690px; margin: 0; font-family: var(--display); font-size: clamp(46px, 6vw, 76px); font-weight: 800; line-height: 1.06; }
        h1 span { color: var(--leaf); }
        .hero-lead { max-width: 500px; margin: 22px 0 0; color: #e1e8de; font-size: 15px; line-height: 2; }
        .hero-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; margin-top: 32px; }
        .button { min-height: 50px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 0 20px; border: 1px solid transparent; border-radius: 16px; text-decoration: none; font-size: 13px; font-weight: 800; cursor: pointer; transition: transform .18s, background .18s; }
        .button:hover { transform: translateY(-2px); }
        .button-primary { border-color: rgba(255,255,255,.54); background: linear-gradient(135deg, rgba(216,255,172,.96), rgba(185,233,242,.91)); color: var(--ink); box-shadow: 0 10px 28px rgba(165,230,90,.16), inset 0 1px 0 white; }
        .button-quiet { border-color: rgba(255,255,255,.42); border-radius: 999px; background: rgba(228,255,238,.09); color: white; box-shadow: inset 0 1px 0 rgba(255,255,255,.18); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }
        .hero-footnote { margin-top: 18px; color: #cad2c8; font-size: 11px; }
        .hero-stamp { position: absolute; right: 1%; bottom: 16%; color: rgba(255,255,255,.74); text-align: right; text-shadow: 0 2px 15px #000; animation: rise-in .9s .12s both; }
        .hero-stamp strong { display: block; margin-top: 5px; color: var(--leaf); font-family: var(--display); font-size: 15px; }
        .availability { display: inline-flex; align-items: center; gap: 9px; margin-top: 18px; padding: 8px 12px; border: 1px solid rgba(215,255,230,.3); background: rgba(11,26,18,.48); color: #e8ffe0; font-size: 11px; font-weight: 800; }
        .availability-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--leaf); box-shadow: 0 0 12px rgba(165,230,90,.8); }
        .status-band { position: relative; z-index: 2; margin-top: -1px; border-top: 1px solid rgba(255,255,255,.24); border-bottom: 1px solid rgba(255,255,255,.15); background: linear-gradient(110deg, rgba(211,255,173,.14), rgba(179,231,238,.11) 55%, rgba(208,243,223,.08)); color: var(--paper); box-shadow: 0 16px 42px rgba(0,0,0,.12), inset 0 1px 0 rgba(255,255,255,.12); backdrop-filter: blur(28px) saturate(160%); -webkit-backdrop-filter: blur(28px) saturate(160%); }
        .status-inner { min-height: 92px; display: grid; grid-template-columns: 1fr auto auto; align-items: center; gap: 28px; }
        .status-label { display: flex; align-items: center; gap: 11px; font-size: 13px; font-weight: 800; }
        .status-dot { width: 10px; height: 10px; flex: 0 0 auto; border-radius: 50%; background: #6c7b62; box-shadow: 0 0 0 4px rgba(23,34,27,.12); }
        .status-dot.online { background: #a5e65a; box-shadow: 0 0 0 4px rgba(165,230,90,.14), 0 0 18px rgba(165,230,90,.7); }
        .status-dot.offline { background: #ff8f82; box-shadow: 0 0 0 4px rgba(255,143,130,.14); }
        .status-value { font-family: var(--display); font-size: 16px; font-weight: 800; }
        .status-detail { font-size: 11px; font-weight: 600; }
        .status-refresh { margin-left: 6px; padding: 7px 11px; border: 1px solid rgba(255,255,255,.25); background: rgba(255,255,255,.07); color: var(--paper); font-size: 10px; font-weight: 800; cursor: pointer; }
        .status-refresh:hover { background: rgba(255,255,255,.14); }
        .section { padding: 112px 0; }
        .section-head { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin-bottom: 42px; }
        .section-kicker { margin: 0 0 12px; color: #93cd57; }
        h2 { margin: 0; font-family: var(--display); font-size: clamp(30px, 4vw, 44px); line-height: 1.2; }
        .section-intro { max-width: 390px; margin: 0; color: var(--muted); font-size: 13px; line-height: 1.9; }
        .adventures { display: grid; grid-template-columns: 1.25fr 1fr 1fr; gap: 14px; }
        .adventure { min-height: 285px; position: relative; display: flex; flex-direction: column; justify-content: space-between; padding: 28px; border: 1px solid var(--glass-edge); background: linear-gradient(145deg, rgba(229,255,239,.11), rgba(196,233,222,.035) 62%, rgba(8,20,14,.2)); box-shadow: 0 14px 36px rgba(0,0,0,.12), inset 0 1px 0 rgba(255,255,255,.14); overflow: hidden; backdrop-filter: blur(18px) saturate(130%); -webkit-backdrop-filter: blur(18px) saturate(130%); transition: transform .24s, border-color .24s, background .24s; }
        .adventure:hover { transform: translateY(-4px); border-color: rgba(222,255,232,.48); background: linear-gradient(145deg, rgba(229,255,239,.16), rgba(196,233,222,.06) 62%, rgba(8,20,14,.2)); }
        .adventure:first-child { background: linear-gradient(145deg, rgba(165,230,90,.17), rgba(196,233,222,.04) 65%, rgba(8,20,14,.2)); }
        .adventure-index { color: var(--leaf); }
        .adventure-symbol { position: absolute; top: 35px; right: 26px; color: rgba(199,244,218,.16); font-size: 72px; font-weight: 900; line-height: 1; }
        .adventure h3 { max-width: 260px; margin: 0 0 12px; font-size: 20px; }
        .adventure p { max-width: 320px; margin: 0; color: var(--muted); font-size: 12px; line-height: 1.9; }
        .adventure-link { display: inline-flex; align-items: center; gap: 9px; width: fit-content; margin-top: 22px; color: var(--mint); font-size: 11px; font-weight: 800; text-decoration: none; }
        .adventure-link span { color: var(--leaf); font-size: 17px; }
        .challenge { padding: 0 0 108px; }
        .challenge-inner { display: grid; grid-template-columns: .8fr 1.2fr; min-height: 245px; border: 1px solid var(--glass-edge); background: linear-gradient(120deg, rgba(226,255,235,.13), rgba(180,226,226,.06)); color: var(--paper); box-shadow: 0 20px 50px rgba(0,0,0,.16), inset 0 1px 0 rgba(255,255,255,.16); backdrop-filter: blur(22px) saturate(145%); -webkit-backdrop-filter: blur(22px) saturate(145%); }
        .challenge-side { display: flex; flex-direction: column; justify-content: space-between; padding: 30px; border-right: 1px solid rgba(255,255,255,.16); background: linear-gradient(145deg, rgba(165,230,90,.18), rgba(133,218,205,.06)); }
        .challenge-side .pixel { color: var(--leaf); }
        .challenge-side p { margin: 18px 0 0; font-size: 12px; font-weight: 700; line-height: 1.8; }
        .challenge-main { display: flex; flex-direction: column; justify-content: center; padding: 34px 42px; }
        .challenge-main h2 { font-size: 28px; }
        #challenge-text { max-width: 620px; margin: 14px 0 22px; font-size: 17px; font-weight: 700; line-height: 1.7; }
        .challenge-button { width: fit-content; min-height: 42px; padding: 0 14px; border: 1px solid rgba(255,255,255,.27); background: rgba(255,255,255,.06); color: var(--paper); font-size: 11px; font-weight: 800; cursor: pointer; }
        .challenge-button:hover { background: rgba(255,255,255,.13); }
        .join-section { border-block: 1px solid rgba(255,255,255,.12); background: linear-gradient(135deg, rgba(178,227,207,.045), rgba(143,207,206,.09) 52%, rgba(165,230,90,.035)); color: var(--paper); }
        .join-section .section-kicker { color: var(--leaf); }
        .join-section .section-intro { color: var(--muted); }
        .join-steps { display: grid; grid-template-columns: repeat(3, 1fr); border-top: 1px solid var(--line); }
        .join-step { padding: 26px 26px 12px 0; }
        .join-step + .join-step { padding-left: 26px; border-left: 1px solid var(--line); }
        .step-num { display: block; margin-bottom: 26px; color: var(--leaf); }
        .join-step h3 { margin: 0 0 10px; font-size: 16px; }
        .join-step p { max-width: 300px; margin: 0; color: var(--muted); font-size: 12px; line-height: 1.9; }
        .join-ip { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-top: 40px; padding: 16px 18px; border: 1px solid var(--glass-edge); background: linear-gradient(110deg, rgba(231,255,238,.13), rgba(180,226,226,.07)); box-shadow: inset 0 1px 0 rgba(255,255,255,.14); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); }
        .join-ip code { overflow-wrap: anywhere; font-family: ui-monospace, SFMono-Regular, Menlo, monospace; font-size: 14px; font-weight: 800; }
        .join-ip .button { min-height: 42px; white-space: nowrap; }
        .community { padding: 92px 0; border-block: 1px solid rgba(255,255,255,.12); background: linear-gradient(110deg, rgba(165,230,90,.07), rgba(185,233,242,.08), rgba(165,230,90,.035)); }
        .community-inner { display: flex; align-items: center; justify-content: space-between; gap: 32px; }
        .community h2 { font-size: 32px; }
        .community p { max-width: 550px; margin: 12px 0 0; color: var(--muted); font-size: 12px; line-height: 1.9; }
        .board { padding: 96px 0; border-bottom: 1px solid var(--line); background: radial-gradient(ellipse at 85% 20%, rgba(185,233,242,.08), transparent 35%); }
        .board-head { display: flex; align-items: end; justify-content: space-between; gap: 28px; margin-bottom: 28px; }
        .board-actions { display: flex; flex-wrap: wrap; gap: 10px; }
        .board-action { min-height: 42px; display: inline-flex; align-items: center; justify-content: center; padding: 0 15px; border: 1px solid var(--glass-edge); border-radius: 999px; background: var(--glass); color: var(--paper); font-size: 11px; font-weight: 800; text-decoration: none; backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }
        .board-action.primary { background: linear-gradient(135deg, rgba(216,255,172,.96), rgba(185,233,242,.91)); color: var(--ink); }
        .board-list { border-top: 1px solid var(--line); }
        .board-row { display: flex; align-items: center; justify-content: space-between; gap: 20px; min-height: 70px; padding: 15px 4px; border-bottom: 1px solid var(--line); text-decoration: none; transition: padding .2s, background .2s; }
        .board-row:hover { padding-inline: 12px; background: rgba(225,255,237,.055); }
        .board-row-main { min-width: 0; }
        .board-row-title { display: block; overflow-wrap: anywhere; font-size: 13px; font-weight: 700; }
        .board-row-meta { display: block; margin-top: 6px; color: var(--muted); font-size: 10px; }
        .board-row-count { flex: 0 0 auto; color: var(--ice); font-size: 11px; }
        .board-empty { padding: 30px 4px; color: var(--muted); font-size: 12px; line-height: 1.8; }
        .board-note { margin: 14px 0 0; color: var(--muted); font-size: 10px; line-height: 1.8; }
        .faq { padding: 104px 0; }
        .faq-layout { display: grid; grid-template-columns: .7fr 1.3fr; gap: 72px; }
        .faq-list { border-top: 1px solid var(--line); }
        details { border-bottom: 1px solid var(--line); }
        summary { display: flex; justify-content: space-between; gap: 20px; padding: 19px 0; font-size: 13px; font-weight: 700; cursor: pointer; list-style: none; }
        summary::-webkit-details-marker { display: none; }
        summary::after { content: '+'; color: var(--leaf); font-size: 19px; }
        details[open] summary::after { content: '-'; }
        details p { max-width: 640px; margin: 0; padding: 0 30px 20px 0; color: var(--muted); font-size: 12px; line-height: 1.9; }
        footer { padding: 30px 0; border-top: 1px solid var(--line); color: #9aa59a; font-size: 10px; line-height: 1.9; }
        .footer-inner { display: flex; justify-content: space-between; gap: 24px; }
        .toast { position: fixed; z-index: 10; right: 22px; bottom: 22px; padding: 13px 18px; transform: translateY(20px); opacity: 0; border: 1px solid rgba(255,255,255,.5); background: rgba(218,255,188,.88); color: var(--ink); box-shadow: 0 12px 32px rgba(0,0,0,.24), inset 0 1px 0 white; backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); font-size: 12px; font-weight: 800; pointer-events: none; transition: .2s ease; }
        .toast.show { transform: translateY(0); opacity: 1; }
        @keyframes rise-in { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: translateY(0); } }
        @supports not ((backdrop-filter: blur(1px)) or (-webkit-backdrop-filter: blur(1px))) {
            .nav, .hero-copy, .status-band, .adventure, .challenge-inner, .join-ip, .toast { background-color: rgba(12, 27, 19, .94); }
        }
        @media (max-width: 760px) {
            .wrap { width: min(100% - 36px, 560px); }
            .nav { top: 38px; }
            .nav-inner { min-height: 62px; }
            .nav-links { gap: 14px; }
            .nav-links a:not(.nav-join) { display: none; }
            .nav-join { padding: 9px 11px; }
            .hero { min-height: 650px; }
            .hero::before { background-position: 58% center; background-image: linear-gradient(90deg, rgba(7,17,12,.89), rgba(7,17,12,.52)), linear-gradient(0deg, var(--forest) 0%, transparent 30%), url('https://images.unsplash.com/photo-1697479670670-d2a299df749c?auto=format&fit=crop&w=1200&q=80'); }
            .hero-content { padding-top: 95px; }
            .hero-copy { padding: 27px 22px 23px; }
            h1 { font-size: clamp(38px, 12vw, 48px); }
            .hero-lead { font-size: 13px; }
            .hero-stamp { right: 18px; bottom: 55px; }
            .status-inner { min-height: 88px; grid-template-columns: 1fr auto; gap: 6px 14px; padding-block: 14px; }
            .status-label { grid-row: span 2; }
            .status-value { font-size: 14px; text-align: right; }
            .status-detail { text-align: right; }
            .status-refresh { grid-column: 2; justify-self: end; }
            .section { padding: 76px 0; }
            .section-head { display: block; margin-bottom: 28px; }
            .section-intro { margin-top: 16px; }
            .adventures { grid-template-columns: 1fr; }
            .adventure { min-height: 230px; border-right: 0; border-bottom: 1px solid var(--line); }
            .adventure:last-child { border-bottom: 0; }
            .challenge { padding-bottom: 76px; }
            .challenge-inner { grid-template-columns: 1fr; }
            .challenge-side { min-height: 145px; }
            .challenge-main { padding: 28px; }
            .challenge-main h2 { font-size: 24px; }
            #challenge-text { font-size: 15px; }
            .join-steps { grid-template-columns: 1fr; }
            .join-step, .join-step + .join-step { padding: 20px 0; border-left: 0; border-bottom: 1px solid rgba(23,34,27,.22); }
            .step-num { margin-bottom: 14px; }
            .join-ip { align-items: stretch; flex-direction: column; }
            .community-inner { align-items: flex-start; flex-direction: column; }
            .community .button { width: 100%; }
            .board { padding: 76px 0; }
            .board-head { align-items: flex-start; flex-direction: column; }
            .board-actions { width: 100%; }
            .board-action { flex: 1; }
            .board-row { align-items: flex-start; }
            .faq { padding: 76px 0; }
            .faq-layout { grid-template-columns: 1fr; gap: 28px; }
            .footer-inner { flex-direction: column; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>
<body>
    <div class="topline">JAVA & BEDROCK 対応 <span aria-hidden="true">　/　</span> MOD不要 <span aria-hidden="true">　/　</span> はじめてでも歓迎</div>
    <header class="nav">
        <div class="wrap nav-inner">
            <a class="brand" href="#top" aria-label="maimodserver ホーム"><span class="brand-mark">M</span><span>maimodserver</span></a>
            <nav class="nav-links" aria-label="メインメニュー">
                <a href="#play">遊び方</a>
                <a href="#board">掲示板</a>
                <a href="#join">参加方法</a>
                <a href="#faq">FAQ</a>
                <a class="nav-join" href="#join">冒険に参加　↗</a>
            </nav>
        </div>
    </header>

    <main id="top">
        <section class="hero" aria-labelledby="hero-title">
            <div class="wrap hero-content">
                <div class="hero-copy">
                    <p class="eyebrow pixel">YOUR NEXT WORLD</p>
                    <h1 id="hero-title">次の冒険は、<br><span>ここから。</span></h1>
                    <p class="hero-lead">ひとりで始めても、気づけば仲間がいる。サバイバルも、対戦も、思い思いの遊び方で。いつものMinecraftのまま、maimodserverへ。</p>
                    <div class="hero-actions">
                        <button class="button button-primary copy-ip" type="button" data-address="<?= htmlspecialchars($serverAddress, ENT_QUOTES, 'UTF-8') ?>"><span aria-hidden="true">▣</span> IPをコピーして参加</button>
                        <a class="button button-quiet" href="#play">どんなサーバー？　↓</a>
                    </div>
                    <p class="hero-footnote">Java版・統合版対応　/　バニラのまま接続できます</p>
                    <div class="availability"><span class="availability-dot" aria-hidden="true"></span>参加受付中 <span aria-hidden="true">·</span> はじめての人も歓迎</div>
                </div>
                <div class="hero-stamp pixel" aria-hidden="true">OPEN WORLD<strong>MAKE IT YOURS</strong></div>
            </div>
        </section>

        <section class="status-band" id="server-status" aria-label="サーバー状態">
            <div class="wrap status-inner">
                <div class="status-label"><span class="status-dot" id="status-dot"></span><span>リアルタイム接続状態</span></div>
                <div class="status-value" id="status-value" aria-live="polite">接続状態を確認中</div>
                <div class="status-detail"><span id="status-players">人数を取得しています</span> <button class="status-refresh" id="status-refresh" type="button">再確認</button></div>
            </div>
        </section>

        <section class="section" id="play">
            <div class="wrap">
                <div class="section-head">
                    <div><p class="section-kicker pixel">PICK YOUR ADVENTURE</p><h2>今日は、何して遊ぶ？</h2></div>
                    <p class="section-intro">決まった遊び方はありません。自分のペースで世界を広げても、仲間と勝負に出ても。気になる場所から始めよう。</p>
                </div>
                <div class="adventures">
                    <article class="adventure">
                        <span class="adventure-index pixel">WORLD 01 / BUILD</span><span class="adventure-symbol" aria-hidden="true">⌂</span>
                        <div><h3>自分だけの場所をつくる</h3><p>素材を集め、拠点を建てて、少しずつ世界を広げる。仲間と一緒なら、大きな計画も動き出す。</p><a class="adventure-link" href="#join">サバイバルへ <span>↗</span></a></div>
                    </article>
                    <article class="adventure">
                        <span class="adventure-index pixel">ARENA 02 / PLAY</span><span class="adventure-symbol" aria-hidden="true">✦</span>
                        <div><h3>腕試しに、飛び込む</h3><p>PvPやアスレチックで、昨日の自分を超えていこう。短い時間でも遊びやすいミニゲーム。</p><a class="adventure-link" href="#join">アリーナへ <span>↗</span></a></div>
                    </article>
                    <article class="adventure">
                        <span class="adventure-index pixel">NIGHT 03 / BONUS</span><span class="adventure-symbol" aria-hidden="true">☾</span>
                        <div><h3>夜のログインに、お楽しみ</h3><p>夜の時間帯には、いつもの冒険にちょっと嬉しい特典も。遊びに来る理由が、またひとつ。</p><a class="adventure-link" href="#join">今夜遊びに行く <span>↗</span></a></div>
                    </article>
                </div>
            </div>
        </section>

        <section class="board" id="board" aria-labelledby="board-title">
            <div class="wrap">
                <div class="board-head">
                    <div><p class="section-kicker pixel">COMMUNITY BOARD</p><h2 id="board-title">冒険者の掲示板。</h2><p class="section-intro">仲間募集、質問、建築の紹介。サーバーの話題をみんなで共有しよう。</p></div>
                    <div class="board-actions">
                        <a class="board-action" href="https://github.com/koineais/maimodserver_home/discussions" target="_blank" rel="noopener noreferrer">掲示板をすべて見る　↗</a>
                        <a class="board-action primary" href="https://github.com/koineais/maimodserver_home/discussions/new" target="_blank" rel="noopener noreferrer">＋　新しい投稿</a>
                    </div>
                </div>
                <div class="board-list" id="board-list" aria-live="polite"><p class="board-empty" id="board-status">掲示板を読み込んでいます...</p></div>
                <p class="board-note">投稿・コメントにはGitHubアカウントが必要です。サーバーに関係する内容を投稿し、個人情報は書き込まないでください。</p>
            </div>
        </section>

        <section class="challenge" aria-labelledby="challenge-title">
            <div class="wrap challenge-inner">
                <div class="challenge-side"><span class="pixel">QUEST BOARD / TODAY</span><p>スポーンしたら、まずは今日のひとつを。</p></div>
                <div class="challenge-main">
                    <h2 id="challenge-title">今日の小さなクエスト</h2>
                    <p id="challenge-text">仲間に挨拶して、最初の冒険を始めよう。</p>
                    <button class="challenge-button" id="challenge-next" type="button">別のクエストを見る　↻</button>
                </div>
            </div>
        </section>

        <section class="section join-section" id="join">
            <div class="wrap">
                <div class="section-head">
                    <div><p class="section-kicker pixel">HOW TO JOIN</p><h2>参加まで、あと3ステップ。</h2></div>
                    <p class="section-intro">特別なMODや難しい設定は必要ありません。いつものMinecraftから、すぐに合流できます。</p>
                </div>
                <div class="join-steps">
                    <article class="join-step"><span class="step-num pixel">STEP 01</span><h3>Minecraftを起動</h3><p>Java版または統合版を開き、「マルチプレイ」からサーバー追加へ。</p></article>
                    <article class="join-step"><span class="step-num pixel">STEP 02</span><h3>アドレスをコピー</h3><p>下のボタンでサーバーアドレスをコピーして、サーバー欄に貼り付けます。</p></article>
                    <article class="join-step"><span class="step-num pixel">STEP 03</span><h3>接続して冒険開始</h3><p>サーバーに参加したら、まずは挨拶。次の冒険はそこから始まります。</p></article>
                </div>
                <div class="join-ip"><code><?= htmlspecialchars($serverAddress, ENT_QUOTES, 'UTF-8') ?></code><button class="button button-primary copy-ip" type="button" data-address="<?= htmlspecialchars($serverAddress, ENT_QUOTES, 'UTF-8') ?>">▣　アドレスをコピー</button></div>
            </div>
        </section>

        <section class="community">
            <div class="wrap community-inner">
                <div><p class="section-kicker pixel">MEET YOUR CREW</p><h2>冒険仲間を見つけよう。</h2><p>アップデートやメンバー募集、建築の共有はコミュニティ掲示板へ。ゲームに入る前の質問や、遊んだあとの感想も歓迎です。</p></div>
                <a class="button button-primary" href="https://maimodserver.1my.jp/#id109146" target="_blank" rel="noopener noreferrer">コミュニティを見る　↗</a>
            </div>
        </section>

        <section class="faq" id="faq">
            <div class="wrap faq-layout">
                <div><p class="section-kicker pixel">GOOD TO KNOW</p><h2>はじめる前の<br>ちょっとした疑問。</h2></div>
                <div class="faq-list">
                    <details><summary>MODを入れる必要はありますか？</summary><p>いいえ。MODなしの通常のMinecraftから参加できます。</p></details>
                    <details><summary>Java版と統合版、どちらでも遊べますか？</summary><p>Java版・統合版の両方に対応しています。サーバーアドレスは上のボタンでコピーできます。</p></details>
                    <details><summary>対応バージョンは？</summary><p>1.8から新しいバージョンまで幅広く対応しています。接続できない場合は、コミュニティ掲示板で最新情報を確認してください。</p></details>
                    <details><summary>初めてでも大丈夫？</summary><p>もちろんです。まずは参加して挨拶してみてください。ルールを確認し、お互いを尊重して楽しく遊びましょう。</p></details>
                </div>
            </div>
        </section>
    </main>

    <footer><div class="wrap footer-inner"><span>© 2026 maimodserver</span><span>Minecraft is not affiliated with Mojang Studios or Microsoft.</span></div></footer>
    <div class="toast" id="toast" role="status" aria-live="polite">サーバーアドレスをコピーしました</div>
    <script>
        const statusValue = document.getElementById('status-value');
        const statusPlayers = document.getElementById('status-players');
        const statusDot = document.getElementById('status-dot');
        const refreshButton = document.getElementById('status-refresh');

        async function fetchServerStatus() {
            const phpResponse = await fetch('server-status.php', { headers: { Accept: 'application/json' } });
            if (phpResponse.ok) {
                try {
                    const status = await phpResponse.json();
                    if (['online', 'offline', 'unknown'].includes(status.state)) return status;
                } catch {
                    // GitHub Pages cannot execute the PHP endpoint.
                }
            }

            const response = await fetch('https://api.mcsrvstat.us/3/maimodserver.aternos.me');
            if (!response.ok) throw new Error('Status request failed');
            const result = await response.json();
            if (typeof result.online !== 'boolean') throw new Error('Invalid status response');
            return {
                state: result.online ? 'online' : 'offline',
                playersOnline: Math.max(0, Number(result.players?.online) || 0),
                playersMax: Math.max(0, Number(result.players?.max) || 0),
                stale: false
            };
        }

        async function updateStatus() {
            refreshButton.disabled = true;
            statusValue.textContent = '接続状態を確認中';
            try {
                const status = await fetchServerStatus();
                statusDot.classList.toggle('online', status.state === 'online');
                statusDot.classList.toggle('offline', status.state === 'offline');
                if (status.state === 'online') {
                    statusValue.textContent = 'オンライン';
                    statusPlayers.textContent = `${status.playersOnline}人が冒険中${status.playersMax ? ` / 最大 ${status.playersMax}人` : ''}`;
                } else if (status.state === 'offline') {
                    statusValue.textContent = 'いまはおやすみ中';
                    statusPlayers.textContent = '起動状況はコミュニティでも確認できます';
                } else {
                    statusValue.textContent = '状態を取得できません';
                    statusPlayers.textContent = '少し時間をおいて再確認してください';
                }
                if (status.stale) statusPlayers.textContent += ' · 直近の情報';
            } catch {
                statusValue.textContent = '状態を取得できません';
                statusPlayers.textContent = '少し時間をおいて再確認してください';
                statusDot.classList.remove('online', 'offline');
            } finally {
                refreshButton.disabled = false;
            }
        }

        refreshButton.addEventListener('click', updateStatus);
        updateStatus();
        window.setInterval(updateStatus, 120000);

        const boardList = document.getElementById('board-list');
        async function loadBoard() {
            try {
                const response = await fetch('https://api.github.com/repos/koineais/maimodserver_home/discussions?per_page=6', {
                    headers: { Accept: 'application/vnd.github+json' }
                });
                if (!response.ok) throw new Error('Board request failed');
                const discussions = await response.json();
                if (!Array.isArray(discussions)) throw new Error('Invalid board response');
                if (discussions.length === 0) {
                    boardList.replaceChildren();
                    const empty = document.createElement('p');
                    empty.className = 'board-empty';
                    empty.textContent = 'まだ投稿はありません。最初の話題を投稿して、冒険者同士の交流を始めよう。';
                    boardList.append(empty);
                    return;
                }
                boardList.replaceChildren(...discussions.slice(0, 6).map(discussion => {
                    const link = document.createElement('a');
                    link.className = 'board-row';
                    link.href = discussion.html_url;
                    link.target = '_blank';
                    link.rel = 'noopener noreferrer';

                    const main = document.createElement('span');
                    main.className = 'board-row-main';
                    const title = document.createElement('span');
                    title.className = 'board-row-title';
                    title.textContent = discussion.title || 'タイトルなし';
                    const meta = document.createElement('span');
                    meta.className = 'board-row-meta';
                    const date = new Date(discussion.created_at);
                    const dateText = Number.isNaN(date.getTime()) ? '' : new Intl.DateTimeFormat('ja-JP', { dateStyle: 'medium' }).format(date);
                    meta.textContent = `${discussion.category?.name || '掲示板'} · ${discussion.user?.login || 'プレイヤー'}${dateText ? ` · ${dateText}` : ''}`;
                    main.append(title, meta);

                    const count = document.createElement('span');
                    count.className = 'board-row-count';
                    count.textContent = `コメント ${Math.max(0, Number(discussion.comments) || 0)}`;
                    link.append(main, count);
                    return link;
                }));
            } catch {
                boardList.replaceChildren();
                const unavailable = document.createElement('p');
                unavailable.className = 'board-empty';
                unavailable.textContent = '投稿一覧を読み込めませんでした。掲示板を直接開いて最新の話題を確認してください。';
                boardList.append(unavailable);
            }
        }
        loadBoard();

        const toast = document.getElementById('toast');
        let toastTimer;
        document.querySelectorAll('.copy-ip').forEach(button => {
            button.addEventListener('click', async () => {
                const address = button.dataset.address;
                try {
                    await navigator.clipboard.writeText(address);
                } catch {
                    const input = document.createElement('textarea');
                    input.value = address;
                    input.style.position = 'fixed';
                    input.style.opacity = '0';
                    document.body.appendChild(input);
                    input.select();
                    document.execCommand('copy');
                    input.remove();
                }
                toast.classList.add('show');
                window.clearTimeout(toastTimer);
                toastTimer = window.setTimeout(() => toast.classList.remove('show'), 2200);
            });
        });

        const quests = [
            '仲間に挨拶して、最初の冒険を始めよう。',
            'まだ見たことのない場所をひとつ見つけよう。',
            '今日集めた素材で、小さな拠点を作ろう。',
            'アスレチックに挑戦して、自己ベストを更新しよう。',
            '誰かの建築を見に行って、いいところを伝えよう。',
            '次に作りたいものを決めて、必要な素材を集めよう。'
        ];
        let questIndex = Math.floor(Math.random() * quests.length);
        document.getElementById('challenge-text').textContent = quests[questIndex];
        document.getElementById('challenge-next').addEventListener('click', () => {
            questIndex = (questIndex + 1 + Math.floor(Math.random() * (quests.length - 1))) % quests.length;
            document.getElementById('challenge-text').textContent = quests[questIndex];
        });
    </script>
</body>
</html>