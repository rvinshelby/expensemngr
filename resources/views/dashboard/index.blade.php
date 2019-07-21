@extends('layouts.app')

@section('title')
My Expenses
@stop

@section('breadcrumbs')
Dashboard
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            @include('dashboard.includes.expense-info')
                        </div>
                        <div class="col-md-6">
                            @include('dashboard.includes.chart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop