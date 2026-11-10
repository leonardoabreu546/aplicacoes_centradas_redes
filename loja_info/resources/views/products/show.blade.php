<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->Name }} - Computer Shop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        .card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); max-width: 600px; }
        h1 { color: #333; }
        p { font-size: 16px; line-height: 1.5; color: #555; }
        .price { font-size: 24px; color: #007bff; font-weight: bold; }
        .back-btn { display: inline-block; margin-top: 20px; text-decoration: none; background: #6c757d; color: white; padding: 10px 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>{{ $product->Name }}</h1>
        <p><strong>Categoria:</strong> {{ $product->category->Name ?? 'Sem Categoria' }}</p>
        <p class="price">{{ $product->Price }} €</p>
        <p><strong>Stock Disponível:</strong> {{ $product->Stock }} unidades</p>
        <p><strong>Descrição:</strong> {{ $product->Description }}</p>
        
        <a href="/products/{{ $product->id }}/edit" style="background: #ffc107; color: #000; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-right: 10px;">Editar / Stock</a>
        <a href="/products" class="back-btn">← Voltar à Lista</a>
    </div>
</body>
</html>