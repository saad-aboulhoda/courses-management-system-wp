<x-layout title="{{ $lesson->theTitle }}">
    <div class="pt-3">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/courses">Courses</a></li>
                <li class="breadcrumb-item"><a href="{{$lesson->course->link}}">{{$lesson->course->post_title}}</a>
                </li>
                <li class="breadcrumb-item"><span>{{ $lesson->theTitle }}</span></li>
            </ol>
        </div>
    </div>

    <div class="content-wrapper">

        <aside id="sidebar" class="active">
            <div class="card h-100">
                <div class="card-header">Lessons</div>
                <div class="card-body p-0">
                    <ul class="lesson-list">
                        @foreach($lessons as $lessonL)
                            <li>
                                <a href="{{$lessonL->link}}"
                                   class="lesson-item {{ $lessonL->id == $lesson->id ? 'active' : ''  }}">
                                    <div>
                                        <p><span class="lesson-number">#{{ $lessonL->lesson_number }}</span>
                                            - {{ $lessonL->title  }}</p>
                                    </div>
                                    <p class="text-secondary"
                                       style="font-size: 14px">{{ date('d-m-Y', strtotime($lessonL->created_at)) }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

        <div
                id="videoContainer"
                class="container lesson-video-section w-100 position-relative sidebar"
        >
            <div class="card">
                <div class="card-header">#{{ $lesson->theTitle }}</div>
                <div class="card-body position-relative p-0">
                    <div
                            id="toggle-btn"
                            class="position-absolute d-flex justify-content-center align-items-center"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="25"
                                fill="#fff"
                                class="bi bi-arrow-left"
                                viewBox="0 0 16 16"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"
                            />
                        </svg>
                    </div>
                    <iframe
                            class="video-iframe"
                            allowfullscreen
                            src="https://drive.google.com/file/d/{{ $lesson->google_video_id  }}/preview"
                            frameborder="0"
                    ></iframe>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ $previous }}"
                           class="btn btn-secondary {{ $previous ? '' : 'disabled' }}" title="Previous"><i
                                    class="fa-solid fa-angle-left"></i></a>
                        <a href="{{ $next }}" class="btn btn-primary {{ $next ? '' : 'disabled' }}"
                           title="Next"><i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="comment-section mt-3">
                <!--<div class="card mt-3">
                    <div class="card-header"><i class="fa-solid fa-comments me-2"></i> Comments</div>
                    <div class="card-body p-0">
                        <div class="flex">
                            <div class="d-flex align-items-start w-100 comment p-">
                                <img
                                        src="https://placehold.co/40"
                                        class="me-3"
                                        alt=""
                                        srcset=""
                                        style="border-radius: 50%"
                                />
                                <div class="w-100">
                                    <h3>n1akai</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Officia, iste?
                                    </p>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-secondary">2 days ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <textarea class="form-control resize-none" rows="2"></textarea>
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-comment me-2"></i>Comment
                            </button>
                        </div>
                    </div>
                </div>
            -->
                <div class="card mt-3">
                    <div class="card-header"><i class="fa-solid fa-comments me-2"></i> Comments</div>
                    <div class="card-body">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function () { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://doros-online.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                    </div>
                </div>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                        powered by Disqus.</a></noscript>
            </div>
        </div>
    </div>

    <script>
        const header = document.querySelector('header');
        header.style.position = 'static';

        let toggleBtn = document.getElementById("toggle-btn");
        let sideBar = document.getElementById("sidebar");
        const videoContainer = document.querySelector("#videoContainer");
        toggleBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            toggleBtn.children[0].classList.toggle("active");
            videoContainer.classList.toggle("sidebar");
            sideBar.classList.toggle("active");
        });
    </script>
</x-layout>
