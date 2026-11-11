<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($produto) ? 'Editar Produto' : 'Adicionar Novo Produto' }} - Computer Shop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        .card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 600px; }
        h1 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background: #218838; }
        .back-link { display: inline-block; margin-top: 15px; text-decoration: none; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>{{ isset($produto) ? 'Editar Produto: ' . $produto->Name : 'Adicionar Novo Produto' }}</h1>
        
        <form action="{{ isset($produto) ? route('products.update', $produto->id) : route('products.store') }}" method="POST">
            @csrf
            @if(isset($produto))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="Name" value="{{ old('Name', $produto->Name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Categoria:</label>
                <select name="category_id" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $produto->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                            {{ $category->Name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Preço (€):</label>
                <input type="number" step="0.01" name="Price" value="{{ old('Price', $produto->Price ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Stock Inicial:</label>
                <input type="number" name="Stock" value="{{ old('Stock', $produto->Stock ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="Description" rows="4">{{ old('Description', $produto->Description ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn">{{ isset($produto) ? 'Atualizar Produto' : 'Guardar Produto' }}</button>
        </form>

        <a href="{{ route('products.index') }}" class="back-link">← Voltar à Lista</a>
    </div>
</body>
</html>