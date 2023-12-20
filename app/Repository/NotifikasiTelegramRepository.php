<?php

namespace App\Repository;

use App\Models\NotifikasiTelegram;

class NotifikasiTelegramRepository
{
    public function getExistUser($user_id, $chat_id)
    {
        $existUser = NotifikasiTelegram::where('user_id', $user_id)
            ->where('chat_id', $chat_id)
            ->first();

        if($existUser)
        {
            return True;
        }

    }

}
