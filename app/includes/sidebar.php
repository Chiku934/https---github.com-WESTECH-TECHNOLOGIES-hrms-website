<style>
    /* --- Premium Flyout Submenu Styles --- */
    .nav-item-wrapper {
        position: relative;
        width: 100%;
    }

    /* Flyout Container */
    .submenu,
    .nested-submenu {
        position: absolute;
        left: 100%;
        top: 0;
        background-color: #0b1c31 !important;
        min-width: 250px;
        display: none;
        flex-direction: column;
        box-shadow: 15px 0 45px rgba(0, 0, 0, 0.4), 0 5px 25px rgba(0, 0, 0, 0.1);
        z-index: 10000;
        border-left: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 0 12px 12px 0;
        list-style: none;
        padding: 12px 0;
        margin: 0;
        animation: premiumFlyoutIn 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes premiumFlyoutIn {
        from {
            opacity: 0;
            transform: translateX(12px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    /* Flyout Header - Makes it feel like Keka */
    .submenu-header {
        padding: 10px 20px 15px;
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 8px;
    }

    .submenu-item {
        padding: 12px 25px;
        color: #ffffff !important;
        text-decoration: none !important;
        font-size: 13.5px;
        font-weight: 500;
        display: block;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: transparent;
        position: relative;
    }

    .submenu-item:hover {
        background-color: #1e3a5f !important;
        color: #ffffff !important;
        padding-left: 30px;
    }

    .submenu-item.active {
        background-color: rgba(99, 102, 241, 0.2) !important;
        color: #ffffff !important;
        font-weight: 600;
        border-left: 3px solid #6366f1;
        padding-left: 28px;
        transform: translateX(3px);
    }

    .submenu-item i.chevron {
        float: right;
        margin-top: 4px;
        font-size: 10px;
        opacity: 0.6;
        color: #ffffff;
    }

    .submenu-item.active i:not(.chevron) {
        background-color: #6366f1;
        color: white;
    }

    .submenu-item i.chevron {
        margin-left: auto;
        font-size: 10px;
        opacity: 0.4;
    }

    .submenu-item-wrapper:hover > .nested-submenu {
        display: flex !important;
        left: 100%;
        top: -12px;
        border-radius: 16px;
    }

    .nested-submenu .submenu-header {
        background: #0b1c31;
        color: #94a3b8 !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .menu-badge {
        background: #ef4444;
        color: white;
        font-size: 9px;
        padding: 2px 6px;
        border-radius: 10px;
        font-weight: 700;
        margin-left: 6px;
    }

    .sidebar,
    .sidebar a,
    .sidebar span,
    .submenu,
    .submenu-item,
    .submenu-item span,
    .nested-submenu,
    .nested-submenu span {
        color: #ffffff !important;
    }

    .sidebar i {
        color: #ffffff !important;
    }

    .sidebar a:hover,
    .submenu-item:hover {
        color: #ffffff !important;
    }

    .submenu-item.active {
        color: #ffffff !important;
    }

    .menu-badge {
        color: #ffffff !important;
    }
</style>

<div style="width: 150px; background-color: #0b1c31; display: flex; flex-direction: column; height: 100vh; position: fixed; top: 0; left: 0; font-family: 'Inter', sans-serif; box-sizing: border-box; overflow: visible; z-index: 100;"
    class="sidebar">

    <div
        style="background-color: #6366f1; padding: 22px 0; display: flex; justify-content: center; align-items: center; width: 100%; position: relative;">
        <span
            style="color: white; font-weight: 800; font-size: 18px; font-style: italic; letter-spacing: -1.5px;">TEAMAXIS</span>
    </div>

    <div style="flex: 1; padding: 15px 0;">

        <a href="dashboard.php"
            style="display: flex; flex-direction: column; align-items: center; padding: 14px 0; text-decoration: none; color: #ffffff; opacity: 0.4; transition: 0.2s; width: 100%;">
            <i class="fa-solid fa-house" style="font-size: 18px; margin-bottom: 6px;"></i>
            <span style="font-size: 10px; font-weight: 400; text-align: center; color: white !important;">Home</span>
        </a>

        <div class="nav-item-wrapper">
            <a href="user-attendance.php" id="sidebar-me-link"
                style="display: flex; flex-direction: column; align-items: center; padding: 14px 0; text-decoration: none; color: #ffffff; transition: 0.2s; width: 100%; opacity: 0.8;">
                <i class="fa-solid fa-user" style="font-size: 18px; margin-bottom: 6px;"></i>
                <span style="font-size: 10px; font-weight: 400; text-align: center; color:white !important;">Me</span>
            </a>

            <div class="submenu">
                <a href="user-attendance.php" class="submenu-item">
                    <span
                        style="font-size: 10px; font-weight: 400; text-align: center; color: white !important;">Attendance</span>
                </a>
                <a href="timesheet.php" class="submenu-item">
                    <span style="color: white;">Timesheet</span>
                </a>
                <a href="user-leave.php" class="submenu-item">
                    <span style="color: white;">Leave</span>
                </a>
                <a href="user-performance.php" class="submenu-item">
                    <span style="color: white;">Performance</span>
                </a>
                <a href="user-expenses.php" class="submenu-item">
                    <span style="color: white;">Expenses & Travel</span>
                </a>
                <a href="user-support.php" class="submenu-item">
                    <span style="color: white;">Helpdesk</span>
                </a>
            </div>
        </div>

        <div class="nav-item-wrapper">
            <a href="myteam_leave_overview.php" id="sidebar-my-team-link"
                style="display: flex; flex-direction: column; align-items: center; padding: 14px 0; text-decoration: none; color: #ffffff; transition: 0.2s; width: 100%; opacity: 0.8;">
                <i class="fa-solid fa-people-group" style="font-size: 18px; margin-bottom: 6px;"></i>
                <span style="font-size: 10px; font-weight: 400; text-align: center; color:white !important;">My Team</span>
            </a>

            <div class="submenu">
                <a href="#" class="submenu-item">
                    <span style="font-size: 10px; font-weight: 400; text-align: center; color: white !important;">Summary</span>
                </a>

                <div class="submenu-item-wrapper">
                    <a href="myteam_leave_overview.php" class="submenu-item">
                        <span style="color: white;">Leave</span>
                        <i class="fa-solid fa-chevron-right chevron"></i>
                    </a>
                    <div class="nested-submenu">
                        <div class="submenu-header">Leave</div>
                        <a href="myteam_leave_overview.php" class="submenu-item" id="sidebar-myteam-leave-overview-link">
                            <span style="color: white;">Leave Overview</span>
                        </a>
                        <a href="myteam_leave_approvals.php" class="submenu-item" id="sidebar-myteam-leave-approvals-link">
                            <span style="color: white;">Leave Approvals</span>
                        </a>
                        <a href="#" class="submenu-item">
                            <span style="color: white;">Penalized Leave</span>
                        </a>
                        <a href="#" class="submenu-item">
                            <span style="color: white;">Past Leave Requests</span>
                        </a>
                        <a href="#" class="submenu-item">
                            <span style="color: white;">Encashment Requests</span>
                        </a>
                        <a href="#" class="submenu-item">
                            <span style="color: white;">Reports</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="submenu-item">
                    <span style="color: white;">Attendance</span>
                </a>
                <a href="#" class="submenu-item">
                    <span style="color: white;">Expenses & Travel</span>
                </a>
                <a href="#" class="submenu-item">
                    <span style="color: white;">Timesheet</span>
                </a>
                <a href="#" class="submenu-item">
                    <span style="color: white;">Profile Changes</span>
                </a>
                <a href="#" class="submenu-item">
                    <span style="color: white;">Performance</span>
                </a>
                <a href="#" class="submenu-item">
                    <span style="color: white;">Hiring</span>
                </a>
            </div>
        </div>

        <a href="requests.php"
            style="display: flex; flex-direction: column; align-items: center; padding: 14px 0; text-decoration: none; color: #ffffff; position: relative; transition: 0.2s; width: 100%; opacity: 0.8;">
            <i class="fa-solid fa-inbox" style="font-size: 18px; margin-bottom: 6px;"></i>
            <span style="font-size: 10px; font-weight: 400; text-align: center;">Inbox</span>
            <span
                style="position: absolute; top: 12px; right: 20px; background-color: #ef4444; color: white; font-size: 8px; font-weight: 700; min-width: 16px; height: 16px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1.5px solid #0b1c31;">25</span>
        </a>

        <a href="payroll.php"
            style="display: flex; flex-direction: column; align-items: center; padding: 14px 0; text-decoration: none; color: #ffffff; transition: 0.2s; width: 100%; opacity: 0.8;">
            <i class="fa-solid fa-wallet" style="font-size: 18px; margin-bottom: 6px;"></i>
            <span style="font-size: 10px; font-weight: 400; text-align: center;">My Finances</span>
        </a>

    </div>

    <div style="border-top: 1px solid rgba(255, 255, 255, 0.05); padding: 20px 0;">
        <a href="index.php"
            style="display: flex; flex-direction: column; align-items: center; text-decoration: none; color: #ffffff; transition: 0.2s; width: 100%; opacity: 0.6;">
            <i class="fa-solid fa-right-from-bracket" style="font-size: 18px; margin-bottom: 4px;"></i>
            <span style="font-size: 10px; color: #ef4444 !important;">Logout</span>
        </a>
    </div>

</div>
