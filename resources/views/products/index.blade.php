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
        <form method="POST" action="{{ route('products.update', $product) }}" style="display:inline-block; margin-bottom: 10px;">
          @csrf
          @method('PUT')
          <input name="name" value="{{ $product->name }}" required>
          <input name="price" value="{{ $product->price }}" required type="number" step="0.01">
          <input name="description" value="{{ $product->description }}">
          <button type="submit">Actualizar</button>
        </form>

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
