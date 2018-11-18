<?php

namespace Towersystems\PinPayments\Gateway;

trait PinPaymentsGatewayAwareTrait {

	/**
	 * @var [type]
	 */
	protected $gateway;

	/**
	 * {@inheritdoc}
	 */
	public function setGateway(PinPaymentsGatewayInterface $gateway): void{
		$this->gateway = $gateway;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getGateway(): PinPaymentsGatewayInterface {
		return $this->gateway;
	}

}