<head>
  <base href="{{ asset('') }}"></base>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Human-Management | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{URL::asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('public/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Crop image-->
  <link rel="stylesheet" href="{{URL::asset('public/css/croppie.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{URL::asset('public/lib/toastr/css/toastr.min.css')}}">
  <!-- DataPicker -->
  <link href="{{URL::asset('public/lib/datapicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{URL::asset('public/css/custom_nav.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>