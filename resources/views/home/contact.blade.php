@extends('home.index1')
@section('content')

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Số điện thoại</h4>
                        <p><a href="tel://0931951945" style="color:black">+ 93.195.1945</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>97 Ngô Đức Kế , TP Huế</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>
                            Thời gian mở cửa</h4>
                        <p>8:00 am to 17:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p><a href="mailto:hoangnguyenn3333@gmail.com" style="color:black">hoangnguyen@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                      <h4>
                        LIÊN HỆ VỚI CHÚNG TÔI
                        </h4>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Tên của bạn">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Email của bạn">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Tin nhắn của bạn"></textarea>
                        <button type="submit" class="site-btn">Gửi mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Thành Phố Huế</h4>
                <ul>
                    <li>Phone: + 93.195.1945</li>
                    <li>Add: 97 Ngô Đức Kế , TP Huế</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->




@endsection
