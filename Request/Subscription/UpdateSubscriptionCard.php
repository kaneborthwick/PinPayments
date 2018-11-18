<?php

namespace Towersystems\PinPayments\Request\Subscription;

use Towersystems\PinPayments\Request\Request;

class UpdateSubscriptionCard extends Request {

	/** @var [type] [description] */
	protected $subscriptionToken;

	/** @var string [description] */
	protected $cardToken;


	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint(sprintf('subscriptions/%s', $this->subscriptionToken))
			->setMethod('PUT')
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


	/**
	 * [setSubscriptionToken description]
	 *
	 * @param [type] $token [description]
	 */
	public function setSubscriptionToken(string $token): void{
		$this->subscriptionToken = $token;
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