<?php

namespace App\Controllers;

use App\Models\SanPham;
use App\Models\Binhluan;
use App\Http\Paginator;
use App\Http\Response;
use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;

class ChatController  extends BaseController
{
    public function chatshow($id_nguoinhan)
    {

        if (!isset(auth()->username))
            return redirect('/login');
        $username = auth()->username;
        $user = User::where('username', $username)->first();
        if ($id_nguoinhan == 0)
            $id_nguoinhan = $user->id_nguoidung;
        $flag = 0;
        $chats = Chat::where('id_nguoinhan', $user->id_nguoidung)->orderBy('id_nguoigui', 'DESC')->get();
        $sotinnhan[] = null;
        $nguoigui = null;
        foreach ($chats as $chats) {

            if ($chats->nguoigui->username != $nguoigui) {
                $nguoigui = $chats->nguoigui->username;
                if ($chats->trangthai == 0)
                    $sotinnhan[$chats->id_nguoigui] = 1;
                else
                    $sotinnhan[$chats->id_nguoigui] = 0;
            } else
             if ($chats->trangthai == 0)
                $sotinnhan[$chats->id_nguoigui] += 1;
        }
        if ($user->id_nguoidung == $id_nguoinhan) {
            $flag = 1;
            $chattn = Chat::where('id_nguoinhan', $user->id_nguoidung)
                ->orderBy('created_at', 'DESC')->get();
            return $this->render(
                'chat/user-chat',
                [
                    'chattn' => $chattn,
                    'id_nguoinhan' => $id_nguoinhan,
                    'sotinnhan' => $sotinnhan,
                    'chat' => null,
                    'flag' => $flag
                ]
            );
        }
        $profile = Profile::where('user_id', $id_nguoinhan)->first();
        $chatkt = $chat = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan]])
            ->orWhere([['id_nguoinhan', $user->id_nguoidung], ['id_nguoigui', $id_nguoinhan]])->count();
        if ($chatkt == 0) {
            $chatnew = new Chat();
            $chatnew->id_nguoigui = $id_nguoinhan;
            $chatnew->id_nguoinhan = $user->id_nguoidung;
            $chatnew->noidung = "Xin chào $username. Chúng tôi có thể giúp gì cho bạn ?";
            $chatnew->trangthai = 1;
            $chatnew->save();
        }

        $chat = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan]])
            ->orWhere([['id_nguoinhan', $user->id_nguoidung], ['id_nguoigui', $id_nguoinhan]])->orderBy('created_at', 'DESC')->get();
        $chattn = Chat::where('id_nguoinhan', $user->id_nguoidung)
            ->orderBy('created_at', 'DESC')->get();
        return $this->render(
            'chat/user-chat',
            [
                'id_nguoinhan' => $id_nguoinhan,
                'chattn' => $chattn,
                'profile' => $profile,
                'chat' => $chat,
                'sotinnhan' => $sotinnhan,
                'chats' => $chats,
                'flag' => $flag
            ]
        );
    }
    public function chat($id_nguoinhan)
    {
        $noidung = $_POST["noidung"];

        $username = auth()->username;
        $user = User::where('username', $username)->first();
        $profile = Profile::where('user_id', $id_nguoinhan)->first();
        $chats = Chat::where([['id_nguoigui', $user->id_nguoidung], ['id_nguoinhan', $id_nguoinhan], ['noidung', $noidung]])->first();
        if ($chats == null) {
            $chat = new Chat();
            $chat->id_nguoinhan = $id_nguoinhan;
            $chat->id_nguoigui = $user->id_nguoidung;
            $chat->noidung = $noidung;
            $chat->trangthai = 0;
            $chat->save();
        }
        redirect("/chat/$id_nguoinhan");
    }
}
