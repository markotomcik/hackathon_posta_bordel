<?php

namespace App\CoreModule\Presenters;

use MailAPI;
use App\Presenters\BasePresenter;
use Nette\Application\BadRequestException;


class MailPresenter extends BasePresenter
{
    public function __construct()
    {
        parent::__construct();

    }

    public function renderDefault($id = null)
    {
        $this->template->Id = $id;
        $mm = new MailAPI();
        $this->template->Mail = $mm->deliveryInfo('markotomcik@gmail.com');
    }
}