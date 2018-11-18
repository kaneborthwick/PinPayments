<?php

namespace Towersystems\PinPayments\Gateway;

interface PinPaymentsGatewayAwareInterface {

	/**
	 * [setGateway description]
	 *
	 * @param PinPaymentsGatewayInterface $gateway [description]
	 */
	public function setGateway(PinPaymentsGatewayInterface $gateway): void;

	/**
	 *
	 * [getGateway description]
	 *
	 * @return [type] [description]
	 */
	public function getGateway(): PinPaymentsGatewayInterface;

}