<ul class="nav navbar-nav">
@foreach ( $elementos as $route => $texto)
    <li role="presentation" {!! Html::classes(['active' => Route::is($route)]) !!}>
        <a href="{{ route($route) }}">{{ $texto }}</a>
    </li>
@endforeach
</ul>
