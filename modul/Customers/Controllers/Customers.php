<?php

namespace Modul\Customers\Controllers;

use App\Controllers\BaseController;
use Hermawan\DataTables\DataTable;
use Modul\Customers\Models\Model_customers;

class Customers extends BaseController
{
    protected $customers;

    public function __construct()
    {
        $this->customers = new Model_customers();
    }

    public function index()
    {
        // Hanya perlu meload provinsi di awal. Kota dan kecamatan akan diload via AJAX
        $provinces = $this->db->table('provinces')->orderBy('province_name', 'ASC')->get()->getResultArray();

        $data = [
            'menu'      => 'master-data',
            'submenu'   => 'customers',
            'title'     => 'Data Pelanggan',
            'provinces' => $provinces,
        ];

        return view('Modul\Customers\Views\viewCustomers', $data);
    }

    public function datatable()
    {
        $builder = $this->db->table('customers')->orderBy('id', 'DESC');

        return DataTable::of($builder)
            ->addNumbering('no')
            ->setSearchableColumns(['LOWER(full_name)', 'phone_number', 'LOWER(address)'])
            ->add('action', function ($row) {
                return '<button type="button" class="btn btn-light btn-sm" title="Edit" onclick="edit(' . $row->id . ')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-sm" title="Hapus" onclick="confirmRemove(' . $row->id . ', \'' . htmlspecialchars($row->full_name, ENT_QUOTES) . '\')">
                            <i class="fas fa-trash"></i>
                        </button>';
            })
            ->toJson(true);
    }

    public function setStatus()
    {
        $builder = $this->db->table('customers');
        $getData = $builder->where('id', $this->request->getPost('id'))->get()->getRowArray();

        if (!$getData) {
            $response = [
                'status' => false,
                'errors' => 'Data Tidak Ditemukan.'
            ];
        } else {
            $this->customers->update($this->request->getPost('id'), ['status' => ($getData['status']) ? "0" : "1"]);

            $response = [
                'status'   => TRUE,
            ];
        }

        echo json_encode($response);
    }

    public function save()
    {
        $rules = $this->validate([
            'full_name' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'phone_number' => [
                'label'  => 'Nomor HP',
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric'  => '{field} hanya boleh berisi angka',
                ]
            ]
        ]);

        if (!$rules) {
            $errors = [
                'full_name'    => $this->validation->getError('full_name'),
                'phone_number' => $this->validation->getError('phone_number'),
            ];

            $respond = [
                'status' => FALSE,
                'errors' => $errors
            ];
        } else {
            $id             = $this->request->getPost('id');
            $user_id        = $this->request->getPost('user_id');
            $full_name      = $this->request->getPost('full_name');
            $phone_number   = $this->request->getPost('phone_number');
            $address        = $this->request->getPost('address');
            $postal_code    = $this->request->getPost('postal_code');
            $city_id        = $this->request->getPost('city_id');
            $subdistrict_id = $this->request->getPost('subdistrict_id');

            $data = [
                'id'             => $id,
                'user_id'        => $user_id,
                'full_name'      => $full_name,
                'phone_number'   => $phone_number,
                'address'        => $address,
                'postal_code'    => $postal_code,
                'city_id'        => $city_id,
                'subdistrict_id' => $subdistrict_id,
            ];

            if ($this->customers->save($data)) {
                $notif = $id ? "Data pelanggan berhasil diperbaharui" : "Pelanggan berhasil ditambahkan";
                $respond = [
                    'status' => TRUE,
                    'notif'  => $notif
                ];
            } else {
                $respond = [
                    'status' => FALSE
                ];
            }
        }
        echo json_encode($respond);
    }

    public function getdata()
    {
        $id = $this->request->getPost("id");
        
        $data = $this->db->table("customers")
                    ->select('customers.*, cities.province_id')
                    ->join('cities', 'cities.city_id = customers.city_id', 'left')
                    ->where("customers.id", $id)
                    ->get()
                    ->getRow();

        if ($data) {
            $respond = [
                'status'    => true,
                'data'      => $data
            ];
        } else {
            $respond = [
                'status'    => false
            ];
        }

        echo json_encode($respond);
    }

    public function remove()
    {
        $id        = $this->request->getPost('id');
        $full_name = $this->request->getPost('full_name');

        try {
            $this->customers->delete($id);
            return $this->response->setJSON(['status' => true, 'name' => $full_name]);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return $this->response->setJSON(['status' => false, 'name' => $full_name]);
        }
    }

    public function getCities()
    {
        $province_id = $this->request->getPost('province_id');
        $cities = $this->db->table('cities')->where('province_id', $province_id)->orderBy('city_id', 'ASC')->get()->getResultArray();
        return $this->response->setJSON($cities);
    }

    public function getSubdistricts()
    {
        $city_id = $this->request->getPost('city_id');
        $subdistricts = $this->db->table('subdistricts')->where('city_id', $city_id)->orderBy('subdistrict_id', 'ASC')->get()->getResultArray();
        return $this->response->setJSON($subdistricts);
    }
}