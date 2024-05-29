@extends('layout.master')
@section('Content')
@if(session('Note'))
<div class="alert alert-success">
    {{session('Note')}}
@endif
<form method="post" enctype="multipart/form-data" action="{{$product->pid}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="mb-3">
                <label for="" class="form-label">ID product</label>
                <input
                    type="text"
                    class="form-control"
                    name="id"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$product->pid}}"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="pname"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$product->pname}}"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Company</label>
                <input
                    type="text"
                    class="form-control"
                    name="company"
                    id=""
                    aria-describedby="helpId"
                    placeholder=""
                    value="{{$product->company}}"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Select Band</label>
                <select
                
                    class="form-select form-select-lg"
                    name="band"
                    id=""
                    value="{{$product->band}}"
                >
                    <option selected>Select one</option>
                    <option value="CAVALIER">CAVALIER</option>
                    <option value="Western Family">Western Family</option>
                    <option value="Ibuprofen">Ibuprofen</option>
                </select>
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Select Year</label>
            <select
                class="form-select form-select-lg"
                name="year"
                id=""
                value="{{$product->year}}"
            >
            <?php
            for($year = 2010;$year<=2020;$year++){
                echo '<option value="'.$year.'">'.$year.'</option>';
            }
            ?>
            </select>
        </div>
        <div>
            <label for="" class="form-label">choose image:</label>
            <img src="{{$product->pimage}}" alt="Image">
                <input type="file" name="image" class="form-control" >
</div>
        
  <button
    type="submit"
    name="btnInsert"
    class="btn btn-primary"
  >
    Submit
  </button>
  
</form>
      

@endsection
