<?php

namespace CPK\Controller;

use VuFind\Controller\AbstractBase;
use Zend\View\Model\ViewModel;


class StatusController extends AbstractBase
{

    public function defaultAction()
    {
        return $this->homeAction();
    }

    public function homeAction()
    {
        $view = $this->createViewModel(
            array(
                'statistics' => 'dashboard',
            )
        );


        $table = $this->getTable('status');
//        $data = array(
//            'created_on'      => '2007-03-22',
//            'bug_description' => 'Something wrong',
//            'bug_status'      => 'NEW'
//        );
//
//        $table->insert($data);

        $view->setTemplate('status/home');



        return $view;
    }
}
