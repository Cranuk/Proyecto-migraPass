<?php
namespace App\Traits;

trait HasNotifications
{
    public $info = '';

    public function clearInfo()
    {
        $this->reset('info');
    }

    public function notify($message)
    {
        $this->info = $message;
    }
}