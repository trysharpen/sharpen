@extends('canvas::layouts.app')

@section('actions')
    <a href="{{ route('canvas.tag.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        {{ __('canvas::buttons.tags.create') }}
    </a>
@endsection

@section('content')
    <tag-list :models="{{ $data['tags'] }}" inline-template>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="d-flex justify-content-between">
                        <h1 class="mb-4 mt-2">{{ __('canvas::tags.header') }}</h1>
                        <div class="dropdown my-auto">
                            <a href="#" id="navbarDropdown" class="nav-link px-0 text-secondary pt-0" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style="margin-top: -8px">
                                <i class="fas fa-search"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right py-0" style="min-width: 15rem;" aria-labelledby="dropdownMenuButton">
                                <form class="pl-2 pr-4 mr-5">
                                    <div class="form-group mb-0">
                                        <input v-model="search"
                                               type="text"
                                               class="form-control border-0 px-0 py-0"
                                               id="search"
                                               placeholder="{{ __('canvas::tags.search.input') }}..."
                                               autofocus>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if(count($data['tags']))
                        <div v-cloak>
                            <div class="d-flex border-top py-3 align-items-center" v-for="tag in filteredList">
                                <div class="mr-auto">
                                    <p class="mb-0 py-1">
                                        <a :href="'/canvas/tags/' + tag.id + '/edit'"
                                           class="font-weight-bold lead">@{{ tag.name }}</a>
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <span class="text-muted mr-3">@{{ tag.posts_count }} {{ __('canvas::tags.posts') }}</span>
                                    {{ __('canvas::tags.details.created') }} @{{ moment(tag.created_at).fromNow() }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="#!" class="btn btn-link" @click="limit += 10" v-if="load">{{ __('canvas::buttons.general.load') }} <i class="fa fa-fw fa-angle-down"></i></a>
                            </div>

                            <p class="mt-4" v-if="!filteredList.length">{{ __('canvas::tags.search.empty') }}</p>
                        </div>
                    @else
                        <p class="mt-4">{{ __('canvas::tags.empty.description') }} <a href="{{ route('canvas.tag.create') }}">{{ __('canvas::tags.empty.action') }}</a>.</p>
                    @endif
                </div>
            </div>
        </div>
    </tag-list>
@endsection
