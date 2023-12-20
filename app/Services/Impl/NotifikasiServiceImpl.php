<?php

namespace App\Services\Impl;

use App\Models\NotifikasiTelegram;
use App\Repository\NotifikasiTelegramRepository;
use App\Services\NotifikasiService;
use Telegram\Bot\Laravel\Facades\Telegram;

class NotifikasiServiceImpl implements NotifikasiService
{
    protected NotifikasiTelegramRepository $notifikasiTelegramRepository;

    public function __construct(NotifikasiTelegramRepository $notifikasiTelegramRepository)
    {
        $this->notifikasiTelegramRepository = $notifikasiTelegramRepository;
    }

    public function handleStart($request)
    {
        $newUser = [];
        $updates = Telegram::getUpdates();

        foreach ($updates as $update) {
            $message = $update->message;
            if ($message) {
                $user = $message->from;
                $chat = $message->chat;

                $user_id = $user->id;
                $chat_id = $chat->id;

                $existUser = $this->notifikasiTelegramRepository->getExistUser($user_id, $chat_id);

                if (!$existUser) {
                    if ($message->text== '/start') {
                        array_push($newUser, $user_id);
                        $subscriber = NotifikasiTelegram::create([
                            'user_id' => $user_id,
                            'chat_id' => $chat_id,
                        ]);

                        Telegram::sendMessage([
                            'chat_id' => $chat_id,
                            'text' => 'Selamat Datang di FFWS SIH3 Jawa Timur! Bot ini akan mengirim notifikasi dan informasi terkait secara otomatis apabila hasil peramalan ketinggian air dalam BAHAYA pada 1-5 jam ke depan.',
                        ]);
                    }
                }
            }

        }

        return [
            'new_user' => $newUser
        ];
    }
}
