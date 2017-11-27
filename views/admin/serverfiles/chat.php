	<script type="text/javascript" src="<?php echo base_url();?>vasplus_programming_blog_chat_application/js/jquery_1.5.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vasplus_programming_blog_chat_application/js/file_uploads.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vasplus_programming_blog_chat_application/js/base64.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>vasplus_programming_blog_chat_application/js/post_watermarkinput.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>vasplus_programming_blog_chat_application/js/vasplus_programming_blog_JS.js"></script> -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>vasplus_programming_blog_chat_application/css/vasplus_programming_blog_chat.css" />


  
	<div class="chat_page">
    <center>
        <div id="vasp" style=" font-family:Verdana, Geneva, sans-serif; font-size:25px;width:1000px;"></div>
        <br clear="all" />
        <br clear="all" />
        <br />
        <center>
            <select id="team_id" class="form-control" onChange="displaysChatsOnlineUsers(this.value);">
                <option value="0">Select Team</option>
                <?php foreach($teamList as $row){ echo '<option value="'.$row->id.'">'.$row->team_name.'</option>'; } ?>
            </select>
            <!-- CHAT CODE STARTS HERE -->
            <div id="vpb_chat_wrapper" align="center">

                <div style="width:300px; float:left;border-right:0px solid #CCC;" align="center">
                    <div id="lefttopbar"></div>
                    <div style="overflow-y:auto; overflow-x:hidden; width:300px; height:300px;" id="vasplus_programming_blog_chats_scroller">
                        <div style="padding:5px;" id="vasplus_programming_blog_chats_displayer"></div>
                    </div>

                    <div style="width:300px; margin:0px; padding:0px; border-top:1px solid #CCC;" align="center">
                        <input id="chatMessage" class="vpb_text_input_box" onKeyDown="javascript:return checkChatBoxInputKey(event,this);" style="display:none;" placeholder="Type your chat message here..." />
                        <input id="fakechatMessage" class="vpb_text_input_box" onClick="showLoginBox();" readonly style="cursor: pointer;" placeholder="Click here to login so as to chat..." />
                    </div>
                </div>

                <div style="width:199px; height:331px;float:left;border:0px solid #CCC;border-left:1px solid #CCC;" align="center">
                    <div class="vpb_right_header" align="center">
                        <span style="padding-left:5px; padding-right:5px;">Users Online</span>
                    </div>

                    <div style="width:196px;height:300px; text-align:center;overflow-y:auto;overflow-x:hidden;">
                        <div style="width:100%;height:300px;" class="vasplusChat_OnlineUsers" id="display_users_online">

                        </div>
                    </div>



                    <div style="width:199px; height:29px;height:29px; text-align:center; border-top:1px solid #CCC; padding-top:5px;">
                        <!-- <div style="float:right; width:60px;" align="right"><span class="ccc" id="logout_btn" style="display:none;">
			<a href="javascript:void(0);" onclick="chatLogoutOperation();" class="vasplus_tooltips">
			<div id="vasplus_programming_blog_chat_BTN" style="width:10px; height:10px; padding-top:1px; padding-bottom:11px; margin-right:5px; padding-left:7px; padding-right:7px; float:right;" align="center">x</div>
			<span style="font-family:Verdana, Geneva, sans-serif; font-size:11px; font-weight:normal; font-style:normal;color:black;">Logout</span></a></span>
		</div> -->
                        <div style="float:right; width:60px; display:none;" id="newChatNotification" align="right">ssDD</div>
                        <div style="float:right; width:60px; display:none;" id="photoUploadButton" align="right"></div>
                    </div>
                </div>
                <br clear="all">


                <!-- PHOTO UPLOADS STARTS HERE -->

                <!-- PHOTO UPLOADS ENDS HERE -->


                <!-- LOGIN BOX STARTS HERE -->
                <div style="width:500px; background:#F9F9F9;text-align:left;border:0px solid #CCC;border-radius: 4px;-moz-border-radius: 4px;-webkit-border-radius:4px; padding-top:6px;display:none;" id="vasplus_programming_blog_login_Box">
                    <br clear="all" />
                    <div style="float:left; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px;" align="left">Username:</div>
                    <div style="float:left; width:300px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <input type="text" id="usernamed" value="<?php echo strtolower($this->session->userdata('fname'));?>" style="width:280px; height:17px;" class="textAreaBox">
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div style="float:left; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:12px;padding:10px;" align="left">Password</div>
                    <div style="float:left; width:300px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <input type="password" id="passwordd" value="<?php echo $this->session->userdata('password');?>" style="width:280px; height:17px;" class="textAreaBox">
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div style="float:left; width:100px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">&nbsp;</div>
                    <div style="float:left; width:350px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="logins();">Login</div>
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="showSignupBox();">Sign Up</div>
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="showLoginBox();">Cancel</div>
                        <br clear="all" />
                        <br clear="all" />
                    </div>
                    <br clear="all" />
                    <div id="login_status" align="left"></div>
                </div>
                <!-- LOGIN BOX ENDS HERE -->


                <!-- SIGN-UP BOX STARTS HERE -->
                <div style="width:500px; background:#F9F9F9;text-align:left;border:0px solid #CCC;border-radius: 4px;-moz-border-radius: 4px;-webkit-border-radius:4px; padding-top:6px; display:none;" id="vasplus_programming_blog_signup_Box">
                    <br clear="all" />
                    <div style="float:left; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px;" align="left">Fullname:</div>
                    <div style="float:left; width:300px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <input type="text" id="fullnames" style="width:280px; height:17px;" class="textAreaBox">
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div style="float:left; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px;" align="left">Username:</div>
                    <div style="float:left; width:300px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <input type="text" id="usernames" style="width:280px; height:17px;" class="textAreaBox">
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div style="float:left; width:80px; font-family:Verdana, Geneva, sans-serif; font-size:12px;padding:10px;" align="left">Password</div>
                    <div style="float:left; width:300px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <input type="password" id="passwords" style="width:280px; height:17px;" class="textAreaBox">
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div style="float:left; width:100px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">&nbsp;</div>
                    <div style="float:left; width:350px; font-family:Verdana, Geneva, sans-serif; font-size:12px;" align="left">
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="signUps();">Submit</div>
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="showLoginBox();">Back</div>
                        <div id="vasplus_programming_blog_chat_BTNG" onClick="hideSignupBox();">Cancel</div>
                    </div>
                    <br clear="all" />
                    <br clear="all" />
                    <div id="signup_status" align="left"></div>
                </div>
                <!-- SIGN-UP BOX ENDS HERE -->


            </div>
            <!-- CHAT CODE ENDS HERE -->
        </center>





        <p style="margin-bottom:300px;">&nbsp;</p>
    </center>
    
    </div>


    <script type="text/javascript">
        window.onload = function(e) {
            //    $.ajax({
            // 	type: "POST",
            // 	url: "<?php echo base_url();?>admin/chat/vpb_display_users_online",
            // 	data: "",
            // 	cache: false,
            // 	beforeSend: function()
            // 	{
            // 		$("#display_users_online").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
            // 	},
            // 	success: function(response)
            // 	{
            // 		$("#display_users_online").html(response);
            // 	}
            // });

            logins();

        }

        function showLoginBox() {
            $("#vasplus_programming_blog_signup_Box").hide();
            $("#vasplus_programming_blog_login_Box").slideToggle('fast');
            $("#usernamed").focus();
        }

        function checkChatsForUpdates() {
            if (!$.cookie('usernames') && !$.cookie('friend_username')) {
                $("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                setTimeout(function() {
                    //$("#vasplus_programming_blog_chats_displayer").fadeIn(3000).html('<br clear="all"><center><div align="center" style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:16px; color:blue;" onclick="showLoginBox();"><span class="ccc"><a href="javascript:void(0);">Click here to login</a></span></div></center><br clear="all">');
                    return false;
                }, 1000);
                return false;

            } else {
                var my_username = $.cookie('usernames');
                var friend_username = $.cookie('friend_username');
                var dataString = "user_from=" + my_username + "&user_to=" + friend_username;
                var team_id = $("#team_id option:selected").val();
                if (team_id != 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url();?>admin/chat/vpb_display",
                        data: dataString,
                        cache: false,
                        beforeSend: function() {
                            //$("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                        },
                        success: function(response) {
                            $("#vasplus_programming_blog_chats_displayer").html(response);
                            $("#vasplus_programming_blog_chats_scroller").scrollTop($("#vasplus_programming_blog_chats_scroller")[0].scrollHeight);
                        }
                    });

                }
                setTimeout('checkChatsForUpdates()', 20000);
            }

        }

        //Show online users with auto refresh



        function displaysChatsOnlineUsers(teamId) {
            var dataString = 'team_id=' + teamId + '';
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/chat/vpb_display_users_online",
                data: dataString,
                cache: false,
                beforeSend: function() {
                    // $("#display_users_online").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                },
                success: function(response) {
                    $("#display_users_online").html(response);
                }
            });
            if ($.cookie('usernames')) {
                setTimeout('displayChatsOnlineUsers()', 10000);
            } else {
                //Do not refresh online users if there is no valid session established
            }
        }

        //Carry out automatic updates
        $(document).ready(function() {
            $("#lefttopbar").html(lefttopbars);
            $("span#sessionUserID").html(userSessionsIdentifier + "&nbsp;<span id='sessionFullname'>" + userSessionsIdentifiers + "</span>");
            $("#chatMessage").Watermark("Type your chat message here...");
            $("#fakechatMessage").Watermark("Click here to login so as to chat...");

            checkChatsForUpdates();
            displayChatsOnlineUsers();

            if ($.cookie('usernames') && $.cookie('fullnames') && $.cookie('friend_username')) {
                $("span#sessionUserID").html(userSessionsIdentifier + "&nbsp;<span id='sessionFullname'>" + $.cookie('fullnames') + "</span>");
                $("#fakechatMessage").hide();
                $("#chatMessage").show();
                $("#logout_btn").show();
                // $("#photoUploadButton").show().html('<a href="javascript:void(0);" onclick="showPhotoUploadBox();" id="" class="vasplus_tooltips"><img src="vasplus_programming_blog_chat_application/smileys/photos.gif" style="margin-top:5px;" border="0" align="absmiddle"><span style="font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;">Change your photo</span></a>');
            } else {}
            $('#usernamed').live("keydown", function(vpb_event) {
                if (vpb_event.keyCode == 13 && vpb_event.shiftKey == 0) {
                    logins();
                }
            });
            $('#passwordd').live("keydown", function(vpb_event) {
                if (vpb_event.keyCode == 13 && vpb_event.shiftKey == 0) {
                    logins();
                }
            });
        });

        function logins() {
            var usernamel = $("#usernamed").val();
            var passl = $("#passwordd").val();
            if (usernamel == "") {
                $("#login_status").html('<div class="info">Please enter your username to proceed.</div>');
                $("#usernamed").focus();
            } else if (passl == "") {
                $("#login_status").html('<div class="info">Please enter your account password to go.</div>');
                $("#passwordd").focus();
            } else {
                var dataString = 'usernamel=' + usernamel + '&passl=' + passl + '&page=login';

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>admin/chat/vpb_save_details",
                    data: dataString,
                    cache: false,
                    beforeSend: function() {
                        $("#login_status").html('<br clear="all"><div style="padding-left:60px;"><font style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:black;">Please wait</font> <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" alt="Sending...." align="absmiddle" title="Sending...."/> </div>');
                    },
                    success: function(response) {
                        var loginResult = response.indexOf('operation_process_is_completed');
                        if (loginResult != -1) {

                            var fullnameRealized = usernamel.replace(/\+/g, "&nbsp;");
                            $.cookie('fullnames', fullnameRealized);
                            $.cookie('usernames', usernamel);
                            $.cookie('friend_username', $("#usernamed").val());
                            $("span#sessionUserID").html(userSessionsIdentifier + "&nbsp;<span id='sessionFullname'>" + vpbChatStripTags(fullnameRealized) + "</span>");
                            $("#usernamed").val("");
                            $("#passwordd").val("");
                            $("#login_status").html('');
                            $("#vasplus_programming_blog_login_Box").hide();
                            $("#fakechatMessage").hide();
                            $("#chatMessage").show();
                            $("#logout_btn").show();
                            // $("#photoUploadButton").show().html('<a href="javascript:void(0);" onclick="showPhotoUploadBox();" id="" class="vasplus_tooltips"><img src="vasplus_programming_blog_chat_application/smileys/photos.gif" style="margin-top:5px;" border="0" align="absmiddle"><span style="font-family:Verdana, Geneva, sans-serif; font-size:11px; color:black;">Change your photo</span></a>');
                            displayChatsOnlineUsers();
                            checkChatsForUpdates();
                            loadUserPhoto($.cookie('usernames'));
                            newChatNotification();
                            vpb_Close_TabEvents();
                        } else {
                            $("#login_status").html($(response).fadeIn(2000));
                        }
                    }
                });
            }
        }

        function startNewChatEstablishment(friends_username, friends_fullname) {

            // if(!$.cookie('usernames'))
            // {
            // 	$("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
            // 	setTimeout(function()
            // 	{
            // 		$("#vasplus_programming_blog_chats_displayer").fadeIn(3000).html('<br clear="all"><center><div align="center" style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:16px; color:blue;" onclick="showLoginBox();"><span class="ccc"><a href="javascript:void(0);">Click here to login</a></span></div></center><br clear="all">');
            // 		return false;
            // 	}, 1000);
            // 	return false;

            // }else{}

            $("#vasplus_programming_blog_chats_displayer").html('');
            var fullnameRealized = friends_fullname.replace(/\+/g, "&nbsp;");
            //alert(fullnameRealized);
            $.cookie('fullnames', fullnameRealized);
            $.cookie('friend_username', friends_username);
            $("span#sessionUserID").html(userSessionsIdentifier + "&nbsp;<span id='sessionFullname'>" + friends_username + "</span>");
            checkChatsForUpdates();
            $("#newChatNotification").hide();
            $("#chatMessage").focus();

        }

        //Popup new chat notification
        function newChatNotification() {
            if (!$.cookie('usernames')) {
                return false;
            } else {
                var dataString = "user_to=" + $.cookie('usernames');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>admin/chat/vpb_new_chat_notification",
                    data: dataString,
                    cache: false,
                    beforeSend: function() {},
                    success: function(response) {
                        $("#newChatNotification").show();
                        $("#newChatNotification").html(response);
                    }
                });
                setTimeout('newChatNotification()', 20000);
            }
        }

        function checkChatBoxInputKey(event, vasplus) {
            if (event.keyCode == 13 && event.shiftKey == 0) {
                if (!$.cookie('usernames') && !$.cookie('friend_username')) {
                    $("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                    setTimeout(function() {
                        $("#vasplus_programming_blog_chats_displayer").fadeIn(3000).html('<br clear="all"><center><div align="center" style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:16px; color:blue;" onclick="showLoginBox();"><span class="ccc"><a href="javascript:void(0);">Click here to login</a></span></div></center><br clear="all">');
                    }, 1000);
                    return false;

                } else {
                    var my_username = $.cookie('usernames');
                    var friend_username = $.cookie('friend_username');
                    var chatMessage = $("#chatMessage").val();
                    if (friend_username == "") {
                        alert("Sorry, the identity of the person you are about to chat with could not be identified.");
                        return false;
                    } else if (my_username == "") {
                        alert("Sorry, your identity could not be verified at the moment. Please try again.");
                        return false;
                    } else if (chatMessage == "") {
                        alert("Please enter the message that you wish to send to proceed. Thanks.");
                        return false;
                    } else {
                        var dataString = "user_from=" + my_username + "&user_to=" + friend_username + "&chatMessage=" + chatMessage;
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url();?>admin/chat/vpb_send",
                            data: dataString,
                            cache: false,
                            beforeSend: function() {
                                $("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Loading <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                            },
                            success: function(response) {
                                $("#vasplus_programming_blog_chats_displayer").html(response);
                                $("#vasplus_programming_blog_chats_scroller").scrollTop($("#vasplus_programming_blog_chats_scroller")[0].scrollHeight);
                                $("#chatMessage").val('');
                                newChatNotification();
                            }
                        });
                    }
                }
            }
        }

        function loadUserPhoto(username) {
            var dataString = "username=" + username;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>admin/chat/vpb_load_user_photo",
                data: dataString,
                cache: false,
                beforeSend: function() {
                    //$("#updated_photo_by_vasplus_programming_blog").html('<br clear="all"><div style="margin-top:10px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center"><img src="vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                },
                success: function(response) {
                    $("#updated_photo_by_vasplus_programming_blog").html(response);
                }
            });
        }

        //Perform logout process
        function chatLogoutOperation() {
            if (confirm("If you are really sure that you want to logout then click on OK otherwise, click on Cancel.")) {
                var my_username = $.cookie('usernames');
                var friend_username = $.cookie('friend_username');
                if (my_username == "" || friend_username == "") {
                    alert('Sorry, there is no valid session available to perform log out operation. Please refresh this page and try again. Thanks.');
                    return false;
                } else {
                    var dataString = 'user_from=' + friend_username + '&user_to=' + my_username;
                    $.ajax({
                        type: "POST",
                        url: "vpb_delete_messages.php",
                        data: dataString,
                        cache: false,
                        beforeSend: function() {
                            $("#vasplus_programming_blog_chats_displayer").html('<br clear="all"><center><div style="margin-top:100px;font-family:Verdana, Geneva, sans-serif; font-size:13px;" align="center">Please wait <img src="<?php echo base_url();?>vasplus_programming_blog_chat_application/smileys/loadings.gif" align="absmiddle" title="Loading..." /></div></center><br clear="all">');
                        },
                        success: function(response) {
                            $.cookie('fullnames', '');
                            $.cookie('usernames', '');
                            $.cookie('friend_username', '');
                            $("span#sessionUserID").html(userSessionsIdentifier + "&nbsp;<span id='sessionFullname'>" + userSessionIdentifiers + "</span>");
                            $("#chatMessage").hide();
                            $("#logout_btn").hide();
                            $("#photoUploadButton").hide().html('');
                            $("#chatMessage").val("");
                            $("#newChatNotification").hide();
                            $("#fakechatMessage").show();
                            $("#vasplus_programming_blog_photo_upload_Box").hide();
                            displayChatsOnlineUsers();
                        }
                    });
                }
            }
            return false;
        }


        function vpbChatStripTags(html) {
            if (arguments.length < 3) {
                html = html.replace(/<\/?(?!\!)[^>]*>/gi, '');
            } else {
                var allowed = arguments[1],
                    specified = eval("[" + arguments[2] + "]");
                if (allowed) {
                    var regex = '</?(?!(' + specified.join('|') + '))\b[^>]*>';
                    html = html.replace(new RegExp(regex, 'gi'), '');
                } else {
                    var regex = '</?(' + specified.join('|') + ')\b[^>]*>';
                    html = html.replace(new RegExp(regex, 'gi'), '');
                }
            }
            var clean_string = html;
            return clean_string;
        }
        $(document).ready(function() {
            newChatNotification();
        }), userSessionsIdentifiers = $.vpb_dc("V2VsY29tZSBHdWVzdA=="), userSessionIdentifiers = $.vpb_dc("SGVsbG8gR3Vlc3Q="), userSessionsIdentifier = $.vpb_dc("PGEgaHJlZj0iaHR0cDovL3d3dy52YXNwbHVzLmluZm8vaW5kZXgucGhwIiB0YXJnZXQ9Il9ibGFuayI+PGltZyBzcmM9Imh0dHA6Ly93d3cudmFzcGx1cy5pbmZvL2RlbW9zL2NoYXRfc2NyaXB0X3ZlcnNpb25fZml2ZS92YXNwbHVzX3Byb2dyYW1taW5nX2Jsb2dfY2hhdF9hcHBsaWNhdGlvbi9zbWlsZXlzL3YucG5nIiBhbGlnbj0iYWJzbWlkZGxlIiB0aXRsZT0iUG93ZXJlZCBieSBWYXNwbHVzIFByb2dyYW1taW5nIEJsb2ciIGJvcmRlcj0iMCIgc3R5bGU9IndpZHRoOjE4cHg7aGVpZ2h0OjE4cHg7IiBhbGlnbj0iYWJzbWlkZGxlIj48L2E+"), $.cookie = function(vpb_cookie_name, vpb_cookie_value, vpb_cookie_option) {
            if (typeof vpb_cookie_value != 'undefined') {
                vpb_cookie_option = vpb_cookie_option || {};
                if (vpb_cookie_value === null) {
                    vpb_cookie_value = '';
                    vpb_cookie_option.expires = -1;
                }
                var expires = '';
                if (vpb_cookie_option.expires && (typeof vpb_cookie_option.expires == 'number' || vpb_cookie_option.expires.toUTCString)) {
                    var date;
                    if (typeof vpb_cookie_option.expires == 'number') {
                        date = new Date();
                        date.setTime(date.getTime() + (vpb_cookie_option.expires * 24 * 60 * 60 * 1000));
                    } else {
                        date = vpb_cookie_option.expires;
                    }
                    expires = '; expires=' + date.toUTCString();
                }
                var path = vpb_cookie_option.path ? '; path=' + (vpb_cookie_option.path) : '';
                var domain = vpb_cookie_option.domain ? '; domain=' + (vpb_cookie_option.domain) : '';
                var secure = vpb_cookie_option.secure ? '; secure' : '';
                document.cookie = [vpb_cookie_name, '=', encodeURIComponent(vpb_cookie_value), expires, path, domain, secure].join('');
            } else {
                var vpb_cookie_cookieValue = null;
                if (document.cookie && document.cookie != '') {
                    var cookies = document.cookie.split(';');
                    for (var i = 0; i < cookies.length; i++) {
                        var cookie = $.trim(cookies[i]);
                        if (cookie.substring(0, vpb_cookie_name.length + 1) == (vpb_cookie_name + '=')) {
                            vpb_cookie_cookieValue = decodeURIComponent(cookie.substring(vpb_cookie_name.length + 1));
                            break;
                        }
                    }
                }
                return vpb_cookie_cookieValue;
            }
        }, lefttopbars = $.vpb_dc("PGRpdiBjbGFzcz0idnBiX2xlZnRfaGVhZGVyIiBhbGlnbj0ibGVmdCI+PHNwYW4gaWQ9InNlc3Npb25Vc2VySUQiPjwvc3Bhbj48L2Rpdj4=");
    </script>