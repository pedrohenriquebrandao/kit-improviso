<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pessoas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($people)
                <div class="container p-2 mt-6 mx-auto sm:p-4 text-gray-100">
                    <div class="overflow-x-auto">
                        <div class="flex flex-col text-center items-end justify-end">
                            <a href="{{ route('people.create') }}"
                                class="px-12 py-2 mb-4 font-semibold rounded bg-green-500 text-white">Nova
                                Pessoa
                            </a>
                        </div>
                        <table class="min-w-full text-sm">
                            <colgroup>
                                <col>
                                <col class="w-24">
                            </colgroup>


                            <thead class="bg-gray-700">
                                <tr class="text-left">
                                    <th class="p-3">Pessoa</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($people as $p)
                                    <tr class="border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">

                                        <td class="p-3">
                                            <p>{{ $p->name }}</p>
                                        </td>

                                        <td class="flex p-2 space-x-2">
                                            {{-- <a href="#"
                                                class="px-4 py-3 font-semibold rounded bg-blue-200 text-gray-800">Editar</a> --}}
                                            <form action="{{route('people.destroy', $p->id)}}" method="POST">
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

            @empty($people)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-6 rounded relative" role="alert">
                    <strong class="font-bold">Não há pessoas cadastradas!</strong>
                </div>
            @endempty
        </div>
    </div>

    <script>
        @if(Session::has("success")) {
            console.log("tem success");
            toastr.success("{{ session('success') }}");
        }
        @elseif(Session::has("error")) {
            toastr.error("{{ session('error') }}")
        }
        @endif
    </script>
</x-app-layout>