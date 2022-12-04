<?php
$page = "contact";
//require header file
require('header.php');
// require functions file
require_once('functions.php');

if (isset($_POST['contact'])) {


    //Stablishing Connection...
    include 'db.php';

    //Getting Values From Form Tag...
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    //Insert Query For Mysql..
    $query = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$message')";
    $res = mysqli_query($con, $query);

    
    //Redirection to testing_batch.php page..
    // header("Location: http://localhost/LAB/Views/testing_batch.php");

    //Connection Close...
    mysqli_close($con);
}

?>


<section id="page-header" class="about-header">
        <h2>Contact Us</h2>
        <p> Leave a message. We would love to hear from you....</p>
        <a href="#" class="to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit us or Contact us</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <p>Address Lorem ipsum dolor sit</p>
                </li>
                <li>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <p>Contact@example.com</p>
                </li>
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>>
                    <p>Phone Number</p>
                </li>
                <li>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <p>Office Timing</p>
                </li>
            </div>
        </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d79028.82705994546!2d-1.316122463070348!3d51.75770789023402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversity%20of%20Oxford!5e0!3m2!1sen!2sin!4v1665512781798!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        
    </section>
 
    <section id="form-details">
        <form action="contact.php" method="post">
            <span>Leave a Message</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Enter your name" name="name">
            <input type="text" placeholder="Enter your Email" name="email">
            <input type="text" placeholder="Enter your Subjext" name="subject">
            <textarea id="" cols="30" rows="10" placeholder="Your Message" name="message"></textarea>
            <input type="submit" value="Send" class="normal" name="contact"/>
        </form>

        <div class="people">
            <div>
                <img src="img/people/1.png" alt="">
                <p><span>John Doe</span> Senior Marketing Manager <br> Phone: +91 1234567890 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="img/people/2.png" alt="">
                <p><span>John Doe</span> Senior Marketing Manager <br> Phone: +91 1234567890 <br> Email: contact@example.com</p>
            </div>
            <div>
                <img src="img/people/3.png" alt="">
                <p><span>Jean Doe</span> Senior Marketing Manager <br> Phone: +91 1234567890 <br> Email: contact@example.com</p>
            </div>
        </div>
    </section>

   
    <?php include 'footer.php';?>