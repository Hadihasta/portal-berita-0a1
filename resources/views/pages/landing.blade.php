@extends('layouts.app')

@section('title', 'Berita Liputan Palembang')

@section('content')

    <!-- swiper -->
    <div class="swiper mySwiper mt-9">
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
                <p class="text-3xl font-semibold text-white mt-1">Menjadi Ideal</p>
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

    <!-- Berita Unggulan -->
    <div class="flex flex-col px-14 mt-10 ">
      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Berita Unggulan</p>
          <p>Untuk Kamu</p>
        </div>
        <a href="semuaberita.html"
          class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0 h-fit">
          Lihat Semua
        </a>
      </div>
      <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4" style="heigth: 100%">

        @foreach ($featureds as $featured )
               <a href="detail-MotoGp.html">
          <div
            class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out">
            <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
              {{$featured->category->title}}
            </div>
            <img src="{{asset('storage/'. $featured->thumbnail)}}" alt="" class="w-full rounded-xl mb-3" style="height: 150px; object-fit:cover;">
            <p class="font-bold text-base mb-1">{{$featured->title}}</p>
            <p class="text-slate-400">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}</p>
          </div>
        </a>
       
        @endforeach

     
     
      </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
      <div class="flex flex-col md:flex-row w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Berita Terbaru</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-12 gap-5">
        <!-- Berita Utama -->
        <div
          class="relative col-span-7 lg:row-span-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
          <a href="detail-MotoGp.html">
            <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-5 mt-5 absolute">{{$news[0]->category->title}}
            </div>
            <img src="{{asset('storage/'.$news[0]->thumbnail)}}" alt="berita1" class="rounded-2xl">
            <p class="font-bold text-xl mt-3">{{$news[0]->title}} </p>
            <p class="text-slate-400 text-base mt-1">{!!\Str::limit($news[0]->content,100)!!}</p>
            <p class="text-slate-400 text-base mt-1">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}</p>
          </a>
        </div>

        <!-- Berita 2 3 4 -->
        {{-- skip array ke 1 --}}
      @foreach ($news->skip(1) as $new)
            <a href="detail-MotoGp.html"
          class="relative col-span-5 flex flex-col h-fit md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
          <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm">
           {{$new->category->title}}</div>
          <img src="{{asset('storage/'.$new->thumbnail)}}" style="width:250px; object-fit:cover;"  alt="berita-lineup" class="rounded-xl  md:max-h-48">
          <div class="mt-2 md:mt-0">
            <p class="font-semibold text-lg">{{$new->title}} </p>
            <p class="text-slate-400 mt-3 text-sm font-normal">{!!\Str::limit($new->content,100)!!} </p>
          </div>
        </a>

        @endforeach
      
    </div>

 
@endsection