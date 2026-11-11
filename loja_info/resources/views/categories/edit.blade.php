<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <form action="{{ route('categories.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome da Categoria</label>
                        <input type="text" name="name" id="name" value="{{ $categoria->Name }}" class="mt-1 block w-full text-gray-900 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem;">
                        <!-- Botão com estilo direto em linha para garantir visibilidade -->
                        <button type="submit" style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer;">
                            Atualizar
                        </button>
                        <a href="{{ route('categories.index') }}" style="color: #4b5563; text-decoration: underline;">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>