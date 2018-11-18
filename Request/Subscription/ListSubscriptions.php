<?php

namespace Towersystems\PinPayments\Request\Subscription;

use Towersystems\PinPayments\Request\PaginatedRequest;

class ListSubscriptions extends PaginatedRequest {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('subscriptions')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			]);

		return $this->handlePaginatedRequest($request);
	}

}