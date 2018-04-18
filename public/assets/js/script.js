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
    image.classList.toggle("visible");
    video.classList.toggle("visible");
    if (videoAutoplay.hasAttribute("src")) {
        videoAutoplay.pause();
        videoAutoplay.removeAttribute("src");
    } else {
        videoAutoplay.setAttribute("src", "assets/images/video1.mp4");
        videoAutoplay.play();
        videoAutoplay.currentTime = timeForStart;
    }


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
var timeForStart = time[1];
console.log(timeForStart);
enableVideo(timeForStart);









//
