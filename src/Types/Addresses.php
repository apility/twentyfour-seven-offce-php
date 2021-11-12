<?php

namespace Apility\Office247\Types;

use Apility\Office247\Types\Address;

/**
 * @property Address $Post
 * @property Address $Delivery
 * @property Address $Visit
 * @property Address $Invoice
 */
class Addresses extends SoapType
{
    public function getPostAttribute($post = [])
    {
        return new Address((array) $post ?? []);
    }

    public function getDeliveryAttribute($delivery = [])
    {
        return new Address((array) $delivery ?? []);
    }

    public function getVisitAttribute($visit = [])
    {
        return new Address((array) $visit ?? []);
    }

    public function getInvoiceAttribute($invoice = [])
    {
        return new Address((array) $invoice ?? []);
    }
}
