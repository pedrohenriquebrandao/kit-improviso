<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pessoas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @isset($users)
                <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <colgroup>
                                <col>
                                <col class="w-24">
                            </colgroup>

                            <thead class="bg-gray-700">
                                <tr class="text-left">
                                    <th class="p-3">Nome</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">

                                        <td class="p-3">
                                            <p>{{ $user->name }}</p>
                                        </td>

                                        <td class="flex p-2 space-x-2 ">
                                            <button type="button"
                                                class="px-4 py-3 font-semibold rounded bg-blue-200 text-gray-800">Editar</button>
                                            <button type="button"
                                                class="px-4 py-3 font-semibold rounded bg-red-600 text-gray-100">Excluir</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset

            @empty($users)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-6 rounded relative" role="alert">
                    <strong class="font-bold">Não há usuários cadastrados!</strong>
                </div>
            @endempty
        </div>
    </div>
</x-app-layout>
