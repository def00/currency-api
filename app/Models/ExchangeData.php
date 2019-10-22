<?php declare(strict_types=1);

namespace App\Models;


class ExchangeData
{
    private $from;
    private $to;
    private $fromAmount;
    private $toAmount;

    public function __construct(Currency $from, Currency $to, float $fromAmount, float $toAmount)
    {
        $this->from       = $from;
        $this->to         = $to;
        $this->fromAmount = $fromAmount;
        $this->toAmount   = $toAmount;
    }

    /**
     * @return Currency
     */
    public function getFrom(): Currency
    {
        return $this->from;
    }

    /**
     * @return Currency
     */
    public function getTo(): Currency
    {
        return $this->to;
    }

    /**
     * @return float
     */
    public function getFromAmount(): float
    {
        return $this->fromAmount;
    }

    /**
     * @return float
     */
    public function getToAmount(): float
    {
        return $this->toAmount;
    }

}
