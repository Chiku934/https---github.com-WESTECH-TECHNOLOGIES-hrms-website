<?php

declare(strict_types=1);

$legacyView = strtolower((string) ($_GET['view'] ?? ''));
if ($legacyView === 'meetings') {
    header('Location: user-performance-meetings.php', true, 302);
    exit;
}
if (in_array($legacyView, ['feedback', 'pip', 'reviews', 'skills', 'competencies'], true)) {
    $map = [
        'feedback' => 'user-performance-feedback.php',
        'pip' => 'user-performance-pip.php',
        'reviews' => 'user-performance-reviews.php',
        'skills' => 'user-performance-skills.php',
        'competencies' => 'user-performance-competencies.php',
    ];
    header('Location: ' . $map[$legacyView], true, 302);
    exit;
}

$title = 'HRMS - Performance';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php', 'active' => true],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];

$subNavItems = [
    ['label' => 'KRAs', 'url' => 'user-performance.php', 'active' => true],
    ['label' => '1:1 Meetings', 'url' => 'user-performance-meetings.php'],
    ['label' => 'Feedback', 'url' => 'user-performance-feedback.php'],
    ['label' => 'PIP', 'url' => 'user-performance-pip.php'],
    ['label' => 'Reviews', 'url' => 'user-performance-reviews.php'],
    ['label' => 'Skills', 'url' => 'user-performance-skills.php'],
    ['label' => 'Competencies & Core values', 'url' => 'user-performance-competencies.php'],
];

$pageContent = <<<'HTML'
<style>
    .perf-page{color:#1f2937}
    .perf-inner-tabs{display:flex;align-items:center;gap:0;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:14px}
    .perf-inner-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap;transition:background-color .15s ease,color .15s ease}
    .perf-inner-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .perf-inner-tab:last-child{border-right:0}
    .perf-section-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 10px}
    .perf-panel{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02)}
    .perf-empty{min-height:210px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;color:#a0a8b7}
    .perf-empty .icon{width:46px;height:46px;border-radius:50%;background:#f4f2fb;color:#b4b6c9;display:flex;align-items:center;justify-content:center;font-size:20px;margin-bottom:10px}
    .perf-empty strong{display:block;color:#334155;font-size:13px;margin-bottom:4px}
    .perf-empty small{font-size:11px;color:#8a94a6;max-width:360px;line-height:1.5}
    .perf-toolbar{display:flex;justify-content:space-between;align-items:center;gap:12px;margin:0 0 12px}
    .perf-kra-tabs{display:flex;align-items:center;gap:8px;margin:0 0 14px}
    .perf-tab-btn{display:inline-flex;align-items:center;justify-content:center;min-width:82px;height:34px;padding:0 12px;border:1px solid #e5eaf2;border-radius:2px;background:#fff;color:#627085;font-size:12px;font-weight:600;text-decoration:none}
    .perf-tab-btn.active{background:#f3eefc;border-color:#b9abef;color:#6b55bc}
    .perf-tab-btn.secondary{min-width:112px}
    .perf-searchbar{display:flex;align-items:center;gap:12px;padding:10px 14px;border:1px solid #e5eaf2;background:#fff;border-radius:2px;margin-bottom:12px}
    .perf-field{display:flex;flex-direction:column;gap:3px;padding-right:14px;border-right:1px solid #eef2f7;min-width:130px}
    .perf-field:last-child{border-right:0;min-width:220px;flex:1}
    .perf-field label{font-size:9px;font-weight:700;color:#8b95a5;text-transform:uppercase;letter-spacing:.05em}
    .perf-field .value{font-size:12px;font-weight:600;color:#334155;display:flex;align-items:center;gap:8px}
    .perf-input{border:0;outline:none;font:inherit;width:100%;background:transparent;color:#334155}
    .perf-toolbar-end{margin-left:auto;display:flex;align-items:center;gap:8px}
    .perf-icon{width:18px;height:18px;display:inline-flex;align-items:center;justify-content:center;color:#b0b8c6}
    .perf-left-rail{width:164px;border:1px solid #e5eaf2;background:#fff;border-radius:2px;overflow:hidden}
    .perf-rail-item{padding:11px 12px;border-bottom:1px solid #eef2f7;font-size:11px;font-weight:700;color:#6f7a8c;display:flex;align-items:center;justify-content:space-between}
    .perf-rail-item:last-child{border-bottom:0}
    .perf-rail-item.active{background:#f7f3ff;color:#5d58a8}
    .perf-layout{display:grid;grid-template-columns:164px 1fr;gap:12px}
    .perf-main-card{min-height:330px;display:flex;align-items:center;justify-content:center;padding:24px}
    .perf-company-card{min-height:330px;display:none;padding:16px}
    .perf-company-card.active{display:block}
    .perf-kra-list{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
    .perf-kra-item{background:#f8fafc;border:1px solid #e5eaf2;border-radius:2px;padding:14px}
    .perf-kra-item strong{display:block;font-size:13px;color:#334155;margin-bottom:4px}
    .perf-kra-item small{font-size:11px;color:#8b95a5;line-height:1.4}
    @media (max-width:1180px){
        .perf-layout{grid-template-columns:1fr}
        .perf-left-rail{width:100%}
        .perf-kra-list{grid-template-columns:1fr}
    }
</style>

<div class="perf-page">
    <div class="perf-inner-tabs" id="perf-main-tabs">
        <a href="#" class="perf-inner-tab active" data-view="kras">My KRAs</a>
        <a href="#" class="perf-inner-tab" data-view="company">Company KRAs</a>
    </div>

    <div id="perf-kras-view" data-perf-view="kras">
        <div class="perf-section-title">My KRAs</div>
        <div class="perf-panel perf-main-card">
            <div class="perf-empty">
                <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
                <strong>Welcome to Keka KRAs!</strong>
                <small>There are no kras available. Add kras to align and track progress.</small>
            </div>
        </div>
    </div>

    <div id="perf-company-view" data-perf-view="company" style="display:none;">
        <div class="perf-section-title">Company KRAs</div>
        <div class="perf-panel perf-company-card active">
            <div class="perf-kra-list">
                <div class="perf-kra-item">
                    <strong>Customer Experience</strong>
                    <small>Improve service response times across all regional support centers.</small>
                </div>
                <div class="perf-kra-item">
                    <strong>Delivery Reliability</strong>
                    <small>Ship planned initiatives on time with fewer escalations.</small>
                </div>
                <div class="perf-kra-item">
                    <strong>Team Capability</strong>
                    <small>Increase completion of learning goals and role-based skills.</small>
                </div>
                <div class="perf-kra-item">
                    <strong>Process Health</strong>
                    <small>Standardize review cycles and reduce stalled approvals.</small>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

$performanceScript = <<<'JS'
    const tabs = Array.from(document.querySelectorAll('#perf-main-tabs .perf-inner-tab'));
    const krasView = document.querySelector('[data-perf-view="kras"]');
    const companyView = document.querySelector('[data-perf-view="company"]');
    tabs.forEach(tab => {
        tab.addEventListener('click', function (event) {
            event.preventDefault();
            const view = tab.dataset.view;
            tabs.forEach(node => node.classList.toggle('active', node === tab));
            if (krasView) krasView.style.display = view === 'kras' ? '' : 'none';
            if (companyView) companyView.style.display = view === 'company' ? '' : 'none';
        });
    });
JS;

include __DIR__ . '/includes/myteam-shell.php';
