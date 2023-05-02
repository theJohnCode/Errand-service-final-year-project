<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="i{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-central">
        <div class="semiboxshadow text-center">
            <img src="img/img-theme/shp.png" class="img-responsive" alt="">
        </div>
        <div id="map" class="honmob"> </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside>
                                <h4>The Office</h4>
                                <address>
                                    <strong>Home Services.</strong><br>
                                    <i class="fa fa-map-marker"></i><strong>Address: </strong>Cairo, Egypt<br>
                                    <i class="fa fa-phone"></i><strong>Phone: </strong> +0201153225410
                                </address>
                                <address>
                                    <strong>Home Services Emails</strong><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:contact@surfsidemedia.in"> info@homesevices.com</a><br>
                                </address>
                            </aside>
                            <hr class="tall">
                        </div>
                        <div class="col-md-8">
                            <h3>Contact Form</h3>
                            <p class="lead">
                            </p>
                            <form id="contactform" class="form-theme" wire:submit.prevent="sendMessage" method="post">
                                <input type="text" placeholder="Name" name="name" id="name" required="" wire:model="name">
                                <input type="email" placeholder="Email" name="email" id="email" required="" wire:model="email">
                                <input type="text" placeholder="Phone" name="phone" id="phone" required="" wire:model="phone">
                                <input type="text" placeholder="Title" name="title" id="title" required="" wire:model="title">
                                <textarea placeholder="Your Message" name="message" id="message"
                                          required="" wire:model="message"></textarea>
                                <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                            </form>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter content_resalt border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 19.0760,
                    lng: 72.8777
                },
                zoom: 13
            });
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
    <script src="maps/api/js?key=AIzaSyDUivMJTPZn0DVMCnTmeOxPEAC6kSuplwU&libraries=places&callback=initAutocomplete"
            async="" defer=""></script>
</div>
