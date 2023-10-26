<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                <div class="overflow-x-auto" style="margin-left:2rem">
                    <button onclick="draft()" class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 text-white" type="button">SORTEAR PLAYER</button>
                </div>
            </div>
        </div>
    </div>
        <h1 id="player" style="color: black; font-size: 8rem"></h1>
</x-guest-layout>

<script>
    var players = <?php echo json_encode($players_array); ?>;
    console.log(players);

    function draft() {
        var random = players[Math.floor(Math.random() * players.length)];

        document.getElementById("player").innerHTML = random;

        const index = players.indexOf(random);
        players.splice(index, 1);

        if(players.length < 1) {
            alert("Acabaram os jogadores");
        }
    }
</script>
