<?php

namespace App\CoreModule\Presenters;

use App\CoreModule\Model\DeliveryPlaceManager;
use App\Presenters\BasePresenter;
use Nette\Application\BadRequestException;


class DeliveryPlacePresenter extends BasePresenter
{
    private $defaultDeliveryPlaceID;

    private $DeliveryPlaceManager;

    public function __construct($defaultDeliveryPlaceID, DeliveryPlaceManager $DeliveryPlaceManager)
    {
        parent::__construct();
        $this->defaultDeliveryPlaceID = $defaultDeliveryPlaceID;
        $this->DeliveryPlaceManager = $DeliveryPlaceManager;
    }

    
    public function renderDefault($id = null)
    {
        if (!$id) $id = $this->defaultDeliveryPlaceID; 

        if (!($DeliveryPlace = $this->DeliveryPlaceManager->getDeliveryPlace($id)))

        $this->template->DeliveryPlace = $DeliveryPlace;
    }

    public function renderList()
    {
        $this->template->DeliveryPlaces = $this->DeliveryPlaceManager->getDeliveryPlaces();
    }
}