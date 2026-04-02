<style>
    body.leave-page {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background: #eef2f7;
        min-height: 100vh;
    }

    .leave-shell {
        display: flex;
        min-height: 100vh;
    }

    .leave-main {
        flex: 1;
        margin-left: 260px;
        background: #f4f6fb;
        min-width: 0;
    }

    .leave-content {
        padding: 12px 16px 24px;
        color: #1f2937;
    }

    .leave-panel {
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 2px;
        box-shadow: 0 1px 0 rgba(18,22,33,.02);
        padding: 14px;
        margin-bottom: 14px;
    }
</style>

<main class="leave-content">
    <section class="leave-menu-grid">
        <a class="leave-menu-card" href="user-leave-apply.php" style="text-decoration:none;">
            <div class="leave-menu-icon"><i class="fa-solid fa-pen-to-square"></i></div>
            <h4>Apply Leave</h4>
            <p>Submit a request and attach a note for your manager.</p>
        </a>
        <a class="leave-menu-card" href="user-leave-status.php" style="text-decoration:none;">
            <div class="leave-menu-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <h4>Leave History</h4>
            <p>Track approved, pending, and rejected leave requests.</p>
        </a>
    </section>

    <div class="leave-tabs">
        <div class="leave-tab active">Summary</div>
        <a class="leave-tab" href="user-leave-apply.php" style="text-decoration:none;text-align:center;">Apply Leave</a>
        <a class="leave-tab" href="user-leave-status.php" style="text-decoration:none;text-align:center;">Leave Logs</a>
    </div>

    <section class="leave-grid-3" style="margin-bottom: 20px;">
        <div class="leave-stat-card highlight">
            <div class="leave-stat-number" style="color:#fff;">1</div>
            <div class="leave-stat-label" style="color:#e0e7ff;">Sick Leave</div>
        </div>
        <div class="leave-stat-card">
            <div class="leave-stat-number">0.25</div>
            <div class="leave-stat-label">Earned Leave</div>
        </div>
        <div class="leave-stat-card">
            <div class="leave-stat-number">0</div>
            <div class="leave-stat-label">Casual Leave</div>
        </div>
    </section>

    <section class="leave-panel">
        <div style="display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:12px;">
            <div style="font-size:16px;font-weight:700;color:#111827;">Recent Leave Requests</div>
            <div style="font-size:12px;color:#64748b;">Updated for 31 Mar 2026</div>
        </div>
        <div class="leave-card">
            <div class="leave-card-row">
                <div class="leave-card-name">Dipti Ranjan Sahoo</div>
                <div class="leave-card-type">Sick Leave</div>
            </div>
            <div class="leave-card-date">31 Mar 2026 - 1 Day</div>
            <div class="leave-card-reason">mother not well</div>
            <div class="leave-status-row">
                <div class="leave-status-label">Status</div>
                <div class="leave-pills-status leave-pill-pending">Pending</div>
            </div>
        </div>

        <div class="leave-card">
            <div class="leave-card-row">
                <div class="leave-card-name">Ashutosh Nayak</div>
                <div class="leave-card-type" style="background:#dcfce7;color:#166534;">Earned Leave</div>
            </div>
            <div class="leave-card-date">05 Feb 2026 - 1 Day</div>
            <div class="leave-card-reason">Today I am come to office...</div>
            <div class="leave-status-row">
                <div class="leave-status-label">Status</div>
                <div class="leave-pills-status leave-pill-pending">Pending</div>
            </div>
        </div>
    </section>
</main>
