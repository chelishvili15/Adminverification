@extends('admin.layout')
@section('title','მთავარი')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">მთავარი</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">მთავარი</li>
    </ol>
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">ადმინსტრატორები</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admins.index') }}">სრულად</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
                