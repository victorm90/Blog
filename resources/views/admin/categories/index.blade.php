<x-layouts.app>
    <div wire:loading.class.remove="hidden" class="hidden fixed top-0 left-0 w-full bg-green-500 text-white p-4 text-center">
        ⏳ Por favor espere...
    </div>
    
    <div class="flex justify-between items-center mb-4">
        <flux:breadcrumbs class="mb-4">
            <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{ route('admin.categories.index') }}">Categorias</flux:breadcrumbs.item>
        </flux:breadcrumbs>


        <a href="{{ route('admin.categories.create') }}" class="btn btn-blue  text-xs px-3 py-1">
            Nuevo
        </a>
    </div>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ACTIONS
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($categories as $category) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2 justify-end">
                            <a href="{{ route('admin.categories.edit', $category->id) }} "
                                class="btn btn-green text-xs">
                                Editar
                            </a>

                            <form class="delete-form" action="{{ route('admin.categories.destroy', $category) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red text-xs">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>

    @push('js')
        <script>
            form = document.querySelectorAll('.delete-form');
            form.forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    Swal.fire({
                        title: "estas seguro de eliminar ?",
                        text: "despues de ejecutar esta accion no podra volver a recuperar!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, Elimnar!",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush

</x-layouts.app>
