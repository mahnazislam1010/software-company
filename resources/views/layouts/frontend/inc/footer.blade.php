<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12"><h3>About Us</h3>
                <div class="mt-25"><img src="{{isset(\App\Logo_name::first()->logo)?asset('public/storage/logo/'.\App\Logo_name::first()->logo):'' }}" alt="footer-logo">
                    <p class="mt-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    <div class="footer-social-icons mt-25">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>


                {{-----------Footer Right Side Start-------------}}
                <div class="col-md-5 col-sm-5 col-12">
                    <div class="contact-info-box">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i class="fa fa-phone"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><span>Call Us</span>
                                            <p>{{isset(\App\Contact_information::first()->phone)?\App\Contact_information::first()->phone:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i
                                                class="fa fa-envelope-open"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><span>Message</span>
                                            <p>{{isset(\App\Contact_information::first()->email)?\App\Contact_information::first()->email:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="contact-info-section">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-4 center-holder"><i class="fa fa-globe"></i></div>
                                        <div class="col-md-10 col-sm-10 col-8"><span>Our Location</span>
                                            <p>{{isset(\App\Contact_information::first()->location)?\App\Contact_information::first()->location:'' }}</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-----------Footer Right Side End-------------}}

        </div>
        <div class="footer-bar"><p><span class="primary-color">SpecThemes</span> © 2018. All Rights Reserved.</p></div>
    </div>
</footer>


