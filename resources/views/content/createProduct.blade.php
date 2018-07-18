@extends('welcome')

@section('title', 'Create Product')

@section('content')
<div class="section form-padding">
   <div class="container is-fluid">
      <h1 class="title">Create Product</h1>
      <hr class="title-underline">
      <div class="is-mobile is-4">
          
          <create-product-component></create-product-component>
          
          <show-product-component></show-product-component>
          
      </div>
   </div>
</div>

@endsection 
