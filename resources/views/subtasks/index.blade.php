

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des sous-Tâches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-12">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            <div class="card">

                                <div class="card-body">
                                    <a href="{{ route('subtasks.create') }}" style="background-color: blue; color: white; border:1px solid blue; border-radius: 5px; padding: 10px;float: right;"><i class="bi bi-plus-circle"></i> Nouvelle Sous-Tâche</a>
                                    <table  class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                          <tr>
                                            <th scope="col"class="px-6 py-4">ID</th>
                                            <th scope="col"class="px-6 py-4">Title</th>
                                            <th scope="col"class="px-6 py-4">Description</th>

                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($subtasks as $subtask)
                                            <tr>
                                                <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium">{{  $subtask->id}}</th>

                                                <td class="whitespace-nowrap px-6 py-4">{{ $subtask->title }}</td>
                                                <td class="whitespace-nowrap px-6 py-4" style="width: 200px; height: 100px">{{ $subtask->description }}</td>

                                                <td>
                                                    <form action="{{ route('subtasks.destroy', $subtask->id) }}" method="post" style="display: flex; row-gap: 10px">


                                                        <a style="background-color: blue; color: white; padding: 5px; border-radius: 5px; margin-right: 10px" href="{{ route('tasks.show', $subtask->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Voir</a>

                                                        <a style="background-color: yellow; color: black; padding: 5px; border-radius: 5px; margin-right: 10px" href="{{ route('tasks.edit', $subtask->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Modifier</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background-color: red; color: white; padding: 5px; border-radius: 5px"  onclick="return confirm('Voulez-vous vraiment supprimer la tâche?');"  ><i class="bi bi-trash"></i> Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                                <td colspan="6" style="align-content: center; align-items: center; text-align: center">
                                                    <span style="align-content: center; align-items: center; text-align: center">
                                                        <strong>Pas de sous-tâche trouvée!</strong>
                                                    </span>
                                                </td>
                                            @endforelse
                                        </tbody>
                                      </table>

                                      {{ $subtasks->links() }}

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
