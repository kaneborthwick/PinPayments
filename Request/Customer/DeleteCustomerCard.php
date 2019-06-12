<?php

namespace Towersystems\PinPayments\Request\Customer;

use Towersystems\PinPayments\Exception\InvalidRequestException;
use Towersystems\PinPayments\Request\Request;

class DeleteCustomerCard extends Request {

	/** @var string [description] */
	protected $customerToken;

	/** @var string [description] */
	protected $cardToken;

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint(sprintf('customers/%s/cards/%s', $this->customerToken, $this->cardToken))
			->setMethod('DELETE')
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

	/**
	 * [setCustomerToken description]
	 *
	 * @param [type] $token [description]
	 */
	public function setCustomerToken(string $token): void{
		$this->customerToken = $token;
	}

	/**
	 * [setCardToken description]
	 *
	 * @param [type] $token [description]
	 */
	public function setCardToken(string $token): void{
		$this->cardToken = $token;
	}

}