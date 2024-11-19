<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Lesson::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $lessons = $query->where('course_id', $request->input('course_id'))
            ->paginate(10);

        return response()->json($lessons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $lesson = new Lesson();
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->google_video_id = $request->google_video_id;
        $lesson->course_id = $request->course_id;
        $lesson_number = 1;
        $max_lesson_number = Lesson::where('course_id', $request->course_id)->max('lesson_number');
        if ($max_lesson_number) {
            $lesson_number = $max_lesson_number + 1;
        }
        $lesson->lesson_number = $lesson_number;
        $lesson->save();
        return response()->json($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson): JsonResponse
    {
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->google_video_id = $request->google_video_id;
        $lesson->course_id = $request->course_id;
        $lesson->lesson_number = $request->lesson_number;
        $lesson->save();
        return response()->json($lesson);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson): JsonResponse
    {
        $lesson_number = $lesson->lesson_number;
        $lesson->delete();
        $lessons = Lesson::where('course_id', $lesson->course_id)
            ->where('lesson_number', '>', $lesson_number)
            ->get();
        foreach ($lessons as $lesson) {
            $lesson->lesson_number = $lesson->lesson_number - 1;
            $lesson->save();
        }
        return response()->json(null, 204);
    }

    /**
     * @param $courseId
     * @return JsonResponse
     */
    public function findByCourse($courseId): JsonResponse
    {
        return response()->json(Lesson::where('course_id', $courseId)->orderBy('lesson_number')->get());
    }
}
