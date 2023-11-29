@extends('layouts.master')

@section('title')
  КОИНОТИ НАВ | Новости
@endsection

@section('meta-tags')
  @php
    $share_text = preg_replace('#<[^>]+>#', ' ', $data->news->content);
    $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:title" content="{{ $data->news->title }}" />
  <meta property="og:image:alt" content="{{ $data->news->title }}">
  <meta name="twitter:title" content="{{ $data->news->title }}">
  @if (count($data->news->images) > 0)
    <meta property="og:image" content="{{ asset($data->news->images[0]->src) }}">
    <meta name="twitter:image" content="{{ asset($data->news->images[0]->src) }}">
  @endif
@endsection

@section('content')
  <main class="news-show-page">
    @if (count($data->news->images) != 0)
      <div class="container">
        <img
          class="news-show-page__board board"
          src="{{ asset($data->news->images[0]->src) }}"
          width="1280"
          height="540"
          alt="{{ $data->news->images[0]->description }}">
      </div>
    @endif

    <div class="news-show-page__container container">
      <time
        class="news-show-page__date"
        datetime="{{ $data->news->date }}">
        {{ Carbon\Carbon::create($data->news->date)->isoFormat('DD.MM.YYYY') }}
      </time>
      <h1 class="news-show-page__title">{{ $data->news->title }}</h1>

      <div class="news-show-page__content content">{!! $data->news->content !!}</div>

      <div class="news-show-page__gallery gallery">
        @foreach ($data->news->images as $key => $image)
          <a
            class="gallery__item {{ $key > 6 || $key == 0 ? 'visually-hidden' : '' }}"
            href="{{ asset($image->src) }}"
            data-lcl-thumb="{{ asset($image->thumb_src) }}">
            <span class="gallery__thumb" style="background-image: url('{{ asset($image->thumb_src) }}');">
              <svg class="gallery__icon" width="41" height="40">
                <use xlink:href="#image"></use>
              </svg>
            </span>
          </a>
        @endforeach
      </div>
    </div>

    <section class="section-template container">
      <div class="section-template__content">
        <div class="content">
          <h2>Актуальные новости</h2>
          <p>Новости, история развития и интересные события из жизни<br>
            Группы компаний "КОИНОТИ НАВ", которыми всегда приятно поделиться.</p>
        </div>
      </div>

      <div class="section-template__list">
        @foreach ($data->lastNews as $news)
          <x-news-card :news="$news" />
        @endforeach
      </div>
    </section>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/pages/news/show.js') }}" type="module"></script>
@endsection
