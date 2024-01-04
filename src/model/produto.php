<?php

include __DIR__ . "/../db/model.php";

class Produto extends Model {

    private $name;
    private $price;
    private $id;

    private $image;

    private $collection;

    private $cart;

    function getByCartTrue()
    {
        try {
            $query = $this->prepare("SELECT * FROM produto WHERE cart = 1");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
    function create($name,$price,$image,$collection)
    {
        try {
            $query = $this->prepare("INSERT INTO produto (name,price,image,collection,cart) VALUES (:name,:price,:image, :collection,0)");
            $query->execute([
               'name' => $name,
                'price' => $price,
                'image' => $image,
                'collection' => $collection,
            ]);
            return true;


        }catch (PDOException $e){
            echo $e;
            return false;
        }
    }

    function update()
    {

        $query = $this->prepare("UPDATE produto SET name= :name, price=:price, image=:image, collection=:collection WHERE id = :id");
        $query->execute([
            'id' => $this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'image'=>$this->image,
            'collection' => $this->collection
        ]);
    }

    function getByCollection($collection)
    {
        $items = [];
        try{
            $query = $this->prepare("SELECT * FROM produto WHERE collection = :collection");
            $query->execute([
                'collection' => $collection
            ]);
            while($user = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new Produto();
                $item->setName($user['name']);
                $item->setImage($user['image']);
                $item->setPrice($user['price']);
                $item->setCollection($user['collection']);
                $item->setId($user['id']);

                $items[] = $item;
            }

            return $items;
        }catch (PDOException $e){
            echo $e;
            return false;
        }
    }

    function getByName($name)
    {
        try{
            $query = $this->prepare("SELECT * FROM produto WHERE name = :name");
            $query->execute([
                'name' => $name
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->name = $user['name'];
            $this->id = $user['id'];
            $this->price = $user['price'];
            $this->image = $user['image'];
            $this->collection = $user['collection'];
            return $this;
        }catch (PDOException $e){
            echo $e;
            return false;
        }


    }
    function getById($id)
    {
        try {

            $query = $this->prepare("SELECT * FROM produto WHERE id = :id");
            $query->execute([
                'id'=> $id
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->name = $user['name'];
            $this->price = $user['price'];
            $this->id = $user['id'];
            $this->image = $user['image'];
            $this->collection = $user['collection'];
            return $this;
        }catch (PDOException $e){
            echo $e;
            return false;
        }
    }

//    function add()
//    {
//        try {
//            $data = array(
//                array('name' => 'Tênis Bege', 'price' => 99.99, 'image' => 'https://dqk9memo83p8i.cloudfront.net/Custom/Content/Products/11/72/1172896_tenis-mississipi-slip-on-bege-mi451-00001_m1_638369574922340877.jpg'),
//                array('name' => 'Tênis Preto', 'price' => 89.99, 'image' => 'https://d1augy8wbrpu4v.cloudfront.net/Custom/Content/Products/11/72/1172898_tenis-mississipi-slip-on-preto-mi451-00005_m2_638376598554111284.jpg'),
//                array('name' => 'Tênis Rosa', 'price' => 79.99, 'image' => 'https://dqk9memo83p8i.cloudfront.net/Custom/Content/Products/11/72/1172897_tenis-mississipi-slip-on-rosa-mi451-00003_m1_638369575650654798.jpg'),
//                array('name' => 'Tênis Azul', 'price' => 109.99, 'image' => 'https://images-americanas.b2w.io/produtos/5565546043/imagens/tenis-feminino-bebece-t1334399/5565546271_1_large.jpg'),
//                array('name' => 'Tênis Off-White', 'price' => 129.99, 'image' => 'https://pegada.vteximg.com.br/arquivos/ids/175679-500-500/Tenis-Pegada-Feminino-em-Couro-Off-White-212510-02--1-.jpg'),
//                array('name' => 'Tênis Azul Veromoc', 'price' => 89.99, 'image' => 'https://img.irroba.com.br/fit-in/500x500/filters:fill(fff):quality(80)/verooeao/catalog/produtos/feminino/tenis/vw550-blue/vw550-tenis-feminino-veromoc-blue-1.jpg'),
//                array('name' => 'Tênis Branco Cami', 'price' => 94.99, 'image' => 'https://guararapesonline.com.br/shoppingguararapes/2021/12/Tenis-Cami-Branco-Detalhe-Marrom-1.png'),
//                array('name' => 'Tênis Adidas Branco', 'price' => 129.99, 'image' => 'https://d87n9o45kphpy.cloudfront.net/Custom/Content/Products/27/57/2757718_tenis-adidas-grand-court-2-0-casual-feminino-branco-5189548_m3_638137183542157692.jpg'),
//                array('name' => 'Tênis Branco e Prata', 'price' => 99.99, 'image' => 'https://dcdn.mitiendanube.com/stores/001/742/426/products/tenis_branco_prata_cadarco_preto-branco_luciana_janich_par1-353ffeb6014391025f16673194474716-640-0.png')
//            );
//
//            $query = $this->prepare("INSERT INTO produto (name, price, image) VALUES (:name, :price, :image)");
//
//            foreach ($data as $product) {
//                $query->execute($product);
//            }
//            echo "Dados inseridos com sucesso!";
//        } catch (PDOException $e) {
//            echo "Erro: " . $e->getMessage();
//        }
//    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param mixed $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

}


//$pd1 = new UserProduto();
//
//$pd1->getById(1);
//
//print_r($pd1->getName());
//print_r($pd1->getId());
//print_r($pd1->getPrice());
//
//$pd1->getByName("Gostavo");
//
//print_r($pd1->getName());
//print_r($pd1->getId());
//print_r($pd1->getPrice());
//
//$pdNew = new Produto();
//$pdNew->create("Tenis Nnnike","12.20","https://imgnike-a.akamaihd.net/768x768/012795IE.jpg","xx");

//$pdListByCollection= new Produto();
//$list = $pdListByCollection->getByCollection("mm");
//print_r($list);

//$pd = new Produto();
//$items = $pd->getByCartTrue();
//print_r($items);
