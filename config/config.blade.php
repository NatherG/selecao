@extends('admin.layouts.admin')

@section('footer_description', 'Theme config')

@push('footer-scripts')
    <script>
        document.getElementById('addLinkButton').addEventListener('click', function () {
            let node = document.getElementById("duplicates")
            let dupNode = node.cloneNode(true)
            dupNode.classList.remove("d-none")
            dupNode.classList.add("home")
            document.querySelector("#home").appendChild(dupNode)
        });
        document.getElementById('removeLinkButton').addEventListener('click', function () {
            document.querySelector("#home").lastElementChild.remove()
        });
        document.getElementById('configForm').addEventListener('submit', function () {
            let i = 0;
            document.getElementById('home').removeChild(document.getElementById("duplicates"))
            document.getElementById('home').querySelectorAll('.home').forEach(function (el) {

                el.querySelectorAll('input').forEach(function (input) {
                    input.name = input.name.replace('{index}', i.toString());
                });
                el.querySelectorAll('textarea').forEach(function (input) {
                    input.name = input.name.replace('{index}', i.toString());
                });
                i++;
            });
        });
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.themes.config', $theme) }}" method="POST" id="configForm">
                @csrf
                <h3 >Footer</h3>
                <hr>

                @foreach(['twitter', 'facebook', 'discord', 'skype', 'instagram'] as $social)
                    <div class="form-group">
                        <label for="{{ $social }}Input">{{ trans('theme::selecao.config.'.$social) }}</label>
                        <input type="text" class="form-control disabled d-none" id="{{ $social }}Input" name="footer_link[{{ $social }}][name]" value="{{ $social }}">
                        <input type="text" class="form-control " id="{{ $social }}Input" name="footer_link[{{ $social }}][link]" value="{{ old('footer_link.'.$social.".link", theme_config('footer_link.'.$social.".link")) }}">



                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="footer_link[{{ $social }}][active]">
                                <option>1</option>
                                <option>0</option>
                            </select>
                        </div>

                        @error('footer_social_'.$social)
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                @endforeach

                <h3 class="mt-5">Home</h3>
                <hr>
                <div id="home">
                    <div id="duplicates" class="d-none">
                        <div class="form-group">
                            <label for="titleInput">{{ trans('theme::selecao.config.home.title') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="header_link[{index}][title]" value="">

                            @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DescriptionInput">{{ trans('theme::selecao.config.home.subtitle') }}</label>
                            <textarea class="form-control " id="DescriptionInput" name="header_link[{index}][subTitle]" rows="3"></textarea>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="header_link[{index}][btn][name]" placeholder="{{ trans('messages.fields.name') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="url" class="form-control" name="header_link[{index}][btn][link]" placeholder="{{ trans('messages.fields.link') }}">
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        </div>
                        <hr class="w-25">
                    </div>
                    @foreach(old("header_link", theme_config("header_link")) ?? [] as $header_link)
                    <div class="my-4 home">
                        <div class="form-group">
                            <label for="titleInput">{{ trans('theme::selecao.config.home.title') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="header_link[{index}][title]" value="{{ $header_link["title"] }}">

                            @error('title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="DescriptionInput">{{ trans('theme::selecao.config.home.subtitle') }}</label>
                            <textarea class="form-control " id="DescriptionInput" name="header_link[{index}][subTitle]" rows="3">{{ $header_link["subTitle"] }}</textarea>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="header_link[{index}][btn][name]" value="{{ $header_link["btn"]['name'] }}">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input type="url" class="form-control" name="header_link[{index}][btn][link]" value="{{ $header_link["btn"]['link'] }}">
                                </div>
                            </div>
                        </div>
                        <hr class="w-25">
                    </div>
                    @endforeach

                </div>


                <div class="mb-2 d-flex">
                    <button type="button" id="addLinkButton" class="btn btn-sm btn-success mr-3">
                        <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
                    </button>
                    <button type="button" id="removeLinkButton" class="btn btn-sm btn-danger ml-3">
                        <i class="fas fa-plus"></i> {{ trans('messages.actions.remove') }}
                    </button>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
