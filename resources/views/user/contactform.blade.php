@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">
        x
    </button>
    {{session()->get('message')}}
</div>
@endif

<div class="container">
    <!-- Header part contain Title page and description -->
    <div class="header">
        <h2>Contact Us</h2>
        <hr />
        <p>
            Have any questions or feedback? <br>
            We're here to help you.
        </p>
    </div>
    <!-- End of header Part -->

    <!-- Main part contain form and contact information -->
    <div class="main">
        <div class="contact">
            <!-- Form start here -->
            <div class="contact-form">
                <form action="{{url('add_contactform')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="contact-detail">
                        <label class="hide" for="name">Enter your name</label>
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required="" />
                        <label class="hide" for="email">Enter your email address</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" required="" />
                    </div>
                    <label class="hide" for="message">Message</label>
                    <textarea class="form-control" rows="5" id="comment" placeholder="Message" style="resize: none; width: 100%;" name="message" required=""></textarea>

                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
            <!-- Form finish here -->

            <!-- Contact Us start here -->
            <div class="contact-us">
                <h3>Contact Us</h3>

                <span>
                    <i style="font-size: 1.5rem;" class="fa fa-map-marker" aria-hidden="true"></i>
                    123, Gourmet Street, Foodville
                </span>
                <span>
                    <i style="font-size: 1.5rem;" class="fa fa-phone" aria-hidden="true"></i>
                    +1 234 567 890
                </span>
                <span>
                    <i style="font-size: 1.5rem;" class="fa fa-envelope-o" aria-hidden="true"></i>
                    support@tablemate.com
                </span>
            </div>
            <!-- Contact Us Finish here -->
        </div>
    </div>
</div>
