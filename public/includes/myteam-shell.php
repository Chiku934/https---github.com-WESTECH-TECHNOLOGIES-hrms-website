<?php

declare(strict_types=1);

$title = $title ?? 'HRMS';
$bodyClass = $bodyClass ?? 'myteam-page';
$moduleNavItems = $moduleNavItems ?? [];
$subNavItems = $subNavItems ?? [];
$pageContent = $pageContent ?? '';
$brandText = $brandText ?? 'TEAMAXIS';
$companyText = $companyText ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/HRMS/public/assets/css/main.css">
    <style>
        body.myteam-page{margin:0;font-family:'Inter',sans-serif;background:#eef2f7;min-height:100vh}
        .myteam-shell{display:flex;min-height:100vh}
        .myteam-main{flex:1;margin-left:260px;background:#f4f6fb;min-width:0}
        .myteam-topbar{height:48px;background:linear-gradient(90deg,#5b46b4 0%,#6a4fc2 55%,#5f45b8 100%);color:#fff;display:flex;align-items:center;justify-content:space-between;gap:18px;padding:0 14px 0 16px;box-shadow:0 2px 12px rgba(41,28,98,.16)}
        .myteam-brand{display:flex;align-items:center;gap:10px;min-width:255px;flex:0 0 auto}
        .myteam-brand-mark{font-weight:800;font-style:italic;letter-spacing:-.7px;font-size:18px;line-height:1}
        .myteam-company{font-size:12px;font-weight:500;opacity:.95;white-space:nowrap}
        .myteam-search{flex:1;max-width:460px;min-width:220px;height:32px;border-radius:999px;background:rgba(255,255,255,.97);display:flex;align-items:center;padding:0 12px;gap:8px;color:#718096;box-shadow:inset 0 0 0 1px rgba(89,67,178,.1)}
        .myteam-search input{border:0;outline:none;background:transparent;width:100%;font:inherit;color:#475569;font-size:12px}
        .myteam-search input::placeholder{color:#8b97a8}
        .myteam-actions{display:flex;align-items:center;gap:14px;flex:0 0 auto}
        .myteam-icon-btn{border:0;background:transparent;color:#fff;font-size:18px;cursor:pointer;padding:0}
        .myteam-avatar{width:26px;height:26px;border-radius:50%;object-fit:cover;border:2px solid rgba(255,255,255,.55)}
        .myteam-module-nav{height:34px;background:#fff;border-bottom:1px solid #e3e8f2;display:flex;align-items:center;padding:0 16px 0 18px;gap:22px;overflow-x:auto;white-space:nowrap}
        .myteam-module-nav a{text-decoration:none;font-size:11px;font-weight:700;color:#7f889a;text-transform:uppercase;letter-spacing:.02em;position:relative;padding:10px 0 9px;flex:0 0 auto}
        .myteam-module-nav a.active{color:#2b2f38}
        .myteam-module-nav a.active::after{content:'';position:absolute;left:50%;bottom:-1px;transform:translateX(-50%);width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:6px solid #6a4fc2}
        .myteam-subnav{height:35px;background:#fff;border-bottom:1px solid #e9edf5;display:flex;align-items:center;padding:0 18px;gap:28px;overflow-x:auto;white-space:nowrap}
        .myteam-subnav a{text-decoration:none;font-size:11px;font-weight:500;color:#5b6678;position:relative;padding:10px 0 9px;flex:0 0 auto}
        .myteam-subnav a.active{color:#22242d}
        .myteam-subnav a.active::after{content:'';position:absolute;left:50%;bottom:-1px;transform:translateX(-50%);width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:6px solid #6a4fc2}
        .myteam-content{padding:12px 16px 24px;color:#1f2937}
        .shell-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:14px}
        .shell-card + .shell-card{margin-top:14px}
        @media (max-width:1180px){
            .myteam-topbar{flex-wrap:wrap;height:auto;padding:12px 14px}
            .myteam-brand{min-width:0}
            .myteam-search{order:3;max-width:none;width:100%;flex-basis:100%}
        }
        @media (max-width:720px){
            .myteam-content{padding:10px}
            .myteam-module-nav,.myteam-subnav{padding-left:10px;padding-right:10px}
        }
    </style>
</head>
<body class="<?= htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') ?>">
    <div class="myteam-shell">
        <?php include __DIR__ . '/../../app/includes/sidebar.php'; ?>
        <div class="myteam-main">
            <?php include __DIR__ . '/../../app/includes/header.php'; ?>

            <main class="myteam-content">
                <?= $pageContent ?>
            </main>
        </div>
    </div>

    <script src="/HRMS/public/assets/js/sidebar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.initSidebarFlyouts) {
                window.initSidebarFlyouts();
            }
        });
    </script>
</body>
</html>
