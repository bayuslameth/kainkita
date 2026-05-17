<?php

namespace Modul\Wishlists\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Validation\ValidationInterface;

class Model_wishlists extends Model
{
    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }

    protected $table            = 'wishlists';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'customer_id',
        'product_id',
        'created_at',
    ];

    protected $useTimestamps = false;
}