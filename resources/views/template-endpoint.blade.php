{{--
  Template Name: Endpoint template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <section class="container container__endpoint flex-it f-col f-just-start f-align-center">
        <h1>@field('title_h1')</h1>
        @field('text')
        <div class="btn__row flex-it f-row f-just-start">
            @hasfield('btn_black')
            <div class="btn btn--black">
                <a href="@field('btn_black', 'url')">@field('btn_black', 'title')</a>
            </div>
            @endfield
            @hasfield('btn_border')
            <div class="btn btn--border">
                <a href="@field('btn_border', 'url')">@field('btn_border', 'title')</a>
            </div>
            @endfield
        </div>
    </section>
  @endwhile
@endsection
