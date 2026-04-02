<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

$title = 'HRMS - My Team Leave Indirect Reports';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Summary', 'url' => 'dashboard.php'],
    ['label' => 'Leave', 'url' => '#', 'active' => true],
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Profile Changes', 'url' => '#'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Hiring', 'url' => '#'],
];
$subNavItems = [
    ['label' => 'Leave Overview', 'url' => 'myteam_leave_overview.php'],
    ['label' => 'Leave Approvals', 'url' => 'myteam_leave_approvals.php'],
    ['label' => 'Penalized Leave', 'url' => '#'],
    ['label' => 'Past Leave Requests', 'url' => '#'],
    ['label' => 'Encashment Requests', 'url' => '#'],
    ['label' => 'Reports', 'url' => '#'],
];
?>
    <title>HRMS - My Team Leave Indirect Reports</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/HRMS/public/assets/css/main.css">
    <style>
        body.myteam-page{margin:0;font-family:'Inter',sans-serif;background:#eef2f7;min-height:100vh}
        .myteam-shell{display:flex;min-height:100vh}
        .myteam-main{flex:1;margin-left:150px;background:#f4f6fb;min-width:0}
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
        .myteam-filter-row{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:4px 0 12px}
        .team-group-btn{display:inline-flex;align-items:center;gap:10px;border:1px solid #c6b6ef;background:#f8f5ff;color:#4f3c9a;border-radius:2px;padding:8px 12px;font-size:12px;font-weight:600;box-shadow:inset 0 0 0 1px rgba(79,60,154,.08)}
        .team-view-tabs{display:flex;align-items:center}
        .team-view-tabs a{display:inline-flex;align-items:center;height:32px;border:1px solid #e5eaf2;background:#fff;padding:0 14px;font-size:12px;color:#4b5563;cursor:pointer;text-decoration:none}
        .team-view-tabs a.active{background:#f7f3ff;color:#4a4f8f;border-color:#d9d2f3}
        .team-view-tabs a+a{margin-left:-1px}
        .trend-card,.mini-card,.balance-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02)}
        .trend-card{padding:14px 14px 18px}
        .trend-header{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:16px}
        .trend-title{font-size:14px;font-weight:500;color:#2b3340}
        .trend-range{display:flex;align-items:center;gap:12px;font-size:11px;color:#4b5563}
        .trend-kebab{color:#9aa3b2}
        .trend-stats{display:grid;grid-template-columns:repeat(9,minmax(0,1fr));gap:12px;padding:12px 2px 14px;border-top:1px solid #eef2f7;border-bottom:1px solid #eef2f7}
        .trend-stat .label{font-size:9px;font-weight:700;color:#98a1b0;text-transform:uppercase;letter-spacing:.04em;margin-bottom:4px}
        .trend-stat .value{font-size:12px;font-weight:700;color:#2b3340}
        .chart-wrap{padding:16px 4px 6px}
        .chart-legend{display:flex;flex-wrap:wrap;gap:16px;justify-content:center;margin-top:12px;font-size:10px;color:#7c8493}
        .legend-item{display:inline-flex;align-items:center;gap:6px}
        .legend-dot{width:10px;height:10px;border-radius:50%;border:1px solid currentColor;opacity:.9}
        .mini-card-row{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:14px}
        .mini-card{padding:14px}
        .mini-card-header{display:flex;align-items:center;justify-content:space-between;font-size:12px;color:#2b3340;margin-bottom:16px}
        .mini-card-range{font-size:11px;color:#4b5563}
        .person-row{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:10px 0}
        .person-left{display:flex;align-items:center;gap:10px;min-width:0}
        .person-avatar{width:28px;height:28px;border-radius:50%;object-fit:cover;flex:0 0 auto}
        .person-name{font-size:12px;font-weight:500;color:#2b3340;line-height:1.2}
        .person-role{font-size:10px;color:#8a93a3;line-height:1.2}
        .person-right{font-size:11px;color:#4b5563;text-align:right;line-height:1.35;white-space:nowrap}
        .balance-card{margin-top:14px;padding:12px 0 0}
        .balance-header{display:flex;align-items:center;justify-content:space-between;padding:0 14px 12px}
        .balance-title{font-size:13px;font-weight:500;color:#2b3340}
        .balance-search{width:180px;height:30px;border:1px solid #e5eaf2;border-radius:2px;padding:0 10px;font-size:11px;color:#4b5563}
        .balance-table-wrap{overflow-x:auto}
        .balance-table{width:100%;border-collapse:collapse;min-width:1320px;table-layout:fixed}
        .balance-table thead th{background:#f3f5f8;color:#6e7685;font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;padding:10px 10px;text-align:left;border-bottom:1px solid #edf1f6}
        .balance-table tbody td{padding:14px 10px;border-bottom:1px solid #f0f2f6;font-size:11px;color:#2f3640;vertical-align:top;line-height:1.35}
        .employee-name{font-weight:500;color:#5b4dc3}
        .employee-role{font-size:9px;color:#97a1af;margin-top:4px}
        .muted{color:#8892a3}
        @media (max-width:1180px){.myteam-topbar{flex-wrap:wrap;height:auto;padding:12px 14px}.myteam-brand{min-width:0}.myteam-search{order:3;max-width:none;width:100%;flex-basis:100%}.trend-stats{grid-template-columns:repeat(3,minmax(0,1fr))}.mini-card-row{grid-template-columns:1fr}}
        @media (max-width:720px){.myteam-content{padding:10px}.myteam-module-nav,.myteam-subnav{padding-left:10px;padding-right:10px}.myteam-filter-row{flex-direction:column;align-items:flex-start}.balance-search{width:100%}}
    </style>
</head>
<body class="myteam-page">
    <div class="myteam-shell">
        <?php include __DIR__ . '/../app/includes/sidebar.php'; ?>
        <div class="myteam-main">
            <?php include __DIR__ . '/../app/includes/header.php'; ?>
            <main class="myteam-content">
                <div class="myteam-filter-row">
                    <a class="team-group-btn" href="myteam_leave_digital_services.php">Digital Services In... <i class="fa-solid fa-caret-down"></i></a>
                    <div class="team-view-tabs" aria-label="Report scope">
                        <a href="myteam_leave_direct.php">Direct Reports</a>
                        <a href="myteam_leave_indirect.php" class="active">Indirect Reports</a>
                    </div>
                </div>
                <section class="trend-card">
                    <div class="trend-header">
                        <div class="trend-title">Leave Consumption Trend</div>
                        <div class="trend-range"><span>24 Mar 2026 - 30 Mar 2026</span><i class="fa-solid fa-ellipsis-vertical trend-kebab"></i></div>
                    </div>
                    <div class="trend-stats">
                        <div class="trend-stat"><div class="label">Total Sick Leave</div><div class="value">6 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Earned Leave</div><div class="value">4.5 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Unpaid Leave</div><div class="value">0 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Optional Leave</div><div class="value">0 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Special Leave</div><div class="value">0 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Casual Leave</div><div class="value">2 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Comp Offs</div><div class="value">0 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Client Leave</div><div class="value">0 Leave</div></div>
                        <div class="trend-stat"><div class="label">Total Natural Disaster/ Curfew</div><div class="value">0 Leave</div></div>
                    </div>
                    <div class="chart-wrap">
                        <svg viewBox="0 0 1200 320" width="100%" height="320" aria-label="Leave consumption chart">
                            <g stroke="#eef2f7" stroke-width="1">
                                <line x1="60" y1="40" x2="1160" y2="40"></line>
                                <line x1="60" y1="84" x2="1160" y2="84"></line>
                                <line x1="60" y1="128" x2="1160" y2="128"></line>
                                <line x1="60" y1="172" x2="1160" y2="172"></line>
                                <line x1="60" y1="216" x2="1160" y2="216"></line>
                                <line x1="60" y1="260" x2="1160" y2="260"></line>
                            </g>
                            <g fill="#a4aab7" font-size="10" font-family="Inter, sans-serif">
                                <text x="20" y="266">0</text><text x="20" y="222">0.5</text><text x="20" y="178">1</text><text x="20" y="134">1.5</text><text x="20" y="90">2</text><text x="20" y="46">3</text>
                                <text x="58" y="292">24 Mar</text><text x="590" y="292">27 Mar</text><text x="1118" y="292">30 Mar</text>
                            </g>
                            <g fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="60,216 240,260 420,216 600,172 780,260 960,260 1160,216" stroke="#4cc5ce"></polyline>
                                <polyline points="60,172 240,260 420,84 600,84 780,260 960,260 1160,172" stroke="#7875c7"></polyline>
                                <polyline points="60,172 240,260 420,216 600,84 780,260 960,260 1160,172" stroke="#c19adf"></polyline>
                                <polyline points="60,260 240,260 420,260 600,216 780,260 960,260 1160,260" stroke="#f0c84a"></polyline>
                            </g>
                            <g fill="#fff" stroke-width="2">
                                <circle cx="60" cy="216" r="4" stroke="#4cc5ce"></circle><circle cx="600" cy="172" r="4" stroke="#4cc5ce"></circle><circle cx="1160" cy="216" r="4" stroke="#4cc5ce"></circle>
                                <circle cx="60" cy="172" r="4" stroke="#7875c7"></circle><circle cx="420" cy="84" r="4" stroke="#7875c7"></circle><circle cx="600" cy="84" r="4" stroke="#7875c7"></circle><circle cx="1160" cy="172" r="4" stroke="#7875c7"></circle>
                                <circle cx="60" cy="172" r="4" stroke="#c19adf"></circle><circle cx="600" cy="84" r="4" stroke="#c19adf"></circle><circle cx="1160" cy="172" r="4" stroke="#c19adf"></circle>
                                <circle cx="600" cy="216" r="4" stroke="#f0c84a"></circle>
                            </g>
                        </svg>
                        <div class="chart-legend">
                            <span class="legend-item"><span class="legend-dot" style="color:#7875c7"></span> Sick Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#4cc5ce"></span> Earned Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#f3a4a4"></span> Unpaid Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#f0c84a"></span> Optional Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#a9d3c2"></span> Special Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#c19adf"></span> Casual Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#9ed7e5"></span> Comp Offs</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#8c8fd7"></span> Client Leave</span>
                            <span class="legend-item"><span class="legend-dot" style="color:#6dd1d1"></span> Natural Disaster/ Curfew</span>
                        </div>
                    </div>
                </section>
                <div class="mini-card-row">
                    <section class="mini-card">
                        <div class="mini-card-header"><div>Unplanned Leave</div><div class="mini-card-range">24 Mar 2026 - 30 Mar 2026 <i class="fa-solid fa-ellipsis-vertical muted"></i></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Manisha Sahoo</div><div class="person-role">Associate Software Engineer</div></div></div><div class="person-right">2 Instances<br><span class="muted">a day ago</span></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Bikram Behera</div><div class="person-role">Associate Software Engineer</div></div></div><div class="person-right">2 Instances<br><span class="muted">a day ago</span></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Sonalika Nayak</div><div class="person-role">Associate Software Engineer</div></div></div><div class="person-right">2 Instances<br><span class="muted">4 days ago</span></div></div>
                    </section>
                    <section class="mini-card">
                        <div class="mini-card-header"><div>No Leave Taken</div><div class="mini-card-range">24 Mar 2026 - 30 Mar 2026 <i class="fa-solid fa-ellipsis-vertical muted"></i></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Subarna Sethi</div><div class="person-role">Associate Gen AI Engineer</div></div></div><div class="person-right">15 days ago<br><span class="muted">Last Leave Taken</span></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Rakesh Nayak</div><div class="person-role">Software Engineer</div></div></div><div class="person-right">15 days ago<br><span class="muted">Last Leave Taken</span></div></div>
                    </section>
                    <section class="mini-card">
                        <div class="mini-card-header"><div>Most Leave Taken</div><div class="mini-card-range">24 Mar 2026 - 30 Mar 2026 <i class="fa-solid fa-ellipsis-vertical muted"></i></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Rupali Pradhan</div><div class="person-role">Associate Software Engineer</div></div></div><div class="person-right">2 Days<br><span class="muted">2 Instances</span></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Amit Nayak</div><div class="person-role">Associate Software Engineer</div></div></div><div class="person-right">2 Days<br><span class="muted">2 Instances</span></div></div>
                        <div class="person-row"><div class="person-left"><img class="person-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="person-name">Sonalika Patra</div><div class="person-role">Software Engineer</div></div></div><div class="person-right">2 Days<br><span class="muted">2 Instances</span></div></div>
                    </section>
                </div>
                <section class="balance-card">
                    <div class="balance-header"><div class="balance-title">Leave Balance (Available/Total)</div><input class="balance-search" type="search" placeholder="Search" aria-label="Search leave balance"></div>
                    <div class="balance-table-wrap">
                        <table class="balance-table">
                            <thead>
                                <tr><th>Employee Details</th><th>Department</th><th>Location</th><th>Total Available Balance</th><th>Sick Leave</th><th>Earned Leave</th><th>Unpaid Leave</th><th>Optional Leave</th><th>Special Leave</th><th>Casual Leave</th><th>Comp Offs</th><th>Client Leave</th><th>Natural Disaster/ Curfew</th></tr>
                            </thead>
                            <tbody>
                                <tr><td><div class="employee-name">Jatin Sahoo</div><div class="employee-role">Associate Director - Projects</div></td><td>Digital Services...</td><td>Bhubaneswar</td><td>3.25 days</td><td>0/6</td><td>0.25/21.25</td><td>&infin;</td><td>1/1</td><td>Not Applicable</td><td>0/6</td><td>0/0</td><td>Not Applicable</td><td>2/2</td></tr>
                                <tr><td><div class="employee-name">Pramod Nayak</div><div class="employee-role">Associate Software Engineer</div></td><td>Digital Services...</td><td>Bhubaneswar</td><td>7.25 days</td><td>0/6</td><td>5.25/20.25</td><td>&infin;</td><td>0/1</td><td>Not Applicable</td><td>0/6</td><td>0/0</td><td>Not Applicable</td><td>2/2</td></tr>
                                <tr><td><div class="employee-name">Rina Behera</div><div class="employee-role">Associate Software Engineer</div></td><td>Digital Services...</td><td>Bhubaneswar</td><td>5.25 days</td><td>0/6</td><td>2.25/21.25</td><td>&infin;</td><td>0/1</td><td>Not Applicable</td><td>1/6</td><td>0/0</td><td>Not Applicable</td><td>2/2</td></tr>
                                <tr><td><div class="employee-name">Sasmita Mohanty</div><div class="employee-role">Associate Software Engineer</div></td><td>Digital Services...</td><td>Bhubaneswar</td><td>12.75 days</td><td>0/6</td><td>9.75/21.25</td><td>&infin;</td><td>0/1</td><td>Not Applicable</td><td>1/6</td><td>0/0</td><td>Not Applicable</td><td>2/2</td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>
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
