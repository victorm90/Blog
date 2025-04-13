<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.categories.index') }}">Categorias</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Editar Categoria</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form class="card" action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <flux:field>
            <flux:label>Nombre</flux:label>         

            <flux:input value="{{ old('name', $category->name) }}" name="name" class="w-full" />

            <flux:error name="name" />
        </flux:field>

        <div class="flex justify-end text-xs mt-4">
            <flux:button variant="primary" type="submit">
               Actualizar
            </flux:button>
        </div>
    </form>

</x-layouts.app>






