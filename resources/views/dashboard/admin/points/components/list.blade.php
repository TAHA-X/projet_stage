@foreach ($points as $point)
    <tr>
        <td>{{ $point->type }}</td>
        <td>
            {{ $point->valueDH }}
        </td>
        <td>
            {{ $point->valuePoint }}
        </td>
        <td>
            <a class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer cet categorie ?')"
                href="{{ route('admin.points.delete', $point->id) }}"><i class="bi bi-trash3-fill"></i></a>
            <a class="btn btn-primary" href="{{ route('admin.points.edit', $point->id) }}"><i
                    class="bi bi-pen"></i></a>
        </td>
    </tr>
@endforeach
