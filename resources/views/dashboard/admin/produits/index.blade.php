@extends("dashboard")

@section("title")
    afficher users
@endsection

@section("title_page")
    
@endsection

@section("contenu")
  
<div class="table-responsive">
    @if(session("message"))
        <div id="message" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
            <div class="toast-body">
            {{session("message")}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>         
    @endif
    <table id="table" class="table align-middle">
      <thead>
           @include("dashboard.admin.produits.components.form")
      </thead>
      <tbody>
          {!! $produits_list !!}      
      </tbody>
    </table>
  </div>

  
@endsection
