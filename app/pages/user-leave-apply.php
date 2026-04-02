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
        <div class="leave-tab active">Apply Leave</div>
        <a class="leave-tab" href="user-leave-status.php" style="text-decoration:none;text-align:center;">Leave Logs</a>
    </div>

    <section class="leave-card">
        <div class="leave-card-row">
            <div>
                <div class="leave-card-name">Apply for Leave</div>
                <div class="leave-card-date" style="margin-top:6px;color:#64748b;">Choose a leave type and fill in the request details.</div>
            </div>
            <div class="leave-card-type">New Request</div>
        </div>

        <div class="leave-type-pills">
            <div class="leave-pill active">Sick Leave</div>
            <div class="leave-pill">Earned Leave</div>
            <div class="leave-pill">Casual Leave</div>
            <div class="leave-pill">Optional Leave</div>
        </div>

        <form class="apply-leave-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="leaveType">Leave Type</label>
                    <select id="leaveType">
                        <option>Sick Leave</option>
                        <option>Earned Leave</option>
                        <option>Casual Leave</option>
                        <option>Optional Leave</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <select id="duration">
                        <option>1 Day</option>
                        <option>Half Day</option>
                        <option>Multiple Days</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="fromDate">From Date</label>
                    <input id="fromDate" type="date">
                </div>
                <div class="form-group">
                    <label for="toDate">To Date</label>
                    <input id="toDate" type="date">
                </div>
            </div>

            <div class="form-group">
                <label for="reason">Reason</label>
                <textarea id="reason" rows="5" placeholder="Add a clear reason for your leave request"></textarea>
            </div>

            <div class="form-group">
                <label>Attachment</label>
                <button type="button" class="upload-btn">Upload supporting file</button>
            </div>

            <button type="submit" class="submit-btn">Submit Leave Request</button>
        </form>
    </section>
</main>
