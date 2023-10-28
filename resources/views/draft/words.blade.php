<div>
    <div class="p-4 bg-gray-800 text-white text-center">
        <h1 id="countdown" class="text-8xl pb-1">02:00</h1>
        <div id="startCount" class="pt-3" class="text-center">
            <button onclick="updateCountdown(2)"
                class="px-6 py-2 mb-4 font-semibold rounded bg-purple-500 hover:bg-purple-700 text-white"
                type="button">INICIAR</button>
        </div>
        <div hidden id="stopCount" class="pt-3" class="text-center">
            <button onclick="stopCountdown()" class="px-6 py-2 mb-4 font-semibold rounded bg-red-500 hover:bg-red-700 text-white"
                type="button">PARAR</button>
        </div>
    </div>
</div>
<x-guest-layout>
    <div class="mt-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                <div class="overflow-x-auto">
                    <button onclick="draft()" class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 hover:bg-green-700 text-white"
                        type="button">SORTEAR PALAVRA</button>
                </div>
            </div>
        </div>
    </div>
    <h1 id="word" class="uppercase" style="color: black; font-size: 8rem"></h1>
    <button id="refresh" onclick="location.reload(true);"
        class="hidden px-12 py-2 mb-4 font-semibold rounded border-blue-500 bg-white text-blue-500 hover:bg-blue-500 border-2 hover:text-white" type="button">Reiniciar?</button>
</x-guest-layout>

<script>
    var words = <?php echo json_encode($words_array); ?>;
    var check = null;
    const counter = document.getElementById("countdown");


    function stopCountdown() {
        document.getElementById("startCount").style.display = 'block';
        document.getElementById("stopCount").style.display = 'none';

        var seconds = 60;
        var mins = 2;

        clearInterval(check);
        check = null;
        counter.innerHTML = "0" + mins + ":" + "00";
    }

    function updateCountdown(minutes) {
        document.getElementById("startCount").style.display = 'none';
        document.getElementById("stopCount").style.display = 'block';

        var seconds = 60;
        var mins = minutes;

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
                }
            }
        }
        tick();
    }

    function draft() {
        var random = words[Math.floor(Math.random() * words.length)];
        console.log(words);

        document.getElementById("word").innerHTML = random;

        const index = words.indexOf(random);
        
        if (words.length < 1) {
            alert("Todas as palavras já foram sorteadas!");
            document.getElementById("word").innerHTML = "";
            document.getElementById("refresh").style.display = "block";
        }

        words.splice(index, 1);
    }
</script>
