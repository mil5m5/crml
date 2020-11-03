<div class="d-flex">
    <div class="pr-1">
        <a class="btn btn-primary btn-sm" href="{{ route($url . '.show', $id) }}">
            <i class="far fa-eye"></i>
        </a>
    </div>
    <a class="btn btn-success btn-sm" href="{{ route($url . '.edit', $id) }}">
        <i class="fas fa-pencil-alt"></i>
    </a>
    <form action="{{route($url . '.destroy', $id)}}" method="post" class="inline-block float-right" style="margin-left: 3px">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</div>
