<?php

namespace App\Console\Commands;

use App\Models\Giftcard;
use App\Models\GiftcardMerchant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class GetGiftCardCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'giftcard:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get gift card from gyft.com and store in our db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info("giftcard:cron  job running at " . now());

        $timestamp = time();

        $apiBaseUrl =  config('credential.gyft.base_url');
        $apiKey = config('credential.gyft.api_key');
        $apiSecret = config('credential.gyft.api_secret');

        $signature = bin2hex(hash('sha256', ($apiKey . $apiSecret . $timestamp), true));

        $client = new Client();

        $response = $client->get("{$apiBaseUrl}/reseller/merchants?api_key={$apiKey}&sig={$signature}", [
            'headers' => [
                "Cache-Control" => "no-cache",
                "Accept" => "application/json",
                "x-sig-timestamp" => $timestamp,
            ]
        ]);

        $result = $response->getBody()->getContents();
        $response = json_decode($result, true);

        if (isset($response['details']) && !empty($response['details'])) {
            foreach ($response['details'] as $data) {
                $merchant = GiftcardMerchant::updateOrCreate(
                    [
                        'merchant_id' => $data['id']
                    ],
                    [
                        'name' => $data['name'] ?? '',
                        'description' => $data['description'] ?? '',
                        'cover_image_url_hd' => $data['cover_image_url_hd'] ?? '',
                        'icon_url' => $data['icon_url'] ?? '',
                        'card_name' => $data['card_name'] ?? ''
                    ]
                );
                if ($merchant) {
                    foreach ($data['shop_cards'] as $shopCard) {
                        Giftcard::updateOrCreate(
                            [
                                'card_id' => $shopCard['id'],
                            ],
                            [
                                'giftcard_merchant_id' => $merchant['id'],
                                'currency_code' => $shopCard['currency_code'] ?? '',
                                'price' => $shopCard['price'] ?? '',
                                'opening_balance' => $shopCard['opening_balance'] ?? ''
                            ]
                        );
                    }
                }
            }
        }
        Log::info("giftcard:cron job dataLogs " . json_encode($response));

        return true;
    }
}
