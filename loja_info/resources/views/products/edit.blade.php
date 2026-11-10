<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto - Computer Shop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        .card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 600px; }
        h1 { color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background: #218838; }
        .back-link { display: inline-block; margin-top: 15px; text-decoration: none; color: #6c757d; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Editar Produto / Stock</h1>
        
        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="Name" value="{{ $product->Name }}" required>
            </div>

            <div class="form-group">
                <label>Preço (€):</label>
                <input type="number" step="0.01" name="Price" value="{{ $product->Price }}" required>
            </div>

            <div class="form-group">
                <label>Stock Disponível:</label>
                <input type="number" name="Stock" value="{{ $product->Stock }}" required>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="Description" rows="4">{{ $product->Description }}</textarea>
            </div>

            <button type="submit" class="btn">Guardar Alterações</button>
        </form>

        <a href="/products/{{ $product->id }}" class="back-link">← Cancelar</a>
    </div>
</body>
</html>