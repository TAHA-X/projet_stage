
@foreach ($contrats as $contrat)
    <tr>
        <td>
            @if($contrat->type==0)
               <div class="badget badget-info">abonnement</div> 
            @else
               <div class="badget badget-warning">commission</div> 
            @endif
        </td>
        <td>
            @if($contrat->commission)
              {{$contrat->commission}}
            @else
              <div class="badge badge-dark"> </div>
            @endif
            {{-- <a style="text-decoration:none;" href="#" class="badge badge-info">{{count($contrat->produits)}}</a> --}}
        </td>
        <td>
            @if($contrat->periode)
            {{$contrat->periode}}
          @else
            <div class="badge badge-dark"> </div>
          @endif
        </td>
        <td>
            @if($contrat->montant)
            {{$contrat->montant}}
          @else
            <div class="badge badge-dark"> </div>
          @endif
        </td>
        <td>
            {{$contrat->created_at}} 
        </td>
        <td>
          @if($contrat->type!=2)
          <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cette contrat ?')" href="{{route('admin.contrats.delete',$contrat->id)}}"><i class="bi bi-trash3-fill"></i></a>
          <a class="btn btn-primary"  href="{{route('admin.contrats.edit',$contrat->id)}}"><i class="bi bi-pen"></i></a>
          @else
            <div class="badge badge-dark"> </div>
          @endif
        </td>
    </tr>
@endforeach
