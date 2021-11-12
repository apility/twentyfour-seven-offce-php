<?php

namespace Apility\Office247\Types;

use Apility\Office247\Exceptions\TwentyfourSevenOfficeException;
use DateTimeInterface;

use Apility\Office247\Types\Addresses;
use Apility\Office247\Types\OrderSlipStateType;
use Apility\Office247\Types\Currency;
use Apility\Office247\Types\Distributor;
use Apility\Office247\Types\DistributionMethod;
use Apility\Office247\Types\InvoiceRow;
use Apility\Office247\Types\DeliveryMethod;
use Apility\Office247\Types\UserDefinedDimension;

/**
 * @property int $OrderId
 * @property int $CustomerId
 * @property string $CustomerName
 * @property string $CustomerDeliveryName
 * @property string $CustomerDeliveryPhone
 * @property Addresses $Addresses
 * @property OrderSlipStateType $OrderStatus
 * @property int $InvoiceId
 * @property DateTimeInterface $DateOrdered
 * @property DateTimeInterface $DateInvoiced
 * @property DateTimeInterface $DateChanged
 * @property int $PaymentTime
 * @property string $CustomerReferenceNo
 * @property int $ProjectId
 * @property int $OurReference
 * @property bool $IncludeVAT"
 * @property string $YourReference
 * @property float $OrderTotalIncVat
 * @property float $OrderTotalVat
 * @property string $InvoiceTitle
 * @property string $InvoiceText
 * @property DateTimeInterface $Paid
 * @property string $OCR
 * @property string $CustomerOrgNo
 * @property Currency $Currency
 * @property int $PaymentMethodId
 * @property float $PaymentAmount
 * @property int $ProductionManagerId
 * @property int $SalesOpportunityId
 * @property int $TypeOfSaleId
 * @property Distributor $Distributor
 * @property DistributionMethod $DistributionMethod
 * @property int $DepartmentId
 * @property int $ExternalStatus
 * @property string $InvoiceEmailAddress
 * @property InvoiceRow[] $InvoiceRows
 * @property string $ProductionNumber
 * @property DateTimeInterface $DeliveryDate
 * @property int $ReferenceInvoiceId
 * @property int $ReferenceOrderId
 * @property string $ReferenceNumber
 * @property bool $SkipStock
 * @property DateTimeInterface $AccrualDate
 * @property int $AccrualLength
 * @property float $RoundFactor
 * @property string $InvoiceTemplateId
 * @property string $VippsNumber
 * @property DeliveryMethod $DeliveryMethod
 * @property string $DeliveryAlternative
 * @property bool $SendToFactoring
 * @property float $Commission
 * @property UserDefinedDimension[] $UserDefinedDimensions
 * @property string $GLNNumber
 * @property int $CustomerDeliveryId
 */
final class Invoice extends SoapType
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
