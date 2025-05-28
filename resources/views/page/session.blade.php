@extends('template.fullwidth')


@section('content')
    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
                <h2>
                {{$course->title}} / {{$session->title}}
                </h2>

              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">

                  <li><a href="/training/">Training</a></li>  
                  <li><a href="/training/{{$course->type}}">{{$course->type}}</a></li>
                  <li><a href="/training/{{$course->type}}/{{$course->slug}}">{{$course->title}}</a></li>

                </ul>
              </nav>
          
              @if (auth()->user()->hasCourse($course->id))
                  <p>{{ $session->url }}</p>
                  <iframe width="560" height="315"
                          src="https://www.youtube.com/embed/OQSNhk5ICTI?si=2i3PgGXigHsh3ldP"
                          title="YouTube video player"
                          frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                          referrerpolicy="strict-origin-when-cross-origin"
                          allowfullscreen>
                  </iframe>
              @else
                  <h4>Access DENIED</h4>
                  <p>{{ $session->url }}</p>
              @endif




            </div>
          </div>
        </div>
      </div>
    </section>
@endsection