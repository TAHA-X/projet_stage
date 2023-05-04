@extends('dashboard')

@section('title')
    modifier produit
@endsection

@section('title_page')
    modifier produit
@endsection

@section('contenu')
    <form class="mt-3" action="{{ route('admin.produits.update',$produit->id) }}" method="post">
        @csrf
        @method("put")
        <div class="d-flex gap-2">
            <div class="w-100">
                <label class="form-label" for="title">title</label>
                <input  name="title" class="form-control" value="{{$produit->title}}" @error('title') is-invalid @enderror type="text">
                @error('title')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-100">
                  <label class="form-label" for="prix">prix</label>
                  <input name="prix" value="{{$produit->prix}}" class="form-control" @error('prix') is-invalid @enderror type="number">
                  @error('prix')
                      <span class="mt-2 text-danger">{{ $message }}</span>
                  @enderror
              </div>
            <div class="w-100">
                <label class="form-label" for="id_partenaire">partenaire</label>
                <select class="form-control" name="id_partenaire" id="id_partenaire">
                    @foreach ($partenaires as $partenaire)
                        <option @if($partenaire->id==$produit->partenaire->id) selected @endif value="{{$partenaire->id}}">{{$partenaire->fname}} {{$partenaire->lname}}</option>                        
                    @endforeach
                </select>
                @error('id_partenaire')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2">ajouter</button>
    </form>
@endsection
