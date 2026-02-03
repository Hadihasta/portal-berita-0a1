@extends('layouts.app')

@section('title', 'Berita Liputan Palembang')

@section('content')


<style>
/* ================= TAMBAHAN STYLE (YANG KAMU TAMBAHKAN) ================= */

/* Swiper Kedua */
.hero-slide {
    position: relative;
    height: 320px;
    border-radius: 20px;
    background-size: cover;
    background-position: center;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.1));
}

.hero-content {
    position: absolute;
    bottom: 0;
    padding: 1.5rem;
    z-index: 2;
}

.hero-category {
    display: inline-block;
    background: var(--primary);
    color: #fff;
    font-size: 0.75rem;
    padding: 0.35rem 0.8rem;
    border-radius: 999px;
    margin-bottom: 0.5rem;
}

.hero-title {
    color: #fff;
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.4;
}

/* ================= NEWS CONTAINER ================= */
.container-news {
    max-width: 1400px;
    margin: 5rem auto;
    padding: 0 2rem;
}

.news-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
}

/* Main News List */
.news-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.news-item {
    display: flex;
    gap: 1.25rem;
    border: 2px solid var(--border-light);
    border-radius: 16px;
    padding: 1rem;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}

.news-item:hover {
    border-color: var(--primary);
    transform: translateX(6px);
}

.news-item img {
    width: 200px;
    height: 140px;
    object-fit: cover;
    border-radius: 12px;
}

.news-meta {
    font-size: 0.75rem;
    color: var(--text-gray);
    margin-bottom: 0.25rem;
}

.news-category {
    color: var(--primary);
    font-weight: 600;
}

.news-title {
    font-size: 1.05rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.news-excerpt {
    font-size: 0.85rem;
    color: var(--text-gray);
    line-height: 1.5;
}

/* Sidebar */
.sidebar {
    border: 2px solid var(--border-light);
    border-radius: 16px;
    padding: 1.5rem;
}

.sidebar h3 {
    font-size: 1.25rem;
    font-weight: 800;
    margin-bottom: 1.25rem;
}

.side-item {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
    text-decoration: none;
    color: inherit;
}

.side-item img {
    width: 70px;
    height: 70px;
    border-radius: 10px;
    object-fit: cover;
}

.side-title {
    font-size: 0.85rem;
    font-weight: 600;
}

.side-time {
    font-size: 0.7rem;
    color: var(--text-gray);
}

/* Responsive */
@media (max-width: 1024px) {
    .news-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .news-item {
        flex-direction: column;
    }

    .news-item img {
        width: 100%;
        height: 200px;
    }
}
</style>

<style>
    :root {
        --primary: #FF6B35;
        --primary-dark: #E85A2A;
        --text-dark: #1A1A1A;
        --text-gray: #64748B;
        --border-light: #E2E8F0;
    }
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    /* Hero Swiper */
    .hero-section {
        max-width: 1400px;
        margin: 2.5rem auto;
        padding: 0 2rem;
    }
    
    .swiper {
        border-radius: 24px;
        overflow: hidden;
    }
    
    .swiper-slide {
        position: relative;
        height: 500px;
        background-size: cover;
        background-position: center;
        border-radius: 24px;
        overflow: hidden;
    }
    
    .slide-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 60%);
    }
    
    .slide-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 3rem;
        z-index: 10;
    }
    
    .category-badge {
        display: inline-block;
        background: var(--primary);
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }
    
    .slide-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.75rem;
        font-weight: 900;
        color: white;
        line-height: 1.2;
        margin-bottom: 1rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }
    
    .slide-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-top: 1rem;
    }
    
    .author-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid white;
        object-fit: cover;
    }
    
    .author-name {
        color: white;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    /* Section Styling */
    .section {
        max-width: 1400px;
        margin: 5rem auto;
        padding: 0 2rem;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.25rem;
        font-weight: 900;
        line-height: 1.2;
        color: var(--text-dark);
    }
    
    .btn-view-all {
        padding: 0.75rem 2rem;
        background: var(--primary);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .btn-view-all:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
    }
    
    /* Featured Articles Grid */
    .featured-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
    }
    
    .article-card {
        border: 2px solid var(--border-light);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
        text-decoration: none;
        display: block;
    }
    
    .article-card:hover {
        border-color: var(--primary);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }
    
    .article-image-wrapper {
        position: relative;
        overflow: hidden;
    }
    
    .article-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image {
        transform: scale(1.08);
    }
    
    .article-category {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: var(--primary);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 10;
    }
    
    .article-content {
        padding: 1.5rem;
    }
    
    .article-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    
    .article-date {
        color: var(--text-gray);
        font-size: 0.85rem;
    }
    
    /* Latest News Layout */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 2rem;
    }
    
    .main-news {
        grid-column: span 7;
        border: 2px solid var(--border-light);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: block;
        color: inherit;
    }
    
    .main-news:hover {
        border-color: var(--primary);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }
    
    .main-news-image-wrapper {
        position: relative;
    }
    
    .main-news-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
    
    .main-news-content {
        padding: 2rem;
    }
    
    .main-news-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-dark);
        line-height: 1.3;
    }
    
    .main-news-excerpt {
        color: var(--text-gray);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    
    .side-news {
        grid-column: span 5;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
    
    .news-item {
        display: flex;
        gap: 1.25rem;
        border: 2px solid var(--border-light);
        border-radius: 16px;
        padding: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }
    
    .news-item:hover {
        border-color: var(--primary);
        transform: translateX(8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
    }
    
    .news-item-image {
        width: 180px;
        height: 140px;
        object-fit: cover;
        border-radius: 12px;
        flex-shrink: 0;
    }
    
    .news-item-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .news-item-title {
        font-size: 1.05rem;
        font-weight: 600;
        margin-top: 0.5rem;
        margin-bottom: 0.75rem;
        color: var(--text-dark);
        line-height: 1.4;
    }
    
    .news-item-excerpt {
        color: var(--text-gray);
        font-size: 0.85rem;
        line-height: 1.5;
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .news-grid {
            grid-template-columns: 1fr;
        }
        
        .main-news,
        .side-news {
            grid-column: span 1;
        }
    }
    
    @media (max-width: 768px) {
        .slide-title {
            font-size: 1.75rem;
        }
        
        .section-title {
            font-size: 1.75rem;
        }
        
        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .featured-grid {
            grid-template-columns: 1fr;
        }
        
        .news-item {
            flex-direction: column;
        }
        
        .news-item-image {
            width: 100%;
            height: 200px;
        }
    }
    
    @media (max-width: 640px) {
        .swiper-slide {
            height: 350px;
        }
        
        .slide-content {
            padding: 2rem;
        }
        
        .slide-title {
            font-size: 1.5rem;
        }
        
        .main-news-image {
            height: 250px;
        }
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .fade-in-up {
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }
    
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
</style>

<!-- Hero Swiper Section -->
<section class="hero-section">
     <div class="swiper mySwiper mt-9" style="max-height:300px">
      <div class="swiper-wrapper">
        @foreach ($articleBanners as  $articleBanner)
          
        <div class="swiper-slide">
          <a href="detail-MotoGp.html" class="block">
            <div
              class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden"
              style=" background-image:url('{{asset('storage/'.$articleBanner->thumbnail)}}') ">
              <div
                class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0)] rounded-b-xl">
              </div>
              <div class="relative z-10 mb-3" style="padding-left: 10px;">
                <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">{{$articleBanner->category->title}}</div>
                <p class="text-3xl font-semibold text-white mt-1">{{$articleBanner->title}}</p>
              
                <div class="flex items-center gap-1 mt-1">
                  <img src="{{asset('storage/'.$articleBanner->author->avatar)}}" alt="" class="w-5 h-5 rounded-full">
                  <p class="text-white text-xs">{{$articleBanner->author->name}}</p>
                </div>
              </div>
            </div>
          </a>
        </div>

        @endforeach
      </div>
    </div>
</section>

{{-- ================= NEWS ================= --}}
<section class="container-news">
  <div class="news-layout">

    {{-- MAIN --}}
    <div class="news-list">
      @foreach ($news as $item)
      <a href="#" class="news-item">
        <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="">
        <div>
          <div class="news-meta">
            <span class="news-category">{{ $item->category->title }}</span>
            • {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
          </div>
          <h3 class="news-title">{{ $item->title }}</h3>
          <p class="news-excerpt">{!! \Str::limit($item->content, 120) !!}</p>
        </div>
      </a>
      @endforeach
    </div>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
      <h3>Terpopuler</h3>
      @foreach ($news->take(6) as $side)
      <a href="#" class="side-item">
        <img src="{{ asset('storage/'.$side->thumbnail) }}" alt="">
        <div>
          <p class="side-title">{{ $side->title }}</p>
          <span class="side-time">
            {{ \Carbon\Carbon::parse($side->created_at)->diffForHumans() }}
          </span>
        </div>
      </a>
      @endforeach
    </aside>

  </div>
</section>


<!-- Berita Terbaru Section -->
<section class="section">
    <div class="section-header">
        <div>
            <h2 class="section-title">Berita Terbaru</h2>
        </div>
    </div>
    
    <div class="news-grid">
        <!-- Main News (First Article) -->
        @if(isset($news[0]))
        <a href="{{ url('detail-MotoGp.html') }}" class="main-news">
            <div class="main-news-image-wrapper">
                <span class="article-category" style="position: absolute; top: 1.5rem; left: 1.5rem; z-index: 10;">
                    {{ $news[0]->category->title }}
                </span>
                <img src="{{ asset('storage/'.$news[0]->thumbnail) }}" 
                     alt="{{ $news[0]->title }}" 
                     class="main-news-image">
            </div>
            <div class="main-news-content">
                <h2 class="main-news-title">{{ $news[0]->title }}</h2>
                <div class="main-news-excerpt">{!! \Str::limit($news[0]->content, 100) !!}</div>
                <p class="article-date">{{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y') }}</p>
            </div>
        </a>
        @endif
        
        <!-- Side News (Rest of Articles) -->
        <div class="side-news">
            @foreach ($news->skip(1) as $new)
            <a href="{{ url('detail-MotoGp.html') }}" class="news-item">
                <img src="{{ asset('storage/'.$new->thumbnail) }}" 
                     alt="{{ $new->title }}" 
                     class="news-item-image">
                <div class="news-item-content">
                    <span class="category-badge" style="font-size: 0.75rem; padding: 0.3rem 0.8rem;">
                        {{ $new->category->title }}
                    </span>
                    <h3 class="news-item-title">{{ $new->title }}</h3>
                    <div class="news-item-excerpt">{!! \Str::limit($new->content, 100) !!}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>


<!-- Berita Unggulan Section -->
<section class="section">
    <div class="section-header">
        <div>
            <h2 class="section-title">Berita Unggulan
        </div>
        <a href="{{ url('semuaberita.html') }}" class="btn-view-all">Lihat Semua</a>
    </div>
    
    <div class="featured-grid">
        @foreach ($featureds as $index => $featured)
        <a href="{{ url('detail-MotoGp.html') }}" class="article-card fade-in-up stagger-{{ ($index % 4) + 1 }}">
            <div class="article-image-wrapper">
                <span class="article-category">{{ $featured->category->title }}</span>
                <img src="{{ asset('storage/'. $featured->thumbnail) }}" 
                     alt="{{ $featured->title }}" 
                     class="article-image">
            </div>
            <div class="article-content">
                <h3 class="article-title">{{ $featured->title }}</h3>
                <p class="article-date">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}</p>
            </div>
        </a>
        @endforeach
    </div>
</section>



<!-- Swiper JS Initialization -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Initialize Swiper
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
</script>
 
@endsection