<?php

require_once "../../controller/ctrllProduto.php";

$ctrrl = new CtrllProduto();

$ctrrl->addCart();

header('Location: index.php');
