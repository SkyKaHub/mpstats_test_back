<?php

    namespace App\Helpers;

    use App\Helpers\Contracts\NotificationInterface;

    class TelegramNotify implements NotificationInterface
    {

        /**
         * @param $data
         *
         * @return bool
         */
        public function send($data): bool
        {
            return true;
            // TODO: Implement send() method.
        }
    }
