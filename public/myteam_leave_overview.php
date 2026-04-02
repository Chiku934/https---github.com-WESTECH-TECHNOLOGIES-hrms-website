<?php

declare(strict_types=1);

$title = 'HRMS - My Team Summary';
$bodyClass = 'myteam-page myteam-summary-page';
$brandText = 'TEAMAXIS';
$companyText = 'Gemini Consulting and Services';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'myteam_leave_overview.php', 'active' => true],
    ['label' => 'Leave', 'url' => 'myteam_leave_direct.php'],
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];

$reportTabs = [
    ['label' => 'Direct Reports', 'url' => 'myteam_leave_direct.php', 'active' => true],
    ['label' => 'Indirect Reports', 'url' => 'myteam_leave_indirect.php'],
    ['label' => 'Peers', 'url' => '#'],
];

$whoIsOffToday = [
    ['name' => 'Animesh Das', 'avatar' => '/HRMS/public/assets/images/avatar1.png'],
    ['name' => 'Kajal Dikhit', 'avatar' => '/HRMS/public/assets/images/avatar2.png'],
];

$notInYetToday = [
    ['name' => 'Kshira...', 'avatar' => '/HRMS/public/assets/images/mamata_guddu_avatar_1774439604744.png'],
    ['name' => 'Radhar...', 'avatar' => '/HRMS/public/assets/images/avatar1.png'],
];

$metricCards = [
    ['label' => 'Employees On Time today', 'value' => '24', 'accent' => 'accent-cyan'],
    ['label' => 'Late Arrivals today', 'value' => '1', 'accent' => 'accent-plum'],
    ['label' => 'Work from Home / On Duty today', 'value' => '1', 'accent' => 'accent-green'],
    ['label' => 'Remote Clock-ins today', 'value' => '0', 'accent' => 'accent-gold'],
];

$calendarDays = [];
$weekdayStart = new DateTimeImmutable('2026-04-01');
for ($day = 1; $day <= 30; $day++) {
    $date = $weekdayStart->modify('+' . ($day - 1) . ' days');
    $calendarDays[] = [
        'day' => $day,
        'weekday' => $date->format('D'),
    ];
}

$calendarRows = [
    [
        'name' => 'Animesh Das',
        'avatar' => '/HRMS/public/assets/images/avatar1.png',
        'days' => [
            2 => 'wfh',
            3 => 'paid',
            4 => 'weekly',
            5 => 'weekly',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
    [
        'name' => 'Bijay Kumar Sahoo',
        'avatar' => '/HRMS/public/assets/images/avatar2.png',
        'days' => [
            2 => 'od',
            3 => 'paid',
            4 => 'weekly',
            5 => 'weekly',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
    [
        'name' => 'Kajal Dikhit',
        'avatar' => '/HRMS/public/assets/images/mamata_guddu_avatar_1774439604744.png',
        'days' => [
            1 => 'wfh',
            2 => 'wfh',
            4 => 'weekly',
            5 => 'weekly',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
    [
        'name' => 'Prajwal Chandra Nayak',
        'avatar' => '/HRMS/public/assets/images/avatar1.png',
        'days' => [
            1 => 'od',
            4 => 'weekly',
            5 => 'weekly',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
    [
        'name' => 'Purushottama Sahoo',
        'avatar' => '/HRMS/public/assets/images/avatar2.png',
        'days' => [
            1 => 'od',
            4 => 'weekly',
            5 => 'weekly',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
    [
        'name' => 'Sanjay Patel',
        'avatar' => '/HRMS/public/assets/images/mamata_guddu_avatar_1774439604744.png',
        'days' => [
            3 => 'paid',
            4 => 'weekly',
            5 => 'weekly',
            6 => 'paid',
            7 => 'wfh',
            11 => 'weekly',
            12 => 'weekly',
            18 => 'weekly',
            19 => 'weekly',
            25 => 'weekly',
            26 => 'weekly',
        ],
    ],
];

$legendItems = [
    ['label' => 'Work from home', 'class' => 'legend-wfh'],
    ['label' => 'On duty', 'class' => 'legend-od'],
    ['label' => 'Paid Leave', 'class' => 'legend-paid'],
    ['label' => 'Unpaid Leave', 'class' => 'legend-unpaid'],
    ['label' => 'Leave due to No Attendance', 'class' => 'legend-noatt'],
    ['label' => 'Weekly off', 'class' => 'legend-weekly'],
    ['label' => 'Holiday', 'class' => 'legend-holiday'],
    ['label' => 'Someone on Leave', 'class' => 'legend-leave'],
    ['label' => 'Multiple Leave on a day', 'class' => 'legend-multi'],
    ['label' => 'Someone on WFH/OD', 'class' => 'legend-wfhod'],
];

ob_start();
?>
<style>
    .summary-toolbar{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:6px 0 18px;flex-wrap:wrap}
    .summary-group-btn{display:inline-flex;align-items:center;gap:10px;height:34px;padding:0 14px;border:1px solid #c7b8ef;border-radius:3px;background:#f8f5ff;color:#4f3c9a;font-size:12px;font-weight:600;text-decoration:none;box-shadow:inset 0 0 0 1px rgba(79,60,154,.04)}
    .report-tabs{display:flex;align-items:center;flex-wrap:wrap}
    .report-tabs a{display:inline-flex;align-items:center;height:34px;padding:0 16px;border:1px solid #e5eaf2;background:#fff;color:#4b5563;font-size:12px;text-decoration:none}
    .report-tabs a + a{margin-left:-1px}
    .report-tabs a.active{background:#f7f3ff;color:#4f3c9a;border-color:#d9d0f2}

    .summary-top-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}
    .status-card,.metric-card,.calendar-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02)}
    .status-card{padding:16px 18px 14px;min-height:134px}
    .status-card h2{margin:0 0 14px;font-size:15px;font-weight:500;color:#2b3340}
    .avatar-strip{display:flex;flex-wrap:wrap;gap:20px;align-items:flex-start}
    .avatar-chip{display:flex;flex-direction:column;align-items:flex-start;gap:6px;min-width:58px}
    .avatar-chip img{width:34px;height:34px;border-radius:50%;object-fit:cover;border:2px solid #edf1f7;box-shadow:0 1px 1px rgba(15,23,42,.06)}
    .avatar-chip span{max-width:54px;font-size:10px;color:#2f3640;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}

    .metric-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:12px;margin-top:18px}
    .metric-card{display:flex;flex-direction:column;gap:10px;padding:16px 18px 14px;min-height:112px;position:relative;overflow:hidden}
    .metric-card::before{content:'';position:absolute;left:0;top:14px;bottom:14px;width:4px;border-radius:999px}
    .accent-cyan::before{background:#62c4d7}
    .accent-plum::before{background:#cf8ed1}
    .accent-green::before{background:#a6bf44}
    .accent-gold::before{background:#f0bf2e}
    .metric-label{font-size:12px;color:#2b3340;padding-left:8px}
    .metric-value{font-size:30px;line-height:1;font-weight:700;color:#111827;padding-left:8px}
    .metric-link{margin-top:auto;font-size:12px;color:#7166b8;text-decoration:none;align-self:flex-end}

    .calendar-card{margin-top:18px;padding:16px 16px 14px}
    .calendar-header{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:10px;flex-wrap:wrap}
    .calendar-title{font-size:15px;font-weight:500;color:#2b3340}
    .calendar-nav{display:inline-flex;align-items:center;gap:10px}
    .calendar-nav-btn{width:22px;height:22px;border:0;border-radius:2px;background:#6d4dc1;color:#fff;font-size:11px;display:inline-flex;align-items:center;justify-content:center}
    .calendar-month{font-size:12px;color:#374151;font-weight:500}

    .calendar-scroll{overflow-x:auto}
    .calendar-grid{min-width:1120px}
    .calendar-columns{display:grid;grid-template-columns:240px repeat(30,minmax(26px,1fr));align-items:stretch}
    .calendar-head{padding:0 0 10px;border-bottom:1px solid #eef2f7}
    .calendar-head .calendar-name-spacer{height:1px}
    .calendar-day{display:flex;flex-direction:column;align-items:center;justify-content:flex-end;gap:2px;font-size:10px;color:#40495a;padding-bottom:2px}
    .calendar-day span{font-size:12px;font-weight:500;color:#5f6777}
    .calendar-rows{display:flex;flex-direction:column}
    .calendar-row{display:grid;grid-template-columns:240px repeat(30,minmax(26px,1fr));align-items:center;min-height:34px}
    .calendar-employee{display:flex;align-items:center;gap:8px;padding:8px 10px 8px 0;color:#2b3340;font-size:12px}
    .calendar-employee img{width:22px;height:22px;border-radius:50%;object-fit:cover;flex:0 0 auto}
    .calendar-employee span{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .calendar-cell{display:flex;align-items:center;justify-content:center;height:24px;margin:4px 1px;border-radius:999px;font-size:11px;color:#7a8494;background:transparent}
    .calendar-cell.is-wfh{background:#74c6d7;color:#fff}
    .calendar-cell.is-od{background:#d278c7;color:#fff}
    .calendar-cell.is-paid{background:#63c9d4;color:#fff}
    .calendar-cell.is-unpaid{background:#cfc0a3;color:#fff}
    .calendar-cell.is-noatt{background:#f0a0a0;color:#fff}
    .calendar-cell.is-weekly{background:#f3c13f;color:#fff}
    .calendar-cell.is-holiday{background:#a9c93f;color:#fff}
    .calendar-cell.is-leave{background:#7fc6e8;color:#fff}
    .calendar-cell.is-multi{background:#ed7f7f;color:#fff}
    .calendar-cell.is-wfhod{background:#9d87d7;color:#fff}
    .calendar-legend{display:flex;flex-wrap:wrap;gap:18px;align-items:center;justify-content:center;border-top:1px solid #eef2f7;margin-top:10px;padding-top:12px}
    .legend-item{display:inline-flex;align-items:center;gap:6px;font-size:10px;color:#7b8393;white-space:nowrap}
    .legend-dot{width:10px;height:10px;border-radius:50%}
    .legend-wfh{background:#9d87d7}
    .legend-od{background:#cf7cc9}
    .legend-paid{background:#62c4d7}
    .legend-unpaid{background:#c9be96}
    .legend-noatt{background:#ee8888}
    .legend-weekly{background:#f4c44f}
    .legend-holiday{background:#a8c83d}
    .legend-leave{background:#62a1e8}
    .legend-multi{background:#ef7f7f}
    .legend-wfhod{background:#8e6cc7}

    @media (max-width:1180px){
        .summary-top-grid,.metric-grid{grid-template-columns:1fr 1fr}
    }
    @media (max-width:860px){
        .summary-top-grid,.metric-grid{grid-template-columns:1fr}
        .summary-toolbar{align-items:flex-start}
        .report-tabs{width:100%}
        .report-tabs a{flex:1 1 33%}
    }
    @media (max-width:720px){
        .calendar-card{padding:12px}
        .calendar-grid{min-width:980px}
    }
</style>

<div class="summary-toolbar">
    <a class="summary-group-btn" href="#">
        Digital Services In... <i class="fa-solid fa-caret-down"></i>
    </a>
    <div class="report-tabs" aria-label="Report scope">
        <?php foreach ($reportTabs as $tab): ?>
            <a href="<?= htmlspecialchars($tab['url'], ENT_QUOTES, 'UTF-8') ?>" class="<?= !empty($tab['active']) ? 'active' : '' ?>">
                <?= htmlspecialchars($tab['label'], ENT_QUOTES, 'UTF-8') ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<section class="summary-top-grid" aria-label="Today status summary">
    <article class="status-card">
        <h2>Who is off today</h2>
        <div class="avatar-strip">
            <?php foreach ($whoIsOffToday as $person): ?>
                <div class="avatar-chip">
                    <img src="<?= htmlspecialchars($person['avatar'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8') ?>">
                    <span><?= htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </article>

    <article class="status-card">
        <h2>Not in yet today</h2>
        <div class="avatar-strip">
            <?php foreach ($notInYetToday as $person): ?>
                <div class="avatar-chip">
                    <img src="<?= htmlspecialchars($person['avatar'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8') ?>">
                    <span><?= htmlspecialchars($person['name'], ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
</section>

<section class="metric-grid" aria-label="Attendance summary cards">
    <?php foreach ($metricCards as $metric): ?>
        <article class="metric-card <?= htmlspecialchars($metric['accent'], ENT_QUOTES, 'UTF-8') ?>">
            <div class="metric-label"><?= htmlspecialchars($metric['label'], ENT_QUOTES, 'UTF-8') ?></div>
            <div class="metric-value"><?= htmlspecialchars($metric['value'], ENT_QUOTES, 'UTF-8') ?></div>
            <a class="metric-link" href="#">View Employees</a>
        </article>
    <?php endforeach; ?>
</section>

<section class="calendar-card" aria-label="Team calendar">
    <div class="calendar-header">
        <div class="calendar-title">Team calendar</div>
        <div class="calendar-nav">
            <button type="button" class="calendar-nav-btn" aria-label="Previous month"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="calendar-month">Apr 2026</div>
            <button type="button" class="calendar-nav-btn" aria-label="Next month"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="calendar-scroll">
        <div class="calendar-grid">
            <div class="calendar-columns calendar-head" aria-hidden="true">
                <div class="calendar-name-spacer"></div>
                <?php foreach ($calendarDays as $day): ?>
                    <div class="calendar-day">
                        <small><?= htmlspecialchars(substr($day['weekday'], 0, 2), ENT_QUOTES, 'UTF-8') ?></small>
                        <span><?= (int) $day['day'] ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="calendar-rows">
                <?php foreach ($calendarRows as $row): ?>
                    <div class="calendar-row">
                        <div class="calendar-employee">
                            <img src="<?= htmlspecialchars($row['avatar'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>">
                            <span><?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <?php foreach ($calendarDays as $day): ?>
                            <?php $status = $row['days'][$day['day']] ?? null; ?>
                            <div class="calendar-cell<?= $status ? ' is-' . htmlspecialchars($status, ENT_QUOTES, 'UTF-8') : '' ?>">
                                <?= (int) $day['day'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="calendar-legend" aria-label="Calendar legend">
        <?php foreach ($legendItems as $legend): ?>
            <span class="legend-item">
                <span class="legend-dot <?= htmlspecialchars($legend['class'], ENT_QUOTES, 'UTF-8') ?>"></span>
                <?= htmlspecialchars($legend['label'], ENT_QUOTES, 'UTF-8') ?>
            </span>
        <?php endforeach; ?>
    </div>
</section>
<?php
$pageContent = ob_get_clean();

include __DIR__ . '/includes/myteam-shell.php';
