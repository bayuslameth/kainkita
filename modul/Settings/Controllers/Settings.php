<?php

namespace Modul\Settings\Controllers;

use App\Controllers\BaseController;
use Modul\Settings\Models\Model_settings;

class Settings extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Model_settings();
    }

    public function index()
    {
        $id = $this->session->get('user_id');

        if (!$id) {
            return redirect()->to('/login');
        }

        $role = $this->session->get('role');

        if ($role === '2') {
            return redirect()->to('/home');
        }
        
        $setting = $this->model->find(1);

        if (!$setting) {
            $setting = [
                'id' => '', 'app_name' => '', 'description' => '', 'contact_email' => '',
                'contact_phone' => '', 'address' => '', 'social_media' => '', 
                'logo_filename' => '', 'favicon_filename' => ''
            ];
        }

        $data = [
            'menu'    => 'settings',
            'submenu' => '',
            'title'   => 'Pengaturan Aplikasi',
            'setting' => $setting
        ];

        return view('Modul\Settings\Views\viewSettings', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id');

        $rules = [
            'app_name'      => ['label' => 'Nama Aplikasi', 'rules' => 'required'],
            'contact_email' => ['label' => 'Email', 'rules' => 'required|valid_email']
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => false, 
                'errors' => $this->validator->getErrors()
            ]);
        }

        $data = [
            'app_name'      => $this->request->getPost('app_name'),
            'description'   => $this->request->getPost('description'),
            'contact_email' => $this->request->getPost('contact_email'),
            'contact_phone' => $this->request->getPost('contact_phone'),
            'address'       => $this->request->getPost('address'),
            'social_media'  => $this->request->getPost('social_media'),
        ];

        // Penanganan upload Logo
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $logoName = $logo->getRandomName();
            $logo->move('uploads/settings/', $logoName);
            $data['logo_filename'] = 'uploads/settings/' . $logoName;
        }

        // Penanganan upload Favicon
        $favicon = $this->request->getFile('favicon');
        if ($favicon && $favicon->isValid() && !$favicon->hasMoved()) {
            $faviconName = $favicon->getRandomName();
            $favicon->move('uploads/settings/', $faviconName);
            $data['favicon_filename'] = 'uploads/settings/' . $faviconName;
        }

        // Simpan atau Update
        if (!empty($id)) {
            $this->model->update($id, $data);
        } else {
            $this->model->insert($data);
        }

        return $this->response->setJSON(['status' => true, 'notif' => 'Pengaturan berhasil disimpan']);
    }
}