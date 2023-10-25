<x-guest-layout>
    <form method="POST" action="{{ route('words.store') }}">
        @csrf

        <!-- Word -->
        <div>
            <x-input-label for="text" :value="__('Digite uma palavra')" />
            <x-text-input id="text" class="block mt-1 w-full mt-4" type="text" name="text" :value="old('text')" required autofocus autocomplete="text" />
            <x-input-error :messages="$errors->get('word')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Enviar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
