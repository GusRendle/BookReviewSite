@extends('layouts.app')
@section('title')
    {{ $page->user->name }}'s page - {{ $page->title }}
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <div class="card">
                    <h5 class="card-header">About {{ $page->user->name }}</h5>
                    <div class="card-body">
                        {{ $page->description }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">{{ $page->user->name }}'s details</h5>
                    <div class="card-body">
                        <b>Email:</b> {{ $page->user->email }} <br>
                        <b>Email Verified:</b> {{ $page->user->email_verified_at ?? 'No' }}
                    </div>
                    @if (Illuminate\Support\Facades\Auth::user() == $page->user)
                        <div style="margin-left: 1.0rem;">
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                <button type="button" class="label label-default pull-xs-right">Edit</button>
                            </a>
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                <button type="button" class="label label-default pull-xs-right">Delete</button>
                            </a>
                        </div>
                        <br>
                    @endif
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">{{ $page->user->name }}'s book reviews</h5>
                    <ul style="list-style-type: none">
                        @foreach ($page->reviews as $review)
                            <li>
                                <a href="{{ route('reviews.show', ['review' => $review->id]) }}">{{ $review->book->title }}
                                    - {{ $review->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr />
                <div class="card my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <input type="text" id="input" v-model="newCommentContent">
                        <button @click="createComment">Post</button>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header"> Comments </h5>
                    <div class="card-body">
                        <figure id="comment" v-for="comment in comments">
                            <blockquote class="blockquote">
                                @{{ comment . content }}
                            </blockquote>
                            <figcaption class="blockquote-footer" style="margin-left: 1.0rem;">
                                @{{ comment . user_id }} on @{{ comment . postDate }}
                            </figcaption>
                            <div>
                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                    <button type="button" class="label label-default pull-xs-right">Edit</button>
                                </a>
                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                    <button type="button" class="label label-default pull-xs-right">Delete</button>
                                </a>
                            </div>
                        </figure>
                    </div>
                </div>

                <script>
                    var app = new Vue({
                        el: "#root",
                        data: {
                            comments: [],
                            newCommentContent: '',
                        },
                        methods: {
                            createComment: function() {
                                axios.post("{{ route('api.comments.store', ['poly' => 'page']) }}", {
                                        content: this.newCommentContent,
                                        commentable_id: "{{ $page->id }}"
                                    })
                                    .then(response => {
                                        this.comments.push(response.data);
                                        this.newCommentContent = '';
                                    })
                                    .catch(response => {
                                        console.log(response);
                                    })
                            }
                        },
                        mounted() {
                            axios.get("{{ route('api.comments.index', ['id' => $page->id, 'poly' => 'page']) }}")
                                .then(response => {
                                    this.comments = response.data;
                                })
                                .catch(response => {
                                    console.log(response);
                                })
                        }
                    });
                </script>

                <div class="card my-4" style="flex: 80%">
                    @if ($page->image_path != null)
                        <img src="{{ asset('storage/pages/' . $page->image_path) }}" />
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
