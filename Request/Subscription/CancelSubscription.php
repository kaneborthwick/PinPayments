<?php

namespace Towersystems\PinPayments\Request\Subscription;

use Towersystems\PinPayments\Request\Request;

class CancelSubscription extends Request {

	/** @var [type] [description] */
	protected $subscriptionToken;

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint(sprintf('subscriptions/%s', $this->subscriptionToken))
			->setMethod('DELETE')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			])
			->buildHttpRequest();

		$response = $this->gateway->execute($request);

		if (false === $response->isSuccess()) {
			throw new \Exception($response->getContent()['error_description'], 1);
		}

		$response = json_decode($response->getContent(), true)['response'];

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