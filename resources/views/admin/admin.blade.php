@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$title}}</h1>
        </div>
        <div class="col-md-6 text-right">
          @if(count($forms) > 0)
          @foreach($forms as $form)
          @livewire($form)
          @endforeach
          @endif
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      @livewire($cname, $data)
    </div>
  </section>
</div>

@endsection