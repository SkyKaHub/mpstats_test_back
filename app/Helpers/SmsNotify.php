<?php

    namespace App\Helpers;

    use App\Helpers\Contracts\NotificationInterface;

    class SmsNotify implements Contracts\NotificationInterface
    {

        /**
         * @param $data
         *
         * @return true
         */
        public function send($data): bool
        {
            return true;
            // TODO: Implement send() method.
        }
    }
