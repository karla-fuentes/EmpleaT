@if ($elements->count() > 0)
    @foreach($elements->get() as $element)
    @if ($element->hijos()->count() > 0)
    <div class="card">
        <div class="card-header" id="heading{{$element->key}}">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$element->key}}" aria-expanded="false" aria-controls="collapse{{$element->key}}">
                            {{$element->value}}
                        </button>
                    </h5>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success btn-sm" href="javascript:crearDropdown({{$element->key}});"><i class="fas fa-plus"></i></a>
                    <a class="btn btn-info btn-sm" href="javascript:editarDropdown({{$element->key}},'{{$element->value}}','{{$element->value}}');"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-sm" href="javascript:borrarDropdown({{$element->key}},'{{$element->value}}');"><i class="fas fa-trash"></i></a>
                </div>
            </div>

        </div>

        <div id="collapse{{$element->key}}" class="collapse" aria-labelledby="heading{{$element->key}}" data-parent="#heading{{$element->key}}">
            <div class="card-body">
                @include('configuraciones::dropdowns.partials.parent', ['elements' => $element->hijos()])
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-10">
            {{$element->value}}
        </div>
        <div class="col-md-2">
            <a class="btn btn-success btn-sm" href="javascript:crearDropdown({{$element->key}});"><i class="fas fa-plus"></i></a>
            <a class="btn btn-info btn-sm" href="javascript:editarDropdown({{$element->key}},'{{$element->value}}');"><i class="fas fa-pencil-alt"></i></a>
            <a class="btn btn-danger btn-sm" href="javascript:borrarDropdown({{$element->key}},'{{$element->value}}');"><i class="fas fa-trash"></i></a>
        </div>
    </div>
    <p>
    </p>
    @endif
    @endforeach
@endif
