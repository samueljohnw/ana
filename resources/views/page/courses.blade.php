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

              <div class="callout">
                <h5>If you already have an account, enter your email address to receive a login link.</h5>
                <div class="grid-container">
                  <div class="grid-x grid-padding-x">
                    <div class="medium-8 cell">
                      <form>
                        <label>&nbsp;
                          <input type="text" placeholder="E-Mail Address">
                        </label>
                          <input type="submit" value="Log In" class="btn"></input>
                      </form>
                    </div>
                </div>
              </div>
              </div>
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
                    <a href="/training/{{$course->type}}/{{$course->slug}}/{{$session->slug}}" class="thumbnail"><img src="/{{$session->featuredImage}}" alt="Photo of book."></a>
                  </div>
                @endforeach
              @endisset

              @if (isset($courses))
                @foreach($courses as $course)
                  <div class="cell small-12 medium-6 large-4">
                    <a href="/training/{{ $course->type}}/{{$course->slug }}" class="thumbnail"><img src="/{{$course->featured_image}}" alt="Photo of book."></a>
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