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
              {{$session->url}}

              <div style="position:relative; width:100%; height:0px; padding-bottom:56.250%"><iframe allow="fullscreen" allowfullscreen height="100%" src="{{$session->url}}?loop=0" width="100%" style="border:none; width:100%; height:100%; position:absolute; left:0px; top:0px; overflow:hidden;"></iframe></div>

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection