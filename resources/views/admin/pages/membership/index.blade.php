 @extends('admin.layouts.main')
 @section('content')
     <div class="br-pageheader">
         <nav class="breadcrumb pd-0 mg-0 tx-12">
             <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
             <span class="breadcrumb-item active">{{ $title }}</span>
         </nav>
     </div><!-- br-pageheader -->
     <div class="br-pagebody">
         <div class="br-section-wrapper">
             <div class="table-wrapper">
                 <div class="table-wrapper">
                     <table id="datatable" class="table display responsive nowrap category-table">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 {{-- <th>Nama Member</th> --}}
                                 <th>Email</th>
                                 <th>Role</th>
                                 <th>Total Bayar</th>
                                 <th>Bukti Bayar</th>
                                 <th>Berakhir Pada</th>
                                 <th>Status</th>
                                 <th class="text-center">Aksi</th>
                             </tr>
                         </thead>
                         <tbody>

                         </tbody>
                     </table>
                 </div><!-- table-wrapper -->
             </div><!-- col-6 -->
         </div><!-- br-section-wrapper -->
     </div><!-- br-pagebody -->

     <script src="{{ asset('app/membership/index.js') }}"></script>
 @endsection
