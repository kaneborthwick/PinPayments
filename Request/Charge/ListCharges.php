<?php

namespace Towersystems\PinPayments\Request\Charge;

use Towersystems\PinPayments\Request\PaginatedRequest;

class ListCharges extends PaginatedRequest {

	/**
	 * {@inheritdoc}
	 */
	public function execute(array $config = []) {

		$request = $this
			->setApiEndpoint('charges')
			->setHeaders([
				'Accept' => 'application/json',
				'Content-Type' => 'application/json',
			]);

		return $this->handlePaginatedRequest($request);
	}

}