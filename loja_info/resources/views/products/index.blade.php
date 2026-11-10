<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Loja Info - Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f4f9; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>
    <h1>Lista de Produtos - Computer Shop</h1>
    
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
                <td>{{ $product->Name }}</td>
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