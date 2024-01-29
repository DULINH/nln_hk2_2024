<!-- Footer -->
<footer class="text-center text-lg-start text-primary mt-3" style="background-color: #cceaff">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #cdeaef">
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-primary me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Company name</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p>
            Lorem Ipsum is simply dummy text of the printing and 
            typesetting industry. Lorem Ipsum has been the industry's 
            standard dummy text ever since the 1500s, when an unknown 
            printer took a galley of type and scrambled it to make a 
            type specimen book
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Products</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p>
              <a href="#!" class="text-primary">DLINH</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
            <p>
              <a href="#!" class="text-primary">Your Account</a>
            </p>
            <!-- <p>
            <a href="#!" class="text-white">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!" class="text-white">Shipping Rates</a>
          </p>
          <p>
            <a href="#!" class="text-white">Help</a>
          </p> -->
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #cceaff; height: 2px" />
            <p><i class="fas fa-home mr-3"></i> DDDDDDDdd</p>
            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
            <p><i class="fas fa-phone mr-3"></i> 1234567890</p>
            <p><i class="fas fa-print mr-3"></i> 0123456789</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #cceaff">
      © 2024 Copyright:
      <!-- <a class="text-white" href="https://mdbootstrap.com/"
       >MDBootstrap.com</a
      > -->
    </div>

    <!-- End of .container -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
  
    <script>
    const modal = document.getElementById('modal_reg');
    const openButton = document.getElementById('openModal_reg');
    const closeButton = document.querySelector('.close');

    function closeModal() {
      modal.style.display = 'none';
    }

    function openModal() {
      modal.style.display = 'block';
    }

    openButton.addEventListener('click', openModal);
    closeButton.addEventListener('click', closeModal);

    window.addEventListener('click', function (event) {
      if (event.target === modal) {
        closeModal();
      }
    });
    </script>
</body>