@extends('layout')

@section('title', 'Profile User')

@section('content')
    <div class="container">
    <h1 style="text-align: center;">Profile</h1>
    <hr>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 user-detail-container">
                <div class="user-profile-pictures">                                                        
                    <div class="picture"
                        style="background-image:url({{ $user->foto() }});">
                    </div>                                                 
                </div>
                <div class="user-profile-detail">
                    <h4><i class="fa fa-user"></i> {{ $user->name }}</h4>
                    <p>{{ $user->deskripsi }}</p>
                    <hr>
                    <h4><i class="fa fa-envelope"></i> {{ $user->email }}</h4>
                    <h4><i class="fa fa-calendar"></i> {{ $user->ttl }}</h4>                    
                </div> 
                @if($edit==true)
                    <div class="edit-profile-btn-class">
                        <a href="/profile/edit" class="btn btn-default btn-lg edit-profile-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a>                
                    </div>
                @endif
            </div>   
                       
            <div class="col-lg-6">
            <input type="hidden" id="jumlah-iklan" value="{{ sizeof($iklan) }}">
                @foreach($iklan as $k => $i)
                    <div class="user-product-container">
                        <div class="row user-product-detail">
                            <div class="col-xs-2 user-picture-for-product">                                                        
                                <div class="picture-user"
                                    style="background-image:url({{ $i->user->foto() }});">
                                </div>                                                 
                            </div>
                            <div class="col-xs-8 user-profile-for-product">
                                <a href="/iklan/detail/{{ $i->kategori_id }}/{{ $i->id }}"><h3>{{ $i->judul }}</h3></a>
                                <input type="hidden" id="judul-iklan{{ $k+1 }}" value="{{ $i->id }}">
                                <h4>{{ $i->created_at }}</h4>
                            </div>
                            <div class="col-xs-2">
                            @if($edit==true)
                                <a href="/profile/hapus-iklan/{{ $i->id }}" class="btn btn-xs btn-danger hapus-iklan-user-btn"><i class="fa fa-trash"></i>Hapus</a>
                            @endif
                            </div>
                        </div>
                        <div class="user-product-foto">
                            <div class="picture-product"
                                style="background-image:url({{ $i->gambarPertama->foto }})">
                            </div>
                        </div> 
                        <div class="user-informasi-product">
                            <h4 class="nama-produk">{{ $i->judul }}</h4>
                            <h4 class="harga-produk-profile">Rp.{{ $i->harga }}</h4>
                        </div>
                        <div style="margin-top: 20px;" id="like-dislike" class="like-dislike"> 
                            @if(Auth::user())                 
                                <div id="dislike-iklan{{ $k+1 }}" class="dislike-product" onclick="dislikeIklan({{ $i->id }})">
                            @else
                                <div class="dislike-product">
                            @endif
                                    <h4><i class="fa fa-thumbs-down fa-lg" aria-hidden="true" value="dislike"></i> {{ $i->dislike }}</h4> 
                                    <input type="hidden" id="dislike-iklan-value" value="{{ $i->dislike }}">
                                </div>  
                            @if(Auth::user())
                                <div id="like-iklan{{ $k+1 }}" class="like-product" onclick="likeIklan({{ $i->id }})">
                            @else
                                <div class="like-product">
                            @endif
                                    <h4><i class="fa fa-thumbs-up fa-lg" aria-hidden="true" value="like"></i> {{ $i->like }}</h4> 
                                    <input type="hidden" id="like-iklan-value" value="{{ $i->like }}">
                                </div>
                        </div>           
                        <div class="comment-header">
                            <hr>  
                            <h3>Komentar</h3>
                        </div>
                        <div id="comment-list{{$k}}">
                            @foreach($i->comment as $c)
                                <div class="row row-user-comment">
                                    <div class="col-xs-1 user-comment-foto">
                                        <a href="/profile/{{ $c->user_id }}">
                                            <div class="picture-user-comment"
                                                style="background-image:url({{ $c->user->foto() }});">
                                            </div>
                                        </a>
                                    </div> 
                                    <div class="col-xs-11">
                                        <div class="user-comment-list">
                                            <h4 style="margin-top: 20px;">{{ $c->user->name }}</h4>
                                            <p>{{ $c->isi }}</p>
                                        </div>
                                    </div>
                                </div>                               
                            @endforeach
                        </div>
                        @if(Auth::user())
                            <div class="row user-product-comment">
                                <div class="col-xs-1 user-comment-foto">
                                    <div class="picture-user-comment"
                                        style="background-image:url({{ Auth::user()->foto() }});">
                                    </div>
                                </div> 
                                <div class="col-xs-11 user-comment">
                                    <form id="formComment{{$k}}" name="formComment" novalidate="">
                                    {{ csrf_field() }}
                                        <div class="input-comment">
                                            <div class="form-group form{{ $errors->has('comment') ? ' has-error' : '' }}">
                                                <input id="comment{{$k}}" type="text" class="form-control input-lg" required autofocus placeholder="Masukkan komentar anda" name="comment" value="">

                                                @if($errors->has('comment'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('comment') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <button id="kirim-comment" type="button"  onclick="commentIklan({{ Auth::user()->id }}, {{ $i->id }}, document.getElementById('comment{{$k}}').value, {{$k}})" class="btn btn-default btn-lg kirim-comment">
                                            Kirim
                                        </button>
                                        <input type="hidden" id="user-comment-foto" name="user-comment-foto" value="{{ Auth::user()->id }}"> 
                                        <input type="hidden" id="comment_id" name="comment_id" value="0">
                                        <input type="hidden" id="comment_username" name="comment_username" value="{{ Auth::user()->name }}">
                                        <input type="hidden" id="comment_user_picture" name="comment_user_picture" value="{{ Auth::user()->foto() }}">
                                    </form>
                                </div>      
                            </div>
                        @endif        
                    </div>
                @endforeach
            </div>                        
            <div class="col-lg-1"></div>
        </div>
    </div>    
@endsection