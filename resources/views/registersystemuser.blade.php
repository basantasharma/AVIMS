@extends('./layouts/base')
@section('title', 'Register-Telnet')
@section('headerLeft', 'Register')
@section('registersystemuser', 'active')
@section('menuregister', 'menu-open')


@section('scripts-top')
        {{-- @vite('resources/css/registerform.css') --}}

@endsection

@section('body')

<div class="row justify-content-center">
  <div class=" col-12 col-xxl-6 col-xl-8 col-lg-8 col-md-8 col-sm-12">

   
    
    <form action="/register" method="post" id="formgroup" enctype="multipart/form-data">
      @csrf
      @method('post')
      <h3 class="mb-1 text-center">Sign up</h3>

      <div class="form-outline mb-2">
        <label class="form-label" for="typenameX-2">Name</label>
        <input name="name" type="text" id="typenameX-2" class="form-control form-control-md" placeholder="Full Name" value="" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="typeUserNameX-2">User Name</label>
        <input name="username" type="text" id="typeUserNameX-2" class="form-control form-control-md" placeholder="User Name" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="typeEmailX-2">Email</label>
        <input name="email" type="email" id="typeEmailX-2" class="form-control form-control-md" placeholder="example@abc.com" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="typePasswordX-2">Password</label>
        <input name="password" type="password" id="typePasswordX-2" class="form-control form-control-md" placeholder="********" />
      </div>

      <div class="form-outline mb-2">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control form-control-md" placeholder="********" />
      </div>
      <div class="form-outline mb-2">
        <label class="form-label" for="typeModelNameX-2">Organization Name</label>
        <input name="organization" type="text" id="typeModelNameX-2" class="form-control form-control-md" placeholder="Organization Name"/>
      </div>
      <div class="form-outline mb-2">
        <label class="form-label" for="typeSerialNumberX-2">Organization Branch</label>
        <input name="branch" type="text" id="typeSerialNumberX-2" class="form-control form-control-md" placeholder="Organization Branch" />
      </div>
      <div class="form-outline mb-2">
        <label class="form-label" for="typeDepartmentX-2">Organization Department</label>
        <input name="department" type="text" id="typeDepartmentX-2" class="form-control form-control-md" placeholder="Department Name" />
      </div>
      <div class="text-center">
        <button class="btn btn-info" type="submit">Register</button>
      </div>

      <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
        <a href="/login" class="link-danger">Login</a>
      </p>

    </form>
  </div>
</div>

@endsection


@section('script-end')
@vite("resources/js/registerform.js")
{{-- @vite("resources/js/selectservice.js") --}}
@endsection