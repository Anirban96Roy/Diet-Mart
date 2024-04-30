<section class="contact" id="contact">
    <h2 class="heading text-center">Contact Us</h2>
    <h6 class="x text-center" style="color: red;">Always Be IN Touch With Us</h6>
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="input-box">
            <div class="input-field">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <span class="focus"></span>
            </div>
            <div class="input-field">
                <input type="text" name="email" placeholder="Email" required>
                <span class="focus"></span>
            </div>
        </div>

        <div class="input-box">
            <div class="input-field">
                <input type="number" name="mobile_number" placeholder="Mobile Number" required>
                <span class="focus"></span>
            </div>
            <div class="input-field">
                <input type="text" name="subject" placeholder="Email subject" required>
                <span class="focus"></span>
            </div>
        </div>
        <div class="textarea-field">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your massage" required></textarea>
            <span class="focus"></span>
        </div>
        <div class="btn-box">
            <button type="submit" class="btn">Submit</button>
        </div>
    </form>
</section>
