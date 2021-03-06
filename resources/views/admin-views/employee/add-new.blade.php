@extends('layouts.back-end.app')
@section('title','Employee Add')
@push('css_or_js')
    <link href="{{asset('public/assets/back-end')}}/css/select2.min.css" rel="stylesheet"/>
    <link href="{{asset('public/assets/back-end/css/croppie.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
           @media(max-width:375px){
            #employee-image-modal .modal-content{
              width: 367px !important;
            margin-left: 0 !important;
        }
       
        }

   @media(max-width:500px){
    #employee-image-modal .modal-content{
              width: 400px !important;
            margin-left: 0 !important;
        }
      
      
   }
    </style>
@endpush

@section('content')
<div class="content container-fluid"> 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('messages.Dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{trans('messages.employee_add')}}</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-black-50">{{trans('messages.Employee')}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{trans('messages.employee_form')}}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.employee.add-new')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.Name')}}</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Ex : Md. Al Imrun" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.Phone')}}</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="Ex : +88017********">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.Email')}}</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Ex : ex@gmail.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.Role')}}</label>
                                    <select class="form-control" name="role_id"
                                            style="width: 100%" >
                                        <option value="0" selected disabled>---select---</option>
                                        @foreach($rls as $r)
                                            <option value="{{$r->id}}">{{$r->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.password')}}</label>
                                    <input type="text" name="password" class="form-control" id="password"
                                           placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label for="name">{{trans('messages.employee_image')}}</label><br>
                                    <button type="button" class="btn btn-secondary text-light btn-sm" data-toggle="modal"
                                            data-target="#employee-image-modal" data-whatever="@mdo">
                                            <i class="tio-add-circle"></i> Upload Image
                                            <strong id="image-count-employee-image-modal"></strong>
                                       
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal-->
    @include('shared-partials.image-process._image-crop-modal',['modal_id'=>'employee-image-modal'])
    <!--modal-->
</div>
@endsection

@push('script')
    <script src="{{asset('public/assets/back-end')}}/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    @include('shared-partials.image-process._script',[
   'id'=>'employee-image-modal',
   'height'=>200,
   'width'=>200,
   'multi_image'=>false,
   'route'=>route('image-upload')
   ])
@endpush
