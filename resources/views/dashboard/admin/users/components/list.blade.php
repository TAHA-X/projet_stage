
@foreach ($users as $user)
    <tr>
        <td>{{ $user->fname }}</td>
        <td>{{ $user->lname }}</td>
        <td>
            @if($user->level_id=="1")
                responsable
            @elseif($user->level_id=="2")
                admin
            @elseif($user->level_id=="3")
                partenaire
            @else
                client            
            @endif
        </td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>
            @if($user->level_id!=4)
                <div class="badge badge-dark">pas client</div>
            @else
                @if($user->points==null)
                   <div class="badge badge-danger">0</div>  
                @else
                    <div class="badge badge-success">{{ $user->points }}</div>
                @endif
            @endif
        </td>
        <td>
            @if($user->level_id==3)
               <div style="display:flex; flex-direction:column; justify-content:center; gap:10px;">
                   @if($user->contrat->type=="0")
                      <div class="badge badge-info">abonnement</div> 
                      <div class="badge badge-warning">{{$user->contrat->periode}} mois | {{$user->contrat->montant}} dh</div>
                   @elseif($user->contrat->type=="1")
                    <div class="badge badge-info">commission</div> 
                    <div class="badge badge-warning">{{$user->contrat->commission}} %</div>
                   @elseif($user->contrat->type=="2")
                       <div class="badge badge-secondary">commission variable</div>
                   @endif
               </div>
            @else
               <div class="badge badge-dark">pas partenaire</div>
            @endif
            
        </td>
        <td>
            @if($user->level_id=="3")
               <div class="badge badge-success">{{$user->categorie->title}}</div>
            @else
               <div class="badge badge-dark">pas de categorie</div>
            @endif
        </td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet user ?')" href="{{route('admin.users.delete',$user->id)}}"><i class="bi bi-trash3-fill"></i></a>
            <a class="btn btn-primary"  href="{{route('admin.users.edit',$user->id)}}"><i class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach
