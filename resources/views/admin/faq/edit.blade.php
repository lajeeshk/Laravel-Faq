@extends('layouts.admin')

@section('content')
<edit-component :faqid="{{request()->faq->id}}"></edit-component>

@endsection