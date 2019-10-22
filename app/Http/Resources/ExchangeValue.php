<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeValue extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'from' => [
                'symbol' => $this->resource->getFrom()->symbol,
                'amount' => $this->resource->getFromAmount(),
            ],
            'to' => [
                'symbol' => $this->resource->getTo()->symbol,
                'amount' => $this->resource->getToAmount(),
            ],
        ];
    }
}
