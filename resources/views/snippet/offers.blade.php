<ul class="list-unstyled">
    @foreach (trans('offers') as $offer)
        <li class="text-uppercase">
            [icon] {{$offer}}
        </li>
    @endforeach
</ul>

