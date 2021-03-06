@extends('panel.template')

@section('main')
<a href="{{ route('creatorVideo') }}" class="add-quiz-or-video">
    <button>+</button>
  </a>

  <div class="container-horizontal-cards">
      @foreach ($asignaturas as $item)
            @if (count($item->video) > 0)
            <h2>{{$item->sigla}}</h2>
            @endif    

          @foreach ($item->video as $video)
          <a style="text-decoration:none;" target="_blank" href="{{$video->link}}">
            <div class="horizontal-cards">
                <div class="container-img">
                    {{ parse_str(parse_url($video->link)["query"],$output) }}
                  <img
                    src="https://i.ytimg.com/vi/{{$output["v"]}}/hq720.jpg"
                  />
                </div>
            
                <div class="texto">
                  <h3>{{$video->title}}</h3>
                  <p>
                    {{$video->description}}
                  </p>
                  <div class="container-user">
                    <div class="icon">
                      <img
                        src="{{ route("imageUser",['id' => $video->user->id]) }}"
                        alt="Imagen de usuario"
                      />
                      </div>
                      <h5>{{$video->user->username}}</h5>
                  </div>
                </div>
              </div>
          </a>
          
          @endforeach
      @endforeach
    
  </div>
@endsection