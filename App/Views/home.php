<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? APP_NAME, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<body>
    <header>
        <h1><?= htmlspecialchars($message ?? 'Welcome', ENT_QUOTES, 'UTF-8') ?></h1>
    </header>
</body>
</html>