<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = \json_decode($this->getJson(), true);
        Currency::create([
            'id'     => 1,
            'rate'   => '1.00',
            'symbol' => 'PLN',
            'name'   => 'Polski złoty',
        ]);

        foreach ($currencies as $currency) {
            Currency::create([
                'rate'   => $currency['mid'],
                'symbol' => $currency['code'],
                'name'   => $currency['currency'],
            ]);
        }
    }

    private function getJson(): string
    {
        return '[  
         {  
            "currency":"bat (Tajlandia)",
            "code":"THB",
            "mid":0.1267
         },
         {  
            "currency":"dolar amerykański",
            "code":"USD",
            "mid":3.8408
         },
         {  
            "currency":"dolar australijski",
            "code":"AUD",
            "mid":2.6355
         },
         {  
            "currency":"dolar Hongkongu",
            "code":"HKD",
            "mid":0.4897
         },
         {  
            "currency":"dolar kanadyjski",
            "code":"CAD",
            "mid":2.9357
         },
         {  
            "currency":"dolar nowozelandzki",
            "code":"NZD",
            "mid":2.4646
         },
         {  
            "currency":"dolar singapurski",
            "code":"SGD",
            "mid":2.8197
         },
         {  
            "currency":"euro",
            "code":"EUR",
            "mid":4.2792
         },
         {  
            "currency":"forint (Węgry)",
            "code":"HUF",
            "mid":0.012961
         },
         {  
            "currency":"frank szwajcarski",
            "code":"CHF",
            "mid":3.8851
         },
         {  
            "currency":"funt szterling",
            "code":"GBP",
            "mid":4.9700
         },
         {  
            "currency":"hrywna (Ukraina)",
            "code":"UAH",
            "mid":0.1546
         },
         {  
            "currency":"jen (Japonia)",
            "code":"JPY",
            "mid":0.03538
         },
         {  
            "currency":"korona czeska",
            "code":"CZK",
            "mid":0.1673
         },
         {  
            "currency":"korona duńska",
            "code":"DKK",
            "mid":0.5728
         },
         {  
            "currency":"korona islandzka",
            "code":"ISK",
            "mid":0.030719
         },
         {  
            "currency":"korona norweska",
            "code":"NOK",
            "mid":0.4206
         },
         {  
            "currency":"korona szwedzka",
            "code":"SEK",
            "mid":0.3985
         },
         {  
            "currency":"kuna (Chorwacja)",
            "code":"HRK",
            "mid":0.5755
         },
         {  
            "currency":"lej rumuński",
            "code":"RON",
            "mid":0.8989
         },
         {  
            "currency":"lew (Bułgaria)",
            "code":"BGN",
            "mid":2.1879
         },
         {  
            "currency":"lira turecka",
            "code":"TRY",
            "mid":0.6576
         },
         {  
            "currency":"nowy izraelski szekel",
            "code":"ILS",
            "mid":1.0852
         },
         {  
            "currency":"peso chilijskie",
            "code":"CLP",
            "mid":0.005289
         },
         {  
            "currency":"peso filipińskie",
            "code":"PHP",
            "mid":0.0750
         },
         {  
            "currency":"peso meksykańskie",
            "code":"MXN",
            "mid":0.2010
         },
         {  
            "currency":"rand (Republika Południowej Afryki)",
            "code":"ZAR",
            "mid":0.2612
         },
         {  
            "currency":"real (Brazylia)",
            "code":"BRL",
            "mid":0.9304
         },
         {  
            "currency":"ringgit (Malezja)",
            "code":"MYR",
            "mid":0.9172
         },
         {  
            "currency":"rubel rosyjski",
            "code":"RUB",
            "mid":0.0603
         },
         {  
            "currency":"rupia indonezyjska",
            "code":"IDR",
            "mid":0.00027357
         },
         {  
            "currency":"rupia indyjska",
            "code":"INR",
            "mid":0.054164
         },
         {  
            "currency":"won południowokoreański",
            "code":"KRW",
            "mid":0.003273
         },
         {  
            "currency":"yuan renminbi (Chiny)",
            "code":"CNY",
            "mid":0.5423
         },
         {  
            "currency":"SDR (MFW)",
            "code":"XDR",
            "mid":5.2826
         }
      ]';
    }
}
