<?php

declare(strict_types=1);

$title = 'HRMS - Attendance Requests';
$bodyClass = 'myteam-page';
$moduleNavItems = [
    ['label' => 'Attendance', 'url' => 'user-attendance.php', 'active' => true],
    ['label' => 'Timesheet', 'url' => 'timesheet.php'],
    ['label' => 'Leave', 'url' => 'user-leave.php'],
    ['label' => 'Performance', 'url' => 'user-performance.php'],
    ['label' => 'Expenses & Travel', 'url' => 'user-expenses.php'],
    ['label' => 'Helpdesk', 'url' => 'user-support.php'],
];

$source = file_get_contents(__DIR__ . '/../app/pages/user-attendance.php');
if ($source === false) {
    $source = '';
}

$contentStyles = '';
$styleStart = strpos($source, '<style>');
$styleEnd = strpos($source, '</style>', $styleStart !== false ? $styleStart : 0);
if ($styleStart !== false && $styleEnd !== false) {
    $contentStyles = substr($source, $styleStart + strlen('<style>'), $styleEnd - ($styleStart + strlen('<style>')));
}

$content = '';
$mainStart = strpos($source, '<main class="attendance-content">');
$mainEnd = $mainStart !== false ? strpos($source, '</main>', $mainStart) : false;
if ($mainStart !== false && $mainEnd !== false) {
    $content = '<div class="attendance-content">' . substr($source, $mainStart + strlen('<main class="attendance-content">'), $mainEnd - ($mainStart + strlen('<main class="attendance-content">'))) . '</div>';
}

$script = '';
$scriptMarker = '<script src="assets/js/sidebar.js"></script>';
$scriptMarkerPos = strpos($source, $scriptMarker);
$scriptStart = $scriptMarkerPos !== false ? strpos($source, '<script>', $scriptMarkerPos) : false;
$scriptEnd = $scriptStart !== false ? strpos($source, '</script>', $scriptStart) : false;
if ($scriptStart !== false && $scriptEnd !== false) {
    $script = substr($source, $scriptStart + strlen('<script>'), $scriptEnd - ($scriptStart + strlen('<script>')));

    $fetchStart = strpos($script, "fetch('sidebar.php?v=' + new Date().getTime()).then(r => r.text()).then(html => {");
    $timerStart = strpos($script, "const timerKey = 'hrmsAttendanceShiftStart';");
    if ($fetchStart !== false && $timerStart !== false && $timerStart > $fetchStart) {
        $script = substr($script, 0, $fetchStart) . substr($script, $timerStart);
    }
}

$pageContent = '<style>' . $contentStyles . '</style>' . $content . ($script !== '' ? "\n<script>\n" . trim($script) . "\n</script>" : '');

include __DIR__ . '/includes/myteam-shell.php';
