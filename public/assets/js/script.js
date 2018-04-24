//slider
var imagesToggle = document.querySelectorAll(".webinar-container .content .img img");
i = 0;
function moveImages() {
    imagesToggle[i].classList.remove("visible");
    i++;
    if (i >= imagesToggle.length) {
        i = 0;
    }
    imagesToggle[i].classList.add("visible");
}
setInterval(moveImages, 8000);


//toggle image/video
var image = document.querySelector(".webinar-container .content .img");
var video = document.querySelector(".webinar-container .content .video");
var videoAutoplay = document.querySelector(".webinar-container .content .video video");

function enableVideo(timeForStart) {
    image.classList.remove("visible");
    video.classList.add("visible");
    videoAutoplay.setAttribute("src", "assets/images/video1.mp4");
    videoAutoplay.play();
    videoAutoplay.currentTime = timeForStart;
}

// check time for webinar
function checkTime() {
    var time = new Date();
    var timeCurrent = [];
    timeCurrent.push(time.getUTCHours() + 3);
    timeCurrent.push(time.getUTCMinutes());
    return timeCurrent;
}

var time = new Date();
var hours = time.getUTCHours() + 3;
var minutes = time.getUTCMinutes();

if ((hours >= 19) && (hours < 21)) {
    var timeForStart = minutes * 60;
    enableVideo(timeForStart);
}


// add user
function addUser() {
    $.ajax({
        url: "../models/ajax_add_user.php",
        type: "post",
        dataType: "html",
        data: $(".login-container .form form").serialize(),
        success: function(response) {
            document.location.href = "http://192.168.64.2/webinar/public/?tpl=webinar&session_id=" + response;
        }
    });
}

$(document).ready(function() {
    $(".login-container .form form button").click(
		function(){
            //проверка, что бы скрипт не сработал, если форма пустая
            if ($(".login-container .form form input").val()) {
                addUser();
    			return false;
            }
            return false;
		}
	);
});


// add message
function addMessage() {
    $.ajax({
        url: "../models/ajax_add_message.php",
        type: "post",
        dataType: "html",
        data: $(".webinar-container .content .chat form").serialize(),
        success: function(response) {
            $(".webinar-container .content .chat form textarea").val("");
            $(".webinar-container .content .chat .messages .user-name").remove();
            $(".webinar-container .content .chat .messages .message").remove();
        	result = $.parseJSON(response);
            var id = "";
            var user_name = "";
            var date_created = "";
            var message = "";
            for (var i = 0; i < result.length; i++) {
                id = result[i].id;
                user_name = result[i].user_name;
                date_created = result[i].date_created;
                message = result[i].message;
                $(".webinar-container .content .chat .messages").prepend($("<div class='user-name'></div>").text(user_name));
                $(".webinar-container .content .chat .messages").prepend($("<div class='message'></div>").text(message));
    	    }
        }
    });
}

$(document).ready(function() {
    $(".webinar-container .content .chat form button").click(
		function(){
            //проверка, что бы скрипт не сработал, если форма пустая
            if ($(".webinar-container .content .chat form textarea").val()) {
                addMessage();
    			return false;
            }
            return false;
		}
	);
});


// show messages
function showMessage(session_id) {
    $.ajax({
        url: "../models/ajax_show_message.php",
        type: "post",
        dataType: "html",
        data: {session_id:session_id},
        success: function(response) {
            $(".webinar-container .content .chat form textarea").val("");
            $(".webinar-container .content .chat .messages .user-name").remove();
            $(".webinar-container .content .chat .messages .message").remove();
        	result = $.parseJSON(response);
            var id = "";
            var user_name = "";
            var date_created = "";
            var message = "";
            for (var i = 0; i < result.length; i++) {
                id = result[i].id;
                user_name = result[i].user_name;
                date_created = result[i].date_created;
                message = result[i].message;
                $(".webinar-container .content .chat .messages").prepend($("<div class='user-name'></div>").text(user_name));
                $(".webinar-container .content .chat .messages").prepend($("<div class='message'></div>").text(message));
    	    }
        }
    });
}

$(document).ready(function() {
    var session_id = $(".webinar-container .content .chat form input").attr("value");
    showMessage(session_id);
});


// show admin's messages
function showMessageAdmin() {
    var messages = document.querySelector(".webinar-container .content .chat .messages");
    var message = document.createElement('div');
    var userName = document.createElement('div');
    message.className = "message-admin";
    message.innerHTML = "Приветствую всех участников встречи! <br> Начинаем в 19:00 - 19:05 по Москве. Чат работает по принципу АНТИСПАМ таким образом: <br> Вы видите только СВОИ сообщения, другие участники их не видят. <br> Я и модератор видим ВСЕ ваши сообщения. <br> Чтобы не теряться и быть на связи, давайте дружить и в соц. сетях: <br> Вконтакте: <a href='https://vk.com/varvara.eremina' target='_blank'>https://vk.com/varvara.eremina</a> <br> Instagram: <a href='https://www.instagram.com/varvaraeremina/' target='_blank'> https://www.instagram.com/varvaraeremina</a> <br> WhatsApp: <a href='https://api.whatsapp.com/send?phone=+79963363106' target='_blank'> https://api.whatsapp.com/send?phone=+79963363106</a>";
    userName.className = "user-name-admin";
    userName.innerHTML = "admin";
    messages.insertBefore(userName, messages.children[0]);
    messages.insertBefore(message, messages.children[0]);

}

setTimeout(showMessageAdmin, 2000);


// show amount participants
function showAmountParticipants() {
    var participants = document.querySelector(".webinar-container .content .participants .amount");
    var amount = Math.floor(Math.random() * (50 - 10)) + 10;
    participants.innerHTML = amount+400;
}

if ((hours >= 19) && (hours < 21)) {
    setInterval(showAmountParticipants, 5000);
}








//
