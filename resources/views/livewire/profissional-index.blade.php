<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-white">Lista de Profissionais</h2>

                <table class="min-w-full bg-[#1f1f23] rounded-lg shadow">
                    <thead>
                        <tr class="text-left text-gray-300">
                            <th class="py-2 px-4">Foto</th>
                            <th class="py-2 px-4">Nome</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Telefone</th>
                            <th class="py-2 px-4">Especialidade</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-200">
                        @forelse ($profissionais as $pro)
                            <tr class="border-t border-gray-600 hover:bg-gray-700/50 transition">
                                <td class="py-2 px-4">
                                    <img src="{{ $pro->foto ? asset('storage/' . $pro->foto) : asset('images/default.png') }}" alt="Foto do Profissional" class="w-12 h-12 rounded-full">
                                </td>
                                <td class="py-2 px-4">{{ $pro->nome }}</td>
                                <td class="py-2 px-4">{{ $pro->email }}</td>
                                <td class="py-2 px-4">{{ $pro->telefone }}</td>
                                <td class="py-2 px-4">{{ $pro->especialidade }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 px-4 text-center text-gray-400">Nenhum profissional cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

</div>
