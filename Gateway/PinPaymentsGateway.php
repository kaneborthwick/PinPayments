<?php

namespace Towersystems\PinPayments\Gateway;

use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Request;
use Zend\Http\Response;

class PinPaymentsGateway implements PinPaymentsGatewayInterface {

	/** @var [type] [description] */
	private $options = [
		'test' => true,
		'secret_key' => null,
		'version' => 1,
	];

	/**
	 * [__construct description]
	 *
	 * @param array  $options [description]
	 * @param Client $client  [description]
	 */
	public function __construct(
		array $options
	) {
		$this->options = array_merge($this->options, $options);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getApiEndpoint($endpoint): string{
		$isTesting = !!$this->options['test'];
		$version = $this->options['version'];
		return sprintf('https://%sapi.pinpayments.com/%s/%s', $isTesting ? 'test-' : '', $version, $endpoint);
	}

	/**
	 * {@inheritdoc}
	 */
	public function execute(Request $request): Response{
		$client = $this->buildHttpClient();
		return $client->send($request);
	}

	/**
	 * {@inheritdoc}
	 */
	public function getOption(string $key) {
		return $this->options[$key] ?? null;
	}

	/**
	 * [buildHttpClient description]
	 *
	 * @return [type] [description]
	 */
	private function buildHttpClient(): Client{
		$client = new Client();
		$adapter = new Curl();
		$client->setAdapter($adapter);
		$client->setAuth($this->getOption("secret_key"), null);

		return $client;
	}

}