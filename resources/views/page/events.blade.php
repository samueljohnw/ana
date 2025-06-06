@extends('template.fullwidth')

@section('title', 'Events | Ana Werner Ministries')

@section('content')


    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
              <h2>Upcoming Events</h2>
              <p>
                Won't you join me for some of these events I'll be at? I would love to see you there.
</p>
              <br/>
              <a href="about.html" class="btn">Invite Me to Speak at Your Event</a>
            </div>
          </div>
          <hr/>
        <div class="grid-x grid-padding-x">
            @foreach($events as $event)
                   <a style="color:#333;" href="/event/{{$event->id}}">
                    <div class="cell small-4"><img style="max-width=350px;" src="/storage/{{ $event->featured_image }}">
                   
                    </a>
                
                    <h3 >
                      <a style="color:#333;" href="/event/{{$event->id}}">{{$event->title}}</a>
                    </h3>
                    <b>
                    {{ date("F j, Y", strtotime($event->start_day)) }} - {{ date("F j, Y", strtotime($event->end_day)) }}
                    </b>
                    <p>
                    {{$event->location}}
                    </p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    </section>
   
@endsection