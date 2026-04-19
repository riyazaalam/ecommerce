<?php

namespace App\BO;

use App\DAO\ProductDAO;

class ProductBO
{
    public function __construct(private ProductDAO $dao) {}

    public function all()
    {
        return $this->dao->getAll();
    }  
}
?>