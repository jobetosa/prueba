<!DOCTYPE html>
<html>
<head><title>Productos</title></head>
<body>
  <h1>Gestión de Productos</h1>

  @if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
  @endif

  <form method="POST" action="{{ route('products.store') }}">
    @csrf
    <input name="name" placeholder="Nombre" required>
    <input name="price" placeholder="Precio" required type="number" step="0.01">
    <textarea name="description" placeholder="Descripción"></textarea>
    <button type="submit">Crear</button>
  </form>

  <ul>
    @foreach($products as $product)
      <li>
        {{ $product->name }} - ${{ $product->price }}
        <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="submit">Eliminar</button>
        </form>
      </li>
    @endforeach
  </ul>
</body>
</html>
