<?php

class StatusController extends Controller
{
    public function indexAction()
    {
        $user = $this->session->get('user');
        $statuses = $this->db_manager->get('Status')->fetchAllPersonalArchivesByUserId($user['id']);//StatusRepositoryクラスのインスタンスを取得し、同クラスのメソッドの実行

        return $this->render(array(
            'statuses' => $statuses,
            'body' => '',
            '_token' => $this->generateCsrfToken('status/post'),
        )) ;
    }
}