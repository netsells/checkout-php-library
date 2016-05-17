<?php

namespace com\checkout\ApiServices\VisaCheckout\ResponseModels;


class VisaCheckoutCardToken
{
	private $_object;
	private $_id;
	private $_liveMode;
	private $_created;
	private $_used;
	private $_card;
	private $_binData;


	public  function  __construct($response)
	{

		$this->_setCard ( $response->getCard() );
		$this->_setCreated ( $response->getCreated() );
		$this->_setId ( $response->getId() );
		$this->_setLiveMode ( $response->getLiveMode() );
		$this->_setObject ( $response->getObject() );
		$this->_setUsed ( $response->getUsed() );
		$this->_setBinData ( $response->getBinData() );

	}



	/**
	 * @param mixed $Card
	 */
	private function _setCard ( $card )
	{
		$cardObg = new \com\checkout\ApiServices\Cards\ResponseModels\Card();
		$billingDetails  = new \com\checkout\ApiServices\SharedModels\Address();
		$billingAddress = $card->getBillingDetails();
		$billingDetails->setAddressLine1($billingAddress->getAddressLine1());
		$billingDetails->setAddressLine2($billingAddress->getAddressLine2());
		$billingDetails->setPostcode($billingAddress->getPostcode());
		$billingDetails->setCountry($billingAddress->getCountry());
		$billingDetails->setCity($billingAddress->getCity());
		$billingDetails->setState($billingAddress->getState());
		$billingDetails->setPhone($billingAddress->getPhone());

		$cardObg->setId($card->getId());
		$cardObg->setObject($card->getObject());
		$cardObg->setName($card->getName());
		$cardObg->setLast4($card->getLast4());
		$cardObg->setPaymentMethod($card->getPaymentMethod());
		$cardObg->setExpiryMonth($card->getExpiryMonth());
		$cardObg->setExpiryYear($card->getExpiryYear());
		$cardObg->setBillingDetails($billingDetails);
		$this->_card = $cardObg;

	}

	/**
	 * @param mixed $BinData
	 */
	private function _setBinData ( $binData )
	{
		$binDataObg = new \com\checkout\ApiServices\SharedModels\BinData();
		
		$binDataObg->setBin($binData->getBin());
		$binDataObg->setObject($binData->getObject());
		$binDataObg->setIssuerCountryISO2($binData->getIssuerCountryISO2());
		$binDataObg->setCardType($binData->getCardType());
		$this->_binData = $binDataObg;

	}

	/**
	 * @param mixed $created
	 */
	private function _setCreated ( $created )
	{
		$this->_created = $created;
	}

	/**
	 * @param mixed $id
	 */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}

	/**
	 * @param mixed $liveMode
	 */
	private function _setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}

	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}

	/**
	 * @param mixed $used
	 */
	private function _setUsed ( $used )
	{
		$this->_used = $used;
	}

	/**
	 * @return mixed
	 */
	public function getCard ()
	{
		return $this->_card;
	}

	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @return mixed
	 */
	public function getLiveMode ()
	{
		return $this->_liveMode;
	}

	/**
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}

	/**
	 * @return mixed
	 */
	public function getUsed ()
	{
		return $this->_used;
	}


}