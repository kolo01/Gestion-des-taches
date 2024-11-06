<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Information sur la tache : ') }} {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">

                            <div class="card">
                                <div class="card-header">
                                    <div class="float-start">

                                    </div>
                                    <div class="float-end">
                                        <a href="{{ route('subtasks.index') }}" class="btn btn-primary btn-sm">&larr;
                                            Retour</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <label for="title"
                                            class="col-md-4 col-form-label text-md-end text-start"><strong>Titre:</strong></label>
                                        <div class="col-md-6" style="line-height: 35px;">
                                            {{ $subtasks->title }}
                                        </div>
                                    </div>



                                    <div class="row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                                        <div class="col-md-6" style="line-height: 35px;">
                                            {{ $subtasks->description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
