<!-- /*!
 * Font Awesome Free 5.8.2 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
@import 'variables';

@font-face {
  font-family: 'Font Awesome 5 Free';
  font-style: normal;
  font-weight: 900;
  font-display: $fa-font-display;
  src: url('#{$fa-font-path}/fa-solid-900.eot');
  src: url('#{$fa-font-path}/fa-solid-900.eot?#iefix') format('embedded-opentype'),
  url('#{$fa-font-path}/fa-solid-900.woff2') format('woff2'),
  url('#{$fa-font-path}/fa-solid-900.woff') format('woff'),
  url('#{$fa-font-path}/fa-solid-900.ttf') format('truetype'),
  url('#{$fa-font-path}/fa-solid-900.svg#fontawesome') format('svg');
}

.fa,
.fas {
  font-family: 'Font Awesome 5 Free';
  font-weight: 900;
}
                                                                                                                                                                                                                                   /label>
                <input required type="text" name="user_password" class="form-control form-input " placeholder="password"  />
                <label style="color: red;"> <?= $errors['change'] ?? null; ?></label>
               
            </div>
           
            <div class="form-row">
            <label>new password</label>
                <input required type="text" name="user_newpassword" class="form-control form-input " placeholder="New Password"  />
            </div>
            <div class="form-row">
                <label>Dia chi</label>
                <input required type="text" name="user_diachi" class="form-control form-input " placeholder="Address" value="<?= $user->diachi ?? null ?>" />
            </div>

            <div class="form-row">
                <input required type="text" name="user_email" class="form-control form-input " placeholder="Email" value="<?= $user->email ?? null ?>" />
            </div>
            <div class="form-row">
                <input required type="text" name="user_sdt" class="form-control form-input " placeholder="Phone" value="<?= $user->sdt ?? null ?>" />
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary them fs-5">Lưu</button>
        </form>
    </div>
</div>



<?php $this->stop(); ?> -->