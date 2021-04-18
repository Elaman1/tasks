@extends('layouts.master')

@section('title', 'main')

@section('content')
    <div class="container">
        <div class="content addon">
            <div class="name">
            @if(isset($element))
                <p>Edit Invoice</p>
            @else
                <p>Create Invoice</p>
            @endif
                
            </div>
            <div class="form">
                <form method="POST" action="@if(isset($element)) {{route('confirm-edit-inv', $element)}} @else {{route('add-inv')}} @endif">
                    <div class="content-form">
                        <div class="item">
                            <p>Number:</p>
                            <input type="text" name="numeric" value=" @if(!isset($element)) INV-{{ $count }} @else {{ $element->number }} @endif" disabled="disabled" >
                        </div>
                        <div class="item">
                            <p>Invoice Date:</p>
                            <input type="date" placeholder="Select date" name="invoice" value="@if(isset($element)){{$element->create}}@endif">
                        </div>
                        <div class="item">
                            <p>Supply Date:</p>
                            <input type="date" placeholder="Select date" name="supply" value="@if(isset($element)){{$element->supply}}@endif">
                        </div>
                        <div class="item-full">
                            <p>Comment:</p>
                            <textarea name="comment" cols="10">@if(isset($element)) {{ $element->comment }} @endif</textarea>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" value="save" name="send" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>


@endsection
