@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-3 fw-bold text-center">
                    Armando's Projects:
                </h1>
            </div>
            <div class="col-12">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $projects as $index => $project )
                        <tr>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                {{ $project->date }}
                            </td>
                            <td>
                                <a href="{{ route("admin.projects.show", $project) }}" class="btn btn-sm btn-primary me-1">Show</a>
                                <a href="{{ route("admin.projects.edit", $project) }}"  class="btn btn-sm btn-success me-1">Edit</a>

                                <form class="d-inline project-destroyer" action="{{ route("admin.projects.destroy", $project) }}" method="POST" custom-data-name="{{ $project->title }}" >
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">NO PROJECTS ARE AVAILABLE</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $projects->links() }}
                </div>
            </div>
        </div>

@endsection

@section("additional-scripts")
    @vite("resources/js/projects/delete-confirmation.js");
@endsection