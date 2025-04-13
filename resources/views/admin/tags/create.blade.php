<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.tags.index') }}">Etiquetas</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Nueva Etiqueta</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form class="card" action="{{ route('admin.tags.store') }}" method="POST">
        @csrf

        <flux:field>
            <flux:label>Nombre</flux:label>         

            <flux:input name="name" placeholder="Aqui escriba el nombre de una etiqueta a insertar." value="{{ old('name') }}" />

            <flux:error name="name" />
        </flux:field>

        <div class="flex justify-end text-xs mt-4">
            <flux:button variant="primary" type="submit">
                Enviar
            </flux:button>
        </div>
    </form>

</x-layouts.app>
