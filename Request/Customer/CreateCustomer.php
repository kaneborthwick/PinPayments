<?php

namespace Towersystems\PinPayments\Request\Customer;

use Towersystems\PinPayments\Exception\InvalidRequestException;
use Towersystems\PinPayments\Request\Request;

class CreateCustomer extends Request {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('customers')
			->setMethod('POST')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			])
			->buildHttpRequest();

		$response = $this->gateway->execute($request);

		if (false === $response->isSuccess()) {
			$error = json_decode($response->getBody());
			throw new InvalidRequestException($error->error_description, $error->error_description, $error->error);
		}

		$response = json_decode($response->getBody(), true)['response'];

		return $response;
	}

}