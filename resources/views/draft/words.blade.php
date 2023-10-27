<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                <div class="overflow-x-auto">
                    <button onclick="draft()" class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 text-white" type="button">SORTEAR PALAVRA</button>
                </div>
            </div>
        </div>
    </div>
        <h1 id="word" class="uppercase" style="color: black; font-size: 8rem"></h1>
        <button id="refresh" onclick="location.reload(true);" class="hidden px-12 py-2 mb-4 font-semibold rounded bg-blue-500 text-white" type="button">Reiniciar?</button>
</x-guest-layout>

<script>
    var words = <?php echo json_encode($words_array); ?>;
    console.log(words);

    function draft() {
        var random = words[Math.floor(Math.random() * words.length)];

        document.getElementById("word").innerHTML = random;

        const index = words.indexOf(random);
        words.splice(index, 1);

        if(words.length < 1) {
            alert("Acabaram as palavras");
            document.getElementById("word").innerHTML =  "";
            document.getElementById("refresh").style.display = "block";
        }
    }
</script>
