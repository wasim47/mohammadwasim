@extends('admin.include.master') 
	@section('title') New Report - ToonBDs @endsection 
@section('content')

	<div class="layout-content">
        <div class="layout-content-body">
        	<div class="col-sm-12">
                <div class="page-header">
                    <h3 class="page-title">Create New Report</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>Settings</li>
                            <li class="active">New Report</li>
                            <li style="text-align:right; float:right">
                            	<a  href="{{ route('report.index') }}" style="color:#fff;"><i class="fa fa-list"></i> View Report List</a>
                            </li>
                        </ol>
                </div>
            
              @if (session()->has('messageType'))
                  <div class="alert alert-{{ session()->get('messageType') }}" role="alert">
                      <strong>STATUS: </strong> {{ session()->get('message') }}
                  </div>
              @endif
			</div>
              <div class="row-fluid">
                <div class="col-sm-12">
                  <div class="card">
                      
                      <div class="row" style="margin:10px">
                      	<div class="col-sm-offset-2">
                            <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Headline') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('File') }}</label>
                            <div class="col-md-6">
                                <input id="pdffile" type="file" class="form-control" name="pdffile">
                                @if ($errors->has('pdffile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pdffile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Menu') }}</label>
                            <div class="col-md-6">
                                <select name="menu_id" class="form-control">
                                	@foreach($allmenu as $menus)
                                		<option value="{{ $menus->id }}">{{ $menus->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Year') }}</label>
                            <div class="col-md-6">
                               <select name="years" class="form-control">
                               	 <option value="">Year</option>
                                 <?php for($i=2000; $i <= date('Y'); $i++){ ?>
                                 <option value="{{ $i }}">{{ $i }}</option>
                                 <?php } ?>
                               </select>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                    	</div>
                      </div>
                  </div>
                </div>  
              </div>
			</div>
        </div>
@endsection