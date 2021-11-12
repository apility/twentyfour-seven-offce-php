<?php

namespace Apility\Office247\Types;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;

use DateTimeInterface;
use Apility\Office247\Types\Addresses;
use Apility\Office247\Types\OrderSlipStateType;
use Apility\Office247\Types\Currency;
use Apility\Office247\Types\Distributor;
use Apility\Office247\Types\DistributionMethod;
use Apility\Office247\Types\DeliveryMethod;

/**
 * @var int $OrderId
 * @var int $CustomerId
 * @var string $CustomerName
 * @var string $CustomerDeliveryName
 * @var string $CustomerDeliveryPhone
 * @var Addresses $Addresses
 * @var OrderSlipStateType $OrderStatus
 * @var int $InvoiceId
 * @var DateTimeInterface $DateOrdered
 * @var DateTimeInterface $DateInvoiced
 * @var DateTimeInterface $DateChanged
 * @var int $PaymentTime
 * @var string $CustomerReferenceNo
 * @var int $ProjectId
 * @var int $OurReference
 * @var boolean $IncludeVAT
 * @var string $YourReference
 * @var float $OrderTotalIncVat
 * @var float $OrderTotalVat
 * @var string $InvoiceTitle
 * @var string $InvoiceText
 * @var DateTimeInterface $Paid
 * @var string $OCR
 * @var string $CustomerOrgNo
 * @var Currency $Currency
 * @var int $PaymentMethodId
 * @var float $PaymentAmount
 * @var int $ProductionManagerId
 * @var int $SalesOpportunityId
 * @var int $TypeOfSaleId
 * @var Distributor $Distributor
 * @var string $DistributionMethod
 * @var int $DepartmentId
 * @var int $ExternalStatus
 * @var string $InvoiceEmailAddress
 * @var ArrayOfInvoiceRow $InvoiceRows
 * @var APIException $APIException
 * @var string $ProductionNumber
 * @var DateTimeInterface $DeliveryDate
 * @var int $ReferenceInvoiceId
 * @var int $ReferenceOrderId
 * @var string $ReferenceNumber
 * @var boolean $SkipStock
 * @var DateTimeInterface $AccrualDate
 * @var int $AccrualLength
 * @var float $RoundFactor
 * @var string $InvoiceTemplateId
 * @var string $VippsNumber
 * @var DeliveryMethod $DeliveryMethod
 * @var string $DeliveryAlternative
 * @var boolean $SendToFactoring
 * @var float $Commission
 * @var ArrayOfUserDefinedDimension $UserDefinedDimensions
 * @var string $GLNNumber
 * @var int $CustomerDeliveryId
 */
final class InvoiceOrder extends SoapType
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($e = $this->APIException) {
            throw TwentyfourSevenOfficeException::parse($e);
        }
    }

    public function getAddressesAttribute($addresses)
    {
        return new Addresses($addresses);
    }
}
