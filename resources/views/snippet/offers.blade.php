<ul class="list-unstyled">
    @foreach (trans('offers') as $offer)
        <li class="text-uppercase">
            @include('svg-like1') {{$offer}}
        </li>
    @endforeach
</ul>

