<?php

declare(strict_types=1);

$title = $title ?? 'HRMS';
$brandText = $brandText ?? 'TEAMAXIS';
$companyText = $companyText ?? '';
$moduleNavItems = $moduleNavItems ?? [];
$subNavItems = $subNavItems ?? [];
?>
<div class="myteam-topbar">
    <div class="myteam-brand">
        <div class="myteam-brand-mark"><?= htmlspecialchars($brandText, ENT_QUOTES, 'UTF-8') ?></div>
        <div class="myteam-company"><?= htmlspecialchars($companyText, ENT_QUOTES, 'UTF-8') ?></div>
    </div>
    <div class="myteam-search">
        <i class="fa-solid fa-magnifying-glass" style="font-size:12px"></i>
        <input type="text" placeholder="Search employees or action (Ex: Apply Leave)" aria-label="Search">
        <span style="font-size:9px;font-weight:700;color:#686d7d;background:#f1edf9;padding:3px 6px;border-radius:8px">Alt + K</span>
    </div>
    <div class="myteam-actions">
        <button class="myteam-icon-btn" aria-label="Notifications"><i class="fa-regular fa-bell"></i></button>
        <img src="/HRMS/public/assets/images/mamata_guddu_avatar_1774439604744.png" alt="User avatar" class="myteam-avatar">
    </div>
</div>

<?php if (!empty($moduleNavItems)): ?>
    <nav class="myteam-module-nav" aria-label="Primary navigation">
        <?php foreach ($moduleNavItems as $item): ?>
            <a href="<?= htmlspecialchars((string) ($item['url'] ?? '#'), ENT_QUOTES, 'UTF-8') ?>" class="<?= !empty($item['active']) ? 'active' : '' ?>">
                <?= htmlspecialchars((string) ($item['label'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
            </a>
        <?php endforeach; ?>
    </nav>
<?php endif; ?>

<?php if (!empty($subNavItems)): ?>
    <nav class="myteam-subnav" aria-label="Sub navigation">
        <?php foreach ($subNavItems as $item): ?>
            <a href="<?= htmlspecialchars((string) ($item['url'] ?? '#'), ENT_QUOTES, 'UTF-8') ?>" class="<?= !empty($item['active']) ? 'active' : '' ?>">
                <?= htmlspecialchars((string) ($item['label'] ?? ''), ENT_QUOTES, 'UTF-8') ?>
            </a>
        <?php endforeach; ?>
    </nav>
<?php endif; ?>
