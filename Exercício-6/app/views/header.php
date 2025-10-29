<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($titlePage); ?></title>
    <style>
        <?php if($page == 'produtos'): ?>
            body { font-family: Arial; margin: 40px; }
            table { width: 50%; border-collapse: collapse; }
            th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
            th { background-color: #eee; }
            a { text-decoration: none; color: blue; }
        <?php endif; ?>
    </style>
</head>
<body>