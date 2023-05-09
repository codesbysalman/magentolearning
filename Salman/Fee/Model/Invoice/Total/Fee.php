<?php

namespace Salman\Fee\Model\Invoice\Total;

use Magento\Sales\Model\Order\Invoice;
use Magento\Sales\Model\Order\Invoice\Total\AbstractTotal;

class Fee extends AbstractTotal
{
    /**
     * @param Invoice $invoice
     * @return $this
     */
    public function collect(Invoice $invoice)
    {
        $invoice->setFee(10);
        $orderWeight = $invoice->getOrder()->getWeight();
        $amount = $orderWeight > 10 ? 0 : 10;
        $invoice->setFee($amount);

        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getFee());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getFee());

        return $this;
    }
}
