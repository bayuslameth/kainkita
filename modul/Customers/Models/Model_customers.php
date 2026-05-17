<?php

namespace Modul\Customers\Models;

use CodeIgniter\Model;

use CodeIgniter\Database\ConnectionInterface;

use CodeIgniter\Validation\ValidationInterface;

class Model_customers extends Model
{
    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
    }

    protected $table              = 'customers';
    protected $primaryKey         = 'id';
    protected $useAutoIncrement   = true;
    protected $returnType         = 'array';

    protected $allowedFields = [
        'user_id',
        'full_name',
        'phone_number',
        'address',
        'postal_code',
        'city_id',
        'subdistrict_id',
        'province_id',
    ];

    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';

    public function getProfile($user_id)
    {
        return $this->db->table('customers a')
            ->select('
                a.*,
                b.name as user_name,
                b.email,
                b.role,
                b.status,
                c.province_name as province_name,
                d.city_name as city_name,
                e.subdistrict_name as subdistrict_name
            ')
            ->join('auth_users b', 'b.id = a.user_id', 'left')
            ->join('provinces c', 'c.province_id = a.province_id', 'left')
            ->join('cities d', 'd.city_id = a.city_id', 'left')
            ->join('subdistricts e', 'e.subdistrict_id = a.subdistrict_id', 'left')
            ->where('a.user_id', $user_id)
            ->get()
            ->getRow();
    }
}