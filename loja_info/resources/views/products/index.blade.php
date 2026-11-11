<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Loja Info - Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        h1 { color: #333; margin-bottom: 5px; }
        .header-container { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-add { background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-add:hover { background: #218838; }
        
        /* Estilos da barra de categorias */
        .category-nav { margin-bottom: 20px; padding: 10px 0; border-bottom: 1px solid #ddd; }
        .category-nav a { display: inline-block; padding: 6px 12px; margin-right: 8px; background: #e9ecef; color: #333; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .category-nav a.active { background: #dc3545; color: white; font-weight: bold; }
        
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="header-container">
        <h1>Lista de Produtos - Computer Shop</h1>
        <a href="/products/create" class="btn-add">+ Adicionar Produto</a>
    </div>

    <!-- Barra de Filtro por Categorias -->
    <div class="category-nav">
        <a href="{{ route('products.index') }}" class="{{ ($idCategoriaAtiva ?? 0) == 0 ? 'active' : '' }}">Todos os produtos</a>
        @foreach($categories as $category)
            <a href="{{ route('categories.products', $category->id) }}" class="{{ ($idCategoriaAtiva ?? 0) == $category->id ? 'active' : '' }}">
                {{ $category->Name }}
            </a>
        @endforeach
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Stock</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><a href="/products/{{ $product->id }}">{{ $product->Name }}</a></td>
                <td>{{ $product->category->Name ?? 'Sem Categoria' }}</td>
                <td>{{ $product->Price }} €</td>
                <td>{{ $product->Stock }}</td>
                <td>{{ $product->Description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>