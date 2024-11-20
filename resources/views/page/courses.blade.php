@extends('template.fullwidth')


@section('content')
    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
                <h2>
                @isset($courses)
                {{$courses->first()->type}}
                @endisset
                @isset($course)
                {{$course->title}}
                @endisset
                </h2>

                @unless (Auth::check())
                  @include('snippets.loginform')
                @endunless
              <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                @isset($courses)
                  <li><a href="/training/">Training</a></li>
                  <li class="show-for-sr">{{$courses->first()->type}}</li>

                @endisset
                @isset($course)
                  <li><a href="/training/">Training</a></li>  
                  <li><a href="/training/{{$course->type}}">{{$course->type}}</a></li>
                @endisset

                </ul>
              </nav>


              <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-12 large-12">
              </div>
              @isset($course)
                @foreach($course->assets as $session)

                  <div class="cell small-12 medium-6 large-4">
                    <a href="/training/{{$course->type}}/{{$course->slug}}/{{$session->slug}}" class="thumbnail"><img src="{{ $session->featuredImage ? asset('/' . $session->featuredImage) : 'https://placehold.co/600x400/orange/white' }}" alt="{{$session->title}}"></a>
                  </div>
                @endforeach
              @endisset

              @if (isset($courses))
                @foreach($courses as $course)
                  <div class="cell small-12 medium-6 large-4">
                    <a href="/training/{{ $course->type}}/{{$course->slug }}" class="thumbnail"><img src="{{ $course->featured_image ? asset('/' . $course->featured_image) : 'https://placehold.co/600x400/orange/white' }}" alt="{{$course->title}}"></a>
                  </div>
                @endforeach
              @endif

             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection