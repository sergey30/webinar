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
    timeCurrent.push(time.getUTCHours() + 7);
    timeCurrent.push(time.getUTCMinutes());
    return timeCurrent;
}

time = checkTime();

if ((time[0] >= 9) && (time[0] <= 10)) {
    var timeForStart = time[1] * 60;
    enableVideo(timeForStart);
}


// add message
function addMessage() {
    $.ajax({
        url: "../models/ajax_add_message.php",
        type: "post",
        dataType: "html",
        data: $(".webinar-container .content .chat form").serialize(),
        success: function(response) {
            $(".webinar-container .content .chat form textarea").val(""); // очистка формы после отправки
            $(".webinar-container .content .chat .messages .user-name").remove(); // удалить динамически созданые элементы
            $(".webinar-container .content .chat .messages .message").remove(); // удалить динамически созданые элементы

        	result = $.parseJSON(response);

            var id = "";
            var user_name = "";
            var date_created = "";
            var message = "";

            // будет сформирован блок со всеми существующими сообщениями в базе, принадлежащие конкретному пользователю
            for (var i = 0; i < result.length; i++) {
                id = result[i].id;
                user_name = result[i].user_name;
                date_created = result[i].date_created;
                message = result[i].message;
                // формируются новые блоки и в них подставляются данные полученные из базы
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
function showMessage(session_id, url) {
    $.ajax({
        url: url,
        type: "post",
        dataType: "html",
        data: {session_id:session_id},
        success: function(response) {
            result = $.parseJSON(response);
            $("#result_form .message").remove();
            $("#result_form .remove").remove();
            $("#result_form .message_data").remove();
            var id = "";
            var first_name = "";
            var last_name = "";
            var date_created = "";
            var message = "";
            for (var i = 0; i < result.length; i++) {
                id = result[i].id;
                first_name = result[i].first_name;
                last_name = result[i].last_name;
                date_created = result[i].date_created;
                message = result[i].message;
                $("#result_form").prepend($("<div class='message'></div>").text(message));
                $("#result_form").prepend($("<a href='#' class='remove d-inline-block ml-5 pl-2 pr-2 border-danger border text-danger'></a>").text("remove message").attr("id", id));
                $("#result_form").prepend($("<span class='message_data d-inline-block mt-3 ml-3 text-primary'></span>").text(first_name + " " + last_name + " " + date_created));
    	    }
        }
    });
}

// как только документ загружен сработает функция
$(document).ready(function() {
    var session_id = $("#send_message input").attr("value");
    showMessage(session_id, "../mdl/ajax_show_message.php");
});











//
