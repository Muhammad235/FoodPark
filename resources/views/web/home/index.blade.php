    @extends('web.layouts.master')

    @section('content')
    
    <!--=============================
        BANNER START
    ==============================-->
    @include('web.home.components.slider')
    {{-- <x-web.home.components.slider /> --}}
    <!--=============================
        BANNER END
    ==============================-->

    <!--=============================
        WHY CHOOSE START
    ==============================-->
    @include('web.home.components.why-choose')
    {{-- <x-why-choose /> --}}
    <!--=============================
        WHY CHOOSE END
    ==============================-->


    <!--=============================
        OFFER ITEM START
    ==============================-->
    @include('web.home.components.offer-item')
    <!-- ITEM MODAL START -->
    @include('web.home.components.food-menu-modal')
    <!-- ITEM MODAL END -->
    <!--=============================
        OFFER ITEM END
    ==============================-->


    <!--=============================
        MENU ITEM START
    ==============================-->
    @include('web.home.components.food-menu')
    <!--=============================
        MENU ITEM END
    ==============================-->


    <!--=============================
        ADD SLIDER START
    ==============================-->
    @include('web.home.components.add-slider')
    <!--=============================
        ADD SLIDER END
    ==============================-->


    <!--=============================
        TEAM START
    ==============================-->
    @include('web.home.components.team')
    <!--=============================
        TEAM END
    ==============================-->


    <!--=============================
        DOWNLOAD APP START
    ==============================-->
    @include('web.home.components.download-app')
    <!--=============================
        DOWNLOAD APP END
    ==============================-->


    <!--=============================
       TESTIMONIAL  START
    ==============================-->
    @include('web.home.components.testimonial')
    <!--=============================
        TESTIMONIAL END
    ==============================-->


    <!--=============================
        COUNTER START
    ==============================-->
    @include('web.home.components.counter')
    <!--=============================
        COUNTER END
    ==============================-->


    <!--=============================
        BLOG 2 START
    ==============================-->
    @include('web.home.components.blog')
    <!--=============================
        BLOG 2 END
    ==============================-->
    
    @endsection