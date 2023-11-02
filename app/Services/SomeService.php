<?php

    namespace App\Services;

    use App\Models\Notification;

    class SomeService
    {
        private $notifications;

        public function __construct(Notification $notification) {
            $this->notifications = $notification;
        }

        /**
         * @param $data array
         *
         * @return bool
         */
        public function create(array $data): bool
        {
            if (count($data)) {
                $this->notifications->save($data);
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param array $data
         *
         * @return bool
         */
        public function update(array $data): bool
        {
            if (count($data)) {
                $notification = $this->notifications->findOrFail(1);
                $notification->save($data);
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param int $id
         *
         * @return bool
         */
        public function delete(int $id): bool
        {
            if ($id) {
                $this->notifications->delete($id);
                return true;
            } else {
                return false;
            }
        }
    }
