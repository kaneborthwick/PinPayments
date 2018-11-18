<?php

namespace Towersystems\PinPayments\Request\Customer;

use Towersystems\PinPayments\Exception\InvalidRequestException;
use Towersystems\PinPayments\Request\Request;

class UpdateCustomer extends Request {

	/** @var string [description] */
	protected $customerToken;

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $payload = []) {

		$request = $this
			->setApiEndpoint(sprintf('customers/%s', $this->customerToken))
			->setMethod('PUT')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			])
			->buildHttpRequest();

		$response = $this->gateway->execute($request);

		if (false === $response->isSuccess()) {
			$error = json_decode($response->getContent());
			throw new InvalidRequestException($error->error_description, $error->messages, $error->error);
		}

		$response = json_decode($response->getContent(), true)['response'];

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

}