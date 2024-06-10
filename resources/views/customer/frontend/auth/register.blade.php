@extends('homepage.layout.home')
@section('content')

{!!htmlBreadcrumb(trans('index.RegisterAccount'))!!}
<main class="py-8">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-center">
            <div class="w-[580px] max-w-full bg-[#f4f6f8] p-6 rounded-xl">
                <div class="flex border-b border-[#eee]">
                    <div class="w-1/2 text-center">
                        <a href="{{route('customer.login')}}" class="font-semibold uppercase h-[50px] leading-[50px] float-left w-full">{{trans('index.Login')}}</a>
                    </div>
                    <div class="w-1/2 text-center border-l border[#eee]">
                        <a href="{{route('customer.register')}}" class="font-bold uppercase h-[50px] leading-[50px] float-left w-full border-b   border-[#EE0033]">{{trans('index.Register')}}</a>
                    </div>
                </div>
                <div class="text-center py-[10px] text-f14">
                    <?php /*{{trans('index.PleaseEmailPassword')}} {{$fcSystem['homepage_brandname']}}*/?>
                </div>
                <form action="{{route('customer.register-store')}}" method="POST" id="form-auth">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissable mt-2">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Success!</b> {{session('success')}}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2" role="alert">
                        <strong class="font-bold">ERROR!</strong>
                        <span class="block sm:inline">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </span>
                    </div>
                    @endif
                    <div class="mt-2">
                        <label class="font-bold text-f14">{{trans('index.Fullname')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="name" aria-describedby="emailHelp" placeholder="" value="{{old('name')}}">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14">{{trans('index.Phone')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="phone" aria-describedby="emailHelp" placeholder="" value="{{old('phone')}}">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14">Email<span class="text-f13 text-red-600">*</span></label>
                        <input type="text" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="email" aria-describedby="emailHelp" placeholder="" value="{{old('email')}}">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14">{{trans('index.Password')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="password" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="password" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mt-5">
                        <label class="font-bold text-f14">{{trans('index.EnterPassword')}}<span class="text-f13 text-red-600">*</span></label>
                        <input type="password" class="  border w-full h-11 px-3 focus:outline-none focus:ring focus:ring-red-300  hover:outline-none hover:ring hover:ring-red-300  rounded-lg" name="confirm_password" aria-describedby="emailHelp" placeholder="">
                    </div>
                    <div class="mt-5 flex justify-center">
                        <button type="submit" class="btn-submit-contact py-4 px-1 md:px-8 rounded-lg block bg-[#EE0033]  text-white transition-all leading-none text-f15 font-bold"> {{trans('index.Register')}}</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</main>
@endsection