@extends('homepage.layout.home')
@section('content')

    <div id="main" class="sitemap main-contact" style="display: none">
        <div class="container mx-auto px-3">
            <div class="map pt-[30px] md:pt-[50px]">
                <?php echo $fcSystem['contact_map'] ?>
            </div>
            <div class="contact-btottom mt-5 md:mt-8">
                <div class="flex flex-wrap justify-between -mx-3">
                    <div class="w-full md:w-2/3 px-3">

                    </div>
                    <div class="w-full md:w-1/3 px-3 mt-[15px] md:mt-0">
                        <div class="bg-gray-100 border border-gray-200 p-[10px] md:p-[25px]">
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold"><i
                                            class="fa-solid fa-phone text-f14 mr-[5px] text-Orangefc5"></i>Hotline</h4>
                                <p class="text-gray-500">{{$fcSystem['contact_hotline']}}</p>
                            </div>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold"><i
                                            class="fa-solid fa-envelope text-f14 mr-[5px] text-Orangefc5"></i>Email</h4>
                                <p class="text-gray-500">{{$fcSystem['contact_email']}}</p>
                            </div>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold"><i
                                            class="fa-solid fa-location-dot  text-f14 mr-[5px] text-Orangefc5"></i>Địa
                                    chỉ</h4>
                                <p class="text-gray-500">{{$fcSystem['contact_address']}}</p>
                            </div>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold"><i
                                            class="fa-regular fa-clock text-f14 mr-[5px] text-Orangefc5"></i>Thời gian
                                    làm việc</h4>
                                <p class="text-gray-500">{{$fcSystem['contact_time']}}</p>
                            </div>
                            <div class="border-t border-gray-200 pt-5 mt-5">
                                <ul class="flex flex-wrap justify-center">
                                    @if(!empty($fcSystem['social_facebook']))
                                        <li>
                                            <a target="_blank" href="{{$fcSystem['social_facebook']}}"
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($fcSystem['social_twitter']))
                                        <li>
                                            <a target="_blank" href="{{$fcSystem['social_twitter']}}"
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($fcSystem['social_google_plus']))
                                        <li>
                                            <a target="_blank" href="{{$fcSystem['social_youtube']}}"
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-google"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($fcSystem['social_youtube']))
                                        <li>
                                            <a target="_blank" href="{{$fcSystem['social_google_plus']}}"
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-youtube"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if(!empty($fcSystem['social_tiktok']))
                                        <li>
                                            <a href=""
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-tiktok"></i></a>
                                        </li>
                                    @endif
                                    @if(!empty($fcSystem['social_instagram']))

                                        <li>
                                            <a href=""
                                               class="inline-block w-[40px] h-[40px] text-center leading-[40px] mr-[5px] border rounded-full bg-color_primary text-white">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div id="main" class="sitemap main-contact pb-[50px]">
        {!!htmlBreadcrumb($page->title, [])!!}
        <div class="container mx-auto px-3">
            <div class="contact-btottom  shadow-md mt-[20px] md:mt-[50px] border border-gray-100">
                <div class="flex flex-wrap justify-between">
                    <div class="w-full md:w-1/3 ">
                        <div class="bg-color_primary p-[10px] md:p-[25px] h-full">
                            <h2 class="title-primary uppercase text-green text-f20 md:text-f23 text-white font-bold leading-[30px] md:leading-[40px] relative pb-[5px] mb-[20px]">
                                VỀ CHÚNG TÔI
                            </h2>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold mb-[5px] text-white">
                                    <i class="fa-solid fa-phone text-f14 mr-[5px] text-Orangefc5"></i>
                                    Hotline
                                </h4>
                                <p class="text-white">
                                    <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                </p>
                            </div>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold mb-[5px] text-white">
                                    <i class="fa-solid fa-envelope text-f14 mr-[5px] text-Orangefc5"></i>
                                    Email
                                </h4>
                                <p class="text-white"><a href="mailto:{{ $fcSystem['contact_email'] }}">{{ $fcSystem['contact_email'] }}</a></p>
                            </div>
                            <div class="mb-[20px]">
                                <h4 class="text-f15 font-bold mb-[5px] text-white">
                                    <i class="fa-solid fa-location-dot text-f14 mr-[5px] text-Orangefc5"></i>Địa chỉ
                                </h4>
                                <p class="text-white">
                                    {{ $fcSystem['contact_address'] }}
                                </p>
                            </div>
                            <div class="border-t border-gray-200 pt-5 mt-5">
                                <ul class="flex flex-wrap justify-center">
                                    <li class="mr-[10px]">
                                        <a href="{{ $fcSystem['social_facebook'] }}" class="w-[35px] h-[35px] leading-[35px] text-center bg-color_second text-white border border-color_second hover:bg-white hover:text-color_second inline-block rounded-full mx-[2p transition-all">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="mr-[10px]">
                                        <a href="{{ $fcSystem['social_twitter'] }}" class="w-[35px] h-[35px] leading-[35px] text-center bg-color_second text-white border border-color_second hover:bg-white hover:text-color_second inline-block rounded-full mx-[2p transition-all">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="mr-[10px]">
                                        <a
                                                href="{{ $fcSystem['social_instagram'] }}"
                                                class="w-[35px] h-[35px] leading-[35px] text-center bg-color_second text-white border border-color_second hover:bg-white hover:text-color_second inline-block rounded-full mx-[2p transition-all"
                                        ><i class="fa-brands fa-instagram"></i
                                            ></a>
                                    </li>
                                    <li class="mr-[10px]">
                                        <a href="{{ $fcSystem['social_youtube'] }}" class="w-[35px] h-[35px] leading-[35px] text-center bg-color_second text-white border border-color_second hover:bg-white hover:text-color_second inline-block rounded-full mx-[2p transition-all"
                                        ><i class="fa-brands fa-youtube"></i
                                            ></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-2/3  mt-[15px] md:mt-0">
                        <div class="py-[15px] md:py-[30px] px-[15px] md:px-[50px]">
                            <h2 class="title-primary uppercase text-green text-f20 md:text-f23  font-bold leading-[30px] md:leading-[40px] relative pb-[5px] mb-[20px]">
                                Liên hệ với chúng tôi
                            </h2>
                            <form action="" id="form-submit-contact">
                                @csrf
                                @include('homepage.common.alert')
                                <div class="flex flex-wrap justify-between -mx-3">
                                    <div class="w-full md:w-1/2 px-3">

                                        <input name="fullname"
                                                type="text"
                                                class="w-full h-[45px] border border-gray-300 mb-[10px] md:mb-[15px] rounded-sm text-f15 bg-white"
                                                placeholder="Họ và tên"
                                        />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <input name="email"
                                                type="text"
                                                class="w-full h-[45px] border border-gray-300 mb-[10px] md:mb-[15px] rounded-sm text-f15 bg-white"
                                                placeholder="Email"
                                        />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">

                                        <input name="subject"
                                                type="text"
                                                class="w-full h-[45px] border border-gray-300 mb-[10px] md:mb-[15px] rounded-sm text-f15 bg-white"
                                                placeholder="Tiêu đề"
                                        />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <input name="phone"
                                                type="text"
                                                class="w-full h-[45px] border border-gray-300 mb-[10px] md:mb-[15px] rounded-sm text-f15 bg-white"
                                                placeholder="Số điện thoại"
                                        />
                                    </div>
                                </div>


                                <textarea
                                        name="message"
                                        id=""
                                        cols="30"
                                        rows="10"
                                        class="w-full h-[120px] border border-gray-300  bg-white rounded-sm text-f15"
                                        placeholder="Nội dung..."
                                ></textarea>
                                <button
                                        type="submit"
                                        class="btn-submit-contact write-review__button write-review__button--submit bg-color_primary border border-color_primary hover:bg-white hover:text-color_primary transition-all text-white h-[45px] mt-[15px] text-f15 rounded-[5px] uppercase w-24"
                                >
                                    <span>Gửi </span>
                                </button>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <div class="map pt-[30px] md:pt-[50px]">
                {!! $fcSystem['contact_map'] !!}
            </div>
        </div>

    </div>

@endsection
@push('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-submit-contact").click(function (e) {
                e.preventDefault();
                var _token = $("#form-submit-contact input[name='_token']").val();
                var fullname = $("#form-submit-contact input[name='fullname']").val();
                var subject = $("#form-submit-contact input[name='subject']").val();
                var email = $("#form-submit-contact input[name='email']").val();
                var phone = $("#form-submit-contact input[name='phone']").val();
                var message = $("#form-submit-contact textarea[name='message']").val();
                $.ajax({
                    url: "<?php echo route('contactFrontend.store') ?>",
                    type: 'POST',
                    data: {
                        _token: _token,
                        fullname: fullname,
                        subject: subject,
                        phone: phone,
                        email: email,
                        message: message
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            $("#form-submit-contact .print-error-msg").css('display', 'none');
                            $("#form-submit-contact .print-success-msg").css('display', 'block');
                            $("#form-submit-contact .print-success-msg span").html("<?php echo $fcSystem['message_2'] ?>");
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            $("#form-submit-contact .print-error-msg").css('display', 'block');
                            $("#form-submit-contact .print-success-msg").css('display', 'none');
                            $("#form-submit-contact .print-error-msg span").html(data.error);
                        }
                    }
                });
            });
        });
    </script>
@endpush