<?php

declare(strict_types=1);

$currentPath = basename((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH));
$currentStem = strtolower((string) preg_replace('/\.(php|html)$/i', '', $currentPath));

$isCurrent = static function (string $stem) use ($currentStem): bool {
    return $currentStem === strtolower($stem);
};

$meActive = in_array($currentStem, [
    'user-attendance',
    'timesheet',
    'user-leave',
    'user-performance',
    'user-performance-meetings',
    'user-performance-feedback',
    'user-performance-pip',
    'user-performance-reviews',
    'user-performance-skills',
    'user-performance-competencies',
    'user-expenses',
    'user-support',
], true);

$myTeamActive = in_array($currentStem, [
    'myteam_leave_overview',
    'myteam_leave_approvals',
    'myteam_leave_direct',
    'myteam_leave_indirect',
    'myteam_leave_digital_services',
], true);
?>
<style>
    .sidebar {
        width: 260px;
        background: #0b1c31;
        display: flex;
        flex-direction: column;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
        overflow: visible;
        z-index: 100;
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 255, 255, 0.18) transparent;
    }

    .sidebar::-webkit-scrollbar {
        width: 8px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.18);
        border-radius: 999px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .sidebar-brand {
        background: #6366f1;
        padding: 20px 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        box-sizing: border-box;
    }

    .sidebar-brand span {
        color: #fff;
        font-weight: 800;
        font-size: 18px;
        font-style: italic;
        letter-spacing: -1.5px;
    }

    .sidebar-scroll {
        flex: 1;
        padding: 12px 0 14px;
        overflow-y: auto;
        overflow-x: visible;
        max-height: calc(100vh - 132px);
    }

    .sidebar-link,
    .sidebar-subitem {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #ffffff !important;
        text-decoration: none !important;
        transition: background-color 0.15s ease, opacity 0.15s ease, transform 0.15s ease;
        box-sizing: border-box;
        width: 100%;
    }

    .sidebar-link {
        padding: 12px 16px;
        opacity: 0.72;
        font-size: 13px;
        font-weight: 600;
    }

    .sidebar-link:hover,
    .sidebar-subitem:hover {
        background: #162845;
        opacity: 1;
    }

    .sidebar-link.active,
    .sidebar-section.active > .sidebar-link,
    .sidebar-subitem.active {
        background: #1e3a5f;
        opacity: 1;
    }

    .sidebar-link i {
        width: 18px;
        text-align: center;
        font-size: 16px;
        flex: 0 0 auto;
        color: #ffffff !important;
    }

    .sidebar-link .sidebar-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .sidebar-link--home {
        position: relative;
    }

    .sidebar-link--home .sidebar-count {
        position: absolute;
        top: 10px;
        right: 12px;
        background: #ef4444;
        color: #fff;
        font-size: 8px;
        font-weight: 700;
        min-width: 16px;
        height: 16px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1.5px solid #0b1c31;
    }

    .sidebar-section {
        padding: 4px 0 8px;
    }

    .sidebar-section-title {
        padding: 12px 16px 6px;
        font-size: 10px;
        font-weight: 700;
        color: #7d8ca6;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .sidebar-submenu {
        display: flex;
        flex-direction: column;
        gap: 2px;
        padding-bottom: 2px;
    }

    .sidebar-expandable {
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .sidebar-expandable-panel {
        display: none;
        flex-direction: column;
        gap: 2px;
        pointer-events: none;
    }

    .sidebar-subitem {
        padding: 9px 16px 9px 44px;
        font-size: 12px;
        font-weight: 500;
        opacity: 0.82;
        position: relative;
    }

    .sidebar-subitem--trigger .chevron {
        margin-left: auto;
        font-size: 10px;
        opacity: 0.55;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }

    .sidebar-subitem::before {
        content: '';
        position: absolute;
        left: 28px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.22);
    }

    .sidebar-expandable .sidebar-subitem::before {
        background: rgba(255, 255, 255, 0.18);
    }

    .sidebar-expandable .sidebar-subitem--trigger::before {
        background: rgba(255, 255, 255, 0.24);
    }

    .sidebar-expandable-panel .sidebar-subitem {
        padding-left: 26px;
        padding-right: 18px;
    }

    .sidebar-expandable-panel .sidebar-subitem::before {
        left: 12px;
    }

    .sidebar-expandable:hover > .sidebar-subitem--trigger .chevron,
    .sidebar-expandable:focus-within > .sidebar-subitem--trigger .chevron,
    .sidebar-expandable.active > .sidebar-subitem--trigger .chevron,
    .sidebar-expandable.is-open > .sidebar-subitem--trigger .chevron {
        transform: rotate(180deg);
        opacity: 0.9;
    }

    .sidebar-subitem.active::before,
    .sidebar-link.active::before {
        background: #9fd2ff;
    }

    .sidebar-flyout-layer {
        position: fixed;
        inset: 0;
        z-index: 220;
        pointer-events: none;
    }

    .sidebar-flyout-panel {
        position: fixed;
        left: 260px;
        top: 0;
        min-width: 200px;
        max-width: 240px;
        display: flex;
        flex-direction: column;
        align-items: stretch;
        background: linear-gradient(180deg, #0d2038 0%, #0b1c31 100%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-left: 0;
        border-radius: 0 14px 14px 0;
        box-shadow: 14px 0 36px rgba(0, 0, 0, 0.34), 0 12px 28px rgba(0, 0, 0, 0.16);
        padding: 10px 0;
        opacity: 0;
        transform: translateX(-12px) scale(0.98);
        transition: opacity 0.2s ease, transform 0.2s ease;
        pointer-events: none;
    }

    .sidebar-flyout-panel.is-open {
        opacity: 1;
        transform: translateX(0) scale(1);
        pointer-events: auto;
    }

    .sidebar-flyout-panel .flyout-content {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        width: 100%;
    }

    .sidebar-flyout-panel .sidebar-subitem {
        padding-left: 26px;
        padding-right: 18px;
        width: 100%;
        white-space: nowrap;
    }

    .sidebar-flyout-panel .sidebar-subitem::before {
        left: 12px;
    }

    .sidebar-flyout-panel .sidebar-subitem--nested {
        padding-left: 26px;
    }

    .sidebar-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding: 16px 0 18px;
    }

    .sidebar-footer .sidebar-link {
        opacity: 0.6;
    }

    .sidebar,
    .sidebar a,
    .sidebar span,
    .sidebar i {
        color: #ffffff !important;
    }
</style>

<div class="sidebar">
    <div class="sidebar-brand">
        <span>TEAMAXIS</span>
    </div>

    <div class="sidebar-scroll">
        <a href="/HRMS/public/dashboard.php" class="sidebar-link sidebar-link--home <?= $isCurrent('dashboard') ? 'active' : '' ?>">
            <i class="fa-solid fa-house"></i>
            <span class="sidebar-label">Home</span>
        </a>

        <section class="sidebar-section <?= $meActive ? 'active' : '' ?>">
            <a href="/HRMS/public/user-attendance.php" id="sidebar-me-link" class="sidebar-link sidebar-section-link <?= $meActive ? 'active' : '' ?>">
                <i class="fa-solid fa-user"></i>
                <span class="sidebar-label">Me</span>
            </a>

            <div class="sidebar-submenu">
                <a href="/HRMS/public/user-attendance.php" class="sidebar-subitem <?= $isCurrent('user-attendance') ? 'active' : '' ?>" data-sidebar-path="user-attendance" data-sidebar-section="me">
                    Attendance
                </a>

                <div class="sidebar-expandable <?= $isCurrent('timesheet') ? 'active' : '' ?>" data-sidebar-group="me-timesheet">
                    <a href="/HRMS/public/timesheet.php" class="sidebar-subitem sidebar-subitem--trigger <?= $isCurrent('timesheet') ? 'active' : '' ?>" data-sidebar-path="timesheet" data-sidebar-section="me">
                        Timesheet
                        <i class="fa-solid fa-chevron-left chevron"></i>
                    </a>
                    <div class="sidebar-expandable-panel">
                        <a href="/HRMS/public/timesheet.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('timesheet') ? 'active' : '' ?>" data-sidebar-path="timesheet" data-sidebar-section="me">
                            All Timesheets
                        </a>
                        <a href="/HRMS/public/timesheet.php#past-due" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="past-due" data-sidebar-section="me">
                            Past Due
                        </a>
                        <a href="/HRMS/public/timesheet.php#rejected" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="rejected" data-sidebar-section="me">
                            Rejected Timesheets
                        </a>
                        <a href="/HRMS/public/timesheet.php#project-time" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="project-time" data-sidebar-section="me">
                            Project Time
                        </a>
                        <a href="/HRMS/public/timesheet.php#summary" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="summary" data-sidebar-section="me">
                            Time Summary
                        </a>
                        <a href="/HRMS/public/timesheet.php#tasks" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="tasks" data-sidebar-section="me">
                            My Tasks
                        </a>
                        <a href="/HRMS/public/timesheet.php#projects" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-path="timesheet" data-sidebar-hash="projects" data-sidebar-section="me">
                            Projects Allocated
                        </a>
                    </div>
                </div>

                <a href="/HRMS/public/user-leave.php" class="sidebar-subitem <?= $isCurrent('user-leave') ? 'active' : '' ?>" data-sidebar-path="user-leave" data-sidebar-section="me">
                    Leave
                </a>

                <div class="sidebar-expandable <?= in_array($currentStem, ['user-performance', 'user-performance-feedback', 'user-performance-pip', 'user-performance-reviews', 'user-performance-skills', 'user-performance-competencies', 'user-performance-meetings'], true) ? 'active' : '' ?>" data-sidebar-group="me-performance">
                    <a href="/HRMS/public/user-performance.php" class="sidebar-subitem sidebar-subitem--trigger <?= in_array($currentStem, ['user-performance', 'user-performance-feedback', 'user-performance-pip', 'user-performance-reviews', 'user-performance-skills', 'user-performance-competencies', 'user-performance-meetings'], true) ? 'active' : '' ?>" data-sidebar-path="user-performance" data-sidebar-section="me">
                        Performance
                        <i class="fa-solid fa-chevron-left chevron"></i>
                    </a>
                    <div class="sidebar-expandable-panel">
                        <a href="/HRMS/public/user-performance.php" class="sidebar-subitem sidebar-subitem--nested <?= in_array($currentStem, ['user-performance', 'user-performance-feedback', 'user-performance-pip', 'user-performance-reviews', 'user-performance-skills', 'user-performance-competencies', 'user-performance-meetings'], true) ? 'active' : '' ?>" data-sidebar-path="user-performance" data-sidebar-section="me">
                            KRAs
                        </a>
                        <a href="/HRMS/public/user-performance-meetings.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-meetings') ? 'active' : '' ?>" data-sidebar-path="user-performance-meetings" data-sidebar-section="me">
                            1:1 Meetings
                        </a>
                        <a href="/HRMS/public/user-performance-feedback.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-feedback') ? 'active' : '' ?>" data-sidebar-path="user-performance-feedback" data-sidebar-section="me">
                            Feedback
                        </a>
                        <a href="/HRMS/public/user-performance-pip.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-pip') ? 'active' : '' ?>" data-sidebar-path="user-performance-pip" data-sidebar-section="me">
                            PIP
                        </a>
                        <a href="/HRMS/public/user-performance-reviews.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-reviews') ? 'active' : '' ?>" data-sidebar-path="user-performance-reviews" data-sidebar-section="me">
                            Reviews
                        </a>
                        <a href="/HRMS/public/user-performance-skills.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-skills') ? 'active' : '' ?>" data-sidebar-path="user-performance-skills" data-sidebar-section="me">
                            Skills
                        </a>
                        <a href="/HRMS/public/user-performance-competencies.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('user-performance-competencies') ? 'active' : '' ?>" data-sidebar-path="user-performance-competencies" data-sidebar-section="me">
                            Competencies & Core values
                        </a>
                    </div>
                </div>

                <a href="/HRMS/public/user-expenses.php" class="sidebar-subitem <?= $isCurrent('user-expenses') ? 'active' : '' ?>" data-sidebar-path="user-expenses" data-sidebar-section="me">
                    Expenses & Travel
                </a>
                <a href="/HRMS/public/user-support.php" class="sidebar-subitem <?= $isCurrent('user-support') ? 'active' : '' ?>" data-sidebar-path="user-support" data-sidebar-section="me">
                    Helpdesk
                </a>
            </div>
        </section>

        <section class="sidebar-section <?= $myTeamActive ? 'active' : '' ?>">
            <a href="/HRMS/public/myteam_leave_overview.php" id="sidebar-my-team-link" class="sidebar-link sidebar-section-link <?= $myTeamActive ? 'active' : '' ?>">
                <i class="fa-solid fa-people-group"></i>
                <span class="sidebar-label">My Team</span>
            </a>

            <div class="sidebar-submenu">
                <a href="/HRMS/public/myteam_leave_overview.php" class="sidebar-subitem <?= $isCurrent('myteam_leave_overview') ? 'active' : '' ?>" id="sidebar-myteam-leave-overview-link" data-sidebar-path="myteam_leave_overview" data-sidebar-section="myteam">
                    Summary
                </a>

                <div class="sidebar-expandable <?= $myTeamActive ? 'active' : '' ?>" data-sidebar-group="myteam-leave">
                    <a href="/HRMS/public/myteam_leave_overview.php" class="sidebar-subitem sidebar-subitem--trigger <?= $isCurrent('myteam_leave_overview') ? 'active' : '' ?>" data-sidebar-path="myteam_leave_overview" data-sidebar-section="myteam">
                        Leave
                        <i class="fa-solid fa-chevron-left chevron"></i>
                    </a>
                    <div class="sidebar-expandable-panel">
                        <a href="/HRMS/public/myteam_leave_overview.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('myteam_leave_overview') ? 'active' : '' ?>" data-sidebar-path="myteam_leave_overview" data-sidebar-section="myteam">
                            Leave Overview
                        </a>
                        <a href="/HRMS/public/myteam_leave_approvals.php" class="sidebar-subitem sidebar-subitem--nested <?= $isCurrent('myteam_leave_approvals') ? 'active' : '' ?>" id="sidebar-myteam-leave-approvals-link" data-sidebar-path="myteam_leave_approvals" data-sidebar-section="myteam">
                            Leave Approvals
                        </a>
                        <a href="#" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-section="myteam">
                            Penalized Leave
                        </a>
                        <a href="#" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-section="myteam">
                            Past Leave Requests
                        </a>
                        <a href="#" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-section="myteam">
                            Encashment Requests
                        </a>
                        <a href="#" class="sidebar-subitem sidebar-subitem--nested" data-sidebar-section="myteam">
                            Reports
                        </a>
                    </div>
                </div>

                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Attendance
                </a>
                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Expenses & Travel
                </a>
                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Timesheet
                </a>
                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Profile Changes
                </a>
                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Performance
                </a>
                <a href="#" class="sidebar-subitem" data-sidebar-section="myteam">
                    Hiring
                </a>
            </div>
        </section>

        <a href="/HRMS/public/requests.php" class="sidebar-link sidebar-link--home <?= $isCurrent('requests') ? 'active' : '' ?>">
            <i class="fa-solid fa-inbox"></i>
            <span class="sidebar-label">Inbox</span>
            <span class="sidebar-count">25</span>
        </a>

        <a href="/HRMS/public/payroll.php" class="sidebar-link sidebar-link--home <?= $isCurrent('payroll') ? 'active' : '' ?>">
            <i class="fa-solid fa-wallet"></i>
            <span class="sidebar-label">My Finances</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <a href="/HRMS/public/index.php" class="sidebar-link sidebar-link--home">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="sidebar-label" style="color:#ef4444 !important;">Logout</span>
        </a>
    </div>
</div>
