<div class="list-user list">
    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Địa chỉ</Address>
                </th>
                <th scope="col">Quyền</Address>
                </th>
                <th scope="col" style="text-align: center;width:300px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1; ?>
            <?php foreach ($user as $users) : ?>
                <tr>
                    <th scope="row"><?= $start++; ?></th>

                    <td><?= $users->username; ?></td>
                    <td><?= $users->quyen->quyen ?></td>
                    <td>
                        <a class="btn btn-primary" href="#edit" rel="modal:open">
                            Sửa
                        </a>
                        <?= $this->insert(
                            '../Views/user/user-edit',
                            [
                                'user' => $users
                            ]
                        ) ?>

                        <?php
                        $flag = 0; //kiểm tra sản phẩm có tồn tại trong bảng sản phẩm không .Neus có thì khong hiện nút xóa nếu không tồn tại sẽ hiện
                        foreach ($binhluan as $binhluans) :
                            if ($binhluans->id_nguoidung == $users->id_nguoidung) :
                                $flag = 1;
                            endif;
                        endforeach;
                        foreach ($hoadon as $hoadons) :
                            if ($hoadons->id_nguoidung == $users->id_nguoidung) :
                                $flag = 1;
                            endif;
                        endforeach;
                        if ($users->TrangthaiTK != 3) :
                        ?>
                            <?php if ($users->TrangthaiTK != 2) :
                            ?>
                                <a class=" btn btn-primary" href="<?= request()->baseUrl(); ?>/user/khoa/<?= $users->id_nguoidung ?>" data-id="<?= $users->id_nguoidung; ?>" title="Delete <?= $users->username; ?>" data-name="<?= $users->username; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                    Tạm khóa
                                </a>

                            <?php else : ?>
                                <a>
                                    <a class=" btn btn-primary" href="<?= request()->baseUrl(); ?>/user/khoa/<?= $users->id_nguoidung ?>" data-id="<?= $users->id_nguoidung; ?>" title="Delete <?= $users->username; ?>" data-name="<?= $users->username; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                        Mở khóa
                                    </a>

                                </a>
                            <?php endif; ?>
                            <?php
                            if ($flag == 0) : ?>
                                <a class="remove-city delete btn btn-primary" href="<?= request()->baseUrl(); ?>/user/delete" data-id="<?= $users->id_nguoidung; ?>" title="Delete <?= $users->username; ?>" data-name="<?= $users->username; ?>" data-return-url="<?= request()->fullUrl(); ?>">
                                    Tạm xóa
                                </a>
                            <?php else : ?>
                                <a class="remove-city btn btn-primary" style="margin: left 0px !important;" href="/user/delete">
                                    Tạm xóa
                                </a>
                            <?php endif; ?>
                        <?php else : ?>
                            <a class="btn btn-primary" href="<?= request()->baseUrl(); ?>/user/khoiphuc/<?= $users->id_nguoidung ?>">
                                Khôi phục
                            </a>
                        <?php endif; ?>




                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Hiển thị phân trang bên dưới bảng -->
<div class="pagination">
    <?= $this->insert('partials/pagination', ['paginator' => $paginator]); ?>
</div>)