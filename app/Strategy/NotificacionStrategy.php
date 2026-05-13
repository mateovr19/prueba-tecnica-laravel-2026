<?php
namespace App\Strategy;

use App\Contracts\NotificadorInterface;
use App\Notificadores\MailNotificador;
use App\Notificadores\SmsNotificador;
use Illuminate\Contracts\Container\Container;

class NotificacionStrategy {
    public function __construct(protected Container $app)
    {
    }

    public function make(?string $notification = null): NotificadorInterface
    {
        $notification = $notification ?? config('okvet.notificador', 'mail');

        return match ($notification) {
            'mail' => $this->app->make(MailNotificador::class),
            'sms' => $this->app->make(SmsNotificador::class),
            default => $this->app->make(MailNotificador::class),
        };
    }
}
