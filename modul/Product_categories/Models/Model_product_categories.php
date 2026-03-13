<?php

namespace Modul\Product_categories\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Validation\ValidationInterface;

class Model_product_categories extends Model
{
    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }

    protected $table              = 'category_products';
    protected $primaryKey         = 'id';
    protected $useAutoIncrement   = true;
    protected $returnType         = 'array';

    protected $allowedFields      = [
        'name',
        'status',
    ];

    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
}
