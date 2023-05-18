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
                <label class="form-label" for="id_categorie">categorie</label>
                <select class="form-control" name="id_categorie" id="id_categorie">
                    @foreach ($categories as $categorie)
                        <option @if($categorie->id==$produit->partenaire->categorie->id) selected @endif value="{{$categorie->id}}">{{$categorie->title}}</option>                        
                    @endforeach
                </select>
                @error('id_categorie')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div  id="div_partenaire" class="w-100">
                <label class="form-label" for="id_partenaire">partenaire</label>
                <select class="form-control" name="id_partenaire" id="id_partenaire">
                      @foreach ($produit->partenaire->categorie->partenaires as $partenaire)
                                <option @if($partenaire->id==$produit->partenaire->id) selected @endif value="{{$partenaire->id}}">{{$partenaire->fname}} {{$partenaire->lname}}</option>      
                      @endforeach
                </select>
                @error('id_partenaire')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div  id="div_commission_variable" class="w-100">
                <label class="form-label" for="commission">commission variable</label>
                <input name="commission" value="{{$produit->taux}}" class="form-control" @error('commission') is-invalid @enderror type="number">
                @error('commission')
                    <span class="mt-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary mt-2">modifier</button>
    </form>
@endsection


@section("script")
$(document).ready(function() {
      $('#id_categorie').on('change', function() {
            var id = $("#id_categorie").val();
            $.ajax({
                  url: "{{ url('admin/categorie_partenaire') }}" + '/'+id,
                  dataType: 'json',
                  success: function(data) {
                      if(data){ 
                        $('#id_partenaire').empty();
                          $("#div_partenaire").css("display","block");
                          for(var i=0; i < data.length;i++){
                            var fname = data[i].fname;
                            var lname = data[i].lname;
                            {{-- $('#id_partenaire').append('<option disabled selected>choisir le partenaire</option>') --}}
                            $('#id_partenaire').append(`<option value=${data[i].id}>${fname} ${lname}</option>`);
                          }
                      }
                      else{
                        alert("pas de partenaire pour cette categorie")
                      }
                  },
                  type: 'GET'
            });
      });


      $('#id_partenaire').on('change', function() {
        var id = $("#id_partenaire").val();
        
        $.ajax({
              url: "{{ url('admin/type_contrat_partenaire') }}" + '/'+id,
              dataType: 'json',
              success: function(data) {
                  if(data){ 
                      if(data==2){
                          $("#div_commission_variable").css("display","block");
                      }
                      else{
                        $("#div_commission_variable").css("display","none");
                      }
                  }
                  else{
                    alert("pas de partenaire pour cette categorie")
                  }
              },
              type: 'GET'
        });
  });
});
@endsection