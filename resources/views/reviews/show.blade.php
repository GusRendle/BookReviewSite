@extends('layouts.app')
@section('title')
{{$review->page->user->name}}'s review of {{$review->book->title}}
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<p> {{$review->postDate}} </p>

<h3> {{$review->title}} </h3>

<p> {{$review->content}} </p>

<form method="POST" 

    action="{{ route('reviews.destroy', ['review' => $review->id]) }}"> 
    @csrf

    @method('DELETE')
    <button type="submit"> Delete </button>

</form>

<h4> Comments </h4>
        <div id="root">
            <div>
                <div id="comment" v-for="comment in comments">
                    <div>
                        <b>@{{ comment.user_id }} on @{{ comment.postDate }}</b>
                    </div>
                    <div>
                        @{{ comment.content }}
                    </div>
                    <div>
                        <a href="{{ route('reviews.edit',['review'=>$review->id]) }}" >
                            <button type="button" class="label label-default pull-xs-right">Edit</button>
                        </a>
                        <a href="{{ route('reviews.edit',['review'=>$review->id]) }}" >
                            <button type="button" class="label label-default pull-xs-right">Delete</button>
                        </a>
                    </div>
                </div>
            </div>

            <h4> New Comment </h4>
            <input type="text" id="input" v-model="newCommentContent">
            <button @click="createComment">Post</button>
        </div>

        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    comments: [],
                    newCommentContent: '',
                },
                methods: {
                    createComment: function(){
                        axios.post("{{ route('api.comments.store',['poly'=>'review']) }}",
                        {
                            content: this.newCommentContent,
                            commentable_id: "{{$review->id}}"
                        })
                        .then(response => {
                            this.comments.push(response.data);
                            this.newCommentContent = '';
                        })
                        .catch (response=>{
                            console.log(response);
                        })
                    }
                },
                mounted(){
                    axios.get("{{route('api.comments.index',['id'=>$review->id, 'poly'=>'review'])}}")
                    .then(response=>{
                        this.comments = response.data;
                    })
                    .catch(response=>{
                        console.log(response);
                    })
                }
            });
        </script>

<a href="{{ route('books.show',['ISBN'=>$review->ISBN]) }}">Other reviews of {{$review->book->title}}</a>
<a href="{{ route('pages.show',['page'=>$review->page->id]) }}">{{$review->page->user->name}}'s page</a>
@endsection