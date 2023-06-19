<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Message;
use Telegram;


class botController extends Controller
{
    protected $telegram;

    /**
     * Create a new controller instance.
     *
     * @param  Api  $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }
    
    public function setwebhook(){
        // Buat instance objek Telegram dengan token bot Telegram yang valid
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        // Panggil metode getWebhookInfo() untuk mendapatkan informasi webhook saat ini
        $response = $this->telegram->getWebhookInfo();

        // Lakukan pemrosesan atau tindakan sesuai kebutuhan Anda dengan respons yang diterima
        dd($response);
    }

    /**
     * Show the bot information.
     */
        public function sendMessageToTelegram()
        {
            // Inisialisasi objek Telegram
            $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
     
            // ID chat tujuan (ID chat bot atau ID chat pengguna)
            $chatId = '5454898571';
    
            // Mengirim pesan ke bot Telegram
            $response = $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => 'Halo, ini adalah pesan dari controller Laravel!'
            ]);
    
            // Lakukan pemrosesan respons jika diperlukan
        }
    public function handleRequest(Request $request)
    {
        // $csrfToken = Request::header('X-CSRF-TOKEN');
     // Mendapatkan payload dari webhook Telegram
     $payload = request()->all();
        dd($payload);
     // Memeriksa apakah permintaan valid
     if (isset($payload['message']['text'])) {
         $chatId = $payload['message']['chat']['id'];
         $message = $payload['message']['text'];

         // Mengecek jika perintah adalah /infosuhu
         if ($message == '/infosuhu') {
             // Logika untuk mengambil informasi suhu
             $suhu = 10; // Ganti dengan logika yang sesuai

             // Mengirim pesan balasan dengan informasi suhu
             $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
             $telegram->sendMessage([
                 'chat_id' => $chatId,
                 'text' => 'Informasi Suhu: ' . $suhu,
             ]);
         }
     }

     return response('OK');
}}
