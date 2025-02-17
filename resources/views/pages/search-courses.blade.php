<x-layout title="Courses">
    <x-hero-section title="Type the name of the course that your're looking for">
        <form class="mt-4">
            <div class="input-group">
                <input name="q" type="text" value="{{ $searchValue }}" placeholder="Search..." class="form-control"/>
                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </x-hero-section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($courses as $course)
                    <div class="col">
                        <x-course-card :course="$course"/>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>
    </div>

</x-layout>