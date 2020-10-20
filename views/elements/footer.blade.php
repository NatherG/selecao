<div class="container">
    <h3>{{ site_name() }}</h3>
    <p>{{ theme_config("line-footer") }}</p>
    <div class="social-links">
        @foreach(theme_config('footer_link') ?? [] as $link)
            @if(boolval($link["active"]))
                <a href="{{ $link["link"] }}" target="_blank"><i class="bx bxl-{{$link["name"]}}"></i></a>
            @endif
        @endforeach
    </div>
    <div class="copyright">
        {{ setting('copyright') }}| @lang('theme::selecao.footer.nather') | @lang('messages.copyright')
    </div>
</div>
