<?php
session_start();
include 'includes/header-form-page.php';
if (!isset($_SESSION['active'])) {
	header('location: index.php');
}
?>


<!-- Home -->

<div class="home">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg"
        data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content text-center">
                    <div class="home_title">
                        <div><img src="data:image/jpg;base64,<?php echo $imagen; ?>" alt="" width="100" height="100">
                        </div>
                        <h2><span><a href=""
                                    style="text-decoration: none;color: white;"><?php echo $_SESSION['nombre']; ?></a></span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>

<!-- Blog -->


<div class="blog" style="background-color: #DCDCDC;">
    <div class="row">
        <div class="col">
            <div class="section_title_container text-center">

                <div class="section_title">
                    <h1>Tus publicaciones</h1>
                </div>
                <div class="footer_submit mx-auto"><a href="blog-form.php">Volver</a></div>
            </div>
        </div>
    </div>

    <br>

    <div class="container p-3 col-md-11" style="background-color: #F0FFF0;">
        <div class="row contact_row">
            <!-- Contact - About -->
            <div class="col-lg-4 contact_col">
                <div class="logo"><a href="#">VRC-<span>Alquileres</span></a></div>
                <div class="contact_text">
                    <p>Te brindamos éste espacio para que puedas realizar tus consultas, las cuáles serán atendidas a la
                        brevedad...
                        Además tienes a disposición los diferentes medios con que puedes comunicarte con nosotros. </p>
                </div>
            </div>

            <!-- Contact - Info -->
            <div class="col-lg-4 contact_col">
                <div class="contact_info">
                    <ul>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div><img src="images/placeholder_2.svg" alt=""></div>
                            </div>
                            <span>Maipú, 356, Formosa Capita</span>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div><img src="images/phone-call-2.svg" alt=""></div>
                            </div>
                            <span>+543 705221 122</span>
                        </li>
                        <li class="d-flex flex-row align-items-center justify-content-start">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div><img src="images/envelope-2.svg" alt=""></div>
                            </div>
                            <span>vrcalquileresfsa@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact - Image -->
            <div class="col-lg-4 contact_col">
                <div class="contact_image d-flex flex-column align-items-center justify-content-center">
                    <img src="images/alqui.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <hr>


</div>

<?php
include 'includes/footer-form-page.php';
?>
</body>

</html>