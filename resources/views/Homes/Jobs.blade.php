@extends('layouts.post')

@section('content')
  <section class="home-page pt-4">
    <div class="container">
      <form action="{{route('job.index')}}">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="px-4">
              <div class="rounded-text">
                <p>
                  Busca trabajos, vacantes ONLINE.
                </p>
              </div>
              <div class="home-search-bar">
                  <input type="text" name="q" placeholder="Buscar por Titulo" class="home-search-input form-control">
                  <button type="submit" class="secondary-btn"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="py-5 px-5 text-center">
              <div class="text-light">
                <h4>Encontrá oportunidades, publicá tu empleo y hacé crecer tu negocio.
              </h4>
              </div>
            </div>
            </div>
        </div>   
      </form>
    </div>
  </section>
  
  {{-- jobs list --}}
  <section class="jobs-section py-5">
    <div class="container-fluid container-7">
      <div class="row ">
        <div class="col-sm-12 col-md-7 ml-auto">
          <div class="card">
            <div class="card-header">
              <p class="card-title font-weight-bold"><i class="fas fa-briefcase"></i> Top Empleos</p>
            </div>
            <div class="card-body">
              <div class="top-jobs" >
                <div class="">

                  @foreach ($posts as $post)
                    @if ($post->company)
                    <div class="col rounded border-bottom border-grey hover">
                      <a href="{{route('post.show',['job'=>$post->id])}}">
                      <div class="card rounded-0 bg-transparent flex-md-row mb-3 mt-0 pt-3 box-shadow h-md-250 px-2 border-b">
                        
                        <div class="row g-0 w-100">
                          <div class="col-md-4 d-flex justify-content-center">

                            <img src="{{asset($post->company->logo)}}" alt="job listings" class="img-fluid">

                          </div>

                          <div class="job-description col align-content-center text-center-movile">

                              <p class="company-name small" title="{{$post->company->title}}">{{$post->company->title}}</p>
                                <ul class="company-listings ul-plane">
                                  <li class=""><strong>{{substr($post->job_title, 0, 27)}}</strong></li>
                              </ul>

                          </div>

                          <div class="col-md-2 d-flex justify-content-center align-items-center p-0">

                            <div class="small"><span class="text-info">{{$post->employment_type}}</span></div>

                          </div>

                        </div>

                      </div>
                      </a>
                    </div>
                    @endif
                  @endforeach

                 </div>
               </div>
              </div>
              <a class="btn secondary-btn" href="{{route('job.index')}}">Ver todos</a>
            </div>
          </div>
       
        <div class="col-sm-12 col-md-3 mr-auto">

          <div class="card mb-4">
            <div class="card-header">
              <p class="font-weight-bold"><i class="fas fa-building"></i> Top Empleadores</p>
            </div>
            <div class="card-body">
              <div class="top-employers">
              @foreach ($topEmployers as $employer)
                <div class="top-employer">
                  <a href="{{route('account.employer',['employer'=>$employer])}}">
                    <img src="{{asset($employer->logo)}}" width="60px" class="img-fluid" alt="">
                  </a>
                </div> 
              @endforeach
              </div>
            </div>
          </div>

            <div class="card mb-4 job-by-category">
              <div class="card-header">
                <p class="font-weight-bold"><i class="fab fa-typo3"></i> Por Categoria</p>
              </div>
              <div class="card-body">
                <div class="jobs-category mb-3 mt-0">
                  @foreach ($categories as $category)
                  <div class="p-1"><a href="{{URL::to('search?category_id='.$category->id)}}" class="text-muted hover-light">{{$category->category_name}}</a> </div>
                  @endforeach
                  <a class="p-1 text-info" href="{{route('job.index')}}">Ver Más..</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

