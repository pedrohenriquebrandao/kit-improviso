<x-guest-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <form method="POST" action="{{ route('words.store') }}">
        @csrf
        <!-- Word -->
        <div>
            <x-input-label for="text" class="text-center" :value="__('Envie uma sugestão de palavra')" />
            <x-text-input id="text" class="block mt-1 w-full mt-4" type="text" name="text" :value="old('text')"
                required autofocus autocomplete="text" />
            <x-input-error :messages="$errors->get('word')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Enviar') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        @if(Session::has("success")) {
            toastr.success("{{ session('success') }}");
        }
        @elseif(Session::has("error")) {
            toastr.error("{{ session('error') }}")
        }
        @endif
    </script>
</x-guest-layout>
