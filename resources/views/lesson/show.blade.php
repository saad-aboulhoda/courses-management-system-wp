<h3>Lesson details</h3>
<ul>
    <li>Title: {{ $lesson->lesson_number }} : {{ $lesson->title }}</li>
    <li>Description: {{ $lesson->description }}</li>
    <li>Google Video ID: {{ $lesson->google_video_id }}</li>
</ul>

<h3>Course details</h3>
<ul>
    <li>Title: {{ $lesson->course->post_title }}</li>
    <li>Author: {{ $lesson->course->post_author }}</li>
    <li>Date: {{ $lesson->course->post_date }}</li>
    <li>Description: {{ $lesson->course->description() }}</li>
    <li>Instructor: {{ $lesson->course->instructor() }}</li>
    <li>Difficulty: {{ $lesson->course->difficulty() }}</li>
    <li>Total hours: {{ $lesson->course->totalHours() }}</li>
</ul>

<h3>All lessons</h3>
<ul>
    @foreach($lesson->lessons() as $lessonL)
        <li><a href="{{ $lessonL->link()  }}">{{ $lessonL->lesson_number }} :{{ $lessonL->title }}</a>@if($lesson->id == $lessonL->id) (Current Lesson) @endif</li>
    @endforeach
</ul>