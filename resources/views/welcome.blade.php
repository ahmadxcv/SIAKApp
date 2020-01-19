@extends('layouts.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col">
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      
                      <div class="text-value-lg"> {{ $jumlah }} </div>
                      <div>Jumlah Pendaftar Hari Ini</div>
                    </div>
                    
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
            </div>
          </div>

@endsection

@section('javascript')

@endsection
