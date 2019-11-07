  <!-- Footer -->
  <footer class="footer bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright text-white">Copyright &copy; Slazar&Salazar Ltda, Salazar Y Salazar seguros.</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="{{isset($contact) ? $contact->twitter_link : ''}}">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="{{isset($contact) ? $contact->facebook_link : ''}}">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="{{isset($contact) ? $contact->instagram_link : ''}}">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <!--<a href="#">Privacy Policy</a>-->
            </li>
            <li class="list-inline-item">
              <!--<a href="#">Terms of Use</a>-->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>