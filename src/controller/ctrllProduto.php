<?php

require_once __DIR__ . '/../model/produto.php';

class CtrllProduto
{
    function deleteCart()
    {
        $pd = new Produto();
        $pd->deleteToCart("");
    }


    function addCart()
    {
        $pd = new Produto();
        $pd->addToCart($_GET['id']);
    }

    function getByCartTrue()
    {
        $pd = new Produto();
        $list = $pd->getByCartTrue();
        return $this->getNamesFromList($list);
    }
    function getByCollection($collection)
    {
        $pd = new Produto();
        $list = $pd->getByCollection($collection);
        return $this->getNamesFromList($list);
    }

    function getNamesFromList($list)
    {
        $nomesDosProdutos = [];

        foreach ($list as $produto) {
            $nomesDosProdutos[] = [
                'name' => $produto->getName(),
                'id' => $produto->getId(),
                'price' => $produto->getPrice(),
                'image' => $produto->getImage(),
                'collection' => $produto->getCollection(),
            ];
        }

        return $nomesDosProdutos;
    }
}
