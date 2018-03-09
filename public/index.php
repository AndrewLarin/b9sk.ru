<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body { margin: 0; background: black; overflow-y: hidden; color: white; }
.container { margin: 0 auto 2rem; padding: 19px 0; height: 100vh; box-sizing: border-box; }
video { display: block; margin: 0 auto; width: 100%; height: 100%; }
.mail { display: none; }

.mail {
position: fixed; 
display: block;
top: 0;
left: 0;
right: 0;
padding: 3px;
z-index: 1;
text-align: center;
line-height: 19px;
height: 19px;
}

a {
text-decoration: none;
color: inherit;
}

a:hover { text-decoration: underline; }

.counter {
position: fixed;
bottom: 0;
left: 0;
right: 0;
height: 28px;
line-height: 28px;
font-size: 26px;
}

.counter span { font-weight: 800; text-shadow: -1px -1px 1px #000000; color: #12b7de; }
.player { position:fixed; top: 50px; left: 25px;}
.player-control { display:block; position: fixed; top: 25px; left: 25px; height: 25px; width: 25px; padding: 3px; z-index: 1; color: rgba(255,255,255, 0.5); cursor: pointer;}
.player-control:hover { color: rgb(255,255,255); }
</style>
<script>

// Формат даты '03/05/2018 22:30:00 +03' ММ/ДД/ГГГГ
function countdownCalc(jsDate) {
var stoppedDrinkingAt = jsDate;
var time = { lastShot : new Date(stoppedDrinkingAt).getTime(),
             currentTime : new Date().getTime()
    };
// день decimal
time.diff = (time.currentTime - time.lastShot) / (1000 * 3600) / 24;
time.failChance = time.diff * 25;

time.failChance = time.failChance >= 100 ? 99 : Math.floor( time.failChance );

// день, час, минуты
time.diffDay = Math.floor(time.diff); // int
time.diffHours = (time.diff - time.diffDay) * 24; // decimal
time.diffHoursInt = Math.floor( time.diffHours );  // int
time.diffMin = (time.diffHours - Math.floor( time.diffHours ) ) * 60; // decimal
time.diffMinInt = Math.floor( time.diffMin );

// суффиксы
plural = {
  days: ['день', 'дня', 'дней'],
  hours: ['час', 'часа', 'часов'],
  minutes: ['минуту', 'минуты', 'минут'],
};

function declOfNum(n, titles) {
  return titles[(n % 10 === 1 && n % 100 !== 11) ? 0 : n % 10 >= 2 && n % 10 <= 4 && (n % 100 < 10 || n % 100 >= 20) ? 1 : 2]
}

suffix = {
  day: declOfNum(time.diffDay, plural.days),
  hour: declOfNum(time.diffHoursInt, plural.hours),
  min: declOfNum(time.diffMinInt, plural.minutes),
};


// записать р-т в html
  document.querySelector('.counter .time-day').innerText = time.diffDay;
  document.querySelector('.counter .time-hours').innerText = time.diffHoursInt;
  document.querySelector('.counter .time-min').innerText = time.diffMinInt;

  document.querySelector('.counter .suffix-day').innerText = suffix.day;
  document.querySelector('.counter .suffix-hour').innerText = suffix.hour;
  document.querySelector('.counter .suffix-min').innerText = suffix.min;

  document.querySelector('.counter .fail-chance').innerText = time.failChance;


}

window.onload = function () {
  countdownCalc('03/05/2018 09:00:00 +03');
};

setInterval( function() {countdownCalc('03/05/2018 09:00:00 +03')}, 1000 * 60);
</script>


</head>

<body>
<div class="container">
  <div class="mail"><a href="mailto:z@b9sk.ru">куплю видеокарту б/у z@b9sk.ru</a></div>
  <video autoplay loop>
    <source src="/drum-cat.mp4" type="video/mp4">
  </video>
  <marquee class="counter">Визя не пьёт уже
    <span class="time-day"></span> <span class="suffix-day"></span>,
    <span class="time-hours"></span> <span class="suffix-hour"></span> и
    <span class="time-min"></span> <span class="suffix-min"></span>.
    Шанс забухать: <span class="fail-chance"></span><span>%</span></marquee>
</div>
<pre>
Vizya will start getting drunk in 10 March at 00:00
</pre>
<style>
pre { position: fixed; right: 10px; top: 0; }
</style>
<div href="#" class="player-control">Плейлист</div> 
<div class="player">
<iframe width="560" height="315" src="https://www.youtube.com/embed?listType=playlist&list=PL18eZMwckNKH3PKkvapFPvM3lsoW03RRO&autoplay=1&loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<div>Перезагрузи страницу, если пропал список.</div>
</div>
<script>
// показать/спрятать плеер
var playerStyle = document.querySelector('.player').style;
playerStyle.display = "none";

var playerControl = document.querySelector('.player-control');
playerControl.onclick = function(event) {
if (playerStyle.display === "none") playerStyle.display = 'block';
else playerStyle.display = 'none';
};
</script>

</body>
</html>

<!-- Powered by vi -->
