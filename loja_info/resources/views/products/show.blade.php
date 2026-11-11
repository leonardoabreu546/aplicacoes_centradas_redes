<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalhes do Produto - Computer Shop
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 w-full max-w-2xl text-gray-900">
                
                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $produto->Name }}</h1>
                
                <!-- Imagem do Produto -->
                @if($produto->img)
                    <div class="mb-6 flex justify-center">
                        <img src="{{ $produto->img }}" alt="{{ $produto->Name }}" class="max-h-64 object-contain rounded-md shadow">
                    </div>
                @endif

                <div class="space-y-3 mb-6">
                    <p><strong>Categoria:</strong> {{ $produto->category->Name ?? 'Sem Categoria' }}</p>
                    <p class="text-2xl font-bold text-blue-600"><strong>Preço:</strong> {{ number_format($produto->Price, 2, ',', '.') }} €</p>
                    <p><strong>Stock Disponível:</strong> {{ $produto->Stock }} unidades</p>
                    <p><strong>Descrição:</strong> {{ $produto->Description }}</p>
                </div>
                
                <div class="flex flex-wrap gap-3 items-center justify-between pt-4 border-t border-gray-200">
                    <div class="flex gap-2">
                        <!-- Botão Voltar -->
                        <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md font-semibold text-sm">
                            ← Voltar à Lista
                        </a>

                        <!-- Botão Comprar (para Clientes) -->
                        @if(Auth::user() && !Auth::user()->isAdmin)
                            <form action="{{ route('sales.store', $produto->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-semibold text-sm">
                                    Comprar
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Botões de Admin (Editar / Eliminar) -->
                    @if(Auth::user() && Auth::user()->isAdmin)
                        <div class="flex gap-2 items-center">
                            <a href="{{ route('products.edit', $produto->id) }}" style="background-color: #f59e0b; color: white; padding: 8px 16px; border-radius: 6px; font-weight: 600; font-size: 0.875rem; text-decoration: none; display: inline-block;">
                                Editar
                            </a>

                            <form action="{{ route('products.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Tens a certeza que pretendes eliminar este produto?');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-semibold text-sm">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>