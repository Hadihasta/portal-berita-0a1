 <div class="news-left">
      @foreach ($news as $item)
      <a href="{{ url('detail-MotoGp.html') }}" class="news-row">
        <div class="news-row-content">
          <span class="news-category">
            {{ $item->category->title }}
          </span>

          <h3 class="news-row-title">
            {{ $item->title }}
          </h3>

          <p class="news-excerpt">
            {!! \Str::limit($item->content, 120) !!}
          </p>

          <div class="news-meta">
            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
          </div>
        </div>

        <img
          src="{{ asset('storage/'.$item->thumbnail) }}"
          alt="{{ $item->title }}"
          class="news-row-image"
        >
      </a>
      @endforeach
    </div>