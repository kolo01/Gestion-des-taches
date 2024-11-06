


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier une sous tache') }} {{ $subtask->title }}
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
                                        <a href="{{ route('subtasks.index') }}" class="btn btn-primary btn-sm" style="background-color: rgb(4, 4, 66); color: white; border:1px solid blue; border-radius: 5px; padding: 10px;">&larr; Retour</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form action="{{ route('subtasks.update', $subtasks->id) }}" method="POST" >
                                        @csrf
                                        @method("PATCH")


                                        <div class="mb-3 row">
                                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Titre</label>
                                            <div class="col-md-6">
                                              <input type="text" style="color: black" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $subtasks->title }}">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>





                                        <div class="mb-3 row">
                                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                                            <div class="col-md-6">
                                                <textarea style="color: black" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $subtasks->description }}</textarea>
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
