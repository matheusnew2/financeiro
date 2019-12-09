@extends('layout.header')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Relatórios
                </div>
                <div class="card-body row">
                    <div class="col-lg-6 form-group">
                        <label for='inicio'>Início</label>
                        <input type="date" name="inicio" id="inicio" class="form-control"> 
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for='fim'>Fim</label>
                        <input type="date" name="fim" id="fim" class="form-control"> 
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="submit" class="btn btn-success" value="Gerar">
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
            

        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extras')
<!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
@endsection