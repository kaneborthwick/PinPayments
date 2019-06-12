<?php

namespace Towersystems\PinPayments\Request\Subscription;

use Towersystems\PinPayments\Request\Request;

class ReactivateSubscription extends Request {

	/** @var [type] [description] */
	protected $subscriptionToken;

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint(sprintf('subscriptions/%s/reactivate', $this->subscriptionToken))
			->setMethod('PUT')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			])
			->buildHttpRequest();

		$response = $this->gateway->execute($request);

		if (false === $response->isSuccess()) {
			$response = json_decode($response->getBody(), true);
			throw new \Exception($response['error_description'], 1);
		}

		$response = json_decode($response->getBody(), true)['response'];

		return $response;
	}

	/**
	 * [setSubscriptionToken description]
	 *
	 * @param string $token [description]
	 */
	public function setSubscriptionToken(string $token): void{
		$this->subscriptionToken = $token;
	}
}