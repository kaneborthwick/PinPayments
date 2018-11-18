<?php

namespace Towersystems\PinPayments\Request;

use Towersystems\PinPayments\Gateway\PinPaymentsGatewayAwareInterface;
use Towersystems\PinPayments\Gateway\PinPaymentsGatewayAwareTrait;
use Towersystems\PinPayments\Gateway\PinPaymentsGatewayInterface;
use Zend\Http\Request as HttpRequest;

/**
 *
 */
abstract class Request implements RequestInterface, PinPaymentsGatewayAwareInterface {

	use PinPaymentsGatewayAwareTrait;

	/** @var [type] [description] */
	protected $method = HttpRequest::METHOD_GET;

	/** @var string [description] */
	protected $endpoint = "";

	/** @var array [description] */
	protected $content = null;

	/** @var [type] [description] */
	protected $headers = [];

	/** @var array [description] */
	protected $queryParams = [];

	/**
	 * [__construct description]
	 * @param PinPaymentsGatewayInterface $pinpaymentsGateway [description]
	 */
	function __construct(PinPaymentsGatewayInterface $pinpaymentsGateway) {
		$this->gateway = $pinpaymentsGateway;
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildHttpRequest(): HttpRequest{
		$request = new HttpRequest();

		$request->setMethod($this->getMethod())
			->setUri($this->gateway->getApiEndpoint($this->getApiEndpoint()));

		if ($this->getContent()) {
			$request->setContent(json_encode($this->getContent()));
		}

		$request->getHeaders()->addHeaders($this->getHeaders());

		return $request;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setMethod($method) {
		$this->method = $method;

		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getApiEndpoint() {
		return $this->endpoint;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setApiEndPoint($endpoint) {
		$this->endpoint = $endpoint;

		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setContent($content) {
		$this->content = $content;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getHeaders() {
		return $this->headers;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setHeaders($headers) {
		$this->headers = $headers;

		return $this;
	}

}