<?php $lang = app('App\Lang'); ?>

<meta name="google-signin-client_id" content="416149507323-2pdcpo2ibhsbctq4kde7aucmj40cc503.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v9.0&appId=498073981169124" nonce="YFK4XINP"></script>

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 ">

        <div class="login-form">
            <h4 class="login-title"><?php echo e($lang->get(51)); ?></h4>      

            <div class="row">
                <div class="col-md-12 col-12 mb-20">
                    <label><?php echo e($lang->get(52)); ?> <span class="text-danger">*</span></label>   
                    <input class="mb-0" id="email" name="email" type="email" placeholder="<?php echo e($lang->get(52)); ?>"> 
                </div>
                <div class="col-12 mb-20">
                    <label><?php echo e($lang->get(53)); ?> <span class="text-danger">*</span></label> 
                    <input class="mb-0" id="password" name="password" type="password" placeholder="<?php echo e($lang->get(53)); ?>"> 
                </div>
                <div class="col-md-8">

                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember"><?php echo e($lang->get(54)); ?></label>  
                    </div>

                </div>

                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                    <a href="<?php echo e(route("/forgot")); ?>"> <?php echo e($lang->get(55)); ?></a>  
                </div>

                <div class="col-md-12">
                    <button onclick="doLogin();" class="save-btn mt-0"><?php echo e($lang->get(51)); ?></button>  
                </div>

                <div class="col-md-12 mt-20 text-center">
                    <hr>
                    <?php echo e($lang->get(68)); ?>  
                </div>

                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="col-md-6 mt-20 mr-20 ml-20" style="display: contents">
                            <div class="g-signin2" data-width="300px" data-onsuccess="onSignIn" ></div>
                        </div>
                        <br>
                        <div class="col-md-12 mt-20">
                        </div>
                        <div class="col-md-6 mt-20 mr-20 ml-20" style="display: contents">
                            <div class="fb-login-button" data-width="300px" data-size="large" data-button-type="continue_with" data-layout="default"
                                 data-auto-logout-link="false" data-use-continue-as="false" data-scope="public_profile,email" data-onlogin="checkLoginState();"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-30 text-center">
                    <hr>
                    <a href="<?php echo e(route("/register")); ?>" ><?php echo e($lang->get(69)); ?></a>  
                </div>

            </div>
        </div>

    </div>
</div>

<script>

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        doLoginSendToServer(profile.getId() + "@google.com", profile.getId(), "off");
        //signOut();
    }

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }

    function doLogin(){
        var email = document.getElementById("email").value;
        if (email == "")
            return showNotification("pastel-danger", "<?php echo e($lang->get(58)); ?>", "bottom", "center", "", "");  // Please enter email-address
        var password = document.getElementById("password").value;
        if (password == "")
            return showNotification("pastel-danger", "<?php echo e($lang->get(59)); ?>", "bottom", "center", "", "");  // Please enter password
        var remember = document.getElementById("remember").value;
        doLoginSendToServer(email, password, remember);
    }

    function doLoginSendToServer(email, password, remember){
        console.log($('meta[name="_token"]').attr('content'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("login")); ?>',
            data: {
                email : email,
                password : password,
                remember : remember,
            },
            success: function (data){
                console.log(data);
                if (data.error == "1")
                    window.location.href = '<?php echo e(route("/")); ?>'; //Will take you to Google.
                    //window.location.reload(true);
                else
                    showNotification("pastel-danger", data.text, "bottom", "center", "", "");
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            console.log(response);
            console.log(response.authResponse.accessToken);
            FB.api('/me', { fields: 'name' }, function (response) {
                console.log('Success ');
                console.log(response);
                doLoginSendToServer(response.id + "@facebook.com", response.id, "off");
            });
        });
    }

</script>
<?php /**PATH C:\xampp\htdocs\restaurants_site\resources\views/elements/login.blade.php ENDPATH**/ ?>