@extends('page.panel')

@section('main')
<div class="stats">
    <h2>Información General</h2>
    <div class="container">
      <div class="container-stats">
        <h3>Avance de los quiz</h3>
        <div class="progress-bar">
          
          @foreach($asignaturas as $item)
            <p>{{$item->sigla}}</p>
            <div class="w3-grey w3-round-xlarge">
              <div
                class="w3-container w3-blue w3-round-xlarge"
                style="width: {{100*(( 
                  array_key_exists($item->sigla,$data)?$data[$item->sigla]:0
                  ))/$total}}%"
              >
                {{
                   array_key_exists($item->sigla,$data)?$data[$item->sigla]:0
                }}/{{$total}}
              </div>
            </div>
              
          @endforeach

        </div>
      </div>
      <div class="container-stats">
        <h3>Leaderboard</h3>
        <div class="leaderboard">
          <ul>
            @foreach ($leaderboard as $key => $item)
            <li>
              <span>{{$key + 1}}) {{$item["obj"]->username}}</span>
              <span>{{$item["puntaje"]}}</span>
            </li>
            @endforeach
            
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="contianer-videos-recomendados">
      <h2>Videos Recomendados</h2>
      <div class="continaer-video">
        @foreach ($asignaturas as $item)
        
          @foreach ($item->video as $video)
          {{ parse_str(parse_url($video->link)["query"],$output) }}
          <a target="_blank" style="text-decoration: none;" href="{{$video->link}}">
            <div class="card">
              <img src="https://i.ytimg.com/vi/{{$output["v"]}}/hq720.jpg">
              <p>{{$video->title}}</p>
              <p>Por: {{$video->user->username}}</p>
            </div>
          </a>
          @endforeach
        @endforeach

      </div>
  </div>
@endsection