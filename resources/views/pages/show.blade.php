@extends('layouts.app')
@section('title')
{{$page->user->name}}'s page - {{$page->title}}
@endsection

@section('content')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<p> {{$page->description}} </p>

<h4> {{$page->user->name}}'s details </h4>
<ul>
    <li> Email: {{$page->user->email}}</li>
    <li> Email Verified: {{$page->user->email_verified_at ?? 'Unknown'}}</li>
</ul>

<h4> {{$page->user->name}}'s book reviews </h4>
<ul>
@foreach($page->reviews as $review)
    <li><a href="{{ route('reviews.show',['review'=>$review->id]) }}">{{$review->book->title}} - {{$review->title}}</a></li>
@endforeach
</ul>

<h4> Comments </h4>
<div id="root">
    <ul>
        <li v-for="comment in comments">@{{ comment.content }}</li>
    </ul>

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
                axios.post("{{ route('api.comments.store') }}",
                {
                    content: this.newCommentContent,
                    commentable_id: "{{$page->id}}"
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
            axios.get("{{route('api.comments.index',['id'=>$page->id])}}")
            .then(response=>{
                this.comments = response.data;
            })
            .catch(response=>{
                console.log(response);
            })
        }
    });
</script>

<a href="{{route('pages.index')}}">All Pages</a>
@endsection