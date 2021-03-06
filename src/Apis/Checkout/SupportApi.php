<?php

namespace Shipu\Bkash\Apis\Checkout;

/**
 * Class SupportApi
 * @package Shipu\Bkash\Apis\CheckoutApi
 */
class SupportApi extends CheckoutBaseApi
{

    /**
     * @return mixed
     */
    public function queryOrganizationBalance()
    {
        return $this->get('/payment/organizationBalance');
    }


    /**
     * @param $amount
     * @param $transferType
     * @param string $currency
     *
     * @return mixed
     */
    public function intraAccountTransfer( $amount, $transferType, $currency = 'BDT' )
    {
        return $this->json([
            'amount'       => $amount,
            'currency'     => $currency,
            'transferType' => $transferType
        ])->post('/payment/intraAccountTransfer');
    }

    /**
     * @param $trxId
     *
     * @return mixed
     */
    public function searchTransaction( $trxId )
    {
        return $this->get('/payment/search/' . $trxId);
    }

    /**
     * @param $amount
     * @param $paymentID
     * @param $trxID
     * @param string $reason
     * @param string $sku
     *
     * @return mixed
     */
    public function refundTransaction( $amount, $paymentID, $trxID, $reason, $sku )
    {
        return $this->json([
            'amount'    => $amount,
            'paymentID' => $paymentID,
            'trxID'     => $trxID,
            'reason'    => $reason,
            'sku'       => $sku
        ])->post('/payment/refund');
    }
}
