<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="<?= Chemin::STYLES ?>styles.css">
    <script src="<?= Chemin::JS ?>script.js"></script>
    <link rel="icon" type="image/x-icon" href="<?= Chemin::IMAGES . 'icone_portfolio.ico' ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Noro Loic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Path pour la langue -->
    <script> 
    window.LANG_PATH = "<?= rtrim(addslashes(Chemin::LANGUE), '/') ?>/";
    </script>

    <script src="<?= Chemin::JS  ?>lang.js" defer></script>

</head>


<body>
