@extends('template.layout')

@section('content')

<p align="center"><img src="home.png" width="1000"></p>

<marquee>Selamat Datang di Sistem Informasi Bengkel Sabit</marquee>

    <div class="container-fluid">
	    <div class="block-header">
	        
	    </div>

	    <!-- Widgets -->
            
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                        <a href="transaction"><p align="center"><img src="transaction.png" width="70" height="70" style="float:center;margin:0;" /></a>
                        </div>
                        <div class="content">
                            <div class="text"><p align="center">Data Transaction</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                        <a href="purchase"><p align="center"><img src="purchase.png" width="70" height="70" style="float:center;margin:0;" /></a>
                        </div>
                        <div class="content">
                            <div class="text"><p align="center">Data Purchase</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                        <a href="mechanic"><p align="center"><img src="mechanic.jpg" width="70" height="70" style="float:center;margin:0;" /></a>
                        </div>
                        <div class="content">
                            <div class="text"><p align="center">Data Mekanik</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
	    </div>
    </div>


@endsection