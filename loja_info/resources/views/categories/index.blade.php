<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div id="categoryBox">
                    @foreach($categorias as $categoria)
                        <div class="categoryItemBox">
                            <div class="categoryName">
                                <h2>{{ $categoria->Name }}</h2>
                            </div>

                            <a href="{{ route('categories.edit', $categoria->id) }}">
                                <div class="editButton" title="Editar {{ $categoria->Name }}">
                                    <img src="/img/edit.svg">
                                </div>
                            </a>

                            <div class="deleteButton" onclick="submitForm('destroy_{{ $categoria->id }}')" title="Eliminar {{ $categoria->Name }}">
                                <img src="/img/delete.svg">
                                <form id="destroy_{{ $categoria->id }}" action="{{ route('categories.destroy', $categoria->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- Script necessário para o botão de eliminar funcionar -->
    <script>
        function submitForm(formId) {
            if (confirm('Tens a certeza que pretendes eliminar esta categoria?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>
</x-app-layout>