<?php

use App\Models\Profile;
use App\Models\User;

$this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<style>
    .scrollbar {
        background-color: #F5F5F5;
        float: left;
        height: 300px;
        margin-bottom: 25px;
        margin-left: 22px;
        margin-top: 40px;

        overflow-y: scroll;
    }

    .force-overflow {
        min-height: 450px;
    }
</style>

<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container" style="margin-top: 10px;">
    <div class="row">


        <div class="col-11 scrollbar" style="margin-bottom:0px ;" id="style-1">
            <div class="force-overflow">

                <?php $name = null;
                $username = auth()->username;
                $user = User::where('username', $username)->first();
                foreach ($chat as $chat) :

                    if ($chat->id_nguoigui != $user->id_nguoidung) :
                        $chat->trangthai = 1;
                        $chat->save();
                    endif;
                    $profile = Profile::all();
                    $profiles = new Profile();
                    foreach ($profile as $profile) :

                        if ($profile->user_id == $chat->id_nguoigui) :
                            $profiles = $profile;
                        endif;

                    endforeach;
                    if ($name != $chat->id_nguoigui) :
                        $name = $chat->id_nguoigui;
                ?>
                        <td style="text-align:right ;">
                            <img style="width:40px;height: 40px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profiles->avatar ?? 'avatar.png' ?>" class="rounded-circle" height="25" alt="" loading="lazy" />
                        </td>
                        <a style="text-align:right ;"><?= $profiles->username ?? $chat->nguoigui->username ?></a>
                    <?php endif; ?>

                    <div class="row ">
                        <div class="col-1 "></div>
                        <div class="col-2  mt-2  align-self-center" style="background-color:aquamarine;padding:10px 10px 10px 10px ;"><?= $chat->noidung; ?></div>

                        <div class="col-2  align-self-center">
                            <a><?= $chat->created_at ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <form enctype="multipart/form-data" action="/chat/<?= $id_nguoinhan ?>" method="POST">
        <div class="row ">
            <div class="col-10" style="margin-left:12px ;margin-top:2px ;">
                <input required type="text" name="noidung" class="form-control form-input " placeholder="nhập nội dung" value="" />
            </div>
            <div class="col-1" style="margin-top:2px ;margin-left:10px ;">
                <button type="submit" class="btn btn-primary btn-block">
                    gửi
                </button>
            </div>
        </div>
    </form>

</div>
<?php $this->stop(); ?>