<div class="select-lang">
    <ul class="list-unstyled">
        <li>
            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-plus"></i></button>
        </li>
        @foreach(\App\Helper::localeList() as $item)
            <li class="@if(\App\Helper::currentLocale() === $item->locale) active @endif">
                <a href="?lang={{ $item->locale }}"><img src="{{ $item->flag }}"/> {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>