@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="page-content" style='flex:1'>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>Dashboard</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active " aria-current="page">Dashboard</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box-3 bg-style">
                        <div class="item__left">
                            <h2>Total Sale</h2>
                            <div class="status__box__data">
                                <h2>{{ $sale }}</h2>
                            </div>
                        </div>
                        <div class="item__right">
                            <div class="status__box__img">
                                <i class="fas fa-chart-bar fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box-3 bg-style">
                        <div class="item__left">
                            <h2>Total Lead</h2>
                            <div class="status__box__data">
                                <h2>{{ $lead }}</h2>
                            </div>
                        </div>
                        <div class="item__right">
                            <div class="status__box__img">
                                <i class="fas fa-chart-bar fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
