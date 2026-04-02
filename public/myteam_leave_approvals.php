<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

$title = 'HRMS - My Team Leave Approvals';
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
    ['label' => 'Leave Approvals', 'url' => 'myteam_leave_approvals.php', 'active' => true],
    ['label' => 'Penalized Leave', 'url' => '#'],
    ['label' => 'Past Leave Requests', 'url' => '#'],
    ['label' => 'Encashment Requests', 'url' => '#'],
    ['label' => 'Reports', 'url' => '#'],
];
?>
    <title>HRMS - My Team Leave Approvals</title>
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
        .myteam-filter-row{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:4px 0 12px}
        .team-group-btn{display:inline-flex;align-items:center;gap:10px;border:1px solid #c6b6ef;background:#f8f5ff;color:#4f3c9a;border-radius:2px;padding:8px 12px;font-size:12px;font-weight:600;box-shadow:inset 0 0 0 1px rgba(79,60,154,.08);text-decoration:none}
        .team-view-tabs{display:flex;align-items:center}
        .team-view-tabs a{display:inline-flex;align-items:center;height:32px;border:1px solid #e5eaf2;background:#fff;padding:0 14px;font-size:12px;color:#4b5563;cursor:pointer;text-decoration:none}
        .team-view-tabs a.active{background:#f7f3ff;color:#4a4f8f;border-color:#d9d2f3}
        .team-view-tabs a+a{margin-left:-1px}
        .approvals-card,.approvals-secondary{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02)}
        .approvals-card{padding:0 0 10px}
        .approvals-title{font-size:14px;font-weight:500;color:#2b3340;padding:14px 14px 12px}
        .approvals-toolbar{display:grid;grid-template-columns:repeat(8,minmax(0,1fr));border-top:1px solid #eef2f7;border-bottom:1px solid #eef2f7}
        .approvals-toolbar div{padding:12px 14px;font-size:11px;color:#667085;border-right:1px solid #eef2f7;display:flex;align-items:center;justify-content:space-between;gap:8px}
        .approvals-toolbar div:last-child{border-right:0}
        .approval-actions{display:flex;align-items:center;gap:10px;padding:8px 14px}
        .approve-btn,.reject-btn{height:28px;padding:0 14px;border-radius:2px;border:1px solid #e5eaf2;background:#fff;font-size:12px;cursor:pointer}
        .approve-btn{background:#b59de3;color:#fff;border-color:#b59de3}
        .reject-btn{color:#4b5563}
        .approvals-table-wrap{overflow-x:auto}
        .approvals-table{width:100%;min-width:1480px;border-collapse:collapse;table-layout:fixed}
        .approvals-table thead th{background:#f3f5f8;color:#6e7685;font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;padding:10px;text-align:left;border-bottom:1px solid #edf1f6}
        .approvals-table tbody td{padding:13px 10px;border-bottom:1px solid #f0f2f6;font-size:11px;color:#2f3640;vertical-align:top;line-height:1.35}
        .approvals-table tbody tr:hover td{background:#fafcff}
        .emp-cell{display:flex;align-items:flex-start;gap:10px}
        .emp-avatar{width:28px;height:28px;border-radius:50%;object-fit:cover;flex:0 0 auto}
        .emp-name{font-weight:500;color:#5b4dc3}
        .emp-role{font-size:9px;color:#97a1af;margin-top:4px}
        .stack{display:flex;flex-direction:column;gap:2px}
        .muted{color:#8892a3}
        .status{font-weight:600}
        .status.pending{color:#b98911}
        .status.approved{color:#2f6f59}
        .status.rejected{color:#c34b4b}
        .actions{font-size:14px;color:#8a93a5}
        .scroll-bar{height:26px;background:#e7e7e7;border-top:1px solid #ddd;border-bottom:1px solid #ddd;display:flex;align-items:center;justify-content:space-between;padding:0 10px;color:#6b7280}
        .scroll-bar .center{display:flex;align-items:center;gap:12px}
        .pagination{display:flex;justify-content:flex-end;align-items:center;gap:14px;padding:12px 14px;font-size:11px;color:#566070}
        .secondary-card{margin-top:14px;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
        .secondary-title{font-size:14px;font-weight:500;color:#2b3340;padding:14px}
        .info-banner{margin:0 14px 14px;background:#eefaff;border:1px solid #cceaf4;border-radius:2px;padding:12px;font-size:11px;color:#4b7485}
        @media (max-width:1180px){.myteam-topbar{flex-wrap:wrap;height:auto;padding:12px 14px}.myteam-brand{min-width:0}.myteam-search{order:3;max-width:none;width:100%;flex-basis:100%}.approvals-toolbar{grid-template-columns:repeat(2,minmax(0,1fr))}}
        @media (max-width:720px){.myteam-content{padding:10px}.myteam-module-nav,.myteam-subnav{padding-left:10px;padding-right:10px}.myteam-filter-row{flex-direction:column;align-items:flex-start}}
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
                        <a href="myteam_leave_indirect.php">Indirect Reports</a>
                    </div>
                </div>

                <section class="approvals-card">
                    <div class="approvals-title">Pending Leave Approvals</div>
                    <div class="approvals-toolbar">
                        <div>Department <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Location <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Leave Type <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Leave Status <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Business Unit <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Legal Entity <i class="fa-solid fa-chevron-down muted"></i></div>
                        <div>Leave Duration <i class="fa-regular fa-calendar"></i></div>
                        <div><i class="fa-solid fa-search muted"></i> Search</div>
                    </div>
                    <div class="approval-actions">
                        <span style="font-size:18px;color:#8a93a5"><i class="fa-solid fa-arrow-down"></i></span>
                        <button class="approve-btn">Approve</button>
                        <button class="reject-btn">Reject</button>
                    </div>
                    <div class="approvals-table-wrap">
                        <table class="approvals-table">
                            <thead>
                                <tr>
                                    <th style="width:2%"><input type="checkbox"></th>
                                    <th style="width:15%">Employee</th>
                                    <th style="width:7%">Employee Number</th>
                                    <th style="width:9%">Department</th>
                                    <th style="width:8%">Location</th>
                                    <th style="width:10%">Business Unit</th>
                                    <th style="width:10%">Legal Entity</th>
                                    <th style="width:11%">Leave Dates</th>
                                    <th style="width:9%">Leave Type</th>
                                    <th style="width:6%">Status</th>
                                    <th style="width:9%">Last Action By</th>
                                    <th style="width:9%">Next Approver</th>
                                    <th style="width:10%">Leave Note</th>
                                    <th style="width:5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><div class="emp-cell"><img class="emp-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="emp-name">Dipti Ranjan Sahoo</div><div class="emp-role">Associate Director - Projects</div></div></div></td>
                                    <td>GI2673</td>
                                    <td>Digital...</td>
                                    <td>Bhubaneswar</td>
                                    <td>Digital Services...</td>
                                    <td>Gemini Consulting</td>
                                    <td><div class="stack"><span>31 Mar 2026</span><span class="muted">1 Day</span></div></td>
                                    <td><div class="stack"><span>Sick Leave</span><span class="muted">Requested on 31 Mar 2026</span></div></td>
                                    <td><span class="status pending">Pending</span></td>
                                    <td>Not Available</td>
                                    <td>Debasish Nayak</td>
                                    <td>mother not well</td>
                                    <td class="actions">...</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><div class="emp-cell"><img class="emp-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="emp-name">Ashutosh Nayak</div><div class="emp-role">Test Engineer</div></div></div></td>
                                    <td>GI2694</td>
                                    <td>Digital...</td>
                                    <td>Bhubaneswar</td>
                                    <td>Digital Services...</td>
                                    <td>Gemini Consulting</td>
                                    <td><div class="stack"><span>05 Feb 2026</span><span class="muted">1 Day</span></div></td>
                                    <td><div class="stack"><span>Earned Leave</span><span class="muted">Requested on 05 Feb 2026</span></div></td>
                                    <td><span class="status pending">Pending</span></td>
                                    <td>Not Available</td>
                                    <td>Not Available</td>
                                    <td>Today I am ... come to offi</td>
                                    <td class="actions">...</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><div class="emp-cell"><img class="emp-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="emp-name">Subash Behera</div><div class="emp-role">Associate Software Engineer</div></div></div></td>
                                    <td>GI2696</td>
                                    <td>Digital...</td>
                                    <td>Bhubaneswar</td>
                                    <td>Digital Services...</td>
                                    <td>Gemini Consulting</td>
                                    <td><div class="stack"><span>02 May 2025 (Second half)</span><span class="muted">0.5 Day</span></div></td>
                                    <td><div class="stack"><span>Sick Leave</span><span class="muted">Requested on 03 May 2025</span></div></td>
                                    <td><span class="status pending">Pending</span></td>
                                    <td>Not Available</td>
                                    <td>Not Available</td>
                                    <td>illness</td>
                                    <td class="actions">...</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><div class="emp-cell"><img class="emp-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="emp-name">Sasmita Behera</div><div class="emp-role">Associate Software Engineer</div></div></div></td>
                                    <td>GI2696</td>
                                    <td>Digital...</td>
                                    <td>Bhubaneswar</td>
                                    <td>Digital Services...</td>
                                    <td>Gemini Consulting</td>
                                    <td><div class="stack"><span>30 Jun 2025</span><span class="muted">1 Day</span></div></td>
                                    <td><div class="stack"><span>Casual Leave</span><span class="muted">Requested on 24 Jun 2025</span></div></td>
                                    <td><span class="status pending">Pending</span></td>
                                    <td>Not Available</td>
                                    <td>Not Available</td>
                                    <td>Due to some ... work.</td>
                                    <td class="actions">...</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><div class="emp-cell"><img class="emp-avatar" src="public/assets/images/mamata_guddu_avatar_1774439604744.png" alt=""><div><div class="emp-name">Tapan Kumar Nayak</div><div class="emp-role">Associate Software Engineer</div></div></div></td>
                                    <td>GI2707</td>
                                    <td>Digital...</td>
                                    <td>Bhubaneswar</td>
                                    <td>Digital Services...</td>
                                    <td>Gemini Consulting</td>
                                    <td><div class="stack"><span>02 May 2025</span><span class="muted">1 Day</span></div></td>
                                    <td><div class="stack"><span>Earned Leave</span><span class="muted">Requested on 29 Apr 2025</span></div></td>
                                    <td><span class="status pending">Pending</span></td>
                                    <td>Not Available</td>
                                    <td>Not Available</td>
                                    <td>Due to some ... important w</td>
                                    <td class="actions">...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="scroll-bar"><span>&lt;</span><div class="center"><span>&gt;</span><span>&lt;</span></div><span>&gt;</span></div>
                    <div class="pagination"><span>1 to 5 of 5</span><span style="opacity:.35">K</span><span style="opacity:.35">&lt;</span><span>Page 1 of 1</span><span style="opacity:.35">&gt;</span><span style="opacity:.35">&raquo;</span></div>
                </section>

                <section class="secondary-card">
                    <div class="secondary-title">Pending Compensatory off Approvals</div>
                    <div class="info-banner">Hooray, no pending Compensatory off approvals!</div>
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
