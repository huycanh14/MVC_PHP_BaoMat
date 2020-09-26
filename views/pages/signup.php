<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="public/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST">
                <span class="login100-form-title">
                    Create Member
                </span>
                <?php
                if ($flag) :
                ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo $flag; ?>
                    </div>
                <?php
                endif;
                ?>
                <?php
                if (count($errors) > 0) :
                    foreach ($errors as $key => $value) :
                ?>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" style="color: red;">
                                <?php echo $value; ?>
                            </label>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>

                <div class="wrap-input100 validate-input" data-validate="Username không được bỏ trống">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Email không đúng: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password không được bỏ trống">
                    <input class="input100" type="password" name="password" placeholder="Password" id="password-signup">
                    <input class="input100" type="hidden" name="passwordsha1" placeholder="Password" id="passwordsha1">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Phone không được bỏ trống">
                    <input class="input100" type="text" name="phone" placeholder="Phone">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Address không được bỏ trống">
                    <input class="input100" type="text" name="address" placeholder="Address">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="submit" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>
