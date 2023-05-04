@extends("dashboard")
 
@section("title")
    ajouter categorie
@endsection

@section("title_page")
   ajouter categorie
@endsection

@section("contenu")
<form class="mt-3" action="{{route('admin.categories.store')}}" method="post">
    @csrf
  
        <div>
              <label class="form-label" for="title">titre</label>
              <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" type="text">
              @error("title")
                    <span class="text-danger mt-1">{{$message}}</span>                  
              @enderror
        </div>
  
        <label class="form-label" for="id_parent">parent</label>
        <select name="id_parent" class="form-control w-50 @error('id_parent') is-invalid @enderror" id="id_parent">
          <option value="">pas de parent</option>
             @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->title}}</option>                  
             @endforeach
        </select>
        @error("id_parent")
                <span class="text-danger mt-1">{{$message}}</span>                  
        @enderror
   
   <button class="btn btn-primary mt-2">ajouter</button>
</form>
@endsection
