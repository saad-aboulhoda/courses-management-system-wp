{{--
 Course Columns:
 - ID
 - post_title
 - post_author
 - post_date
 - thumbnail()
 --}}
@foreach($courses as $course)
    <a style="color: unset; text-decoration: unset" href="{{ $course->link() }}">
        <div style="border: 1px solid #ddd; padding: 8px; margin-bottom: 6px;">
            <div>
                <span>Title:</span>
                <span>{{ $course->post_title }}</span>
            </div>
            <div>
                <span>Thumbnail URL:</span>
                <span>{{ $course->thumbnail() }}</span>
            </div>
            <div>
                <span>Author:</span>
                <span>{{ $course->post_author }}</span>
            </div>
            <div>
                <span>Date:</span>
                <span>{{ $course->post_date }}</span>
            </div>
            <div>
                <span>Description:</span>
                <span>{{ $course->description() }}</span>
            </div>
            <div>
                <span>Instructor:</span>
                <span>{{ $course->instructor() }}</span>
            </div>
            <div>
                <span>Difficulty:</span>
                <span>{{ $course->difficulty() }}</span>
            </div>
            <div>
                <span>Total Hours:</span>
                <span>{{ $course->totalHours() }}</span>
            </div>
        </div>
    </a>
@endforeach