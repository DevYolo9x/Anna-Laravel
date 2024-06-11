@extends('homepage.layout.home')
@section('content')

    {!!htmlBreadcrumb($page->title, [], $banner_breadcrum)!!}
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">Liên hệ với chúng tôi</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('frontend/images/section-title-shape-1.png') }}" alt="shape">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('frontend/images/section-title-shape-2.png') }}" alt="shape">
                                </div>
                            </div>
                            <h2 class="section-title__title">{{ showField($page->fields, 'config_colums_textarea_contact_title') }}</h2>
                        </div>
                        <div class="contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <span>
                                        <a href="tel:{{ $fcSystem['contact_hotline'] }}" class="contact-page__call-number">{{ $fcSystem['contact_hotline'] }}</a>
                                        @if( !empty($fcSystem['contact_hotline_1']) )
                                         / <a href="tel:{{ $fcSystem['contact_hotline_1'] }}" class="contact-page__call-number">{{ $fcSystem['contact_hotline_1'] }}</a>
                                        @endif
                                    </span>
                                    <a href="mailto:{{ $fcSystem['contact_email'] }}" class="contact-page__email">{{ $fcSystem['contact_email'] }}</a>
                                </h4>
                            </div>
                        </div>
                        <p class="contact-page__location-text">{{ $fcSystem['contact_address'] }}</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="contact-page__form">
                            <form action="" class="comment-one__form contact-form-validated" id="form-submit-contact">
                                @csrf
                                @include('homepage.common.alert')
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Họ và tên *" name="fullname">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Địa chỉ email *" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Nội dung *"></textarea>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn btn-submit-contact">Gửi phản hồi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-one cta-three">
        <div class="container">
            <div class="cta-one__content">
                <div class="cta-one__inner">
                    <div class="cta-one__left">
                        <h3 class="cta-one__title">{{ showField($page->fields, 'config_colums_input_contact_address') }}</h3>
                    </div>
                    <div class="cta-one__right">
                        <div class="cta-one__call">
                            <div class="cta-one__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="cta-one__call-number">
                                <a href="tel:{{ $fcSystem['contact_hotline'] }}">{{ $fcSystem['contact_hotline'] }}</a>
                                <p>Liên hệ ngay</p>
                            </div>
                        </div>
                        <div class="cta-one__btn-box">
                            <a href="{{ $fcSystem['contact_link_map'] }}" rel="nofollow" target="_blank" class="thm-btn cta-one__btn">Bản đồ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="google-map-two">{!! $fcSystem['contact_map'] !!}</section>

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