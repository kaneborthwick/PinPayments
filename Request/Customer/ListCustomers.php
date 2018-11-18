<?php

namespace Towersystems\PinPayments\Request\Customer;

use Towersystems\PinPayments\Request\PaginatedRequest;

class ListCustomers extends PaginatedRequest {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('customers')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			]);

		return $this->handlePaginatedRequest($request);
	}

}