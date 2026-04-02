<?php

declare(strict_types=1);

$title = 'HRMS - Tickets';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php'],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php', 'active' => true],
];

$view = strtolower((string) ($_GET['view'] ?? 'my'));
if (!in_array($view, ['my', 'following'], true)) {
    $view = 'my';
}

$pageTitle = $view === 'following' ? 'Following Tickets' : 'My Tickets';
$pageIntro = $view === 'following'
    ? 'These are the open tickets in which you are added as follower.'
    : 'These are your tickets that are yet to be addressed.';

$openTitle = 'Open Tickets';
$openColumns = $view === 'following'
    ? ['Ticket Number', 'Title', 'Ticket Raised By', 'Raised On', 'Priority', 'Category', 'Assigned To', 'Ticket Status', 'Last Updated']
    : ['Ticket Number', 'Title', 'Raised On', 'Priority', 'Category', 'Assigned To', 'Ticket Status', 'Last Updated'];
$openColspan = count($openColumns);

ob_start();
?>
<style>
    .ticket-page{color:#1f2937}
    .ticket-section{background:transparent}
    .ticket-head{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:10px}
    .ticket-title{font-size:14px;font-weight:700;color:#334155;margin:0 0 3px}
    .ticket-sub{font-size:11px;color:#7b8796}
    .ticket-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 14px;border-radius:3px;background:#6b55bc;color:#fff;text-decoration:none;font-size:12px;font-weight:700}
    .ticket-card{background:#fff;border:1px solid #e5eaf2;border-radius:2px;box-shadow:0 1px 0 rgba(18,22,33,.02);padding:0;margin-bottom:16px}
    .ticket-card-head{display:flex;justify-content:space-between;align-items:center;padding:14px 14px 10px}
    .ticket-card-title{font-size:14px;font-weight:700;color:#334155}
    .ticket-card-meta{font-size:12px;color:#7b8796}
    .ticket-inner-tabs{display:flex;align-items:center;background:#fff;border:1px solid #e5eaf2;border-radius:2px;overflow:hidden;margin-bottom:16px}
    .ticket-inner-tab{padding:10px 14px;font-size:12px;font-weight:500;color:#7b8796;text-decoration:none;border-right:1px solid #edf1f6;white-space:nowrap}
    .ticket-inner-tab.active{background:#f3eefc;color:#6b55bc;font-weight:700}
    .ticket-toolbar{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:0 14px 12px}
    .ticket-toolbar-right{display:flex;align-items:center;gap:10px}
    .ticket-input,.ticket-select{height:30px;border:1px solid #e5eaf2;border-radius:2px;background:#fff;color:#64748b;font-size:12px;padding:0 10px;min-width:160px}
    .ticket-select{min-width:130px}
    .ticket-table-wrap{margin:0 14px 14px;border:1px solid #edf1f6;border-radius:2px;overflow:hidden}
    .ticket-table{width:100%;border-collapse:collapse;background:#fff}
    .ticket-table thead th{background:#f4f6f9;color:#6b7280;font-size:10px;font-weight:700;text-transform:uppercase;padding:10px 12px;border-bottom:1px solid #edf1f6;text-align:left;white-space:nowrap}
    .ticket-table tbody td{padding:22px 12px;color:#475569;font-size:12px;border-bottom:1px solid #f1f4f8;vertical-align:top}
    .ticket-table .empty-row td{height:120px;text-align:center;color:#6b7280;font-weight:600}
    .ticket-footer{display:flex;justify-content:flex-end;padding:0 14px 14px;color:#94a3b8;font-size:12px;gap:14px}
    .ticket-footer strong{color:#475569}
    @media (max-width:1180px){
        .ticket-toolbar,.ticket-card-head{flex-direction:column;align-items:flex-start}
        .ticket-toolbar-right{flex-wrap:wrap}
    }
</style>

<div class="ticket-page">
    <div class="ticket-section">
        <div class="ticket-head">
            <div>
                <div class="ticket-title"><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></div>
            </div>
        </div>

        <div class="ticket-inner-tabs">
            <a href="user-support-tickets.php?view=my" class="ticket-inner-tab<?php echo $view === 'my' ? ' active' : ''; ?>">My Tickets</a>
            <a href="user-support-tickets.php?view=following" class="ticket-inner-tab<?php echo $view === 'following' ? ' active' : ''; ?>">Following</a>
        </div>

        <div class="ticket-card">
            <div class="ticket-card-head">
                <div>
                    <div class="ticket-card-title"><?php echo htmlspecialchars($openTitle, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="ticket-card-meta"><?php echo htmlspecialchars($pageIntro, ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
                <a href="user-support-tickets.php" class="ticket-btn">+ New Ticket</a>
            </div>
            <div class="ticket-toolbar">
                <div></div>
                <div class="ticket-toolbar-right">
                    <input class="ticket-input" type="text" value="" placeholder="Search">
                    <select class="ticket-select">
                        <option>Last 3 months</option>
                        <option>Last 7 days</option>
                        <option>This month</option>
                    </select>
                </div>
            </div>
            <div class="ticket-table-wrap">
                <table class="ticket-table">
                    <thead>
                        <tr>
                            <?php foreach ($openColumns as $column): ?>
                                <th><?php echo htmlspecialchars($column, ENT_QUOTES, 'UTF-8'); ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="empty-row">
                            <td colspan="<?php echo (int) $openColspan; ?>">No records found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ticket-footer">
                <span>0 to 0 of 0</span>
                <span>Page 0 of 0</span>
            </div>
        </div>

        <div class="ticket-card">
            <div class="ticket-card-head">
                <div>
                    <div class="ticket-card-title">Closed Tickets</div>
                    <div class="ticket-card-meta"><?php echo $view === 'following' ? 'These are the closed tickets you are following.' : 'These are your tickets that have been addressed.'; ?></div>
                </div>
            </div>
            <div class="ticket-toolbar">
                <div></div>
                <div class="ticket-toolbar-right">
                    <input class="ticket-input" type="text" value="" placeholder="Search">
                    <select class="ticket-select">
                        <option>Last 3 months</option>
                        <option>Last 7 days</option>
                        <option>This month</option>
                    </select>
                </div>
            </div>
            <div class="ticket-table-wrap">
                <table class="ticket-table">
                    <thead>
                        <tr>
                            <th>Ticket Number</th>
                            <th>Title</th>
                            <th>Raised On</th>
                            <th>Priority</th>
                            <th>Category</th>
                            <th>Closed By</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="empty-row">
                            <td colspan="7">No records found</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ticket-footer">
                <span>0 to 0 of 0</span>
                <span>Page 0 of 0</span>
            </div>
        </div>
    </div>
</div>
<?php
$pageContent = ob_get_clean();
include __DIR__ . '/includes/myteam-shell.php';
