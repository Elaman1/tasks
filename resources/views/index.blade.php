@extends('layouts.master')

@section('title', 'main')

@section('content')
    <div class="container">
        
        <div class="content main">
            <div class="name">
                <p>Invoices</p>
            </div>

            @if((Auth::user() !== null) && (Auth::user()->isAdmin()))
                <p>Hello Admin</p>
            @endif


            @auth
                <div class="actions">
                    <p>Actions</p>
                    <a href="{{ route('form') }}" class="btn btn-primary">Add new</a>
                </div>
            @else 
                <p>Hi guest</p>
            @endauth
            <div class="invoices">
                <p>Invoices</p>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Create</th>
                            <th scope="col">№</th>
                            <th scope="col">Supply</th>
                            <th scope="col">Comment</th>
                            @if(Auth::user() !== null)
                                <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($invoices))
                            @foreach($invoices as $invoice)
                                <tr>
                                    <th scope="row">{{ $invoice->create }}</th>
                                    <td>{{ $invoice->number }}</td>
                                    <td>{{ $invoice->supply }}</td>
                                    <td>{{ $invoice->comment }}</td>
                                    @if(Auth::user() !== null)
                                        <td>
                                            <form method="POST" action="{{ route('edit-inv', $invoice->id) }}">
                                                @csrf
                                                <input class="btn btn-success btn-edit" type="submit" name="edit" value="">
                                            </form>
                                            @if(Auth::user()->isAdmin())
                                                <form method="POST" action="{{ route('delete-inv', $invoice->id) }}">
                                                    @csrf
                                                    <input class="btn btn-danger btn-delete" type="submit" name="delete" value="">
                                                </form>
                                            @endif
                                        </td>

                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>

    
@endsection
