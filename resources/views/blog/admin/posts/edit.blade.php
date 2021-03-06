@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogPost $item */
    @endphp

    <div class="container">

        @include('blog.admin.posts.includes.result_messages')

        @if($item->exists)
            <form action="{{route('blog.admin.posts.update', $item->id)}}" method="POST">
                @method('PATCH')
                @else
                    <form action="{{route('blog.admin.posts.store')}}" method="POST">
                        @endif
                        @csrf

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.posts.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.posts.includes.item_edit_add_col')
                            </div>
                        </div>
                    </form>

                    @if($item->exists)
                        <br>
                        <form action="{{route('blog.admin.posts.destroy', $item->id)}}"
                              method="POST"
                        >
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button class="btn btn-link" type="submit">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
        @endif
    </div>

@endsection
