@extends('welcome')

@section('title', 'Create Order')

@section('content')
<div class="section form-padding">
   <div class="container is-fluid">
      <h1 class="title">Create Order</h1>
      <hr class="title-underline">
      <div class="is-mobile is-4">
          
          <create-order-component></create-order-component>
          
      </div>
   </div>
</div>
@endsection 
