<x-layouts.app>

    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @endpush

    <flux:breadcrumbs class="mb-4">
        <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
        <flux:breadcrumbs.item href="{{ route('admin.posts.index') }}">Posts</flux:breadcrumbs.item>
        <flux:breadcrumbs.item>Editar Posts</flux:breadcrumbs.item>
    </flux:breadcrumbs>

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="relative mb-2">

            <img id="imgPreview" class="w-full aspect-video object-cover object-center"
                src="{{ $post->image_path ? Storage::url($post->image_path) : asset('image/img1.jpg') }}"
                alt="{{ $post->title ?? 'Imagen del post' }}">

            <div class="absolute top-8 right-8">
                <label class="bg-white px-4 py-2 rouended-lg cursor-pointer">
                    Agregar Imagen
                    <input class="hidden" type="file" name="image" id="" accept="image/*"
                        onchange="previewImage(event, '#imgPreview')">
                </label>

            </div>

        </div>



        <div class="card space-y-4">

            <flux:field class="mb-4">
                <flux:label>Titulo</flux:label>
                <flux:input name="title" value="{{ old('title', $post->title) }}" />
                <flux:error name="name" />
            </flux:field>

            <flux:input name="slug" id="slug" label="Slug" value="{{ old('slug', $post->slug) }}"
                class="mb-4" disabled />


            <flux:select label="Categoría" name="category_id" class="mb-4">
                @foreach ($categories as $category)
                    <flux:select.option value="{{ $category->id }}"
                        :selected="$category -> id == old('category_id', $post -> category_id)">
                        {{ $category->name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            <flux:textarea label="Resumen" name="excerpt" class="mb-4">{{ old('excerpt', $post->excerpt) }}
            </flux:textarea>

            {{-- <flux:textarea label="Contenido" name="content" rows="16" class="mb-4">
                {{ old('content', $post->content) }}</flux:textarea> --}}

            <!-- Create the editor container -->
            
            <div>
                <p class="font-medium text-sm mb-1">
                    Contenido
                </p>
                <div id="editor">
                    {!! old('content', $post->content) !!}
                </div>

                <textarea hidden name="content" id="content">{{ old('content', $post->content) }}</textarea>
            </div>

            <div>
                <p class="text-sm font-medium mb-1">Etiquetas</p>
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    @checked(in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())))>
                                <span>
                                    {{ $tag->name }}
                                </span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>



            <div>

                <p class="text-sm font-medium">Estado</p>

                <div class="flex space-x-3 mb-2">
                    <label class="flex items-center">
                        <input type="radio" name="is_published" value="0" @checked(old('is_published', $post->is_published) == 0)>
                        <span class="ml-1">
                            No publicado
                        </span>
                    </label>

                    <label class="flex items-center">
                        <input type="radio" name="is_published" value="1" @checked(old('is_published', $post->is_published) == 1)>
                        <span class="ml-1">
                            Publicado
                        </span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end text-xs mt-4">
                <flux:button variant="primary" type="submit">
                    Actualizar
                </flux:button>
            </div>

        </div>
    </form>

    @push('js')
        <!-- Include the Quill library -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            quill.on('text-change', function(){
                document.querySelector('#content').value =quill.root.innerHTML
            });
        </script>
    @endpush

</x-layouts.app>
