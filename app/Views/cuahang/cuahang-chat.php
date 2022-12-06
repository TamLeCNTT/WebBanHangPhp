<?php

use App\Models\Hoadon;

use App\Models\Chat;
use App\Models\Profile;
use App\Models\User;

$this->layout(config('view.layout')) ?>
<?php $this->start('css'); ?>
<style>
    .scrollbar {
        background-color: #F5F5F5;
        float: left;
        height: 500px;
        margin-bottom: 25px;
        margin-left: 22px;
        margin-top: 40px;

        overflow-y: scroll;
    }

    .force-overflow {
        min-height: 50vh;
    }
</style>

<?= $this->insert('../Views/home/home-css') ?>
<?php $this->stop(); ?>
<?php $this->start('page') ?>
<div class="container">
    <div id="wrapper">
        <?php
        if (isset($_SESSION['quyen']) && $_SESSION['quyen'] == 'Partner') : ?>
            <?= $this->insert('../Views/cuahang/cuahang-layout') ?>
        <?php else : ?>
            <?= $this->insert('../Views/user/user-layoutadmin') ?>

        <?php endif; ?>

        <div class="container-fluid">

            <div class="row">


                <div class="col-2 m-auto mt-2 ">
                    <div class="list-group" style="width:144%">


                        <?php
                        $username = auth()->username;
                        $user = User::where('username', $username)->first();
                        $dain[] = null;

                        foreach ($chattn as $chattn) :

                            if (!isset($dain[$chattn->id_nguoigui]) || $dain[$chattn->id_nguoigui] == null) :

                                $profile = Profile::all();
                                $profiles = new Profile();
                                foreach ($profile as $profile) :

                                    if ($profile->user_id == $chattn->id_nguoigui) :
                                        $profiles = $profile;
                                    endif;

                                endforeach;
                                if ($chattn->id_nguoigui == $id_nguoinhan) :
                        ?>
                                    <a href="/cuahang/chat/<?= $chattn->id_nguoigui ?>" class="list-group-item list-group-item-action" style="background-color:blue;"><?= $profiles->username ?? $chattn->nguoigui->username ?>

                                    </a>
                                <?php else : ?>
                                    <a href="/cuahang/chat/<?= $chattn->id_nguoigui ?>" class="list-group-item list-group-item-action" style=""><?= $profiles->username ?? $chattn->nguoigui->username ?>
                                        <?php if ($sotinnhan[$chattn->id_nguoigui]) : ?>
                                            <sup style="font-size:15px ;color:red;"><?= $sotinnhan[$chattn->id_nguoigui] ?? null ?>
                                            </sup>
                                        <?php endif; ?>
                                    </a>
                                <?php endif; ?>
                            <?php
                                $dain[$chattn->id_nguoigui] = 1;
                            endif; ?>

                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="col-9 scrollbar m-auto mt-2" style="margin-bottom:0px ;" id="style-1">
                    <div class="force-overflow">
                        <?php if ($chat != null) :
                            $name = null;
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
                                if ($username == $chat->nguoigui->username) : ?>
                                    <div style="text-align:right ;">
                                    <?php else : ?>

                                        <div style="text-align:left ;">
                                        <?php
                                    endif;
                                    if ($name != $chat->id_nguoigui) :
                                        $name = $chat->id_nguoigui;
                                        ?>
                                            <td style="text-align:right ;">
                                                <img style="width:40px;height: 40px;" src="<?= request()->baseUrl(); ?>/assets/images/profile/<?= $profiles->avatar ?? 'avatar.png' ?>" class="rounded-circle" height="25" alt="" loading="lazy" />

                                            </td>
                                            <a style="text-align:right ;"><?= $profiles->username ?? $chat->nguoigui->username ?></a>

                                        <?php endif; ?>

                                        <div class="row ">

                                            <?php if ($username == $chat->nguoigui->username) :
                                            ?>
                                                <div class="col-6 "></div>
                                                <div class="col-3 align-self-center" style="">
                                                    <a><?= $chat->created_at ?></a>
                                                </div>
                                                <div class="col-3   mt-2 align-self-center" style="background-color:aquamarine;padding:10px 10px 10px 10px ;text-align:left ;">
                                                    <?= $chat->noidung; ?>
                                                </div>
                                            <?php else : ?>

                                                <div class="col-1"></div>
                                                <div class="col-2  mt-2 align-self-center" style="background-color:aquamarine;padding:10px 10px 10px 10px ;">
                                                    <?= $chat->noidung; ?>
                                                </div>
                                                <br>

                                                <div class="col-3  mt-2  align-self-center">
                                                    <a><?= $chat->created_at ?></a>
                                                </div>
                                            <?php
                                            endif; ?>

                                        </div>

                                <?php endforeach;
                        endif; ?>
                                        </div>
                                    </div>


                                    <form enctype="multipart/form-data" action="/cuahang/chat/<?= $id_nguoinhan ?>" method="POST">
                                        <div class="row ">



                                            <div class="col-8" style="margin-left:22% ;margin-top:2px ;">

                                                <input required type="text" name="noidung" class="form-control form-input " placeholder="nhập nội dung" value="" />


                                            </div>
                                            <div class="col-1" style="margin-top:2px;margin-left:0px ;width:10%;">
                                                <?php if ($flag == 0) : ?>
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        <a style="text-align:center ;"> gửi</a>
                                                    </button>
                                                <?php else : ?>
                                                    <button disabled type="submit" class="btn btn-primary btn-block">
                                                        <a style="text-align:center ;"> gửi</a>
                                                    </button>
                                                <?php endif; ?>
                                            </div>




                                        </div>
                                    </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $this->stop(); ?>