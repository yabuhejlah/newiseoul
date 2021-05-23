<?php $lang = app('App\Lang'); ?>
<?php $docs = app('App\Docs'); ?>
<?php $theme = app('App\Theme'); ?>
<?php $currency = app('App\Currency'); ?>
<?php $category = app('App\Categories'); ?>

<html>
    <?php echo $__env->make('elements.head', array('title' => $lang->get(146)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<body>

<?php echo $__env->make('elements.header', array('1' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- breadcrumb -->
<div class="breadcrumb-area q-mb20 q-mt10">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="<?php echo e(route('/')); ?>"><i class="fa fa-home q-mr10"></i><?php echo e($lang->get(12)); ?></a></li>      
                        <li class="active"><?php echo e($lang->get(146)); ?></li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="d-flex q-mb50 q-mt20 h-75">

    <div class="shop-page-container w-25">
        <div class="container">
            <div id="chat-users" class="q-chat-users-window">
            </div>
        </div>
    </div>


    <div class="shop-page-container w-75">
        <div class="container">
            <div id="messagesWindow" class="q-chat-messages-window">
            </div>
            <div id="sendMsgWindow" class="q-chat-send-window" hidden>
                <div class="header-advance-search">
                    <input id="messageText" type="text" placeholder="<?php echo e($lang->get(147)); ?>">  
                    <button style="background: white">
                        <img src="img/iconsend.png" onclick="sendMsg();" class="img-fluid" style="padding-bottom: 10px; padding-left: 10px; padding-right: 10px; padding-top: 5px"/>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<!--=====  down of page  ======-->

<?php echo $__env->make('elements.footer', array('docs' => $docs->get('0')), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--=====  Dialogs, elements, etc  ======-->

<?php echo $__env->make('elements.dialogDetails', array('pages' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('elements.wishlist', array('default_tax' => ""), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- scroll to top  -->
<a href="#" class="scroll-top"><img src="img/arrowup.png" style="padding: 10px;" class="img-fluid"> </a>

<script>

    var currentLength = 0;
    var currentId = 0;

    function myGet() {
        if (currentId == 0)
            return;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            url: '<?php echo e(url("chatMessages2")); ?>',
            data: {
                user_id: currentId,
            },
            success: function (data){
                console.log(data);
                if (currentLength != data.messages.length)
                    drawMsg(data);
                document.getElementById("chat-count").hidden = true;
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    setInterval(myGet, 10000); // one time in 10 sec
    myGet();

    function drawMsg(data){
        var last = "";
        var msg = document.getElementById("messagesWindow");
        msg.innerHTML = "";

        currentLength = data.messages.length;
        data.messages.forEach(function(entry){
            var now = entry.created_at.substr(0, 11);
            if (now != last) {
                var div = document.createElement("div");
                div.innerHTML = `
                        <div class="containerChat" style="width:20%; margin-left: 40%; margin-right: 40%;">
                            <div style="text-align: center;">
                                <div class="font-14">`+ now +`</div>
                            </div>
                        </div>
                        `;
                last = now;
                msg.appendChild(div);
            }
            var div = document.createElement("div");
            var date = entry.created_at.substr(11,5);
            if (entry.author == "customer"){
                div.innerHTML = `
                            <div class="containerChat" style="width:60%; margin-left: 5%; margin-right: 35%; ">
                                <h4>`+ entry.text +`</h4>
                                <div align="right"><h5>` + date + `</h5></div>
                            </div>
                        `;
            }else{
                div.innerHTML = `
                            <div class="containerChat" style="width:60%; margin-left: 35%; margin-right: 5%; background-color: #cbecff">
                                <h4>`+ entry.text +`</h4>
                                <div align="right"><h5>` + date + `</h5></div>
                            </div>
                        `;
            }
            msg.appendChild(div);
        });
        msg.scrollTop = msg.scrollHeight;
    }

    function sendMsg(){
        var text = document.getElementById("messageText").value;
        if (text == "")
            return;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'POST',
            url: '<?php echo e(url("chatMessageSend2")); ?>',
            data: {
                id: currentId,
                text: text,
            },
            success: function (data){
                console.log("chatMessageSend2");
                console.log(data);
                document.getElementById("messageText").value = "";
                drawMsg(data)
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    //
    var searchText = "";

    //
    buildChatUsers();

    function buildChatUsers(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            url: '<?php echo e(url("chatUsers2")); ?>',
            data: {
            },
            success: function (data){
                console.log(data);
                if (data.error != "0")
                    return showNotification("bg-red", "<?php echo e($lang->get(479)); ?>", "bottom", "center", "", "");  // Something went wrong
                $text = "";
                data.users.forEach(function(user, i, arr) {
                    if (!user.name.toUpperCase().includes(searchText.toUpperCase()))
                        return;
                    var messages = "";
                    if (user.count != 0)
                        messages = `<div id="user${user.id}msgCountDotAll" class="dot" style="float: right; background-color: green;">
                                     <div style="display: table; margin: 0 auto; color: white; vertical-align: middle; text-align: center;" id="user${user.id}msgCountAll">${user.count}</div>
                                </div>`;
                    var unread = "";
                    if (user.unread != 0)
                        unread = `<div id="user${user.id}msgCountDot" class="dot" style="float: right; background-color: red; margin-right: 0px; margin-left: 5px">
                                <div style="display: table; margin: 0 auto; color: white; vertical-align: middle; text-align: center;" id="user${user.id}msgCount">${user.unread}</div>
                            </div>`;
                    var bkg = "#ffffff";
                    if (user.id == currentId)
                        bkg = "#cbecff";
                    $text = $text + `<div id="user${user.id}" class="col-md-12 "  onclick="selectUser(${user.id})" style="padding: 0px; margin-bottom: 5px; background-color: ${bkg}">
                                            <div class="d-flex align-items-center justify-content-between align-items-center" style="padding-top: 10px; padding-left: 20px; padding-right: 20px; padding-bottom: 10px; cursor: pointer">
                                                <div class="d-flex align-items-start">
                                                    <div class="d-flex image-cropper">
                                                        <img src="${user.image}" width="20px" class='d-rounded'></img>
                                                    </div>
                                                    <div class="d-flex q-ml20 q-mt10">
                                                        ${user.name}
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-vertical-start q-mt10">
                                                    ${unread}
                                                    <div style="width: 3px"></div>
                                                    ${messages}
                                                </div>
                                            </div>
                                    </div>
            `;
                });
                document.getElementById("chat-users").innerHTML = $text;
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

    function selectUser(id){
        console.log(id);
        // load messages

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            type: 'GET',
            url: '<?php echo e(url("chatMessages2")); ?>',
            data: {
                user_id: id,
            },
            success: function (data){
                console.log("selectUser");
                console.log(data);
                buildChatUsers();
                document.getElementById("sendMsgWindow").hidden = false;
                currentId = id;
                drawMsg(data);
            },
            error: function(e) {
                console.log(e);
            }}
        );
    }

</script>

<?php echo $__env->make('elements.bottom', array(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\vmarkets_shop\resources\views/chat.blade.php ENDPATH**/ ?>