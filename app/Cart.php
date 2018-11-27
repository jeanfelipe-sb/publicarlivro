<?php

namespace App;

class Cart {

    public $items = null;
    public $totalQtd = 0;
    public $totalPreco = 0;

    public function __construct($oldCart) {
        if ($oldCart) {


            $this->items = $oldCart->items;
            $this->totalQtd = $oldCart->totalQtd;
            $this->totalPreco = $oldCart->totalPreco;
        }
    }

    //add item no carrinho (paramento item(produto), id (id do produto)
    public function add($item, $id) {
        //Coloca o produto no carrinho
        $storedItem = ['qtd' => 0, 'preco' => 0, 'item' => $item];

        //se exstir array items
        if ($this->items) {
            //da a key do produto para a items
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        //aumenta uma quantidade do item
        $storedItem['qtd'] ++;
        //Pega o preço do produto e multiplica pela quantidade
        $storedItem['preco'] = $item->preco * $storedItem['qtd'];
        //passa o item e coloca na array
        $this->items[$id] = $storedItem;
        //Soma a quantidade
        $this->totalQtd++;
        //Calcula o preço total
        $this->totalPreco += $item->preco;
    }

    public function delete($item, $id) {
        //localiza o item
        $storedItem = $this->items[$id];


        //diminui uma quantidade do item
        if ($storedItem['qtd'] > 1) {
            $storedItem['qtd'] = $storedItem['qtd'] - 1;
            //passa o item e coloca na array
            $this->items[$id] = $storedItem;
        } else {

            //passa o item e coloca na array
            unset ($this->items[$id]);
        }

        $this->totalQtd--;
        //Calcula o preço total
        $this->totalPreco -= $item->preco;
    }

}
