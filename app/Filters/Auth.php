<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri        = service('uri');
        $uri        = $uri->getSegment(1);
        $session    = session();
        $this->db   = db_connect();

        if (!$session->get('@#)login(#@')) {
            return redirect()->to(base_url());
        } else {
            $user_id    = $session->get('user_id');
            $user       = $this->db->table('users')->select('role_id')->where('id', $user_id)->get()->getRow();
            $menus      = [];
            $role_menus = $this->db->table('app_role_menus a')->select('b.slug')->join('app_menus b', 'a.menu_id = b.id')->where('a.role_id', $user->role_id)
                ->where('b.is_active', 1)->where('b.has_child', 0)->get()->getResult();
            foreach ($role_menus as $menu) {
                array_push($menus, $menu->slug);
            }
            if (!in_array($uri, $menus)) {
                return redirect()->back();
            }
        }
    }
    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
