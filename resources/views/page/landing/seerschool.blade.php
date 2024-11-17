@extends('template.fullwidth')


@section('content')

    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
                <h2>Seer School</h2>
                <h3 style="color:#333">
                    Get it done
                </h3>
            </div>
        </div>
        <div class="grid-x grid-margin-x">


        <form action="{{ route('purchase',$course->price_id) }}" method="GET">
        @csrf 
        <button class="button" type="submit">Submit</button>
    </form>
        
        </div>
      </div>
    </section>
   
    @endsection
