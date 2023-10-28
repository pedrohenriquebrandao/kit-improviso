<x-guest-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <form class="mt-32" method="POST" action="{{ route('people.store') }}">
        @csrf
        <!-- People -->
        <div>
            <x-input-label for="text" class="text-center" :value="__('Informe o nome da pessoa')" />
            <x-text-input id="text" class="block mt-1 w-full mt-4" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('people')" class="mt-2" />
        </div>

        <div class="flex justify-center mt-4">
            <x-primary-button>
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
