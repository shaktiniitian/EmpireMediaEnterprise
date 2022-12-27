@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This Week
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last Week
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->

        
          <!-- /.card -->
        </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Users</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
        
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
              </tr>
              </thead>
              <tbody>
              <tr>
               
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
     
              </tr>
              <tr>
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
              </tr>
              <tr>
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
              </tr>
              <tr>
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
              </tr>
              <tr>
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
              </tr>
              <tr>
                <td>Surendra</td>
                <td>
                  surendra@gmail.com
                </td>
                <td>
                 8877136654
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
        <!-- /.col-md-6 -->
     
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection