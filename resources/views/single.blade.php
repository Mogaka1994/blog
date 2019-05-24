@extends('layouts.frontend')
@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$post->title}}</h1>
    </div>
</div>
<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{$post->featured}}" alt="seo">
                    </div>
                    <div class="post__content">
                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    {{--  <a href="#" class="post__author-link">{{$post->user->name}}</a>  --}}
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{route('category.single',['id'=>$post->category->id])}}">{{$post->category->name}}</a>


                            </span>

                        </div>

                        <div class="post__content-info">
                                {!!$post->content!!}
                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                @foreach($post->tags as $tag)
                                    <a href="#" class="w-tags-item">{{$tag->tag}}</a>
                                @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">
                        <div class="addthis_inline_share_toolbox_gjor"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="" alt="Author">
                        {{--  {{$post->user->profile->avatar}}  --}}

                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{$post->user->name}}</h5>

                        </div>
                        {{--  <p class="text">{{$post->user->profile->about}}
                        </p>  --}}
                        <div class="socials">

                            <a href="" class="social__item" target="_blank">
                                    {{--  {{$post->user->profile->facebook}}  --}}
                                <img src="{{asset('svg/circle-facebook.svg')}}" alt="facebook">
                            </a>
                            <a href="" class="social__item" target="_blank">
                                    {{--  {{$post->user->profile->youtube}}  --}}
                                <img src="{{asset('svg/youtube.svg')}}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">
                @if($prev)
                    <a href="{{route('post.single',['slug',$prev->slug])}}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-<div class="section-hidden">
  <h2>Publish message</h2>
  <div class="hider">
    <form action="#/exchanges/publish" method="post">
<% if (mode == 'queue') { %>
      <input type="hidden" name="vhost" value="<%= fmt_string(queue.vhost) %>"/>
      <input type="hidden" name="name" value="amq.default"/>
<% } else { %>
      <input type="hidden" name="vhost" value="<%= fmt_string(exchange.vhost) %>"/>
      <input type="hidden" name="name" value="<%= fmt_exchange_url(exchange.name) %>"/>
<% } %>
      <input type="hidden" name="properties" value=""/>
      <table class="form">
<% if (mode == 'queue') { %>
        <tr>
          <td colspan="2"><input type="hidden" name="routing_key" value="<%= fmt_string(queue.name) %>"/> Message will be published to the default exchange with routing key <strong><%= fmt_string(queue.name) %></strong>, routing it to this queue.</td>
        </tr>
<% } else { %>
        <tr>
          <th><label>Routing key:</label></th>
          <td><input type="text" name="routing_key" value=""/></td>
        </tr>
<% } %>
        <tr>
          <th><label>Delivery mode:</label></th>
          <td>
            <select name="delivery_mode">
              <option value="1">1 - Non-persistent</option>
              <option value="2">2 - Persistent</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>
            <label>
              Headers:
              <span class="help" id="message-publish-headers"></span>
            </label>
          </th>
          <td>
            <div class="multifield" id="headers"></div>
          </td>
        </tr>
        <tr>
          <th>
            <label>
              Properties:
              <span class="help" id="message-publish-properties"></span>
            </label>
          </th>
          <td>
            <div class="multifield string-only" id="props"></div>
          </td>
        </tr>
        <tr>
          <th><label>Payload:</label></th>
          <td><textarea name="payload"></textarea></td>
        </tr>
      </table>
      <input type="submit" value="Publish message" />
    </form>
  </div>
</div>
                                                                                                                                                                                                                                                                                                                                                                             