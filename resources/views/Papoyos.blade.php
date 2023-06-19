@extends('layouts.app')
<style>
	.containerFlex{
		display: flex;
		justify-content: space-between;
        align-items: center;
	}
	.colKhaki{
		background: Khaki;
	}
	.colGreen{
		background: paleGreen;
	}
	.colSalmon{
		background: salmon;
	}
	.col{
		width:150px
	}
    button {
  font-size: 20px;
  line-height: 50px;
  text-align: center;
  width: 150px;
  height: 50px;
}
</style>

@section('content')
        <div class="containerflex center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="card "style="border:none; background-color: #f8fafc">
                            <div class="card-body">
                                    @foreach ($datos as $dato)
                                        <a href="{{ route('Iapoyos', $dato->id) }}">{{ $dato->Nombre }}</a>
                                    @endforeach
                                    <button class="btn">
                                    <a href="{{ route('apoyos.create') }}">
                                        <img src="/imagen/agregar.png" style="widht: 40px; height: 40px">
                                    </a>
                                </button>
                                
                            </div> 
                        </div> 
                    </div>         
                </div>
            </div>  
        </div>
@endsection    