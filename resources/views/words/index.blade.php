<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pessoas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($words)
                <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                    <div class="overflow-x-auto">
                        <div class="flex flex-col text-center items-end justify-end">
                            <a href="{{ route('words.create') }}"
                                class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 text-white">Nova
                                palavra
                            </a>
                        </div>
                        <table class="min-w-full text-sm">
                            <colgroup>
                                <col>
                                <col class="w-24">
                            </colgroup>


                            <thead class="bg-gray-700">
                                <tr class="text-left">
                                    <th class="p-3">Palavra</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($words as $word)
                                    <tr class="border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">

                                        <td class="p-3">
                                            <p>{{ $word->text }}</p>
                                        </td>

                                        <td class="flex p-2 space-x-2">
                                            <a href="#"
                                                class="px-4 py-3 font-semibold rounded bg-blue-200 text-gray-800">Editar</a>
                                            <form action="{{route('words.destroy', $word->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            
                                                <button class="px-4 py-3 font-semibold rounded bg-red-600 text-gray-100" type="submit">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset

            @empty($words)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-6 rounded relative" role="alert">
                    <strong class="font-bold">Não há palavras cadastradas!</strong>
                </div>
            @endempty
        </div>
    </div>
</x-app-layout>
