@extends('layout.header')

@section('content')

    <div class="col-lg-6">

    <div id = "post-box" style = "margin-left:55%; width:640px; border-radius:10px;">
                <div class="card" >
                            <div class="card-header" style = " background-color: rgba(74, 76, 95, 0.938)   ;">
                                <img src = "/images/profile_pic/{{$post->img_ext}}" width = "45px" style = "border-radius: 50%;"><a href = "/profile/{{$post->student_id}}"> <span id ="username" style = "color:white; font-size:20px; margin-top:2%;"> <strong> {{$post->username}} </strong></span></a>
                            </div>
                            <div class="card-body card-block"> 
                                <p id = "post-text"> {{$post->text}}</p>
                            </div>
                            <hr>
                            @if( $post->photo_name != null)
                            <img src = "images/post/{{$post->photo_name}}" class = "post-image">
                            @endif
                            <div class="card-footer" style = " background-color: rgba(74, 76, 95, 0.938)   ;"   >
                          <form action = "/comment/{{$post->id}}" method = "post">
                            {{csrf_field()}}
                                            <div class = "p-text" >
                                                <textarea name = "ctext"  onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }" class = "p-text-comment" placeholder = "Write a comment"></textarea>
                                                
                                            </div>
                            </form>                               

                           
                            @foreach($comments as $comment)
                                @if($comment->post_id == $post->id)
                               
                                    <div class = "comments" style = "background-color:white;">
                                        <img src = "/images/profile_pic/{{$comment->img_ext}}" width = "25px" style = "border-radius: 50%;">   <a href = "/profile/{{$comment->student_id}}"> <span id ="comment-user"> <strong> {{$comment->name}} </strong></span></a>  {{$comment->text}}

                                    </div>
                                @endif
                            @endforeach
</div>

@endsection
