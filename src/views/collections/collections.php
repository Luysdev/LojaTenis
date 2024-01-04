<?php
    include "../../controller/ctrllProduto.php";
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Colletions</title>
    <link rel="stylesheet" href="style_collections.css">
</head>
<body>
<div class="container-grid-collections">
    <div class="nav">
        <ul>
            <li><a href="../home/home.php">Home</a></li>
            <li><a href="../collections/collections.php">Collections</a></li>
            <li><a href="./home.php">For Him</a></li>
            <li><a href="./home.php">For Her</a></li>
            <li><a href="./home.php">More information</a></li>
        </ul>
    </div>

    <!-- TITULO DE APRESENTACAO  -->
    <div class="titulo">
        COLLECTION
        <div class="subtitulo">
            MM
        </div>
    </div>

    <div class="container-products-mult">
        <?php
        $ctrllpd = new CtrllProduto();
        $listItems = $ctrllpd->getByCollection("mm");

        foreach ($listItems as $item){
            ?>
            <div class="container-product">
                <a href=""><img width="150px" src="<?php echo $item['image']; ?>" alt=""></a>
                <p><?php echo $item['name']; ?></p>
            </div>
        <?php } ?>
    </div>

</div>
</body>
</html>
