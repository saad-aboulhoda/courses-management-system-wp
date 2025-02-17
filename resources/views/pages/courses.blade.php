<x-layout title="Courses">
    <x-hero-section title="All Courses"
                    description="Start your learning journey now!"
    />

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($courses as $course)
                    <div class="col">
                        <x-course-card :course="$course" />
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>
    </div>

</x-layout>