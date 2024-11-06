{{-- @extends('tasks.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Listes des Tâches</div>
            <div class="card-body">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nouvelle Tâche</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>

                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $task->code }}</td>
                            <td>{{ $task->name }}</td>

                            <td>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer la tâche?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Pas de tâche trouvée!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $tasks->links() }}

            </div>
        </div>
    </div>
</div>

@endsection --}}


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des Tâches') }}
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
                                    <a href="{{ route('tasks.create') }}" style="background-color: blue; color: white; border:1px solid blue; border-radius: 5px; padding: 10px;float: right;"><i class="bi bi-plus-circle"></i> Nouvelle Tâche</a>
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
                                            @forelse ($tasks as $task)
                                            <tr>
                                                <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium">{{  $task->id}}</th>

                                                <td class="whitespace-nowrap px-6 py-4">{{ $task->title }}</td>
                                                <td class="whitespace-nowrap px-6 py-4" style="width: 200px; height: 100px">{{ $task->description }}</td>

                                                <td>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: flex; row-gap: 10px">


                                                        <a style="background-color: blue; color: white; padding: 5px; border-radius: 5px; margin-right: 10px" href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                                        <a style="background-color: yellow; color: black; padding: 5px; border-radius: 5px; margin-right: 10px" href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background-color: red; color: white; padding: 5px; border-radius: 5px"  onclick="return confirm('Voulez-vous vraiment supprimer la tâche?');"  ><i class="bi bi-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                                <td colspan="6">
                                                    <span class="text-danger">
                                                        <strong>Pas de tâche trouvée!</strong>
                                                    </span>
                                                </td>
                                            @endforelse
                                        </tbody>
                                      </table>

                                      {{ $tasks->links() }}

                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
