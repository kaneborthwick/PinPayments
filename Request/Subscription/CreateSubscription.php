<?php

namespace Towersystems\PinPayments\Request\Subscription;

use Towersystems\PinPayments\Request\Request;

class CreateSubscription extends Request {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('subscriptions')
			->setMethod('POST')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			])
			->buildHttpRequest();

		$response = $this->gateway->execute($request);

		if (false === $response->isSuccess()) {
			throw new \Exception($response->getContent(), 1);
		}

		$response = json_decode($response->getContent(), true)['response'];

		return $response;
	}

}