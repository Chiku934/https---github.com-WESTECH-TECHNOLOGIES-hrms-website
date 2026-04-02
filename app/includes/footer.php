<?php

declare(strict_types=1);

$extraScripts = $extraScripts ?? [];
?>
<?php foreach ($extraScripts as $script): ?>
<script src="<?= htmlspecialchars((string) $script, ENT_QUOTES, 'UTF-8') ?>"></script>
<?php endforeach; ?>
</body>
</html>
