<?php

namespace Towersystems\PinPayments;

final class PinPaymentEvents {

	const EVENT_CUSTOMER_UPDATED = "customer.updated";
	const EVENT_CUSTOMER_CREATED = "customer.created";

	const EVENT_CHARGE_CAPTURED = "charge.captured";
	const EVENT_CHARGE_AUTHORISED = "charge.authorised";
	const EVENT_CHARGE_FAILED = "charge.failed";

	const EVENT_SUBSCRIPTION_UPDATED = "subscription.updated";
	const EVENT_SUBSCRIPTION_CREATED = "subscription.created";
	const EVENT_SUBSCRIPTION_UNSUBSCRIBED = "subscription.unsubscribed";

	const EVENT_REFUND_CREATED = "refund.created";
    const EVENT_REFUND_SUCCEED = "refund.succeeded";
    const EVENT_REFUND_FAILED = "refund.failed";

	private function __construct() {}

}