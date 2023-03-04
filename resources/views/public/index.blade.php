@extends('layouts.public-master')

@section('title', '| Lelang Online')

@section('content')
    <!-- Banner -->
    @include('public.partials.banner')

    <!-- Motto -->
    @include('public.partials.motto')
    
    <!-- About -->
    @include('public.partials.about')
    
    <!-- FAQ -->
    @include('public.partials.faq')
@endsection
