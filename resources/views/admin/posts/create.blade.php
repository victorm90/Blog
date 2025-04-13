<x-layouts.app>

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.posts.index') }}">Posts</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Nuevo Post</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form class="card" action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <flux:field class="mb-4">
            <flux:label>Titulo</flux:label>
            <flux:input name="title" placeholder="Aqui escriba el titulo de un post a insertar."
                value="{{ old('title') }}" oninput="string_to_slug(this.value, '#slug')" />
            <flux:error name="name" />
        </flux:field>

        <flux:input name="slug" id="slug" label="Slug" placeholder="slug del titulo" value="{{ old('slug') }}"
            class="mb-4" disabled />

        <flux:select label="Categoría" name="category_id" class="mb-4">
            @foreach ($categories as $category)
                <flux:select.option value="{{ $category->id }}">
                    {{ $category->name }}
                </flux:select.option>
            @endforeach
        </flux:select>


        <div class="flex justify-end text-xs mt-4">
            <flux:button variant="primary" type="submit">
                Enviar
            </flux:button>
        </div>
    </form>

   

</x-layouts.app>
