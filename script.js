// Timer functionality
let time = 2600;
const timerText = document.getElementById("timer-text");
const timerBadge = document.getElementById("timer");
const quizForm = document.getElementById("quizForm");

const countdown = setInterval(() => {
    time--;
    const mins = String(Math.floor(time / 60)).padStart(2, '0');
    const secs = String(time % 60).padStart(2, '0');
    timerText.textContent = mins + ":" + secs;

    if (time <= 30) timerBadge.style.borderColor = "rgba(233,69,96,0.9)";

    if (time <= 0) {
        clearInterval(countdown);
        quizForm.submit();
    }
}, 1000);

// Tab switch detection
document.addEventListener("visibilitychange", () => {
    if (document.hidden) {
        alert("Tab switch detected. Quiz will be submitted.");
        quizForm.submit();
    }
});