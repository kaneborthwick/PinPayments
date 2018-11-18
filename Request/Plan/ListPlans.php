<?php

namespace Towersystems\PinPayments\Request\Plan;

use Towersystems\PinPayments\Request\PaginatedRequest;

class ListPlans extends PaginatedRequest {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('plans')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			]);

		return $this->handlePaginatedRequest($request);
	}

}