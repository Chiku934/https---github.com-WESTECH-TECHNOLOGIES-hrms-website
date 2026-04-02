<style>
        body.attendance-page{margin:0;font-family:'Inter',sans-serif;background:#eef2f7;min-height:100vh}
        .attendance-shell{display:flex;min-height:100vh}
        .attendance-main{flex:1;margin-left:260px;background:#f4f6fb;min-width:0}
        .attendance-topbar{height:48px;background:linear-gradient(90deg,#5b46b4 0%,#6a4fc2 55%,#5f45b8 100%);color:#fff;display:flex;align-items:center;justify-content:space-between;gap:18px;padding:0 14px 0 16px;box-shadow:0 2px 12px rgba(41,28,98,.16)}
        .attendance-brand{display:flex;align-items:center;gap:10px;min-width:255px;flex:0 0 auto}
        .attendance-brand-mark{font-weight:800;font-style:italic;letter-spacing:-.7px;font-size:18px;line-height:1}
        .attendance-company{font-size:12px;font-weight:500;opacity:.95;white-space:nowrap}
        .attendance-search{flex:1;max-width:460px;min-width:220px;height:32px;border-radius:999px;background:rgba(255,255,255,.97);display:flex;align-items:center;padding:0 12px;gap:8px;color:#718096;box-shadow:inset 0 0 0 1px rgba(89,67,178,.1)}
        .attendance-search input{border:0;outline:none;background:transparent;width:100%;font:inherit;color:#475569;font-size:12px}
        .attendance-search input::placeholder{color:#8b97a8}
        .attendance-actions{display:flex;align-items:center;gap:14px;flex:0 0 auto}
        .attendance-icon-btn{border:0;background:transparent;color:#fff;font-size:18px;cursor:pointer;padding:0}
        .attendance-avatar{width:26px;height:26px;border-radius:50%;object-fit:cover;border:2px solid rgba(255,255,255,.55)}
        .attendance-module-nav{height:34px;background:#fff;border-bottom:1px solid #e3e8f2;display:flex;align-items:center;padding:0 16px 0 18px;gap:22px;overflow-x:auto;white-space:nowrap}
        .attendance-module-nav a{text-decoration:none;font-size:11px;font-weight:700;color:#7f889a;text-transform:uppercase;letter-spacing:.02em;position:relative;padding:10px 0 9px;flex:0 0 auto}
        .attendance-module-nav a.active{color:#2b2f38}
        .attendance-module-nav a.active::after{content:'';position:absolute;left:50%;bottom:-1px;transform:translateX(-50%);width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:6px solid #6a4fc2}
        .attendance-content{padding:12px 16px 24px;color:#1f2937}
        .section-heading{font-size:13px;font-weight:700;color:#2d3748;margin:0 0 10px}
        .top-grid{display:grid;grid-template-columns:1.05fr 1.15fr .95fr;gap:12px;margin-bottom:14px}
        .panel-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);min-height:170px}
        .panel-inner{padding:12px 14px}
        .stats-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px;position:relative}
        .stats-period{position:relative;display:inline-flex;align-items:center}
        .small-select{font-size:11px;color:#334155;display:inline-flex;align-items:center;gap:6px;background:transparent;border:0;padding:0;cursor:pointer;font:inherit}
        .small-select-menu{position:absolute;top:calc(100% + 6px);left:0;min-width:138px;background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 8px 24px rgba(15,23,42,.08);padding:4px 0;z-index:4;display:none}
        .small-select-menu.open{display:block}
        .small-select-option{display:block;width:100%;border:0;background:transparent;padding:8px 12px;font-size:11px;color:#334155;text-align:left;cursor:pointer}
        .small-select-option:hover,.small-select-option.active{background:#f7f3ff;color:#4a4f8f}
        .info-circle{width:15px;height:15px;border-radius:50%;border:1px solid #cdd5e0;color:#8c96a5;display:inline-flex;align-items:center;justify-content:center;font-size:9px;line-height:1}
        .stats-table{width:100%;border-collapse:collapse;table-layout:fixed}
        .stats-row{border-top:1px solid #eef2f7}
        .stats-cell{padding:17px 0;vertical-align:middle}
        .stats-person{display:flex;align-items:center;gap:10px;font-size:13px;color:#1f2937;font-weight:600}
        .stats-badge{width:30px;height:30px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;color:#fff;font-size:13px;flex:0 0 auto}
        .stats-metric{text-align:center}
        .metric-label{font-size:9px;color:#96a1b2;font-weight:700;text-transform:uppercase;letter-spacing:.04em;margin-bottom:5px}
        .metric-value{font-size:15px;font-weight:700;color:#2d3748}
        .week-dots{display:flex;gap:6px;margin:2px 0 14px}
        .week-dot{width:20px;height:20px;border-radius:50%;border:1px solid #edf1f6;color:#98a2b3;font-size:10px;display:flex;align-items:center;justify-content:center;font-weight:600;background:#fff}
        .week-dot.active{background:#6fd0df;color:#fff;border-color:#6fd0df}
        .timings-main{height:74px;border-radius:2px;position:relative;}
        .timings-caption{position:absolute;left:0;top:20px;font-size:11px;color:#3c4a58}
        .timings-bar{position:absolute;left:0;right:0;bottom:18px;height:8px;background:linear-gradient(90deg,#72c6d7 0 41%,#c8dfe5 41% 54%,#72c6d7 54% 100%);border-radius:2px}
        .timings-footer{display:flex;justify-content:space-between;align-items:center;margin-top:14px;font-size:11px;color:#667085}
        .break-chip{display:inline-flex;align-items:center;gap:4px;color:#667085}
        .action-layout{display:flex;gap:14px;align-items:flex-start;padding-top:6px}
        .clock-box{width:150px;border:1px solid #dfe4ec;border-radius:2px;padding:14px 12px 10px;background:#fff;color:#2d3748}
        .clock-time{font-size:18px;font-weight:800;line-height:1.1;margin-bottom:8px;letter-spacing:.02em;font-variant-numeric:tabular-nums}
        .clock-label{font-size:9px;font-weight:700;color:#7a8598;text-transform:uppercase;letter-spacing:.08em;margin-bottom:4px}
        .clock-date{font-size:11px;color:#4b5563;text-align:left}
        .clock-progress{margin-top:10px;height:6px;border-radius:999px;background:#eef2f7;overflow:hidden}
        .clock-progress-fill{height:100%;width:0;background:linear-gradient(90deg,#72c6d7,#6b55bc);border-radius:999px;transition:width .2s linear}
        .action-links{display:flex;flex-direction:column;gap:7px;padding-top:2px}
        .action-links a{color:#6b5bb9;text-decoration:none;font-size:12px;display:inline-flex;align-items:center;gap:8px;font-weight:500}
        .logs-header{display:flex;justify-content:space-between;align-items:center;margin:14px 0 8px}
        .toggle-wrap{display:inline-flex;align-items:center;gap:8px;color:#556070;font-size:11px}
        .toggle-btn{display:inline-flex;align-items:center;gap:8px;border:0;background:transparent;color:inherit;font:inherit;cursor:pointer;padding:0}
        .switch{width:30px;height:16px;border-radius:999px;background:#e5e7eb;position:relative;flex:0 0 auto;transition:background .15s ease}
        .switch::after{content:'';position:absolute;top:2px;left:2px;width:12px;height:12px;border-radius:50%;background:#fff;box-shadow:0 1px 2px rgba(0,0,0,.18)}
        .switch.on{background:#6b55bc}
        .switch.on::after{left:16px}
        .log-tabs{background:#fff;border:1px solid #e5eaf2;display:flex;align-items:center;overflow-x:auto;white-space:nowrap}
        .log-tab{padding:10px 18px;font-size:11px;font-weight:500;color:#7c8597;text-decoration:none;border-right:1px solid #edf1f6;flex:0 0 auto}
        .log-tab.active{background:#f7f3ff;color:#4a4f8f}
        .tab-panel{display:none}
        .tab-panel.active{display:block}
        .log-subsection{margin-top:16px;background:#fff;border:1px solid #e5eaf2;padding:11px 14px 0}
        .log-subsection-header{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:12px}
        .range-title{font-size:14px;font-weight:500;color:#2b3340}
        .range-pills{display:flex;align-items:center;border:1px solid #e5eaf2;overflow:hidden}
        .range-pill{padding:9px 16px;font-size:11px;font-weight:500;color:#6b7280;border-right:1px solid #edf1f6;background:#fff;cursor:pointer;user-select:none}
        .range-pill.active{background:#6b55bc;color:#fff}
        .attendance-table-wrap{overflow-x:auto}
        .attendance-table{width:100%;border-collapse:collapse;min-width:920px}
        .attendance-table thead th{text-align:left;font-size:9px;font-weight:700;color:#6e7685;letter-spacing:.04em;padding:11px 10px;background:#f7f8fb;border-bottom:1px solid #edf1f6;text-transform:uppercase}
        .attendance-table tbody td{font-size:11px;color:#2f3640;padding:14px 10px;border-bottom:1px solid #f0f2f6;vertical-align:middle;background:#fff}
        .attendance-date{white-space:nowrap;font-weight:500}
        .day-tag{display:inline-flex;align-items:center;padding:1px 4px;border-radius:2px;font-size:8px;font-weight:700;margin-left:6px;vertical-align:middle}
        .day-tag.woff{background:#d8cfad;color:#fff}
        .day-tag.penalty{background:#f8c9c9;color:#ae5963}
        .day-tag.leave{background:#aa9ad8;color:#fff}
        .day-tag.od{background:#f1c32a;color:#fff}
        .visual-track{height:8px;background:linear-gradient(90deg,#efefef 0 10%,transparent 10% 12%,#efefef 12% 20%,transparent 20% 23%,#efefef 23% 35%,transparent 35% 38%,#efefef 38% 45%,transparent 45% 48%,#efefef 48% 100%);position:relative;border-radius:999px;overflow:hidden}
        .visual-fill{position:absolute;top:0;left:0;height:100%;border-radius:999px}
        .fill-teal{background:#6fcbd8}
        .fill-purple{background:#9a84d6}
        .fill-amber{background:#f7cb54}
        .status-ok{color:#7f9b57;font-weight:600}
        .log-icon{color:#c6cfdb;font-size:14px}
        .mini-circle{display:inline-flex;width:14px;height:14px;border-radius:50%;align-items:center;justify-content:center;font-size:9px;margin-right:6px;background:#dbeff5;color:#66bfd0;vertical-align:middle}
        .row-soft,.row-soft td{background:#fbf9f2!important}
        .calendar-shell{margin-top:16px;background:#fff;border:1px solid #e5eaf2;padding:14px}
        .calendar-toolbar{display:flex;align-items:center;gap:0;width:max-content;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
        .calendar-nav-btn,.calendar-month-btn{height:30px;border:0;background:#fff;color:#6b7280;font-size:12px}
        .calendar-nav-btn{width:30px;border-right:1px solid #e5eaf2;cursor:pointer}
        .calendar-month-btn{min-width:64px;padding:0 14px;font-weight:600;border-right:1px solid #e5eaf2}
        .calendar-grid{margin-top:16px;border:1px solid #e5eaf2;border-bottom:0;overflow:hidden}
        .calendar-weekdays{display:grid;grid-template-columns:repeat(7,1fr);background:#f3f5f8;border-bottom:1px solid #e5eaf2}
        .calendar-weekdays div{padding:12px 10px;font-size:10px;font-weight:700;color:#6f7784;text-transform:uppercase;border-right:1px solid #e5eaf2;text-align:left}
        .calendar-weekdays div:last-child{border-right:0}
        .calendar-days{display:grid;grid-template-columns:repeat(7,1fr)}
        .calendar-day{min-height:126px;padding:8px 10px;border-right:1px solid #e5eaf2;border-bottom:1px solid #e5eaf2;background:#fff;position:relative}
        .calendar-day:nth-child(7n){border-right:0}
        .calendar-day.muted{color:#c3cad6}
        .calendar-day-number{font-size:11px;font-weight:600;color:#31353d}
        .calendar-day.muted .calendar-day-number{color:#c0c6d2}
        .calendar-chip{display:inline-flex;align-items:center;padding:2px 5px;border-radius:2px;font-size:8px;font-weight:700;margin-top:10px}
        .calendar-chip.woff{background:#d8cfad;color:#fff}
        .calendar-chip.holiday{background:#dfdfdf;color:#7a7a7a}
        .calendar-chip.leave{background:#aa9ad8;color:#fff}
        .calendar-chip.od{background:#f1c32a;color:#fff}
        .calendar-note{position:absolute;bottom:8px;left:10px;font-size:8px;color:#8f97a5;text-transform:uppercase;letter-spacing:.04em}
        .calendar-key{display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:10px;font-size:10px;color:#8b93a1}
        .calendar-key span{display:inline-flex;align-items:center;gap:5px}
        .requests-shell{margin-top:16px;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden}
        .requests-header{display:flex;align-items:center;justify-content:space-between;padding:13px 14px;border-bottom:1px solid #eef2f7;background:#fff}
        .requests-title{font-size:13px;font-weight:500;color:#2b3340;letter-spacing:-.01em}
        .requests-range{display:flex;align-items:center;gap:10px;font-size:11px;font-weight:600;color:#4b5563}
        .requests-kebab{width:14px;height:14px;display:inline-flex;align-items:center;justify-content:center;color:#98a2b3;font-size:16px;line-height:1}
        .requests-table-wrap{overflow-x:auto}
        .requests-table{width:100%;border-collapse:collapse;min-width:1200px;table-layout:fixed}
        .requests-table thead th{background:#f3f5f8;color:#6e7685;font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;padding:10px 10px;text-align:left;border-bottom:1px solid #edf1f6}
        .requests-table tbody td{padding:15px 10px;border-bottom:1px solid #f0f2f6;font-size:11px;color:#2f3640;vertical-align:top;line-height:1.35}
        .requests-date{white-space:nowrap;font-weight:500;color:#1f2937}
        .requests-day{display:inline-flex;align-items:center;justify-content:center;width:70px;height:28px;color:#93a1b5;font-size:10px;margin-left:8px;vertical-align:middle;background:#fff}
        .requests-day i{font-size:11px;color:#8f97a5}
        .requests-sub{display:block;font-size:9px;color:#97a1af;margin-top:4px}
        .requests-note,.requests-reason,.requests-status,.requests-action-by,.requests-next{font-size:11px;color:#536071;line-height:1.35}
        .requests-table thead th:nth-child(1),.requests-table tbody td:nth-child(1){width:12%}
        .requests-table thead th:nth-child(2),.requests-table tbody td:nth-child(2){width:10%}
        .requests-table thead th:nth-child(3),.requests-table tbody td:nth-child(3){width:16%}
        .requests-table thead th:nth-child(4),.requests-table tbody td:nth-child(4){width:10%}
        .requests-table thead th:nth-child(5),.requests-table tbody td:nth-child(5){width:18%}
        .requests-table thead th:nth-child(6),.requests-table tbody td:nth-child(6){width:9%}
        .requests-table thead th:nth-child(7),.requests-table tbody td:nth-child(7){width:8%}
        .requests-table thead th:nth-child(8),.requests-table tbody td:nth-child(8){width:13%}
        .requests-table thead th:nth-child(9),.requests-table tbody td:nth-child(9){width:8%}
        .requests-table thead th:nth-child(10),.requests-table tbody td:nth-child(10){width:6%;text-align:center}
        .requests-status.approved{color:#2f6f59;font-weight:600}
        .requests-status.pending{color:#c28a14;font-weight:600}
        .requests-status.rejected{color:#c34b4b;font-weight:600}
        .requests-actions{display:flex;align-items:center;justify-content:center;gap:10px;color:#8a93a5;font-size:13px}
        .requests-table tbody td:nth-child(10){padding-left:4px;padding-right:4px}
        .comment-bubble{width:14px;height:14px;border:1px solid #b8bfca;border-radius:3px;display:inline-flex;align-items:center;justify-content:center;font-size:8px;color:#9aa2b2}
        .requests-table tbody tr:hover td{background:#fafcff}
        .requests-table tbody tr:last-child td{border-bottom:0}
        @media (max-width:1180px){.top-grid{grid-template-columns:1fr}.attendance-topbar{flex-wrap:wrap;height:auto;padding:12px 14px}.attendance-brand{min-width:0}.attendance-search{order:3;max-width:none;width:100%;flex-basis:100%}}
        @media (max-width:720px){.attendance-content{padding:10px}.attendance-module-nav{padding-left:10px;padding-right:10px}.log-subsection-header{flex-direction:column;align-items:flex-start}.action-layout{flex-direction:column}}
    </style>
<div class="attendance-shell">
        <div class="sidebar"></div>
        <div class="attendance-main">
            <div class="attendance-topbar">
                <div class="attendance-brand">
                    <div class="attendance-brand-mark">TEAMAXIS</div>
                    <div class="attendance-company"></div>
                </div>
                <div class="attendance-search">
                    <i class="fa-solid fa-magnifying-glass" style="font-size:12px"></i>
                    <input type="text" placeholder="Search employees or action (Ex: Apply Leave)" aria-label="Search">
                    <span style="font-size:9px;font-weight:700;color:#686d7d;background:#f1edf9;padding:3px 6px;border-radius:8px">Alt + K</span>
                </div>
                <div class="attendance-actions">
                    <button class="attendance-icon-btn" aria-label="Notifications"><i class="fa-regular fa-bell"></i></button>
                    <img src="assets/images/avatar1.png" alt="User avatar" class="attendance-avatar">
                </div>
            </div>
            <nav class="attendance-module-nav" aria-label="Primary attendance navigation">
                    <a href="user-attendance.php" class="active">Attendance</a>
                    <a href="timesheet.php">Timesheet</a>
                    <a href="user-leave.php">Leave</a>
                    <a href="user-performance.php">Performance</a>
                    <a href="user-expenses.php">Expenses & Travel</a>
                    <a href="user-support.php">Helpdesk</a>
                <a href="#">Apps</a>
            </nav>
            <main class="attendance-content">
                <div class="section-heading">Attendance Stats</div>
                <div class="top-grid">
                    <section class="panel-card">
                        <div class="panel-inner">
                            <div class="stats-header">
                                <div class="stats-period">
                                    <button type="button" class="small-select" id="stats-period-trigger" aria-haspopup="listbox" aria-expanded="false">
                                        <span id="stats-period-label">Last Week</span>
                                        <i class="fa-solid fa-chevron-down" style="font-size:9px"></i>
                                    </button>
                                    <div class="small-select-menu" id="stats-period-menu" role="listbox" aria-label="Attendance stats period">
                                        <button type="button" class="small-select-option active" data-stats-period="30DAYS">Last Week</button>
                                        <button type="button" class="small-select-option" data-stats-period="FEB">February</button>
                                        <button type="button" class="small-select-option" data-stats-period="JAN">January</button>
                                        <button type="button" class="small-select-option" data-stats-period="DEC">December</button>
                                        <button type="button" class="small-select-option" data-stats-period="NOV">November</button>
                                        <button type="button" class="small-select-option" data-stats-period="OCT">October</button>
                                        <button type="button" class="small-select-option" data-stats-period="SEP">September</button>
                                    </div>
                                </div>
                                <span class="info-circle">i</span>
                            </div>
                            <table class="stats-table" aria-label="Attendance summary">
                                <tr class="stats-row">
                                    <td class="stats-cell">
                                        <div class="stats-person"><span class="stats-badge" style="background:#f3b519"><i class="fa-solid fa-user" style="font-size:11px"></i></span><span>Me</span></div>
                                    </td>
                                    <td class="stats-cell stats-metric">
                                        <div class="metric-label" id="stats-me-label">Avg Hrs / Day</div><div class="metric-value" id="stats-me-value">9h 20m</div>
                                    </td>
                                    <td class="stats-cell stats-metric">
                                        <div class="metric-label" id="stats-me-secondary-label">On Time Arrival</div><div class="metric-value" id="stats-me-secondary-value">100%</div>
                                    </td>
                                </tr>
                                <tr class="stats-row">
                                    <td class="stats-cell">
                                        <div class="stats-person"><span class="stats-badge" style="background:#61a0db"><i class="fa-solid fa-users" style="font-size:11px"></i></span><span>My Team</span></div>
                                    </td>
                                    <td class="stats-cell stats-metric"><div class="metric-label" id="stats-team-label">Avg Hrs / Day</div><div class="metric-value" id="stats-team-value">2h 54m</div></td>
                                    <td class="stats-cell stats-metric"><div class="metric-label" id="stats-team-secondary-label">On Time Arrival</div><div class="metric-value" id="stats-team-secondary-value">33%</div></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                    <section class="panel-card">
                        <div class="panel-inner">
                            <div class="section-heading" style="margin-bottom:6px">Timings</div>
                            <div class="week-dots" id="timings-week-dots">
                                <span class="week-dot active">M</span><span class="week-dot">T</span><span class="week-dot">W</span><span class="week-dot">T</span><span class="week-dot">F</span><span class="week-dot">S</span><span class="week-dot">S</span>
                            </div>
                            <div class="timings-main" id="timings-main">
                                <div class="timings-caption" id="timings-caption">Today (11:00 AM - 7:30 PM)</div>
                                <div class="timings-bar" id="timings-bar"></div>
                            </div>
                            <div class="timings-footer"><div><strong style="font-size:11px;color:#4b5563">Duration:</strong> <span id="timings-duration">8h 30m</span></div><div class="break-chip"><i class="fa-solid fa-mug-hot"></i> <span id="timings-break">30 min</span></div></div>
                        </div>
                    </section>
                    <section class="panel-card">
                        <div class="panel-inner">
                            <div class="section-heading" style="margin-bottom:10px">Actions</div>
                            <div class="action-layout">
                                <div class="clock-box">
                                    <div class="clock-label">Shift Timer</div>
                                    <div class="clock-time" id="shift-timer">00:00:00</div>
                                    <div class="clock-date" id="shift-date">Mon, 30 Mar 2026</div>
                                    <div class="clock-progress" aria-hidden="true">
                                        <div class="clock-progress-fill" id="shift-timer-fill"></div>
                                    </div>
                                </div>
                                <div class="action-links">
                                    <a href="#"><i class="fa-solid fa-house" style="font-size:11px"></i> Work From Home</a>
                                    <a href="#"><i class="fa-solid fa-briefcase" style="font-size:11px"></i> On Duty</a>
                                    <a href="#"><i class="fa-regular fa-file-lines" style="font-size:11px"></i> Attendance Policy</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="logs-header">
                    <div class="section-heading" style="margin-bottom:0">Logs & Requests</div>
                    <div class="toggle-wrap">
                        <button type="button" class="toggle-btn" id="twenty-four-toggle" aria-pressed="false" aria-label="Toggle 24 hour format">
                            <span class="switch" id="twenty-four-switch" aria-hidden="true"></span>
                            <span>24 hour format</span>
                        </button>
                    </div>
                </div>
                <div class="log-tabs" role="tablist" aria-label="Attendance sections">
                    <a href="#" class="log-tab active" data-tab="attendance-log">Attendance Log</a><a href="#" class="log-tab" data-tab="calendar-view">Calendar</a><a href="#" class="log-tab" data-tab="attendance-requests">Attendance Requests</a>
                </div>
                <section class="tab-panel active" id="attendance-log">
                <div class="log-subsection">
                    <div class="log-subsection-header">
                        <div class="range-title" id="attendance-log-range-title">Last 30 Days</div>
                        <div class="range-pills" aria-label="Monthly filters">
                            <div class="range-pill active" data-filter="30DAYS">30 DAYS</div><div class="range-pill" data-filter="FEB">FEB</div><div class="range-pill" data-filter="JAN">JAN</div><div class="range-pill" data-filter="DEC">DEC</div><div class="range-pill" data-filter="NOV">NOV</div><div class="range-pill" data-filter="OCT">OCT</div><div class="range-pill" data-filter="SEP">SEP</div>
                        </div>
                    </div>
                    <div class="attendance-table-wrap">
                        <table class="attendance-table">
                            <thead>
                                <tr><th style="width:18%">Date</th><th style="width:36%">Attendance Visual</th><th style="width:12%">Effective Hours</th><th style="width:12%">Gross Hours</th><th style="width:12%">Arrival</th><th style="width:10%">Log</th></tr>
                            </thead>
                            <tbody id="attendance-log-body"></tbody>
                        </table>
                    </div>
                </section>
                </section>

                <section class="tab-panel" id="calendar-view">
                    <div class="calendar-shell">
                        <div class="calendar-toolbar" aria-label="Calendar month navigation">
                            <button class="calendar-nav-btn" type="button" id="calendar-prev-month" aria-label="Previous month"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="calendar-month-btn" type="button" id="calendar-month-label">Mar 2026</button>
                            <button class="calendar-nav-btn" type="button" id="calendar-next-month" aria-label="Next month"><i class="fa-solid fa-chevron-right"></i></button>
                        </div>

                        <div class="calendar-grid">
                            <div class="calendar-weekdays">
                                <div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div><div>Sun</div>
                            </div>
                            <div class="calendar-days" id="calendar-days"></div>
                        </div>
                        <div class="calendar-key" aria-label="Calendar legend">
                            <span><span class="calendar-chip woff" style="margin-top:0">W-OFF</span> Weekly off</span>
                            <span><span class="calendar-chip holiday" style="margin-top:0">HOLIDAY</span> Holiday</span>
                            <span><span class="calendar-chip od" style="margin-top:0">OD</span> On duty</span>
                            <span><span class="calendar-chip leave" style="margin-top:0">LEAVE</span> Leave</span>
                        </div>
                    </div>
                </section>

                <section class="tab-panel" id="attendance-requests">
                    <div class="requests-shell">
                        <div class="requests-header">
                            <div class="requests-title">Work From Home / On Duty Requests</div>
                            <div class="requests-range">
                                <span>28 Feb 2026 - 13 Apr 2026</span>
                                <span class="requests-kebab" aria-hidden="true">&#8942;</span>
                            </div>
                        </div>
                        <div class="requests-table-wrap">
                            <table class="requests-table">
                                <thead>
                                    <tr>
                                        <th style="width:12%">Date</th>
                                        <th style="width:10%">Request Type</th>
                                        <th style="width:16%">Requested On</th>
                                        <th style="width:10%">Attachments</th>
                                        <th style="width:18%">Note</th>
                                        <th style="width:9%">Reason</th>
                                        <th style="width:8%">Status</th>
                                        <th style="width:13%">Last Action By</th>
                                        <th style="width:8%">Next Approver</th>
                                        <th style="width:6%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="requests-date">10 Mar 2026 <span class="requests-day"><i class="fa-solid fa-briefcase"></i><span class="requests-sub">1 Day</span></span></td>
                                        <td>On Duty</td>
                                        <td>10 Mar 2026 11:10 AM<br><span class="requests-sub">by Dipti Ranjan Sahoo</span></td>
                                        <td></td>
                                        <td class="requests-note">Watco for PLC discussion</td>
                                        <td class="requests-reason"></td>
                                        <td class="requests-status approved">Approved</td>
                                        <td class="requests-action-by">Ashutosh Nayak<br><span class="requests-sub">on 11 Mar 2026</span></td>
                                        <td class="requests-next"></td>
                                        <td><div class="requests-actions"><i class="fa-regular fa-comment-dots"></i><i class="fa-solid fa-ellipsis"></i></div></td>
                                    </tr>
                                    <tr>
                                        <td class="requests-date">11 Mar 2026 <span class="requests-day"><i class="fa-solid fa-briefcase"></i><span class="requests-sub">1 Day</span></span></td>
                                        <td>On Duty</td>
                                        <td>11 Mar 2026 03:20 PM<br><span class="requests-sub">by Subash Behera</span></td>
                                        <td></td>
                                        <td class="requests-note">Silicon University for Training Discussion</td>
                                        <td class="requests-reason"></td>
                                        <td class="requests-status approved">Approved</td>
                                        <td class="requests-action-by">Sasmita Behera<br><span class="requests-sub">on 13 Mar 2026</span></td>
                                        <td class="requests-next"></td>
                                        <td><div class="requests-actions"><i class="fa-regular fa-comment-dots"></i><i class="fa-solid fa-ellipsis"></i></div></td>
                                    </tr>
                                    <tr>
                                        <td class="requests-date">12 Mar 2026 <span class="requests-day"><i class="fa-solid fa-briefcase"></i><span class="requests-sub">1 Day</span></span></td>
                                        <td>On Duty</td>
                                        <td>12 Mar 2026 11:22 AM<br><span class="requests-sub">by Chandan Kumar Sahoo</span></td>
                                        <td></td>
                                        <td class="requests-note">watco to meet GM for Nimpara visit</td>
                                        <td class="requests-reason"></td>
                                        <td class="requests-status approved">Approved</td>
                                        <td class="requests-action-by">Debasish Nayak<br><span class="requests-sub">on 13 Mar 2026</span></td>
                                        <td class="requests-next"></td>
                                        <td><div class="requests-actions"><i class="fa-regular fa-comment-dots"></i><i class="fa-solid fa-ellipsis"></i></div></td>
                                    </tr>
                                    <tr>
                                        <td class="requests-date">16 Mar 2026 <span class="requests-day"><i class="fa-solid fa-briefcase"></i><span class="requests-sub">1 Day</span></span></td>
                                        <td>On Duty</td>
                                        <td>16 Mar 2026 12:16 PM<br><span class="requests-sub">by Laxmipriya Sethi</span></td>
                                        <td></td>
                                        <td class="requests-note">Watco PLC discussion</td>
                                        <td class="requests-reason"></td>
                                        <td class="requests-status approved">Approved</td>
                                        <td class="requests-action-by">Sushree Sahoo<br><span class="requests-sub">on 19 Mar 2026</span></td>
                                        <td class="requests-next"></td>
                                        <td><div class="requests-actions"><i class="fa-regular fa-comment-dots"></i><i class="fa-solid fa-ellipsis"></i></div></td>
                                    </tr>
                                    <tr>
                                        <td class="requests-date">17 Mar 2026 <span class="requests-day"><i class="fa-solid fa-briefcase"></i><span class="requests-sub">1 Day</span></span></td>
                                        <td>On Duty</td>
                                        <td>17 Mar 2026 09:29 AM<br><span class="requests-sub">by Ananya Sahoo</span></td>
                                        <td></td>
                                        <td class="requests-note">sunjray yo contact for IOT device</td>
                                        <td class="requests-reason"></td>
                                        <td class="requests-status pending">Pending</td>
                                        <td class="requests-action-by">Sukanta Behera<br><span class="requests-sub">on 19 Mar 2026</span></td>
                                        <td class="requests-next"></td>
                                        <td><div class="requests-actions"><i class="fa-regular fa-comment-dots"></i><i class="fa-solid fa-ellipsis"></i></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script src="assets/js/sidebar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/HRMS/app/includes/sidebar.php?v=' + new Date().getTime()).then(r => r.text()).then(html => {
                const sidebarContainer = document.querySelector('.sidebar');
                if (!sidebarContainer) return;
                sidebarContainer.outerHTML = html;
                const attendanceLink = document.querySelector('.submenu a[href="user-attendance.php"]');
                if (attendanceLink) attendanceLink.classList.add('active');
                const timesheetLink = document.querySelector('.submenu a[href="timesheet.php"]');
                if (timesheetLink) timesheetLink.classList.remove('active');
                const sidebarMeLink = document.getElementById('sidebar-me-link');
                if (sidebarMeLink) sidebarMeLink.style.backgroundColor = '#1e3a5f';
                if (window.initSidebarFlyouts) window.initSidebarFlyouts();
            }).catch(error => console.error('Error loading sidebar:', error));

            const timerKey = 'hrmsAttendanceShiftStart';
            const maxDurationMs = 8 * 60 * 60 * 1000;
            let startTime = Number(localStorage.getItem(timerKey));
            let timerInterval = null;

            if (!startTime || Number.isNaN(startTime)) {
                startTime = Date.now();
                localStorage.setItem(timerKey, String(startTime));
            }

            const timerEl = document.getElementById('shift-timer');
            const timerFillEl = document.getElementById('shift-timer-fill');

            function pad(num) {
                return String(num).padStart(2, '0');
            }

            function renderTimer() {
                const elapsed = Math.min(Date.now() - startTime, maxDurationMs);
                const totalSeconds = Math.floor(elapsed / 1000);
                const hours = Math.floor(totalSeconds / 3600);
                const minutes = Math.floor((totalSeconds % 3600) / 60);
                const seconds = totalSeconds % 60;
                const progress = (elapsed / maxDurationMs) * 100;

                if (timerEl) {
                    timerEl.textContent = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
                }
                if (timerFillEl) {
                    timerFillEl.style.width = `${Math.min(progress, 100)}%`;
                }

                if (elapsed >= maxDurationMs) {
                    clearInterval(timerInterval);
                }
            }

            renderTimer();
            timerInterval = setInterval(renderTimer, 1000);

            const tabs = document.querySelectorAll('.log-tab');
            const panels = document.querySelectorAll('.tab-panel');
            const logPills = document.querySelectorAll('.range-pill[data-filter]');
            const logRangeTitle = document.getElementById('attendance-log-range-title');
            const logBody = document.getElementById('attendance-log-body');
            const statsMeLabel = document.getElementById('stats-me-label');
            const statsMeValue = document.getElementById('stats-me-value');
            const statsMeSecondaryLabel = document.getElementById('stats-me-secondary-label');
            const statsMeSecondaryValue = document.getElementById('stats-me-secondary-value');
            const statsTeamLabel = document.getElementById('stats-team-label');
            const statsTeamValue = document.getElementById('stats-team-value');
            const statsTeamSecondaryLabel = document.getElementById('stats-team-secondary-label');
            const statsTeamSecondaryValue = document.getElementById('stats-team-secondary-value');
            const statsPeriodTrigger = document.getElementById('stats-period-trigger');
            const statsPeriodLabel = document.getElementById('stats-period-label');
            const statsPeriodMenu = document.getElementById('stats-period-menu');
            const statsPeriodOptions = document.querySelectorAll('.small-select-option[data-stats-period]');
            const timingsDuration = document.getElementById('timings-duration');
            const timingsBreak = document.getElementById('timings-break');
            const timingsBar = document.getElementById('timings-bar');
            const timingsCaption = document.getElementById('timings-caption');
            const timingsDots = document.querySelectorAll('#timings-week-dots .week-dot');
            const shiftDateEl = document.getElementById('shift-date');
            const monthLabel = document.getElementById('calendar-month-label');
            const calendarDays = document.getElementById('calendar-days');
            const prevMonthBtn = document.getElementById('calendar-prev-month');
            const nextMonthBtn = document.getElementById('calendar-next-month');
            const twentyFourToggle = document.getElementById('twenty-four-toggle');
            const twentyFourSwitch = document.getElementById('twenty-four-switch');
            const statsPeriodLabels = {
                '30DAYS': 'Last Week',
                'FEB': 'February',
                'JAN': 'January',
                'DEC': 'December',
                'NOV': 'November',
                'OCT': 'October',
                'SEP': 'September',
            };
            const statsSummaryData = {
                '30DAYS': { me: '9h 20m', meSecondary: '100%', team: '2h 54m', teamSecondary: '33%' },
                'FEB': { me: '8h 42m', meSecondary: '96%', team: '3h 12m', teamSecondary: '41%' },
                'JAN': { me: '8h 31m', meSecondary: '94%', team: '3h 01m', teamSecondary: '39%' },
                'DEC': { me: '8h 08m', meSecondary: '92%', team: '2h 47m', teamSecondary: '36%' },
                'NOV': { me: '8h 36m', meSecondary: '95%', team: '3h 04m', teamSecondary: '38%' },
                'OCT': { me: '8h 15m', meSecondary: '93%', team: '2h 58m', teamSecondary: '35%' },
                'SEP': { me: '8h 11m', meSecondary: '91%', team: '2h 51m', teamSecondary: '34%' },
            };
            const timingsWeekData = {
                '30DAYS': [
                    { caption: 'Monday (11:00 AM - 7:30 PM)', duration: '8h 30m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 41%,#c8dfe5 41% 54%,#72c6d7 54% 100%)' },
                    { caption: 'Tuesday (10:45 AM - 7:15 PM)', duration: '8h 25m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 38%,#c8dfe5 38% 51%,#72c6d7 51% 100%)' },
                    { caption: 'Wednesday (10:30 AM - 7:00 PM)', duration: '8h 20m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 36%,#c8dfe5 36% 49%,#72c6d7 49% 100%)' },
                    { caption: 'Thursday (10:30 AM - 7:00 PM)', duration: '8h 20m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 36%,#c8dfe5 36% 49%,#72c6d7 49% 100%)' },
                    { caption: 'Friday (10:15 AM - 6:45 PM)', duration: '8h 15m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 48%,#72c6d7 48% 100%)' },
                    { caption: 'Saturday (10:00 AM - 5:30 PM)', duration: '7h 30m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 30%,#c8dfe5 30% 42%,#72c6d7 42% 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'FEB': [
                    { caption: 'Monday (10:30 AM - 7:00 PM)', duration: '8h 15m', break: '45 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 46%,#72c6d7 46% 100%)' },
                    { caption: 'Tuesday (10:30 AM - 7:00 PM)', duration: '8h 15m', break: '45 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 46%,#72c6d7 46% 100%)' },
                    { caption: 'Wednesday (10:30 AM - 7:00 PM)', duration: '8h 15m', break: '45 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 46%,#72c6d7 46% 100%)' },
                    { caption: 'Thursday (10:30 AM - 7:00 PM)', duration: '8h 15m', break: '45 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 46%,#72c6d7 46% 100%)' },
                    { caption: 'Friday (10:30 AM - 7:00 PM)', duration: '8h 15m', break: '45 min', bar: 'linear-gradient(90deg,#72c6d7 0 35%,#c8dfe5 35% 46%,#72c6d7 46% 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'JAN': [
                    { caption: 'Monday (10:45 AM - 6:45 PM)', duration: '8h 00m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 32%,#c8dfe5 32% 43%,#72c6d7 43% 100%)' },
                    { caption: 'Tuesday (10:45 AM - 6:45 PM)', duration: '8h 00m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 32%,#c8dfe5 32% 43%,#72c6d7 43% 100%)' },
                    { caption: 'Wednesday (10:45 AM - 6:45 PM)', duration: '8h 00m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 32%,#c8dfe5 32% 43%,#72c6d7 43% 100%)' },
                    { caption: 'Thursday (10:45 AM - 6:45 PM)', duration: '8h 00m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 32%,#c8dfe5 32% 43%,#72c6d7 43% 100%)' },
                    { caption: 'Friday (10:45 AM - 6:45 PM)', duration: '8h 00m', break: '30 min', bar: 'linear-gradient(90deg,#72c6d7 0 32%,#c8dfe5 32% 43%,#72c6d7 43% 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'DEC': [
                    { caption: 'Monday (10:00 AM - 5:45 PM)', duration: '7h 45m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 29%,#c8dfe5 29% 40%,#72c6d7 40% 100%)' },
                    { caption: 'Tuesday (10:00 AM - 5:45 PM)', duration: '7h 45m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 29%,#c8dfe5 29% 40%,#72c6d7 40% 100%)' },
                    { caption: 'Wednesday (Holiday)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Thursday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Friday (10:00 AM - 5:45 PM)', duration: '7h 45m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 29%,#c8dfe5 29% 40%,#72c6d7 40% 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'NOV': [
                    { caption: 'Monday (10:15 AM - 6:30 PM)', duration: '8h 10m', break: '25 min', bar: 'linear-gradient(90deg,#72c6d7 0 34%,#c8dfe5 34% 45%,#72c6d7 45% 100%)' },
                    { caption: 'Tuesday (10:15 AM - 6:30 PM)', duration: '8h 10m', break: '25 min', bar: 'linear-gradient(90deg,#72c6d7 0 34%,#c8dfe5 34% 45%,#72c6d7 45% 100%)' },
                    { caption: 'Wednesday (10:15 AM - 6:30 PM)', duration: '8h 10m', break: '25 min', bar: 'linear-gradient(90deg,#72c6d7 0 34%,#c8dfe5 34% 45%,#72c6d7 45% 100%)' },
                    { caption: 'Thursday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Friday (10:15 AM - 6:30 PM)', duration: '8h 10m', break: '25 min', bar: 'linear-gradient(90deg,#72c6d7 0 34%,#c8dfe5 34% 45%,#72c6d7 45% 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'OCT': [
                    { caption: 'Monday (11:00 AM - 7:00 PM)', duration: '7h 55m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 30%,#c8dfe5 30% 42%,#72c6d7 42% 100%)' },
                    { caption: 'Tuesday (11:00 AM - 7:00 PM)', duration: '7h 55m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 30%,#c8dfe5 30% 42%,#72c6d7 42% 100%)' },
                    { caption: 'Wednesday (Leave)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Thursday (11:00 AM - 7:00 PM)', duration: '7h 55m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 30%,#c8dfe5 30% 42%,#72c6d7 42% 100%)' },
                    { caption: 'Friday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
                'SEP': [
                    { caption: 'Monday (10:45 AM - 6:40 PM)', duration: '7h 50m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 28%,#c8dfe5 28% 39%,#72c6d7 39% 100%)' },
                    { caption: 'Tuesday (10:45 AM - 6:40 PM)', duration: '7h 50m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 28%,#c8dfe5 28% 39%,#72c6d7 39% 100%)' },
                    { caption: 'Wednesday (10:45 AM - 6:40 PM)', duration: '7h 50m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 28%,#c8dfe5 28% 39%,#72c6d7 39% 100%)' },
                    { caption: 'Thursday (10:45 AM - 6:40 PM)', duration: '7h 50m', break: '20 min', bar: 'linear-gradient(90deg,#72c6d7 0 28%,#c8dfe5 28% 39%,#72c6d7 39% 100%)' },
                    { caption: 'Friday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Saturday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                    { caption: 'Sunday (Weekly Off)', duration: '0h 00m', break: '0 min', bar: 'linear-gradient(90deg,#c8dfe5 0 100%)' },
                ],
            };
            let activeStatsFilterKey = '30DAYS';
            let activeTimingDayIndex = 0;
            let isTwentyFourHour = false;

            const attendanceLogData = {
                '30DAYS': {
                    title: 'Last 30 Days',
                    rows: [
                        { date: 'Mon, 30 Mar', visual: [{ cls: 'fill-teal', style: 'width:18%' }], effective: '<span class="mini-circle"></span>6h 4m', gross: '6h 41m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Sun, 29 Mar <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Full day Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Sat, 28 Mar <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Full day Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Fri, 27 Mar <span class="day-tag penalty">PENALTY ?</span> <span class="day-tag leave">LEAVE</span>', visual: [{ cls: 'fill-teal', style: 'width:11%' }, { cls: 'fill-purple', style: 'left:27%;width:13%' }], effective: '<span class="mini-circle"></span>3h 42m', gross: '3h 44m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Thu, 26 Mar', visual: [{ cls: 'fill-teal', style: 'width:24%' }], effective: '<span class="mini-circle"></span>6h 41m', gross: '8h 21m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 25 Mar <span class="day-tag od">OD</span>', visual: [{ cls: 'fill-amber', style: 'width:33%' }], effective: '<span class="mini-circle"></span>15h 1m', gross: '15h 3m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 24 Mar', visual: [{ cls: 'fill-teal', style: 'width:15%' }], effective: '<span class="mini-circle"></span>5h 9m', gross: '5h 40m', arrival: 'Late', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                    ],
                },
                'FEB': {
                    title: 'February 2026',
                    rows: [
                        { date: 'Mon, 23 Feb', visual: [{ cls: 'fill-teal', style: 'width:20%' }], effective: '<span class="mini-circle"></span>6h 12m', gross: '6h 48m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 24 Feb', visual: [{ cls: 'fill-teal', style: 'width:22%' }], effective: '<span class="mini-circle"></span>6h 20m', gross: '6h 55m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 25 Feb <span class="day-tag od">OD</span>', visual: [{ cls: 'fill-amber', style: 'width:30%' }], effective: '<span class="mini-circle"></span>12h 4m', gross: '12h 20m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Thu, 26 Feb', visual: [{ cls: 'fill-teal', style: 'width:16%' }], effective: '<span class="mini-circle"></span>5h 16m', gross: '5h 50m', arrival: 'Late', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Fri, 27 Feb <span class="day-tag leave">LEAVE</span>', soft: true, effective: 'Leave', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Sat, 28 Feb <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Full day Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
                'JAN': {
                    title: 'January 2026',
                    rows: [
                        { date: 'Mon, 26 Jan', visual: [{ cls: 'fill-teal', style: 'width:19%' }], effective: '<span class="mini-circle"></span>6h 8m', gross: '6h 33m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 27 Jan', visual: [{ cls: 'fill-teal', style: 'width:21%' }], effective: '<span class="mini-circle"></span>6h 27m', gross: '6h 59m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 28 Jan <span class="day-tag od">OD</span>', visual: [{ cls: 'fill-amber', style: 'width:31%' }], effective: '<span class="mini-circle"></span>11h 2m', gross: '11h 18m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Thu, 29 Jan', visual: [{ cls: 'fill-teal', style: 'width:14%' }], effective: '<span class="mini-circle"></span>4h 56m', gross: '5h 20m', arrival: 'Late', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Fri, 30 Jan <span class="day-tag leave">LEAVE</span>', soft: true, effective: 'Leave', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Sat, 31 Jan <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Full day Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
                'DEC': {
                    title: 'December 2025',
                    rows: [
                        { date: 'Mon, 22 Dec', visual: [{ cls: 'fill-teal', style: 'width:18%' }], effective: '<span class="mini-circle"></span>6h 2m', gross: '6h 21m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 23 Dec', visual: [{ cls: 'fill-teal', style: 'width:22%' }], effective: '<span class="mini-circle"></span>6h 36m', gross: '7h 02m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 24 Dec <span class="day-tag holiday">HOLIDAY</span>', soft: true, effective: 'Holiday', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Thu, 25 Dec <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Fri, 26 Dec', visual: [{ cls: 'fill-teal', style: 'width:24%' }], effective: '<span class="mini-circle"></span>7h 1m', gross: '7h 18m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Sat, 27 Dec', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
                'NOV': {
                    title: 'November 2025',
                    rows: [
                        { date: 'Mon, 24 Nov', visual: [{ cls: 'fill-teal', style: 'width:20%' }], effective: '<span class="mini-circle"></span>6h 17m', gross: '6h 42m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 25 Nov', visual: [{ cls: 'fill-teal', style: 'width:23%' }], effective: '<span class="mini-circle"></span>6h 49m', gross: '7h 10m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 26 Nov <span class="day-tag od">OD</span>', visual: [{ cls: 'fill-amber', style: 'width:29%' }], effective: '<span class="mini-circle"></span>10h 54m', gross: '11h 12m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Thu, 27 Nov <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Fri, 28 Nov', visual: [{ cls: 'fill-teal', style: 'width:16%' }], effective: '<span class="mini-circle"></span>5h 11m', gross: '5h 33m', arrival: 'Late', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Sat, 29 Nov <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
                'OCT': {
                    title: 'October 2025',
                    rows: [
                        { date: 'Mon, 27 Oct', visual: [{ cls: 'fill-teal', style: 'width:18%' }], effective: '<span class="mini-circle"></span>6h 1m', gross: '6h 25m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 28 Oct', visual: [{ cls: 'fill-teal', style: 'width:21%' }], effective: '<span class="mini-circle"></span>6h 29m', gross: '6h 54m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 29 Oct <span class="day-tag leave">LEAVE</span>', soft: true, effective: 'Leave', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Thu, 30 Oct', visual: [{ cls: 'fill-teal', style: 'width:24%' }], effective: '<span class="mini-circle"></span>7h 6m', gross: '7h 29m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Fri, 31 Oct <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
                'SEP': {
                    title: 'September 2025',
                    rows: [
                        { date: 'Mon, 22 Sep', visual: [{ cls: 'fill-teal', style: 'width:19%' }], effective: '<span class="mini-circle"></span>6h 10m', gross: '6h 35m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Tue, 23 Sep', visual: [{ cls: 'fill-teal', style: 'width:22%' }], effective: '<span class="mini-circle"></span>6h 42m', gross: '7h 02m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Wed, 24 Sep <span class="day-tag od">OD</span>', visual: [{ cls: 'fill-amber', style: 'width:30%' }], effective: '<span class="mini-circle"></span>11h 5m', gross: '11h 24m', arrival: '<span class="status-ok">&#10003;</span> On Time', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Thu, 25 Sep', visual: [{ cls: 'fill-teal', style: 'width:16%' }], effective: '<span class="mini-circle"></span>5h 19m', gross: '5h 42m', arrival: 'Late', log: '<i class="fa-regular fa-circle-check log-icon"></i>' },
                        { date: 'Fri, 26 Sep <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                        { date: 'Sat, 27 Sep <span class="day-tag woff">W-OFF</span>', soft: true, effective: 'Weekly-off', gross: '', arrival: '', log: '<i class="fa-solid fa-ellipsis" style="color:#b7b0a0"></i>' },
                    ],
                },
            };

            function renderAttendanceLog(filterKey) {
                if (!logBody) return;

                const data = attendanceLogData[filterKey] || attendanceLogData['30DAYS'];
                if (logRangeTitle) {
                    logRangeTitle.textContent = data.title;
                }

                logBody.innerHTML = data.rows.map(row => {
                    const visual = row.visual && row.visual.length
                        ? `<div class="visual-track">${row.visual.map(seg => `<span class="visual-fill ${seg.cls}" style="${seg.style}"></span>`).join('')}</div>`
                        : '';

                    return `
                        <tr class="${row.soft ? 'row-soft' : ''}">
                            <td class="attendance-date">${row.date}</td>
                            <td>${visual}</td>
                            <td>${row.effective || ''}</td>
                            <td>${row.gross || ''}</td>
                            <td>${row.arrival || ''}</td>
                            <td>${row.log || ''}</td>
                        </tr>
                    `;
                }).join('');
            }

            function renderAttendanceStats(filterKey) {
                const data = attendanceLogData[filterKey] || attendanceLogData['30DAYS'];
                const summary = statsSummaryData[filterKey] || statsSummaryData['30DAYS'];
                const rows = data.rows || [];
                activeStatsFilterKey = filterKey;

                const counts = rows.reduce((acc, row) => {
                    const text = String(row.date || '').toUpperCase();
                    const effective = String(row.effective || '').toUpperCase();
                    const arrival = String(row.arrival || '').toUpperCase();

                    if (!row.soft && row.visual && row.visual.length) {
                        acc.present += 1;
                    }
                    if (arrival.includes('LATE')) {
                        acc.late += 1;
                    }
                    if (text.includes('LEAVE') || effective.includes('LEAVE')) {
                        acc.leave += 1;
                    }
                    if (text.includes('W-OFF') || effective.includes('WEEKLY-OFF')) {
                        acc.weeklyOff += 1;
                    }

                    return acc;
                }, { present: 0, late: 0, leave: 0, weeklyOff: 0 });

                if (statsMeLabel) statsMeLabel.textContent = 'Avg Hrs / Day';
                if (statsMeValue) statsMeValue.textContent = summary.me;
                if (statsMeSecondaryLabel) statsMeSecondaryLabel.textContent = 'On Time Arrival';
                if (statsMeSecondaryValue) statsMeSecondaryValue.textContent = summary.meSecondary;
                if (statsTeamLabel) statsTeamLabel.textContent = 'Avg Hrs / Day';
                if (statsTeamValue) statsTeamValue.textContent = summary.team;
                if (statsTeamSecondaryLabel) statsTeamSecondaryLabel.textContent = 'On Time Arrival';
                if (statsTeamSecondaryValue) statsTeamSecondaryValue.textContent = summary.teamSecondary;
                if (statsPeriodLabel) statsPeriodLabel.textContent = statsPeriodLabels[filterKey] || 'Last Week';
                statsPeriodOptions.forEach(option => {
                    option.classList.toggle('active', option.dataset.statsPeriod === filterKey);
                });
                if (shiftDateEl) {
                    const now = new Date();
                    shiftDateEl.textContent = now.toLocaleDateString('en-US', {
                        weekday: 'short',
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                    });
                }

                renderTimings(filterKey, activeTimingDayIndex);
            }

            function setStatsPeriodMenu(open) {
                if (!statsPeriodMenu || !statsPeriodTrigger) return;
                statsPeriodMenu.classList.toggle('open', open);
                statsPeriodTrigger.setAttribute('aria-expanded', open ? 'true' : 'false');
            }

            function formatTimeTo24Hour(timePart) {
                const match = String(timePart || '').trim().match(/^(\d{1,2})(?::(\d{2}))?\s*(AM|PM)$/i);
                if (!match) return timePart;

                let hours = Number(match[1]);
                const minutes = match[2] || '00';
                const period = match[3].toUpperCase();

                if (period === 'AM') {
                    if (hours === 12) hours = 0;
                } else if (hours !== 12) {
                    hours += 12;
                }

                return `${String(hours).padStart(2, '0')}:${minutes}`;
            }

            function toTwentyFourHourText(text) {
                return String(text || '').replace(/(\d{1,2}:\d{2}\s*(?:AM|PM))/gi, match => formatTimeTo24Hour(match));
            }

            function renderTimings(filterKey, dayIndex) {
                const dayData = (timingsWeekData[filterKey] || timingsWeekData['30DAYS'])[dayIndex] || (timingsWeekData['30DAYS'][0]);
                if (timingsCaption) timingsCaption.textContent = isTwentyFourHour ? toTwentyFourHourText(dayData.caption) : dayData.caption;
                if (timingsDuration) timingsDuration.textContent = dayData.duration;
                if (timingsBreak) timingsBreak.textContent = dayData.break;
                if (timingsBar) timingsBar.style.background = dayData.bar;

                if (timingsDots.length) {
                    timingsDots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === dayIndex);
                    });
                }
            }

            const calendarEvents = {
                '2026-03-01': { type: 'woff' },
                '2026-03-04': { type: 'holiday' },
                '2026-03-07': { type: 'woff' },
                '2026-03-08': { type: 'woff' },
                '2026-03-14': { type: 'woff' },
                '2026-03-15': { type: 'woff' },
                '2026-03-21': { type: 'woff' },
                '2026-03-22': { type: 'woff' },
                '2026-03-25': { type: 'od' },
                '2026-03-27': { type: 'leave' },
                '2026-03-28': { type: 'woff' },
                '2026-03-29': { type: 'woff' },
            };
            const attendanceSchedule = new Set([2, 3, 5, 6, 9, 10, 11, 12, 13, 16, 17, 18, 19, 20, 23, 24, 26, 30]);
            let calendarMonth = new Date(2026, 2, 1);

            function monthLabelText(date) {
                return date.toLocaleString('en-US', { month: 'short', year: 'numeric' });
            }

            function formatCalendarKey(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            }

            function getMondayOffset(date) {
                return (date.getDay() + 6) % 7;
            }

            function renderCalendar(date) {
                if (!calendarDays || !monthLabel) return;

                const firstOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
                const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
                const startOffset = getMondayOffset(firstOfMonth);
                const totalCells = 42;
                const previousMonthDays = new Date(date.getFullYear(), date.getMonth(), 0).getDate();

                monthLabel.textContent = monthLabelText(date);
                calendarDays.innerHTML = '';

                for (let cell = 0; cell < totalCells; cell += 1) {
                    const dayNumber = cell - startOffset + 1;
                    const dayEl = document.createElement('div');
                    dayEl.className = 'calendar-day';

                    let displayDay = dayNumber;
                    let muted = false;
                    let activeDate = new Date(date.getFullYear(), date.getMonth(), dayNumber);

                    if (cell < startOffset) {
                        const prevDay = previousMonthDays - (startOffset - cell) + 1;
                        displayDay = prevDay;
                        muted = true;
                        activeDate = new Date(date.getFullYear(), date.getMonth() - 1, prevDay);
                    } else if (dayNumber > daysInMonth) {
                        displayDay = dayNumber - daysInMonth;
                        muted = true;
                        activeDate = new Date(date.getFullYear(), date.getMonth() + 1, displayDay);
                    }

                    const event = calendarEvents[formatCalendarKey(activeDate)];
                    if (muted) {
                        dayEl.classList.add('muted');
                    }

                    const numberEl = document.createElement('div');
                    numberEl.className = 'calendar-day-number';
                    numberEl.textContent = displayDay;
                    dayEl.appendChild(numberEl);

                    if (!muted) {
                        if (event) {
                            const chip = document.createElement('span');
                            chip.className = `calendar-chip ${event.type}`;
                            chip.textContent = event.type === 'woff' ? 'W-OFF' : event.type === 'holiday' ? 'HOLIDAY' : event.type === 'od' ? 'OD' : 'LEAVE';
                            dayEl.appendChild(chip);
                        } else if (attendanceSchedule.has(displayDay)) {
                            const note = document.createElement('div');
                            note.className = 'calendar-note';
                            note.textContent = '11:00 AM - 7:30 PM';
                            dayEl.appendChild(note);
                        }
                    }

                    calendarDays.appendChild(dayEl);
                }
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', function (event) {
                    event.preventDefault();

                    const targetId = tab.dataset.tab;
                    if (!targetId) return;

                    tabs.forEach(item => item.classList.remove('active'));
                    panels.forEach(panel => panel.classList.remove('active'));

                    tab.classList.add('active');
                    const panel = document.getElementById(targetId);
                    if (panel) panel.classList.add('active');
                });
            });

            logPills.forEach(pill => {
                pill.addEventListener('click', function () {
                    const filterKey = pill.dataset.filter || '30DAYS';
                    logPills.forEach(item => item.classList.remove('active'));
                    pill.classList.add('active');
                    setStatsPeriodMenu(false);
                    renderAttendanceLog(filterKey);
                    renderAttendanceStats(filterKey);
                });
            });

            if (timingsDots.length) {
                timingsDots.forEach((dot, index) => {
                    dot.style.cursor = 'pointer';
                    dot.setAttribute('role', 'button');
                    dot.setAttribute('tabindex', '0');
                    dot.addEventListener('click', function () {
                        activeTimingDayIndex = index;
                        renderTimings(activeStatsFilterKey, activeTimingDayIndex);
                    });
                    dot.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            activeTimingDayIndex = index;
                            renderTimings(activeStatsFilterKey, activeTimingDayIndex);
                        }
                    });
                });
            }

            if (twentyFourToggle && twentyFourSwitch) {
                twentyFourToggle.addEventListener('click', function () {
                    isTwentyFourHour = !isTwentyFourHour;
                    twentyFourToggle.setAttribute('aria-pressed', isTwentyFourHour ? 'true' : 'false');
                    twentyFourSwitch.classList.toggle('on', isTwentyFourHour);
                    renderTimings(activeStatsFilterKey, activeTimingDayIndex);
                });
            }

            if (statsPeriodTrigger && statsPeriodMenu) {
                statsPeriodTrigger.addEventListener('click', function (event) {
                    event.stopPropagation();
                    setStatsPeriodMenu(!statsPeriodMenu.classList.contains('open'));
                });

                statsPeriodOptions.forEach(option => {
                    option.addEventListener('click', function (event) {
                        event.stopPropagation();
                        const filterKey = option.dataset.statsPeriod || '30DAYS';
                        logPills.forEach(item => item.classList.toggle('active', item.dataset.filter === filterKey));
                        renderAttendanceLog(filterKey);
                        renderAttendanceStats(filterKey);
                        setStatsPeriodMenu(false);
                    });
                });

                document.addEventListener('click', function () {
                    setStatsPeriodMenu(false);
                });

                document.addEventListener('keydown', function (event) {
                    if (event.key === 'Escape') {
                        setStatsPeriodMenu(false);
                    }
                });
            }

            if (prevMonthBtn) {
                prevMonthBtn.addEventListener('click', function () {
                    calendarMonth = new Date(calendarMonth.getFullYear(), calendarMonth.getMonth() - 1, 1);
                    renderCalendar(calendarMonth);
                });
            }

            if (nextMonthBtn) {
                nextMonthBtn.addEventListener('click', function () {
                    calendarMonth = new Date(calendarMonth.getFullYear(), calendarMonth.getMonth() + 1, 1);
                    renderCalendar(calendarMonth);
                });
            }

            renderAttendanceStats('30DAYS');
            renderTimings('30DAYS', 0);
            renderCalendar(calendarMonth);
            renderAttendanceLog('30DAYS');
        });
    </script>

