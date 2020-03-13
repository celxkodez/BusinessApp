<template>

    <footer id="footer">
        <div class="container">
        <nav class="footer-nav">
            <div class="row">
                <div class="col-md-3 pb-3">
                    <div id="link-list">
                            <img id="footer-logo" src="https://res.cloudinary.com/dzfz6iwon/image/upload/v1574526202/vector__3__veruot.png"><p class="logo_title">Rabicon</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 pb-3 footer-section">
                    <div>
                        <a href="#">Start Selling</a><br>
                        <a href="#">Start Selling</a> <br>       
                        <a href="#">Privacy Policy</a><br>
                        <a href="#">Terms and Conditions</a>        
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 pb-3 footer-section">
                    <p id="address">
                        <a href="#">About Us</a> <br>
                        <a href="#">Contact Us</a><br>
                        <a href="#">help@rubican.com</a><br>
                        <a href="#">+234 8109 456 7890</a>         
                    </p>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-6 pb-3">
                    <h2 class="Subscribe-header">Subscribe to our Newsletter</h2> 
                    <div id="socials">
                        <form class="form-inline">
							<div class="form-group mb-2 mr-2">
								<label for="staticEmail2" class="sr-only">Email</label>
								<input type="email" class="form-control" id="staticEmail2" value="" placeholder="Email Address" required>
							</div>
							<button type="submit" class="btn btn-secondary mb-2">Subscribe</button>
						</form>
                                <div class="social-media">
                                    <h3>Follow Us On</h3>
                                    <a href="#" title="Follow on Instagram!">
                                        <!-- <img src="img/instagram.png"> -->
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" title="Follow on Twitter!">
                                        <!-- <img src="img/instagram.png"> -->
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>

                                    <a href="#" title="Follow on Facebook!">
                                        <!-- <img src="img/instagram.png"> -->
                                       <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>

                                    <a href="#" title="Follow on YouTube!">
                                        <!-- <img src="img/instagram.png"> -->
                                        <i class="fa fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </nav>
            
        
        <hr>
        <p class="copyright ">&copy; Copyright Rabicon In'l 2019.</p>
        </div>
        
    </footer>

</template>

<script>
// import { mapGetters } from 'vuex'
// import LocaleDropdown from './LocaleDropdown'

// export default {
//   components: {
//     LocaleDropdown
//   },
 
// }
</script>

<style scoped>
@import url('http://fonts.googleapis.com/css?family=rubik:400,600');

body{
    font-family: rubik, sans-serif;
}
nav{
    padding-top: 2rem;
}
footer{
    background-color: #23374D;
    color: white;
    height: auto;
}
footer a{
    color: white;
    text-decoration: none;
}
footer a:hover{
    text-decoration: none;
    color: white;
}
hr{
    background-color: white;
}
.copyright{
    text-align: center;
    padding-bottom: 1rem;
    margin-bottom: -1rem;
}
.logo_title{
    color: #ffffff;
    font-size: 20px;
    padding-left: 3.8rem;
    margin-top: -3.3rem;
}

#footer-logo {
    width: 30px;
}
.Subscribe-header{
    font-weight: normal;
    font-size: 14px;
}
.social-media h3{
    font-weight: normal;
    font-size: 16px;
    padding-right: 1rem;
    margin-top: .3rem;
}
.form-inline button{
    font-size: 14px !important;
    border-radius: 3px !important;
    background: #1089FF !important;
    box-shadow: none;
    padding: 14px;
  min-width: 60px;
  border: none;
  cursor: pointer;
  height: 25px;
  margin-left: 10px;
  margin-top: 5px;
}

.form-inline input {
    height: 25px !important;
}
/*.social-media {
  display: flex;
}
.social-media a{
    padding-right: 1rem;
    text-decoration: none;
}*/


</style>
