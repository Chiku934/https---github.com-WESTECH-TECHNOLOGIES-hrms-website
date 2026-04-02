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
        margin-left: 150px;
        background: #f4f6fb;
        min-width: 0;
    }

    .leave-content {
        padding: 12px 16px 24px;
        color: #1f2937;
    }
</style>

<main class="leave-content">
    <div class="leave-tabs">
        <a class="leave-tab" href="user-leave.php" style="text-decoration:none;text-align:center;">Summary</a>
        <a class="leave-tab" href="user-leave-apply.php" style="text-decoration:none;text-align:center;">Apply Leave</a>
        <div class="leave-tab active">Leave Logs</div>
    </div>

    <div class="history-card-container">
        <section class="history-card">
            <div class="history-title">Dipti Ranjan Sahoo</div>
            <div class="history-date">Sick Leave - 31 Mar 2026</div>
            <div class="leave-status-row">
                <div class="leave-status-label">Status</div>
                <div class="leave-pills-status leave-pill-pending">Pending</div>
            </div>
            <div class="history-status">Awaiting manager action.</div>
        </section>

        <section class="history-card">
            <div class="history-title">Ashutosh Nayak</div>
            <div class="history-date">Earned Leave - 05 Feb 2026</div>
            <div class="leave-status-row">
                <div class="leave-status-label">Status</div>
                <div class="leave-pills-status leave-pill-approved">Approved</div>
            </div>
            <div class="history-status">Approved by Debasish Nayak.</div>
        </section>

        <section class="history-card">
            <div class="history-title">Subash Behera</div>
            <div class="history-date">Casual Leave - 02 May 2025</div>
            <div class="leave-status-row">
                <div class="leave-status-label">Status</div>
                <div class="leave-pills-status leave-pill-rejected">Rejected</div>
            </div>
            <div class="history-status">Please re-submit with revised dates.</div>
        </section>
    </div>

    <section class="leave-card">
        <div class="leave-card-row">
            <div>
                <div class="leave-card-name">Leave Status Summary</div>
                <div class="leave-card-date" style="margin-top:6px;color:#64748b;">Quick overview of current request states.</div>
            </div>
            <div class="leave-card-type">Last 90 Days</div>
        </div>

        <div class="leave-action-btns">
            <button class="btn-leave-approve" type="button">Approve Selected</button>
            <button class="btn-leave-reject" type="button">Reject Selected</button>
        </div>
    </section>
</main>
