@extends('template.fullwidth')


@section('content')

    <section class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="row align-middle grid-x">
            <div class="column small-12 medium-12">
                <h2>Training</h2>
                <h3 style="color:#333">
                Learn more about the gifts of the spirit through one of my e-courses, mentorship or schools.
              </h3>
              <div class="callout">
                <h5>Enter your email address to receive a login link.</h5>
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
              <div class="grid-x grid-margin-x">
              <div class="cell small-12 medium-12 large-12">
              <h3>
               Navigate through your past videos.
              </h3>
              </div>
                <div class="cell small-12 medium-6 large-3"><a href="/training/seer-school" class="thumbnail"><img max-height="500px" src="/assets/images/seer-school.webp" alt="Photo of book."></a></div>
                <div class="cell small-12 medium-6 large-3"><a href="/training/mentorship" class="thumbnail"><img src="/assets/images/mentorship.webp" alt="Photo of book."></a></div>
                <div class="cell small-12 medium-6 large-3"><a href="/training/healing-school" class="thumbnail"><img src="/assets/images/healing-school.webp" alt="Photo of book."></a></div>
                <div class="cell small-12 medium-6 large-3"><a href="/training/e-course" class="thumbnail"><img src="/assets/images/e-courses.webp" alt="Photo of book."></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endsection
