<?php

namespace YG\VakifBankVPos\Sale;

use YG\VakifBankVPos\Abstracts\AbstractRequest;
use YG\VakifBankVPos\Abstracts\Sale\SaleRequest as SaleRequestInterface;

class SaleRequest extends AbstractRequest implements SaleRequestInterface
{
    private ?string $transactionType = null;

    private ?string $terminalNo = null;

    private ?string $pan = null;

    private ?string $expiry = null;

    private ?string $currencyAmount = null;

    private ?string $currencyCode = null;

    private ?string $cavv = null;

    private ?string $eci = null;

    private ?string $mpiTransactionId = null;

    private ?string $clientIp = null;

    private ?string $transactionDeviceSource = null;

    private ?string $orderId = null;

    private ?string $orderDescription = null;

    public static function create(?string $transactionType, ?string $terminalNo, ?string $pan, ?string $expiry,
                                  ?string $currencyAmount, ?string $currencyCode, ?string $cavv, ?string $eci,
                                  ?string $mpiTransactionId, ?string $clientIp, ?string $transactionDeviceSource,
                                  ?string $orderId = null, ?string $orderDescription = null): SaleRequest
    {
        $amountArr = explode('.', $currencyAmount);
        if (count($amountArr) === 1)
            $currencyAmount .= '.00';
        else if (strlen($amountArr[1]) === 1)
            $currencyAmount .= '0';


        $request = new self();
        $request->transactionType = $transactionType;
        $request->terminalNo = $terminalNo;
        $request->pan = $pan;
        $request->expiry = $expiry;
        $request->currencyAmount = $currencyAmount;
        $request->currencyCode = $currencyCode;
        $request->cavv = $cavv;
        $request->eci = $eci;
        $request->mpiTransactionId = $mpiTransactionId;
        $request->clientIp = $clientIp;
        $request->transactionDeviceSource = $transactionDeviceSource;
        $request->orderId = $orderId;
        $request->orderDescription = $orderDescription;
        return $request;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function getTerminalNo(): ?string
    {
        return $this->terminalNo;
    }

    public function getPan(): ?string
    {
        return $this->pan;
    }

    public function getExpiry(): ?string
    {
        return $this->expiry;
    }

    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function getCurrencyAmount(): ?string
    {
        return $this->currencyAmount;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function getCavv(): ?string
    {
        return $this->cavv;
    }

    public function getEci(): ?string
    {
        return $this->eci;
    }

    public function getMpiTransactionId(): ?string
    {
        return $this->mpiTransactionId;
    }

    public function getClientIp(): ?string
    {
        return $this->clientIp;
    }

    public function getTransactionDeviceSource(): ?string
    {
        return $this->transactionDeviceSource;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getOrderDescription(): ?string
    {
        return $this->orderDescription;
    }
}