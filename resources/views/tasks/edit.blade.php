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
            {{ __('Modifier la Tâche') }} {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                            @endif

                            <div class="card">
                                <div class="card-header">
                                    <div class="float-start">

                                    </div>
                                    <div class="float-end">
                                        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm" style="background-color: rgb(4, 4, 66); color: white; border:1px solid blue; border-radius: 5px; padding: 10px;">&larr; Retour</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" >
                                        @csrf
                                        @method("PATCH")


                                        <div class="mb-3 row">
                                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Titre</label>
                                            <div class="col-md-6">
                                              <input type="text" style="color: black" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $task->title }}">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>





                                        <div class="mb-3 row">
                                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                                            <div class="col-md-6">
                                                <textarea style="color: black" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $task->description }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" style="background-color: green; color: white; border:1px solid green; border-radius: 5px; padding: 10px;"value="Modifier">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
