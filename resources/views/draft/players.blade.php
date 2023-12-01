<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<div>
    <div class="p-4 bg-gray-800 text-white text-center">
        <div>
            <input class="text-gray-900 rounded-md" type="number" id="time-picker" name="time-picker" min="1" max="5">
        </div>
        <h1 id="countdown" class="text-8xl pb-1">00:00</h1>
        <div id="startCount" class="pt-3" class="text-center">
            <button onclick="startCountdown()"
                class="px-6 py-2 mb-4 font-semibold rounded bg-purple-500 hover:bg-purple-700 text-white"
                type="button" id="iniciar">INICIAR</button>
        </div>
        <div style="display:none" id="stopCount" class="pt-3" class="text-center">
            <button onclick="stopCountdown()" class="px-6 py-2 mb-4 font-semibold rounded bg-red-500 hover:bg-red-700 text-white"
                type="button">PARAR</button>
        </div>
        <audio id="buzzer" src="{{ asset('storage/buzz.wav') }}"></audio>
    </div>
</div>
<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                <div class="overflow-x-auto">
                    <button onclick="draft()" class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 text-white" type="button">SORTEAR PLAYER</button>
                    <audio id="bell" src="{{ asset('storage/bell.wav') }}"></audio>
                </div>
            </div>
        </div>
    </div>
        <h1 id="player" class="uppercase" style="color: black; font-size: 8rem"></h1>
        <button id="refresh" onclick="location.reload(true);" class="hidden px-12 py-2 mb-4 font-semibold rounded bg-blue-500 text-white" type="button">Reiniciar?</button>
                            <audio id="bell" src="{{ asset('storage/bell.wav') }}"></audio>

        <audio id="laugh" src="{{ asset('storage/risada-de-fundo-de-chaves.mp3') }}"></audio>
</x-guest-layout>

<script>
    var players = <?php echo json_encode($players_array); ?>;
    var check = null;
    const counter = document.getElementById("countdown");

    function setCountdown() {
        var minutes = document.getElementById("time-picker").value;
        document.getElementById("countdown").innerHTML = "0" + minutes + ":" + "00";
        return minutes;
    }

    function startCountdown() {
        if(setCountdown() && setCountdown() > 0) {
            updateCountdown(setCountdown());
        } else {
            alert("Selecione o tempo!");
            minutes = 0;
            document.getElementById("countdown").innerHTML = "0" + minutes + ":" + "00";
        }
    }

    function stopCountdown() {
        document.getElementById("startCount").style.display = 'block';
        document.getElementById("stopCount").style.display = 'none';

        var seconds = 60;
        var mins = document.getElementById("time-picker").value;

        clearInterval(check);
        check = null;
        counter.innerHTML = "0" + mins + ":" + "00";
    }

    function updateCountdown(minutes) {
        document.getElementById("startCount").style.display = 'none';
        document.getElementById("stopCount").style.display = 'block';

        var seconds = 60;
        var mins = minutes;
        var buzzer = document.getElementById('buzzer');

        function tick() {
            //This script expects an element with an ID = "counter". You can change that to what ever you want.
            var counter = document.getElementById("countdown");
            var current_minutes = mins - 1
            seconds--;
            counter.innerHTML = "0" + current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            if (seconds >= 0) {
                check = setTimeout(tick, 1000);
            } else {
                if (mins > 1) {
                    updateCountdown(mins - 1);
                } else {
                    stopCountdown();
                    buzzer.play();
                }
            }
        }
        tick();
    }

    function draft() {
        var random = players[Math.floor(Math.random() * players.length)];

        document.getElementById("player").innerHTML = random;

        const index = players.indexOf(random);
        console.log(players);
        
        if(players.length < 1) {
            toastr.error("Todos os players já foram sorteados!");
            document.getElementById("player").innerHTML =  "";
            document.getElementById("refresh").style.display = "block";
        }

        players.splice(index, 1);
    }

    laugh = document.getElementById('laugh');
    bell = document.getElementById('bell');

    document.onkeypress = function (e) {
        e = e || window.event;
        console.log(e.key);
        if(e.key == "i" || e.key == "I") {
            startCountdown();
        }
        else if(e.key == "p" || e.key == "P") {
            stopCountdown();
        }
        else if(e.key == "s" || e.key == "S") {
            draft();
        }
        else if(e.key > 0 && e.key < 6) {
            document.getElementById('time-picker').value = e.key;
            stopCountdown();
        }
        else if(e.key == "r" || e.key == "R") {
            laugh.play();
        }
        else if(e.keyCode == 32) {
            bell.play();
        }
    }
    
</script>
