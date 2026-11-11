<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Produtos - Computer Shop
            </h2>
            @if(Auth::user() && Auth::user()->isAdmin)
                <a href="/products/create" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold text-sm">
                    + Adicionar Produto
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <!-- Barra de Filtro por Categorias -->
                <div class="mb-6 pb-4 border-b border-gray-200 flex flex-wrap gap-2">
                    <a href="{{ route('products.index') }}" 
                       class="px-4 py-2 rounded-md font-medium text-sm {{ ($idCategoriaAtiva ?? 0) == 0 ? 'bg-red-600 text-white font-bold' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        Todos os produtos
                    </a>
                    @foreach($categorias as $category)
                        <a href="{{ route('categories.products', $category->id) }}" 
                           class="px-4 py-2 rounded-md font-medium text-sm {{ ($idCategoriaAtiva ?? 0) == $category->id ? 'bg-red-600 text-white font-bold' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            {{ $category->Name }}
                        </a>
                    @endforeach
                </div>
                
                <!-- Tabela de Produtos -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Categoria</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Preço</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Stock</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Descrição</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($produtos as $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/products/{{ $product->id }}" class="text-blue-600 hover:underline font-medium">
                                            {{ $product->Name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                        {{ $product->category->Name ?? 'Sem Categoria' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 font-semibold">
                                        {{ $product->Price }} €
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                        {{ $product->Stock }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $product->Description }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Nenhum produto encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>