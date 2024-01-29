<?php

namespace App\Console\Commands;

use Clients\Models\Client;
use Clientsmessages\Models\ClientMessage;
use Illuminate\Console\Command;

class send_messages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send firebase notification every five minutes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = ClientMessage::where('status', 0)->first();
        $allClients = array();
        $sentClients = array();
        $allClients = array_filter(explode(',' , $message->clients), fn($value) => !is_null($value) && $value !== '');
        $sentClients = array_filter(explode(',' , $message->sent_clients), fn($value) => !is_null($value) && $value !== '');
        foreach($allClients as $key => $allClient){
            foreach($sentClients as $sentClient){
                if($allClient == $sentClient){
                    unset($allClients[$key]);
                }
            }
        }

        if(is_array($sentClients) && !empty($sentClients)){
            if (count($allClient) == count($sentClient)) {
                $message->status = 1;
                $message->save();
            }
        }
        
        $userFireBaseTokens = Client::whereNotNull('device_token')
        ->whereIn('id', $allClients)->limit(50)
            ->pluck('device_token')->toArray();

        $notification = array(
            'device_token' => $userFireBaseTokens ,
            'title' => $message->title ,
            'body' => $message->description,
            'id' => 1, 'badge' => 0 ,
            'click_action' => '/'
        );
        pushNotification($notification);
        return Command::SUCCESS;
    }
}
