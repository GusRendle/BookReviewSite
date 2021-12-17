@extends('layouts.app')
@section('title')
    {{ $review->page->user->name }}'s review of {{ $review->book->title }}
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <div class="container">
        <div class="row">
            <div id="root" class="col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ $review->title }}</h5>
                    <div class="card-body">
                        {{ $review->postDate }}
                        <br>
                        {{ $review->content }}
                    </div>
                    @if (Illuminate\Support\Facades\Auth::user() == $review->user)
                        <div style="margin-left: 1.0rem;">
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}">
                                <button type="button" class="label label-default pull-xs-right">Edit</button>
                            </a>
                            <form method="POST" action="{{ route('reviews.destroy', ['review' => $review->id]) }}">
                                @csrf

                                @method('DELETE')
                                <button type="submit"> Delete </button>

                            </form>
                        </div>
                        <br>
                    @endif
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
                                <a href="{{ route('reviews.edit', ['review' => $review->id]) }}">
                                    <button type="button" class="label label-default pull-xs-right">Edit</button>
                                </a>
                                <a href="{{ route('reviews.edit', ['review' => $review->id]) }}">
                                    <button type="button" class="label label-default pull-xs-right">Delete</button>
                                </a>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="card my-4">
                    <h5 class="card-header"> Links </h5>
                    <div class="card-body">
                        <a href="{{ route('books.show', ['ISBN' => $review->ISBN]) }}">Other reviews of
                            {{ $review->book->title }}</a> <br>
                        <a href="{{ route('pages.show', ['page' => $review->page->id]) }}">{{ $review->page->user->name }}'s
                            page</a>
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
                                axios.post("{{ route('api.comments.store', ['poly' => 'review']) }}", {
                                        content: this.newCommentContent,
                                        commentable_id: "{{ $review->id }}"
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
                            axios.get("{{ route('api.comments.index', ['id' => $review->id, 'poly' => 'review']) }}")
                                .then(response => {
                                    this.comments = response.data;
                                })
                                .catch(response => {
                                    console.log(response);
                                })
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
