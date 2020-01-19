@extends('layouts.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  
                  <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                      
                      <div class="text-value-lg">Reg KK</div>
                      <div>Registrasi KK Baru</div>
                      
                    </div>
                    
                    <a href="/pengajuan/regkk" class="stretched-link"></a>
                  </div>
                  
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                      
                      <div class="text-value-lg">Edit KK</div>
                      <div>Ubah Data pada KK</div>
                    </div>
                   
                    <a href="/pengajuan/editkk" class="stretched-link"></a>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                      
                      <div class="text-value-lg">Ganti KK</div>
                      <div>Jika KK Rusak/Hilang</div>
                    </div>
                   
                    <a href="/pengajuan/gantikk" class="stretched-link"></a>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                      
                      <div class="text-value-lg">Mutasi KK</div>
                      <div>Jika KK anda mutasi</div>
                    </div>
                   
                    <a href="/pengajuan/mutasikk" class="stretched-link"></a>
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
