<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/design/css/style.css">
    <title><?= $title?></title>
</head>
<body class="bg-badground">
    
<!-- navigation !-->

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <ul class=" p-2 navbar-nav">
        <li class="navbar-brand">Cosmos</li>
        <li class="nav-item">
            <a class=" nav-link" href="index.php?page=accueil">Accueil</a>
        </li>
        
        <?php if(isset($_SESSION['admin']) && $_SESSION["admin"]){?>
            <li class="nav-item">
            <a class="nav-link" href="index.php?page=articles">Articles</a>
            </li>
        <?php } ?>
        
        <?php if(isset($_SESSION['connection'])){?> 
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=profil">Profil</a>
        </li>
            <?php }else{ ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=connexion">Connexion</a>
        </li>
    </ul>
    <?php } ?>
</nav>

<?= $content ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>