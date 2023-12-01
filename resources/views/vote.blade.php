<x-guest-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <div>
    <div class="p-4 bg-gray-800 text-white text-center text-xl">
        Azul <p class="text-md" id="azul">{{ $soma_azul }}</p>
    </div>
    <div class="p-4 bg-gray-800 text-white text-center text-xl">
       Vermelho <p class="text-md" id="vermelho">{{ $soma_vermelho }}</p>
    </div>
    <div class="p-4 bg-gray-800 text-white text-center text-xl">
        Amarelo <p class="text-md" id="amarelo">{{ $soma_amarelo }}</p>
    </div>
</div>

    <form class="mt-32" method="POST" action="{{ route('vote') }}">
        @csrf
        <!-- Word -->
        <div class="pb-3">
            <x-input-label for="azul" class="text-center" :value="__('Azul')"/>
            <x-text-input id="azul" class="block mt-1 w-full mt-4" type="text" name="azul" :value="old('azul')"
                required autofocus autocomplete="text" />
        </div>
        <div class="mb-3">
            <x-input-label for="vermelho" class="text-center"  :value="__('Vermelho')"/>
            <x-text-input id="vermelho" class="block mt-1 w-full mt-4" type="text" name="vermelho" :value="old('vermelho')"
                required autofocus autocomplete="text" />
        </div>
        <div class="mb-3">
            <x-input-label for="amarelo" class="text-center"  :value="__('Amarelo')"/>
            <x-text-input id="amarelo" class="block mt-1 w-full mt-4" type="text" name="amarelo" :value="old('amarelo')"
                required autofocus autocomplete="text" />
        </div>

        <div class="flex justify-center mt-4">
            <x-primary-button>
                {{ __('Enviar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    documento.
</script>
