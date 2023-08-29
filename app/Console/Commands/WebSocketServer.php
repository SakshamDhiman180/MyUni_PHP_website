<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;
use React\Socket\SecureServer;
use React\Socket\Server;
use App\Http\Controllers\WebSocketController;

class WebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController()
                )
            ),
            config('credential.websocket_port')
        );
        $server->run();

        //for secure web
        // $loop   = Factory::create();
        // $webSock = new SecureServer(
        //     new Server('0.0.0.0:' . config('credential.websocket_port'), $loop),
        //     $loop,
        //     array(
        //         'local_cert'        => '/home/blessateacher/ssl/certs/blessateacher_com_bf180_14ffd_1695340799_37af13c9d725c5c12a179e36040e0700.crt', // path to your cert
        //         'local_pk'          => '/home/blessateacher/ssl/keys/bf180_14ffd_cb2c5624a025d7af7a4032d12b6917ed.key', // path to your server private key
        //         'allow_self_signed' => TRUE, // Allow self signed certs (should be false in production)
        //         'verify_peer' => FALSE
        //     )
        // );

        // // Ratchet magic
        // $webServer = new IoServer(
        //     new HttpServer(
        //         new WsServer(
        //             new WebSocketController()
        //         )
        //     ),
        //     $webSock
        // );

        // $loop->run();
    }
}
